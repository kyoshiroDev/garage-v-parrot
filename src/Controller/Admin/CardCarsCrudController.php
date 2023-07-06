<?php

namespace App\Controller\Admin;

use App\Entity\CardCars;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CardCarsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CardCars::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
