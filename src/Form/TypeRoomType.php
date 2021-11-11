<?php

namespace App\Form;

use App\Entity\TypeRoom;
use App\Entity\OptionTypeRoom;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class TypeRoomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameType', TextType::class, [
                'label' => 'Type de la chambre'
            ])
            ->add('startPrice', TextType::class, [
                'label' => 'Tarif minimum'
            ])
            ->add('nbPlaces', TextType::class, 
                array ('label' => 'Nombre de places')
            )
            ->add('imgType1', FileType::class, [
                'label' => 'Image 1',
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
            ->add('imgType2', FileType::class, [
                'label' => 'Image 2',
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
            ->add('imgType3', FileType::class, [
                'label' => 'Image 3',
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
            ->add('descriptionTypeRoom', CKEditorType::class, 
                array ('label' => 'Description')
            )
            ->add('optionTypeRoom', EntityType::class, [
                'class' => OptionTypeRoom::class,
                'multiple' => true,
                'expanded' => true,
                'required' => false,
                'choice_label' => 'nameOptionTypeRoom'
            ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TypeRoom::class,
        ]);
    }
}
