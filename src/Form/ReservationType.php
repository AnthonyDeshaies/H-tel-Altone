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
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'class' => 'name'
                ]
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                    'class' => 'firstname'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => [
                    'class' => 'mail'
                ]
            ])
            ->add('typeRoom', EntityType::class, [
                'class' => TypeRoom::class,
                'choice_label' => 'nameType',
                'label' => 'Type de chambre',
                'attr' => [
                    'class' => 'type_room'
                ]
            ])
            ->add('dateStartReservation', DateType::class, [
                'label' => 'Date de début de séjour',
                'attr' => [
                    'class' => 'start_date'
                ]
            ])
            ->add('dateEndReservation', DateType::class, [
                'label' => 'Date de fin de séjour',
                'attr' => [
                    'class' => 'end_date'
                ]
            ])
            ->add('nbPeopleReservation', ChoiceType::class, [
                'choices' => [
                    '1' => '0',
                    '2' => '1',
                    '3' => '2',
                    '4' => '2',
                    '5' => '2',
                    '6' => '2',
                ],
                'label' => 'Nombre de participants',
                'attr' => [
                    'class' => 'nb_people'
                ]
            ])
            ->add('transportReservation', ChoiceType::class, [
                'choices' => [
                    'Oui' => '1',
                    'Non' => '0'
                ],
                 'label' => 'Transport jusqu\'à l\'hôtel',
                 'mapped' => false,
                 'expanded' => false,
                 'attr' => [
                    'class' => 'transport'
                ]
            ])
            ->add('Envoyer', SubmitType::class, [
                'attr' => [
                    'class' => 'btn'
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
