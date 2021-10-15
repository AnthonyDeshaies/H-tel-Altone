<?php

namespace App\Form;

use App\Entity\Contacts;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ContactsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameContact', TextType::class, [
                'label' => 'Nom'
            ])
            ->add('firstNameContact', TextType::class, [
                'label' => 'Prénom'
            ])
            ->add('mailContact', TextType::class, [
                'label' => 'Email'
            ])
            ->add('textContact', TextType::class, [
                'label' => 'Message'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contacts::class,
        ]);
    }
}
