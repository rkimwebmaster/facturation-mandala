<?php

namespace App\Form;

use App\Entity\Facture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FactureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('client')
            ->add('prixTotal')
            ->add('observation')
            ->add('date')
            ->add('agent')
            ->add('modePaiement', ChoiceType::class, [
                "choices"=>["Cash"=>"Cash", "MobileMoney"=>"MobileMoney","Abonnement"=>"Abonnement"]
            ])
            ->add('detailFactures', CollectionType::class, [
                'entry_type' => DetailFactureType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,

            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Facture::class,
        ]);
    }
}


