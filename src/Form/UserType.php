<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options): void
  {
    $builder
      ->add('lastName', TextType::class, ["label" => "Nom"])
      ->add('firstName', TextType::class, ["label" => "Prenom"])
      ->add('email', EmailType::class, ["label" => "Email"])
      ->add('password', PasswordType::class, ["label" => "Mot de passe"])
      ->add('roles', ChoiceType::class, [
        'choices' => [
          'Utilisateur' => 'ROLE_USER',
          'Administrateur' => 'ROLE_ADMIN',
        ],
        'expanded' => true,
        'multiple' => true,
        'label' => 'Rôles',
      ]);
  }

  public function configureOptions(OptionsResolver $resolver): void
  {
    $resolver->setDefaults([
      'data_class' => User::class,
      'csrf_protection' => true,
      'csrf_field_name' => '_token',
      'csrf_token_id'   => 'user_item',
    ]);
  }
}
