<?php

namespace App\Twig;

use App\Entity\Channel;
use App\Entity\ChannelSubscription;
use App\Entity\ChannelSubscriptionRequest;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;


class RenderBadgeTwigExtension extends AbstractExtension
{
    const WRITER_STATUS = "Auteur";
    const ADMIN_STATUS = "Admin";
    const SUBSCRIBED_STATUS = "Membre";
    const VISITOR_STATUS = "Visiteur";

    const JOIN_CHANNEL_STATUS = "Rejoindre";
    const ACCEPTED_JOIN_CHANNEL_STATUS = "Accepté";
    const AWAITING_CHANNEL_ACCEPTANCE_STATUS = "En attente";
    const REFUSED_JOIN_CHANNEL_STATUS = "Refusé";

    const WRITER_LABEL = "label-writer";
    const ADMIN_LABEL = "label-admin";
    const SUBSCRIBED_LABEL = "label-subscribed";
    const VISITOR_LABEL = "label-visitor";

    const JOIN_CHANNEL_LABEL = "label-join-channel";
    const AWAITING_CHANNEL_ACCEPTANCE_LABEL = "label-awaiting-channel";
    const ACCEPTED_JOIN_CHANNEL_LABEL = "label-accepted-join-channel";
    const REFUSED_JOIN_CHANNEL_LABEL = "label-refused-join-channel";

    const JOIN_CHANNEL_CODE = 0;
    const AWAITING_CHANNEL_ACCEPTANCE_CODE = 1;
    const ACCEPTED_JOIN_CHANNEL_CODE = 2;
    const REFUSED_JOIN_CHANNEL_CODE = 3;

    const FAT_SIZE = "label-fat";
    const MICRO_SIZE ="label-micro";
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    protected $channelSubscriptionsRepository;
    protected $channelSubscriptionsRequestRepository;

    /**
     * RenderInvoiceTwigExtension constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->channelSubscriptionsRepository = $em->getRepository(ChannelSubscription::class);
        $this->channelSubscriptionsRequestRepository = $em->getRepository(ChannelSubscriptionRequest::class);
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
            new TwigFunction('render_join_channel_badge', [$this, 'renderJoinChannelBadge'], [
                'needs_environment' => true,
                'is_safe' => ['html']
            ])
        ];
    }


    public function renderJoinChannelBadge(Environment $environment, int $statusCode)
    {
        switch ($statusCode) {
            case self::JOIN_CHANNEL_CODE:
                $text = self::JOIN_CHANNEL_STATUS;
                $class = self::JOIN_CHANNEL_LABEL;
                break;
            case self::AWAITING_CHANNEL_ACCEPTANCE_CODE:
                $text = self::AWAITING_CHANNEL_ACCEPTANCE_STATUS;
                $class = self::AWAITING_CHANNEL_ACCEPTANCE_LABEL;
                break;
            case self::REFUSED_JOIN_CHANNEL_CODE:
                $text = self::REFUSED_JOIN_CHANNEL_STATUS;
                $class = self::REFUSED_JOIN_CHANNEL_LABEL;
                break;
            case self::ACCEPTED_JOIN_CHANNEL_CODE:
                $text = self::ACCEPTED_JOIN_CHANNEL_STATUS;
                $class = self::ACCEPTED_JOIN_CHANNEL_LABEL;
                break;
            default:
                return "";
        }

        return $this->renderBadge($environment, $text, $class, self::FAT_SIZE);
    }

    public function renderSubscriberOfChannelBadge(Environment $environment, bool $isSubcriber)
    {
        $text = self::VISITOR_STATUS;
        $class = self::VISITOR_LABEL;

        if ($isSubcriber) {
            $text = self::SUBSCRIBED_STATUS;
            $class = self::SUBSCRIBED_LABEL;
        }

        return $this->renderBadge($environment, $text, $class, self::MICRO_SIZE);
    }


    public function renderChannelAdminBadge(Environment $environment, bool $isAdmin)
    {
        if ($isAdmin) {
            return $this->renderBadge($environment, self::ADMIN_STATUS, self::ADMIN_LABEL, self::MICRO_SIZE);
        }

        return "";
    }

    public function renderAuthorBadge(Environment $environment, bool $isAuthor)
    {
        if ($isAuthor) {
            return $this->renderBadge($environment, self::WRITER_STATUS, self::WRITER_LABEL, self::MICRO_SIZE);
        }
        return "";
    }


    private function renderBadge(Environment $environment, $text, $class, $size)
    {
        return $environment->render('twig/render_badge.html.twig', [
            'text' => $text,
            'class' => $class,
            'size' => $size
        ]);
    }
}
