<?php

namespace App\Form;

use App\Entity\Amenities;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;

class AmenitiesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameAmenity', TextType::class, [
                'label' => 'Nom du service'
            ])
            ->add('priceAmenity', TextType::class, [
                'label' => 'Tarif'
            ])
            ->add(
                'descriptionAmenity',
                CKEditorType::class,
                array('label' => 'Description')
            )
            ->add('imgAmenity', FileType::class, [
                'label' => 'image du service',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/*',
                        ],
                        'mimeTypesMessage' => 'Veuillez entrer un format de document
            valide',
                    ])
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Amenities::class,
        ]);
    }
}
