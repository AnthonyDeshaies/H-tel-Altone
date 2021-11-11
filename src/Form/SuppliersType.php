<?php

namespace App\Form;

use App\Entity\Suppliers;
use App\Entity\CategorySuppliers;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
            ->add('categorySuppliers', EntityType::class, [
                'class' => CategorySuppliers::class,
                'choice_label' => 'nameCategory',
                'label' => 'Catégorie'
            ])
            ->add('adressSupplier', TextType::class, [
                'label' => 'Adresse',
                'required' => false,
            ])
            ->add('cpSupplier', TextType::class, [
                'label' => 'Code postal',
                'required' => false,
            ])
            ->add('citySupplier', TextType::class, [
                'label' => 'Commune',
                'required' => false,
            ])
            ->add('phoneSupplier', TextType::class, [
                'label' => 'Téléphone',
                'required' => false,
            ])
            ->add('mailSupplier', TextType::class, [
                'label' => 'Email',
                'required' => false,
            ])
            ->add('websiteSupplier', TextType::class, [
                'label' => 'Site internet',
                'required' => false,
            ])
            ->add('descriptionSupplier', CKEditorType::class, 
            array ('label' => 'Description du fournisseur', 'required' => false),
            )
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Suppliers::class,
        ]);
    }
}
