<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProduitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Produit::class;
    }

    
    public function configureFields(string $pageName): iterable
    {

        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('designation')->setColumns(4),
            MoneyField::new('prix')->setCurrency("CDF")->setColumns(4),
            // ChoiceField::new('unite')->setColumns(4)->setHelp("choisir les unités"),
            TextField::new('unite')->setColumns(4)->setHelp("choisir les unités"),
            TextEditorField::new('description')->setColumns(12),

        ];
    }
    
}
