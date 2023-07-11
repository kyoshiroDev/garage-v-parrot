<?php

namespace App\Form;

use App\Entity\CardCars;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CardCarsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('marque')
            ->add('model')
            ->add('kilometre')
            ->add('porte')
            ->add('puissance')
            ->add('annee')
            ->add('energie')
            ->add('prix')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CardCars::class,
        ]);
    }
}
