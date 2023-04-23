<?php

namespace App\Controller\Admin;

use App\Entity\Organisation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class OrganisationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Organisation::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('designation')->setLabel("Le nom de la société ")->setColumns(6),
            TextEditorField::new('description')->setLabel("Description ")->setColumns(6)->setHelp("Une brève description si nécessaire"),
        ];
    }
    
}
