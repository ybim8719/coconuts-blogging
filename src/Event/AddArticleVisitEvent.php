<?php

namespace App\Event;

use Symfony\Contracts\EventDispatcher\Event;
use App\Entity\Article;

class AddArticleVisitEvent extends Event
{
    const NAME = 'IP control of visitor is ok. visit added to this article views counter';

    private $ip;
    private $article;

    public function __construct(Article $article, $ip)
    {
        $this->ip = $ip;
        $this->article = $article;
    }

    public function getArticle()
    {
        return $this->article;
    }

    public function getIp()
    {
        return $this->ip;
    }
}