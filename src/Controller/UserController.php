<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\ArticleComment;
use App\Entity\Channel;
use App\Entity\Follow;
use App\Entity\User;
use App\Entity\UserLike;
use App\Form\UserType;
use App\Repository\UserRepository;
use App\Service\Logger\CoconutsLogger;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Vich\UploaderBundle\Templating\Helper\UploaderHelper;


/**
 * @Route("/user")
 */
class UserController extends AbstractController
{
    private $helper;
    private $em;
    private $logger;

    private $likeRepository;
    private $commentRepository;
    private $followRepository;
    private $articleRepository;
    private $channelRepository;
    private $userRepository;

    public function __construct(UploaderHelper $helper, EntityManagerInterface $em, CoconutsLogger $logger)
    {
        $this->helper = $helper;
        $this->em = $em;
        $this->logger = $logger;
        $this->commentRepository = $this->em->getRepository(ArticleComment::class);
        $this->likeRepository = $this->em->getRepository(UserLike::class);
        $this->followRepository = $this->em->getRepository(Follow::class);
        $this->articleRepository = $this->em->getRepository(Article::class);
        $this->channelRepository = $this->em->getRepository(Channel::class);
        $this->userRepository = $this->em->getRepository(User::class);
    }

    /**
     * @Route("/", name="user_index", methods={"GET"})
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    /**
     * @Route("/register-as-new-member", name="register_as_new_member", methods={"GET","POST"})
     */
    public function registerAsNewMember(Request $request, UserPasswordEncoderInterface $encoder): Response
    {
        if ($this->getUser() != null) {
            $this->logger->error('Visitor already logged tried to attend register as new member page. id = '.$this->getUser()->getId().' and username = '.$this->getUser()->getUsername());
        }
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $this->em->persist($user);
            $this->em->flush();
            $this->addFlash('info', 'inscription terminée, veuillez vous identifier');
            return $this->redirectToRoute('app_login');
        }

        return $this->render('user/register_as_new_member.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_show", methods={"GET"}, options = { "expose" = true })
     */
    public function show(User $user): Response
    {
        $isFollowing = false;

        // check if the user is folloed by visitor
        if ($this->getUser() !== null) {
            $follows = $this->followRepository->findByUserAndWriter($this->getUser(), $user);
            if (count($follows) > 0) {
                $isFollowing = true;
            }
        }

        // getArticles in anti-chronological time
        $articles = $this->articleRepository->findByUserInDescOrder($user);

        // getComments in anti-chronological time
        $publishedComments = $this->commentRepository->findByUserInDescOrder($user);

        // get liked articles in anti-chronological time
        $likedArticles = $this->articleRepository->findArticlesLikedByUser($user);

        // get Channels in anti-chronological time
        $channels = $this->channelRepository->findByUserInDescOrder($user);

        // get writers that the visitor follow in anti-chronological time
        $followedWriters = $this->userRepository->findWritersFollowedByUser($user);

        return $this->render('user/show.html.twig', [
            'user' => $user,
            'articles' => $articles,
            'publishedComments' => $publishedComments,
            'likedArticles' => $likedArticles,
            'followedWriters' => $followedWriters,
            'channels' => $channels,
            'isFollowing' => $isFollowing
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, User $user, UserPasswordEncoderInterface $encoder): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $this->em->flush();
            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="user_delete", methods={"GET"})
     */
    public function delete(Request $request, User $user): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($user);
        $entityManager->flush();
        return $this->redirectToRoute('user_index');
    }
}
