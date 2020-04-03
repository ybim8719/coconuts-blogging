<?php


namespace App\Controller;


use App\Entity\Article;
use App\Entity\ArticleComment;
use App\Entity\ArticleVisit;
use App\Entity\Pin;
use App\Entity\Channel;
use App\Entity\Follow;
use App\Entity\User;
use App\Entity\UserLike;
use App\Repository\ArticleRepository;
use App\Service\Logger\CoconutsLogger;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/channel")
 */
class ChannelController extends AbstractController
{
    const NB_OF_ARTICLE_BY_BLOCK_OF_CHANNEL = 4;
    const NB_OF_RANDOM_CHANNEL_TO_DISPLAY_FOR_ANONYMOUS = 7;
    const NB_OF_RANDOM_CHANNEL_TO_DISPLAY_FOR_LOGGED = 5;


    /**
     * @var EntityManagerInterface
     */
    private $em;
    /**
     * @var \Doctrine\Persistence\ObjectRepository
     */
    private $userRepository;

    /**
     * @var \Doctrine\Persistence\ObjectRepository
     */

    private $channelRepository;

    private $articleRepository;

    private $logger;

    public function __construct(EntityManagerInterface $em, CoconutsLogger $logger)
    {
        $this->userRepository = $em->getRepository(User::class);
        $this->channelRepository = $em->getRepository(Channel::class);
        $this->articleRepository = $em->getRepository(Article::class);
        $this->em = $em;
        $this->logger = $logger;
    }

    /**
     * Display list of channels subscribed by user.
     * @Route("/index-page", name="channel_channelIndexPage", methods={"GET"})
     */
    public function channelIndexPage(): Response
    {
        $user = $this->getUser();
        $subscribedChannelsWithArticles = [];
        $randomChannelsWithArticles = [];
        $subscribedChannelsId = [];

        // retrieve articles and channel subscribed by the user
        if ($user instanceof User) {
            $subscribedChannels = $this->channelRepository->findBySubscriber($user);
            if (!empty($subscribedChannels)) {
                $subscribedChannelsWithArticles = $this->buildArrayOfChannelsInfosAndAssociatedArticles($subscribedChannels, self::NB_OF_ARTICLE_BY_BLOCK_OF_CHANNEL);
            }
        }

        // retrieve 7 random channels and four random associated articles subscribed by the user
        if (!empty($subscribedChannelsId)) {
            $randomChannels = $this->channelRepository->findRandomChannelsNotInListAndByNumberOfResults($subscribedChannelsId, self::NB_OF_RANDOM_CHANNEL_TO_DISPLAY_FOR_LOGGED);
        } else {
            $randomChannels = $this->channelRepository->findRandomChannelsByNumberOfResults(self::NB_OF_RANDOM_CHANNEL_TO_DISPLAY_FOR_ANONYMOUS);
        }

        // populate the random channels and four random associated articles subscribed by the user
        if (!empty($randomChannels)) {
            $randomChannelsWithArticles = $this->buildArrayOfChannelsInfosAndAssociatedArticles($randomChannels, self::NB_OF_ARTICLE_BY_BLOCK_OF_CHANNEL);
        }

        return $this->render('channel/channel_index_page.html.twig', [
            'subscribedChannelsWithArticles' => $subscribedChannelsWithArticles,
            'randomChannelsWithArticles' => $randomChannelsWithArticles,
        ]);
    }

    /**
     * Display all public info on a channel
     * @Route("/show/{idChannel}", name="channel_show", methods={"GET"})
     * @ParamConverter("channel",options={"id" = "idChannel"})
     */
    public function show(Channel $channel)
    {
        return $this->render('channel/show.html.twig', [
            'channel' => $channel,
        ]);
    }


    /**
     * Takes a array of Channels and builds a maxi array with info of each channel and find a given nb of
     * random associated articles by channel
     * @param array $channels
     * @param int $nbOFfArticles
     * @return array
     */
    private function buildArrayOfChannelsInfosAndAssociatedArticles(array $channels, int $nbOFfArticles)
    {
        $subscribedChannelsWithArticles = [];
        foreach ($channels as $channel) {
            if ($channel instanceof Channel) {
                $subscribedChannelsWithArticles[] = [
                    "channel" => $channel,
                    "articles" => $this->articleRepository->findRandomArticlesByChannelAndNumberOfResults($channel, $nbOFfArticles)
                ];
            }
        }

        return $subscribedChannelsWithArticles;
    }
}