<?php

namespace App\Twig;

use Doctrine\ORM\EntityManagerInterface;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;


class RenderBadgeTwigExtension extends AbstractExtension
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    /**
     * RenderInvoiceTwigExtension constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('render_badge', [$this, 'renderBadge'], [
                'needs_environment' => true,
                'is_safe' => ['html']
            ]),
        ];
    }

    public function renderBadge(Environment $environment)
    {
        $text = "coucou";
        return $environment->render('twig/render_badge.html.twig', [
            'text' => $text,
            'class' => 'class'
        ]);
    }
}
