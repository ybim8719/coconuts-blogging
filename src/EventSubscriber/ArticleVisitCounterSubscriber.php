<?php

namespace App\EventSubscriber;

use App\Entity\ArticleVisit;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use App\Event\AddArticleVisitEvent;

class ArticleVisitCounterSubscriber implements EventSubscriberInterface
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public static function getSubscribedEvents()
    {
        return [
            AddArticleVisitEvent::NAME => [
                ['addArticleVisit', 0],
            ]
        ];
    }

    public function addArticleVisit(AddArticleVisitEvent $event)
    {
        $visit = new ArticleVisit();
        $visit->setVisitorIp($event->getIp());
        $visit->setArticle($event->getArticle());
        $this->em->persist($visit);
        $this->em->flush();
    }
}