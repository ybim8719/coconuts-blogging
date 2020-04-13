<?php

namespace App\Twig;

use App\Entity\Channel;
use App\Entity\ChannelSubscription;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;


class RenderBadgeTwigExtension extends AbstractExtension
{
    const WRITER_LABEL = "label-writer";
    const ADMIN_LABEL = "label-admin";
    const SUBSCRIBED_LABEL = "label-subscribed";
    const NOT_SUBSCRIBED_LABEL = "label-not-subscribed";
    const JOIN_CHANNEL_LABEL = "label-join-channel";
    const LEAVE_CHANNEL_LABEL = "label-leave-channel";
    const WRITER_STATUS = "Auteur";
    const ADMIN_STATUS = "Admin";
    const NOT_SUBSCRIBED_STATUS = "Visiteur";
    const SUBSCRIBED_STATUS = "Abonné";
    const JOIN_CHANNEL_STATUS = "Rejoindre";
    const LEAVE_CHANNEL_STATUS = "Quitter ?";
    const FAT_SIZE = "label-fat";
    const MICRO_SIZE ="label-micro";
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    protected $channelSubscriptionsRepository;

    /**
     * RenderInvoiceTwigExtension constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->channelSubscriptionsRepository = $em->getRepository(ChannelSubscription::class);
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('render_author_badge', [$this, 'renderAuthorBadge'], [
                'needs_environment' => true,
                'is_safe' => ['html']
            ]),
            new TwigFunction('render_channel_admin_badge', [$this, 'renderChannelAdminBadge'], [
                'needs_environment' => true,
                'is_safe' => ['html']
            ]),
            new TwigFunction('render_subscriber_of_channel_badge', [$this, 'renderSubscriberOfChannelBadge'], [
                'needs_environment' => true,
                'is_safe' => ['html']
            ]),
            new TwigFunction('render_subscriber_of_channel_badge_by_params', [$this, 'renderSubscriberOfChannelBadgeByParams'], [
                'needs_environment' => true,
                'is_safe' => ['html']
            ]),
            new TwigFunction('render_join_channel_badge', [$this, 'renderJoinChannelBadge'], [
                'needs_environment' => true,
                'is_safe' => ['html']
            ]),
            new TwigFunction('render_join_channel_badge_by_params', [$this, 'renderJoinChannelBadgeByParams'], [
                'needs_environment' => true,
                'is_safe' => ['html']
            ]),
        ];
    }


    public function renderJoinChannelBadgeByParams(Environment $environment, User $user = null, Channel $channel= null)
    {
        $text = self::JOIN_CHANNEL_STATUS;
        $class = self::JOIN_CHANNEL_LABEL;

        if ($user == null || $channel == null) {
            return $environment->render('twig/render_badge.html.twig', [
                'text' => $text,
                'class' => $class,
                'size' => self::FAT_SIZE
            ]);
        }

        if (!empty($this->channelSubscriptionsRepository->findByChannelAndUser($channel, $user))) {
            $text = self::LEAVE_CHANNEL_STATUS;
            $class = self::LEAVE_CHANNEL_LABEL;
        }

        return $environment->render('twig/render_badge.html.twig', [
            'text' => $text,
            'class' => $class,
            'size' => self::FAT_SIZE
        ]);
    }

    public function renderJoinChannelBadge(Environment $environment, bool $hasBadge)
    {
        $text = self::JOIN_CHANNEL_STATUS;
        $class = self::JOIN_CHANNEL_LABEL;

        if ($hasBadge) {
            $text = self::LEAVE_CHANNEL_STATUS;
            $class = self::LEAVE_CHANNEL_LABEL;
        }

        return $environment->render('twig/render_badge.html.twig', [
            'text' => $text,
            'class' => $class,
            'size' => self::FAT_SIZE
        ]);
    }

    public function renderSubscriberOfChannelBadgeByParams(Environment $environment, User $user = null, Channel $channel= null)
    {
        $text = self::NOT_SUBSCRIBED_STATUS;
        $class = self::NOT_SUBSCRIBED_LABEL;
        $size = self::MICRO_SIZE;

        if ($user == null || $channel == null) {
            return $environment->render('twig/render_badge.html.twig', [
                'text' => $text,
                'class' => $class,
                'size' => $size,
            ]);
        }

        if (!empty($this->channelSubscriptionsRepository->findByChannelAndUser($channel, $user))) {
            $text = self::SUBSCRIBED_STATUS;
            $class = self::SUBSCRIBED_LABEL;
        }

        return $environment->render('twig/render_badge.html.twig', [
            'text' => $text,
            'class' => $class,
            'size' => $size,
        ]);
    }

    public function renderSubscriberOfChannelBadge(Environment $environment, bool $isSubcriber)
    {
        $text = self::NOT_SUBSCRIBED_STATUS;
        $class = self::NOT_SUBSCRIBED_LABEL;

        if ($isSubcriber) {
            $text = self::SUBSCRIBED_STATUS;
            $class = self::SUBSCRIBED_LABEL;
        }
        return $environment->render('twig/render_badge.html.twig', [
            'text' => $text,
            'class' => $class,
            'size' => self::MICRO_SIZE
        ]);
    }


    public function renderChannelAdminBadge(Environment $environment, bool $isAdmin)
    {
        if ($isAdmin) {
            return $environment->render('twig/render_badge.html.twig', [
                'text' => self::ADMIN_STATUS,
                'class' => self::ADMIN_LABEL,
                'size' => self::MICRO_SIZE
            ]);
        }
        return "";
    }

    public function renderAuthorBadge(Environment $environment, bool $isAuthor)
    {
        if ($isAuthor) {
            return $environment->render('twig/render_badge.html.twig', [
                'text' => self::WRITER_STATUS,
                'class' => self::WRITER_LABEL,
                'size' => self::MICRO_SIZE
            ]);
        }
        return "";
    }
}
