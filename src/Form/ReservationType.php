<?php

namespace App\Form;

use App\Entity\TypeRoom;
use App\Entity\Reservation;
use Doctrine\DBAL\Types\BooleanType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Votre prénom :',
                'attr' => [
                    'class' => 'contact-form-contol'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Votre nom :',
                'attr' => [
                    'class' => 'contact-form-contol'
                ]
            ])
            // ->add('email', EmailType::class, [
            //     'label' => 'Votre email :',
            //     'attr' => [
            //         'class' => 'contact-form-contol'
            //     ]
            // ])
            ->add('dateStartReservation', DateType::class, [
                'label' => 'Date de début de séjour',
                'attr' => [
                    'class' => 'contact-form-control'
                ]
            ])
            ->add('dateEndReservation', DateType::class, [
                'label' => 'Date de fin de séjour',
                'attr' => [
                    'class' => 'contact-form-control'
                ]
            ])
            ->add('nbPeopleReservation', IntegerType::class, [
                // 'class' => NbPeoplereservation::class,
                'label' => 'Type de chambre',
                'attr' => [
                    'class' => 'contact-form-control'
                ]
            ])
            ->add('transportReservation', ChoiceType::class, [
                'choices' => [
                    'Oui' => '1',
                    'Non' => '0'
                ],
                 'label' => 'Transport jusqu\'à l\'hôtel',
                 'mapped' => false,
                 'expanded' => true,
            ])
            ->add('typeRoom', EntityType::class, [
                'class' => TypeRoom::class,
                'choice_label' => 'nameType',
                'label' => 'Type de chambre',
                'attr' => [
                    'class' => 'contact-form-control'
                ]
            ])
            ->add('Envoyer', SubmitType::class, [
                'attr' => [
                    'class' => 'btn-primary'
                ]
                ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
