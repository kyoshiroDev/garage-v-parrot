<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class LoginType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options): void
  {
    $builder
      ->add("email", TextType::class, [
        "label" => "Adresse mail",
        "required" => true,
        "constraints" => [
          new NotBlank(["message" => "L'email ne doit pas être vide !"])
        ]
      ])
      ->add("password", PasswordType::class, [
        "label" => "Mot de passe ",
        "required" => true,
        "constraints" => [
          new NotBlank(["message" => "Le mot de passe ne peut pas être vide !"])
        ]
      ]);
  }
      public function configureOptions(OptionsResolver $resolver): void
      {
    $resolver->setDefaults([
      "data_class" => User::class,
      'csrf_protection' => true,
      'csrf_field_name' => '_token',
      'csrf_token_id'   => 'user_item',
    ]);
  }}
