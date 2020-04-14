<?php


namespace App\Service\Helper;


use App\Entity\Article;
use App\Entity\BookMark;
use App\Entity\Channel;
use App\Entity\ChannelSubscription;
use App\Entity\ChannelSubscriptionRequest;
use App\Entity\User;
use App\Entity\UserLike;
use App\Twig\RenderBadgeTwigExtension;
use Doctrine\ORM\EntityManagerInterface;

class StatusGenerator
{

    private $em;
    private $articleRepository;
    private $bookmarkRepository;
    private $userLikeRepository;
    private $channelSubscriptionsRepository;
    private $channelSubscriptionsRequestRepository;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->articleRepository = $em->getRepository(Article::class);
        $this->userLikeRepository = $em->getRepository(UserLike::class);
        $this->bookmarkRepository = $em->getRepository(BookMark::class);
        $this->channelSubscriptionsRepository = $em->getRepository(ChannelSubscription::class);
        $this->channelSubscriptionsRequestRepository = $em->getRepository(ChannelSubscriptionRequest::class);
    }

    public function getChannelSubscriptionStatusCode(Channel $channel = null, User $user=null)
    {
        if ($user == null || $channel == null) {
            return RenderBadgeTwigExtension::JOIN_CHANNEL_CODE;
        }

        // subscription exist, display that he was accepted
        if (!empty($this->channelSubscriptionsRepository->findByChannelAndUser($channel, $user))) {
           return RenderBadgeTwigExtension::ACCEPTED_JOIN_CHANNEL_CODE;
        }
        // subscription doesnt exist, but request is still waiting to be replied display "pending"
        if (!empty($this->channelSubscriptionsRequestRepository->findByChannelAndUserAndStatusCode($channel, $user, ChannelSubscriptionRequest::CHANNEL_SUBSCRIPTION_PENDING))) {
            return RenderBadgeTwigExtension::AWAITING_CHANNEL_ACCEPTANCE_CODE;
        }
        // request refused
        if (!empty($this->channelSubscriptionsRequestRepository->findByChannelAndUserAndStatusCode($channel, $user, ChannelSubscriptionRequest::CHANNEL_SUBSCRIPTION_REFUSED))) {
            return RenderBadgeTwigExtension::REFUSED_JOIN_CHANNEL_CODE;
        }

        return RenderBadgeTwigExtension::JOIN_CHANNEL_CODE;
    }


    /**
     * @param Channel|null $channel
     * @param User|null $user
     * @return bool
     */
    public function getChannelSubscriptionBool(Channel $channel = null, User $user = null)
    {
        if ($user == null || $channel == null) {
            return false;
        }

        if (!empty($this->channelSubscriptionsRepository->findByChannelAndUser($channel, $user))) {
            return true;
        }

        return false;
    }


    public function getHasBookmarkStatus(Article $article = null, User $user = null)
    {
        if ($article == null || $user == null) {
            return false;
        }

        if(!empty($this->bookmarkRepository->findByArticleAndUser($article, $user))) {
            return true;
        };

        return false;
    }

    public function getHasLikedArticleStatus(Article $article, User $user)
    {
        if ($article == null || $user == null) {
            return false;
        }

        if(!empty($this->userLikeRepository->findByArticleAndUser($article, $user))) {
            return true;
        };

        return false;
    }

}