<?php


namespace App\Service\Helper;


class DateCalculator
{
    private $now;

    public function __construct()
    {
        $this->now = new \DateTime('now');
    }

    public function convertToAdaptedDuration(\DateTime $referenceDate) : string
    {
        if ($referenceDate <= $this->now)
        {
            $since_start = $this->now->diff($referenceDate);
            dump($since_start->y.' years total');
            dump($since_start->m.' months total');
            dump($since_start->d.' day total');
            dump($since_start->h.' hour total');
            dump($since_start->i.' min total');
            dump($since_start->d.' days total');

            if ($since_start->y > 0) {
                return "il y a" . $since_start->y. "année(s)";
            } else {
                if ($since_start->m > 0) {
                    return "il y a" . $since_start->y. "mois";
                } else {
                    if ($since_start->d > 0) {
                        return "il y a" . $since_start->d. "jours";
                    } else {
                        if ($since_start->h > 0) {
                            return "il y a" . $since_start->h. "heures";
                        } else {
                            if ($since_start->i > 0) {
                                return "il y a" . $since_start->i. "minutes";
                            }
                            else {
                                return "A l'instant";
                            }
                        }
                    }
                }
            }
        }

        return "";
    }
}