<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Channel;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Vich\UploaderBundle\Form\Type\VichImageType;


class ArticleType extends AbstractType
{

    private $channelRepository;

    public function __construct(EntityManagerInterface $em)
    {
        $this->channelRepository = $em->getRepository(Channel::class);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $user = $options['user'];

        $builder
        ->add('title',TextType::class, [
            'label'=> 'Le titre de votre Papier : ',
            'attr' => [
                'placeholder' => 'Votre titre'
            ]
        ])
        ->add('chapeau',TextType::class, [
            'label'=> 'Ajouter un chapeau pour donner envie au lecteur : ',
            'attr' => [
                'placeholder' => 'Votre chapeau'
            ]
        ])
        ->add('description',TextareaType::class, [
            'label'=> 'Par ici le corps de votre papier : ',
            'attr' => [
                'placeholder' => 'Ici'
            ]
        ])
        ->add('imageFile',VichImageType::class, [
            'label'=> 'Associer la photo principale de votre papier : ',
        ]);
        $builder->add('channel',EntityType::class, [
            'label'=> 'Publier votre article dans un de vos channels ? ',
            'class' => Channel::class,
            'placeholder' => '---Choix du channel---',
            'query_builder' => function (EntityRepository $er) use($user){
                return $er->createQueryBuilder('c')
                    ->join('c.channelSubscriptions', 'cs')
                    ->andWhere("cs.user = :user")
                    ->setParameter('user', $user);
            },
        ]);
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
        $resolver->setRequired('user');
        $resolver->setAllowedTypes('user', User::class);
    }
}
