<?php

namespace App\Form;

use App\Entity\OptionTypeRoom;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class OptionTypeRoomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameOptionTypeRoom', TextType::class, [
                'label' => 'Option'
            ])
            ->add('logoOptionTypeRoom', TextType::class, [
                'label' => 'logo'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => OptionTypeRoom::class,
        ]);
    }
}
