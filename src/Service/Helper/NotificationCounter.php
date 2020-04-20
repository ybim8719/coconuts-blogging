<?php

namespace App\Service\Helper;

use App\Entity\Notification;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class NotificationCounter
{
    private $notificationRepository;
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->notificationRepository = $em->getRepository(Notification::class);
    }

    public function hasNewNotifications(User $user)
    {
        if(empty($this->notificationRepository->findNotificationsByUserAndWasRedStatus($user, false)) == false) {
            return true;
        };
        return false;
    }

    public function getNbOfNewNotifications(User $user)
    {
        return(count($this->notificationRepository->findNotificationsByUserAndWasRedStatus($user, false)));
    }
}