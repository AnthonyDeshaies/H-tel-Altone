<?php

namespace App\Form;

use App\Entity\CategoryDrinks;
use App\Entity\Drinks;
use App\Entity\TypeRoom;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class DrinksType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameDrink', TextType::class, [
                'label' => 'Nom de la boisson'
            ])
            ->add('priceDrink', TextType::class, [
                'label' => 'Tarif de la boisson'
            ])
            ->add('categoryDrinks', EntityType::class, [
                'class' => CategoryDrinks::class,
                'choice_label' => 'nameCategory',
                'label' => 'Catégorie'
                ])
            ->add('detailDrink', CKEditorType::class, 
            array ('label' => 'Détail')
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Drinks::class,
        ]);
    }
}
