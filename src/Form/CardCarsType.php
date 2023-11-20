<?php

namespace App\Form;

use App\Entity\CardCars;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class CardCarsType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options): void
  {
    $builder
      ->add('marque', null, [
        'label' => 'Marque du véhicule',
      ])
      ->add('model' , null, [
        'label' => 'Modèle du véhicule',
      ])
      ->add('kilometre' , null, [
        'label' => 'Kilométrage du véhicule',
      ])
      ->add('porte' , null, [
        'label' => 'Nombre de portes',
      ])
      ->add('puissance' , null, [
        'label' => 'Puissance du véhicule',
      ])
      ->add('annee' , null, [
        'label' => 'Année du véhicule',
      ])
      ->add('energie' , null, [
        'label' => 'Energie du véhicule',
      ])
      ->add('prix', null, [
        'label' => 'Prix du véhicule',
      ])
      ->add('imageFile', VichImageType::class, [
        'label' => 'Image du véhicule',
      ]);
  }

  public function configureOptions(OptionsResolver $resolver): void
  {
    $resolver->setDefaults([
      'data_class' => CardCars::class,
      'csrf_protection' => true,
      'csrf_field_name' => '_token',
      'csrf_token_id'   => 'cars_card',
    ]);
  }
}
