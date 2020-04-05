<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\BookMark;
use App\Entity\Channel;
use App\Entity\Follow;
use App\Entity\User;
use App\Service\Helper\DateCalculator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class GeneralPagesController extends AbstractController
{
    const NB_OF_SUBSCRIBED_AUTHORS_DISPLAYED = 3;
    const NB_OF_BOOKMARKS = 5;
    const NB_OF_ARTICLES_BY_AUTHOR = 1;
    const NB_OF_ARTICLES_BY_CHANNEL = 3;
    const NB_OF_CHANNEL_FOR_LOGGED = 3;
    const NB_OF_MOST_LIKED_ARTICLES_TO_DISPLAY = 5;

    private $em;
    private $userRepository;
    private $articleRepository;
    private $channelRepository;
    private $followRepository;
    private $bookmarkRepository;

    public function __construct(EntityManagerInterface $em, DateCalculator $calculator)
    {
        $this->userRepository = $em->getRepository(User::class);
        $this->channelRepository = $em->getRepository(Channel::class);
        $this->articleRepository = $em->getRepository(Article::class);
        $this->followRepository = $em->getRepository(Follow::class);
        $this->bookmarkRepository = $em->getRepository(BookMark::class);
        $this->em = $em;
    }

    /** // get Channels

     * @Route("", name="public_home_page", methods={"GET"})
     */
    public function publicHomePage()
    {
        $user = $this->getUser();
        if ($user instanceof User) {
            $customData = $this->getCustomDisplayInfoForLoggedUser($user);
            return $this->render('general/public_home_page_for_logged.html.twig', [
                'bookmarkedArticles' => $customData['arrayOfBookmarkedArticles'],
                'arrayOfWritersWithArticle' => $customData['arrayOfWritersWithArticle'],
                'arrayOfChannelsWithArticles' => $customData['arrayOfChannelsWithArticles']
            ]);
        }

        // unlogged visitor
        return $this->render('general/public_home_page_for_anonymous.html.twig', [
            'trendingArticles' => [],
        ]);
    }

    private function getCustomDisplayInfoForLoggedUser(User $user)
    {
        $bookMarkedArticles = [];
        $arrayOfWritersWithArticle = [];
        $arrayOfChannelsWithArticles = [];
        $arrayOfBookmarkedArticles = [];

        // get Bookmark Articles
        $bookmarks= $this->bookmarkRepository->findRandomBookmarksByUserAndMaxResult($user, self::NB_OF_BOOKMARKS);

        if (count($bookmarks) > 0) {
            foreach ($bookmarks as $bookMark) {
                if ($bookMark instanceof BookMark) {
                    $arrayOfBookmarkedArticles[] = $bookMark->getArticle();
                }
            }
        }

        // get Authors + one article for each one of them
        $followsOfUser = $this->followRepository->findRandomFollowByUserAndMaxResult($user, self::NB_OF_SUBSCRIBED_AUTHORS_DISPLAYED);
        if (count($followsOfUser) > 0) {
            foreach ($followsOfUser as $followOfUser) {
                if ($followOfUser instanceof Follow) {
                    if ($followOfUser->getWriter() instanceof User) {
                        $arrayOfWritersWithArticle[] = [
                            'writer' => $followOfUser->getWriter(),
                            'article' => $this->articleRepository->findRandomArticleByAuthorAndMaxResult($followOfUser->getWriter(), self::NB_OF_ARTICLES_BY_AUTHOR)
                        ];
                    }
                }
            }
        }

        // get Channels + articles
        $subscribedChannels = $this->channelRepository->findRandomChannelsBySubscriberAndNumberOfResults($user, self::NB_OF_CHANNEL_FOR_LOGGED);
        if (!empty($subscribedChannels)) {
            foreach ($subscribedChannels as $channel) {
                if ($channel instanceof Channel) {
                    $arrayOfChannelsWithArticles[] = [
                        "channel" => $channel,
                        "articles" => $this->articleRepository->findRandomArticlesByChannelAndNumberOfResults($channel, self::NB_OF_ARTICLES_BY_CHANNEL)
                    ];
                }
            }

        }

        return [
            'arrayOfChannelsWithArticles' => $arrayOfChannelsWithArticles,
            'arrayOfWritersWithArticle' => $arrayOfWritersWithArticle,
            'arrayOfBookmarkedArticles' => $arrayOfBookmarkedArticles,
        ];
    }
}


 