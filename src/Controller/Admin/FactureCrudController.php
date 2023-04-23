<?php

namespace App\Controller\Admin;

use App\Entity\Facture;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FactureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Facture::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('modePaiement')->setColumns(4),
            TextField::new('client')->setColumns(4),
            AssociationField::new('agent')->setColumns(4),
            CollectionField::new('detailFactures')->useEntryCrudForm(DetailFactureCrudController::class)->hideOnIndex()->setColumns(12),
            TextEditorField::new('observation')->setColumns(12),
        ];
    }
    
}
