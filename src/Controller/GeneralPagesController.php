<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/general")
 */
class GeneralPagesController extends AbstractController
{
    private $em;
    private $userRepository;

    public function __construct(EntityManagerInterface $em)
    {
        $this->userRepository = $em->getRepository(User::class);
        $this->em = $em;
    }

    /**
     * @Route("/home", name="public_home_page", methods={"GET"})
     */
    public function publicHomePage()
    {
        return $this->render('general/public_home_page.html.twig', [
        ]);
    }
}


 