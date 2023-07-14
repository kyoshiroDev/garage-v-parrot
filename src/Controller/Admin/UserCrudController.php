<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
  public static function getEntityFqcn(): string
  {
    return User::class;
  }

  public function configureCrud(Crud $crud): Crud
  {
    return $crud
      ->setEntityLabelInSingular('Utilisateur')
      ->setEntityLabelInPlural('Utilisateurs');
  }


  public function configureFields(string $pageName): iterable
  {
    return [
      FormField::addPanel('Informations personnelles'),
      IdField::new('id')
        ->hideOnForm(),
      TextField::new('lastName', 'Nom'),
      TextField::new('firstName', 'Prénom'),
      TextField::new('email'),
      TextField::new('password'),
      ArrayField::new('roles', 'Utilisateur'),
      DateTimeField::new('createdAt', 'Créé le')
        ->hideOnForm()
    ];
  }
}
