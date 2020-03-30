<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Vich\UploaderBundle\Form\Type\VichImageType;


class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
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
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
