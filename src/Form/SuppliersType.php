<?php

namespace App\Form;

use App\Entity\Suppliers;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SuppliersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameSupplier')
            ->add('descriptionSupplier')
            ->add('imgSupplier')
            ->add('adressSupplier')
            ->add('cpSupplier')
            ->add('citySupplier')
            ->add('phoneSupplier')
            ->add('mailSupplier')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Suppliers::class,
        ]);
    }
}
