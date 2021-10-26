<?php

namespace App\Form;

use App\Entity\Rooms;
use App\Entity\TypeRoom;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RoomsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameRoom', TextType::class, [
                'label' => 'Nom de chambre'
            ])
            // ->add('TypeRoom', EntityType::class, [
            //     'class' => TypeRoom::class,
            //     'choice_label' => 'nameType',
            //     ])
            ->add('priceRoom', TextType::class, [
                'label' => 'Tarif de la chambre'
            ])
            ->add('viewRoom', TextType::class, [
                'label' => 'Vue'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Rooms::class,
        ]);
    }
}
