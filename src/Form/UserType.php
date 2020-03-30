<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Validator\Constraints\Length;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username',TextType::class, [
                'label'=> 'Envoyez un pseudo qui défonce : ',
                'attr' => [
                    'placeholder' => 'Votre pseudo'
                ]
            ])
            ->add('password',PasswordType::class, [
                'label'=> 'Et un mot de passe genre sécurisé : ',
                'attr' => [
                    'placeholder' => 'Votre MPD'
                ]
            ])
            ->add('email',TextType::class, [
                'label'=> 'Entrez votre email (@skyblogs non autorisés) : ',
                'attr' => [
                    'placeholder' => 'Votre e-mail'
                ]
            ])
            ->add('profileDescription',TextareaType::class, [
                'label'=> 'Et puis une petite description : ',
                'attr' => [
                    'placeholder' => 'Celle-ci sera visible sur votre fiche auteur !'
                ],
                'constraints' => new Length([
                    'max' => User::MAX_PROFIL_DESCRIPTION_LENGTH
                ])
            ])
            ->add('imageFile',VichImageType::class, [
                'label'=> 'Une photo de profil pour la route ? : ',
            ] )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
