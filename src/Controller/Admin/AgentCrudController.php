<?php

namespace App\Controller\Admin;

use App\Entity\Agent;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class AgentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Agent::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('identite')->renderAsEmbeddedForm(IdentiteCrudController::class),
            AssociationField::new('organisation')->setColumns(3),
        ];
    }
    
}
