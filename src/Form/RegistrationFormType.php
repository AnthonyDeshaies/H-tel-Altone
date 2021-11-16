<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', TextType::class, [
                'label' => 'Email',
                'attr' => [
                    'class' => 'name'
                ]
            ])
            // ->add('plainPassword', PasswordType::class, [
            //     // instead of being set onto the object directly,
            //     // this is read and encoded in the controller
            //     'mapped' => false,
            //     'attr' => ['autocomplete' => 'new-password'],
            //     'attr' => [
            //         'class' => 'password'
            //     ],
            //     'constraints' => [
            //         new NotBlank([
            //             'message' => 'Veuillez entrer un mot de passe',
            //         ]),
            //         new Length([
            //             'min' => 6,
            //             'minMessage' => 'Your password should be at least {{ limit }} characters',
            //             // max length allowed by Symfony for security reasons
            //             'max' => 4096,
            //         ]),
            //     ],
            // ])
            ->add('password', RepeatedType::class, array(
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de doivent être identiques',
                'first_options' => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Répétez le mot de passe'],
                'attr' => [
                    'class' => 'password'
                ]
            ))
            ->add('nameUser', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'class' => 'name'
                ]
            ])
            ->add('firstNameUser', TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                    'class' => 'firstname'
                ]
            ])
            ->add('phoneUser', TextType::class, [
                'label' => 'Téléphone',
                'attr' => [
                    'class' => 'phone'
                ]
            ])
            ->add('adressUser', TextType::class, [
                'label' => 'Adresse',
                'attr' => [
                    'class' => 'adress'
                ]
            ])
            ->add('cpUser', TextType::class, [
                'label' => 'Code Postal',
                'attr' => [
                    'class' => 'cp'
                ]
            ])
            ->add('cityUser', TextType::class, [
                'label' => 'Commune',
                'attr' => [
                    'class' => 'city'
                ]
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'label' => 'J\'accepte les termes',
                'constraints' => [
                    new IsTrue([
                        'message' => 'Acceptez les termes.',
                    ]),
                ],
                'attr' => [
                    'class' => 'agree'
                ]
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
