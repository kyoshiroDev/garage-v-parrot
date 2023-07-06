<?php

namespace App\Controller\Admin;

use App\Entity\Horaire;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;


class HoraireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Horaire::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
      return $crud
        ->setEntityLabelInSingular('Horaire')
        ->setEntityLabelInPlural('Horaires');
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
          TextField::new('jours')
          ->hideOnForm(),
          TextField::new('heures'),
        ];
    }  
}
