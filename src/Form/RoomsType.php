<?php

namespace App\Form;

use App\Entity\Rooms;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RoomsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameRoom')
            ->add('TypeRoom', EntityType::class, [
                'class' => TypeRoom::class,
                'choice_label' => 'nameType',
                ])
            ->add('nbPlace')
            ->add('priceRoom')
            ->add('viewRoom')
            ->add('descriptionTypeRoom')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Rooms::class,
        ]);
    }
}
