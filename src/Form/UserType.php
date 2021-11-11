<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('roles', ChoiceType::class, [
            'choices' => [
            'Administrateur' => User::ROLE_ADMIN,
            'Utilisateur' => User::ROLE_USER,
            'Editeur' => User::ROLE_EDITOR,
            ],
            'multiple' => true,
            'expanded' => true,
            'required' => true,
            ])
            ->add('email', TextType::class, [
                'label' => 'Email'
            ])
            ->add('password', TextType::class, [
                'label' => 'Mot de passe'
            ])
            ->add('nameUser', TextType::class, [
                'label' => 'Nom'
            ])
            ->add('firstNameUser', TextType::class, [
                'label' => 'Prénom'
            ])
            ->add('phoneUser', TextType::class, [
                'label' => 'Téléphone'
            ])
            ->add('adressUser', TextType::class, [
                'label' => 'Adresse'
            ])
            ->add('cpUser', TextType::class, [
                'label' => 'Code Postal'
            ])
            ->add('cityUser', TextType::class, [
                'label' => 'Commune'
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
