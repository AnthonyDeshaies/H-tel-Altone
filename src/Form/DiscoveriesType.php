<?php

namespace App\Form;

use App\Entity\Discoveries;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class DiscoveriesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameDiscovery', TextType::class, [
                'label' => 'Nom de l\' activité'
            ])
            ->add('descriptiondiscovery', CKEditorType::class, 
            array ('label' => 'Description'))
            ->add('imgDiscovery', FileType::class, [
                'label' => 'Image',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/*',
                        ],
                        'mimeTypesMessage' => 'Veuillez entrer un format de document valide',
                    ])
                ],
            ])
            ->add('cpDiscovery', TextType::class, [
                'label' => 'Code postal'
            ])
            ->add('cityDiscovery', TextType::class, [
                'label' => 'Commune'
            ])
            ->add('latitudeDiscovery', TextType::class, [
                'label' => 'Latitude'
            ])
            ->add('longitudeDiscovery', TextType::class, [
                'label' => 'Longitude'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Discoveries::class,
        ]);
    }
}
