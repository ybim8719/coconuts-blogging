<?php


namespace App\Controller;


use App\Entity\Article;
use App\Entity\ArticleComment;
use App\Entity\ArticleVisit;
use App\Entity\BookMark;
use App\Entity\Channel;
use App\Entity\Follow;
use App\Entity\User;
use App\Entity\UserLike;
use App\Repository\ArticleRepository;
use App\Service\Logger\CoconutsLogger;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
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
     * @Route("/", name="channelIndexPage", methods={"GET"})
     */
    public function channelIndexPage(ArticleRepository $articleRepository): Response
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
            $randomChannels = $this->channelRepository->findRandomChannelsNotInListAndByNumberOfResults($subscribedChannelsId);
        } else {
            $randomChannels = $this->channelRepository->findRandomChannelsByNumberOfResults(7);
        }

        if (!empty($randomChannels)) {
            $randomChannelsWithArticles = $this->buildArrayOfChannelsInfosAndAssociatedArticles($randomChannels, self::NB_OF_ARTICLE_BY_BLOCK_OF_CHANNEL);
        }

        return $this->render('channel/channel_index_page.html.twig', [
            'subscribedChannel' => $subscribedChannelsWithArticles,
            'randomChannels' => $randomChannelsWithArticles,
        ]);
    }


    /**
     * Prend un array de Channels et construit un maxi array d'info sur chaque channel et pioche
     * pour chacun un nb d'articles donné en random
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
                    "id" => $channel->getId(),
                    "title" => $channel->getTitle(),
                    "description" => $channel->getTitle(),
                    "articles" => $this->articleRepository->findRandomArticlesByChannelAndNumberOfResults($channel, $nbOFfArticles)
                ];
            }
        }

        return $subscribedChannelsWithArticles;
    }
}