<?php

namespace App\Controller;

use App\Entity\Follow;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Vich\UploaderBundle\Templating\Helper\UploaderHelper;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


/**
 * @Route("/writer")
 */
class WriterController extends AbstractController
{
    private $em;
    private $followRepository;


    public function __construct(UploaderHelper $helper, EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->followRepository = $em->getRepository(Follow::class);
    }

    /**
     * @Route("/display-writer", name="writer_displayWritersList", methods={"GET"})
     */
    public function displayWritersListAction(UserRepository $userRepository): Response
    {
        //@todo affiner le find avec les writers les plus côtés et 10 max
        return $this->render('writer/display_writers_list.html.twig', [
            'writers' => $userRepository->findAll()
        ]);
    }

    /**
     *
     * @return void
     */
    public function displayFavoritesWritersOfUser()
    {

    }

    /**
     * @Route("/display-partial-writer-resume-bloc/{idWriter}",
     * name="writer_displayPartialWriterResumeBlock", methods={"GET"}), requirements={"idWriter" = "\d+"})
     * @ParamConverter("writer",options={"id" = "idWriter"})
     */
    public function displayPartialWriterResumeBlock(User $writer)
    {
        $isFollowing = false;

        if ($writer->getIsWriter() == false) {
            throw new Exception("Can't render block of user which is not writer");
        }
        if ($this->getUser() instanceof User) {
            $user = $this->getUser();
            $follows = $this->followRepository->findByUserAndWriter($user, $writer);
            if (count($follows) > 0) {
                $isFollowing = true;
            }
        }

        return $this->render('writer/partial/display_partial_writer_resume_bloc.html.twig', [
            'writer' => $writer,
            'isFollowing' => $isFollowing,
        ]);
    }


   
}
