<?php

namespace App\Form;

use App\Entity\Suppliers;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class SuppliersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameSupplier', TextType::class, [
                'label' => 'Nom du fournisseur'
            ])
            ->add('descriptionSupplier', CKEditorType::class, 
            array ('label' => 'Description du fournisseur'))
            ->add('img_supllier', FileType::class, [
                'label' => 'Image du fournisseur',
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
            ->add('adressSupplier', TextType::class, [
                'label' => 'Adresse'
            ])
            ->add('cpSupplier', TextType::class, [
                'label' => 'Code postal'
            ])
            ->add('citySupplier', TextType::class, [
                'label' => 'Commune'
            ])
            ->add('phoneSupplier', TextType::class, [
                'label' => 'Téléphone'
            ])
            ->add('mailSupplier', TextType::class, [
                'label' => 'Email'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Suppliers::class,
        ]);
    }
}
