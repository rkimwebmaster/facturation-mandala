<?php

namespace App\Controller\Admin;

use App\Entity\DetailFacture;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class DetailFactureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DetailFacture::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id'),
            AssociationField::new('produit')->setColumns(6)->setLabel("Produit "),
            IntegerField::new('quantite')->setColumns(6)->setLabel("Quantité "),
        ];
    }
    
}
