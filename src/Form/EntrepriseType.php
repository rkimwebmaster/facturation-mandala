<?php

namespace App\Form;

use App\Entity\Entreprise;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntrepriseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomEntreprise')
            ->add('slogan')
            ->add('idnat')
            ->add('rccm')
            ->add('sigle')
            ->add('logo')
            ->add('description')
            ->add('responsable')
            ->add('phoneNumber')
            ->add('email')
            ->add('website')
            ->add('whatsappNumber')
            ->add('facebook')
            ->add('linkedIn')
            ->add('twitter')
            ->add('adresse')
            ->add('ville')
            ->add('pays')
            ->add('newsbg389x454')
            ->add('menuBanner295x320Premier')
            ->add('menuBanner295x320Deuxieme')
            ->add('menuBanner295x320Troisieme')
            ->add('mainBanner1903x650Un')
            ->add('mainBanner1903x650Deux')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Entreprise::class,
        ]);
    }
}
