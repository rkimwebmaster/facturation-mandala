<?php

namespace App\Controller\Admin;

use App\Entity\Agent;
use App\Entity\Entreprise;
use App\Entity\Facture;
use App\Entity\Organisation;
use App\Entity\Produit;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{


    public function __construct(
        private AdminUrlGenerator $adminURL,
        // private ChartBuilderInterface $chartBuilder,
        )
    {
    }


    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);

        return $this->render('admin/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<img src="images/finacon.png"> MANDALA FACTURATION <span class="text-small">Fina sarl</span>')
            ->setFaviconPath('images/finacon.png')
            ->renderContentMaximized()
            ->generateRelativeUrls(true)
            ->setLocales(['en', 'fr'])
            ->setLocales([
                'en' => '🇬🇧 Anglais british',
                'fr' => ' Français'
            ])
            ->generateRelativeUrls(true)
            ->setTitle('DashBoard MANDALA ');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);

        // yield MenuItem::linkToRoute('YASO SITE WEB', 'fas fa-home', 'app_accueil');
        yield MenuItem::subMenu('Entreprise', 'fa fa-home')->setSubItems([
            MenuItem::linkToCrud('Liste ', 'fa fa-list-ul', Entreprise::class)->setAction(Crud::PAGE_INDEX),
            MenuItem::linkToCrud('Nouveau', 'fa fa-plus-circle', Entreprise::class)->setAction(Crud::PAGE_NEW),

        ]);
        yield MenuItem::subMenu('Agents ', 'fa fa-home')->setSubItems([
            MenuItem::linkToCrud('Liste ', 'fa fa-list-ul', Agent::class)->setAction(Crud::PAGE_INDEX),
            MenuItem::linkToCrud('Nouveau', 'fa fa-plus-circle', Agent::class)->setAction(Crud::PAGE_NEW),

        ]);
        yield MenuItem::subMenu('Factures  ', 'fa fa-home')->setSubItems([
            MenuItem::linkToCrud('Liste ', 'fa fa-list-ul', Facture::class)->setAction(Crud::PAGE_INDEX),
            MenuItem::linkToCrud('Nouveau', 'fa fa-plus-circle', Facture::class)->setAction(Crud::PAGE_NEW),

        ]);
        yield MenuItem::subMenu('Organisations   ', 'fa fa-home')->setSubItems([
            MenuItem::linkToCrud('Liste ', 'fa fa-list-ul', Organisation::class)->setAction(Crud::PAGE_INDEX),
            MenuItem::linkToCrud('Nouveau', 'fa fa-plus-circle', Organisation::class)->setAction(Crud::PAGE_NEW),

        ]);
        yield MenuItem::subMenu('Les produits    ', 'fa fa-home')->setSubItems([
            MenuItem::linkToCrud('Tous les produits ', 'fa fa-list-ul', Produit::class)->setAction(Crud::PAGE_INDEX),
            MenuItem::linkToCrud('Créer produit', 'fa fa-plus-circle', Produit::class)->setAction(Crud::PAGE_NEW),

        ]);

        yield MenuItem::subMenu('Les Utilisateurs', 'fa fa-users')->setSubItems([
            MenuItem::linkToCrud('Tous les users  ', 'fa fa-user', User::class)->setAction(Crud::PAGE_INDEX),
            MenuItem::linkToCrud('Nouveau', 'fa fa-user-plus', User::class)->setAction(Crud::PAGE_NEW),

        ]);
    }
}
