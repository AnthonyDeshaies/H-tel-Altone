<?php

namespace App\Form;

use App\Entity\Menus;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class MenusType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameMenu', TextType::class, [
                'label' => 'Nom du menu'
            ])
            ->add('priceMenu', TextType::class, [
                'label' => 'Prix du menu'
            ])
            ->add('descriptionMenu', TextType::class, [
                'label' => 'Description du menu'
            ])
            ->add('starters', TextType::class, [
                'label' => 'Entrées'
            ])
            ->add('mainCourses', TextType::class, [
                'label' => 'Plats'
            ])
            ->add('desserts', TextType::class, [
                'label' => 'Desserts'
            ])            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Menus::class,
        ]);
    }
}
