<?php

namespace App\Form;

use App\Entity\Dishes;
use App\Entity\CategoryDishes;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class DishesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameDish', TextType::class, [
                'label' => 'Nom de plat'
            ])
            ->add('priceDish', TextType::class, [
                'label' => 'Prix'
            ])
            ->add('categoryDishes', EntityType::class, [
                'class' => CategoryDishes::class,
                'choice_label' => 'nameCategory',
                 'label' => 'Catégorie du plat',
                ])
            ->add('descriptionDish', CKEditorType::class, 
            array ('label' => 'Description')
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Dishes::class,
        ]);
    }
}
