<?php

namespace App\Controller\Admin;

use App\Entity\Identite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class IdentiteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Identite::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom')->setColumns(3),
            TextField::new('postnom')->setColumns(3),
            TextField::new('prenom')->setColumns(3),
        ];
    }
    
}
