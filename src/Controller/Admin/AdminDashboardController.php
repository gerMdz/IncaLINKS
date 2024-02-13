<?php

namespace App\Controller\Admin;

use App\Entity\Countandadd;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminDashboardController extends AbstractDashboardController
{
    private $base_name_site;

    private AdminUrlGenerator $adminUrlGenerator;

    public function __construct(string $base_name_site, AdminUrlGenerator $adminUrlGenerator)
    {
        $this->base_name_site = $base_name_site;
        $this->adminUrlGenerator = $adminUrlGenerator;
    }

    #[Route(path: '/admin', name: 'admin')]
    public function index(): Response
    {
        $routeBuilder = $this->adminUrlGenerator;

        return $this->redirect($routeBuilder->setController(CorazonCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle($this->base_name_site);
    }

    public function configureMenuItems(): iterable
    {
        //        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Corazones', 'fas fa-heart text-primary', Countandadd::class);
    }
}
