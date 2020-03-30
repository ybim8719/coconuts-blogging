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

            if ($since_start->y > 0) {
                $since_start->y > 1 ? $plural = "s": $plural = "";
                return "il y a " . $since_start->y. " année". $plural;
            } else {
                if ($since_start->m > 0) {
                    return "il y a " . $since_start->m. " mois";
                } else {
                    if ($since_start->d > 0) {
                        $since_start->d > 1 ? $plural = "s": $plural = "";
                        return "il y a " . $since_start->d. " jour" .$plural;
                    } else {
                        if ($since_start->h > 0) {
                            $since_start->h > 1 ? $plural = "s": $plural = "";
                            return "il y a " . $since_start->h. " heure" .$plural;
                        } else {
                            if ($since_start->i > 0) {
                                $since_start->i > 1 ? $plural = "s": $plural = "";
                                return "il y a " . $since_start->i. " minutes".$plural;
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