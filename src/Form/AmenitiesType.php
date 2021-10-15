<?php

namespace App\Form;

use App\Entity\Amenities;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AmenitiesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameAmenity', TextType::class, [
                'label' => 'Nom du service'
            ])
            ->add('descriptionAmenity', CKEditorType::class, 
            array ('label' => 'Description')
        )
            ->add('imgAmenity', TextType::class, [
                'label' => 'Image du service'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Amenities::class,
        ]);
    }
}
