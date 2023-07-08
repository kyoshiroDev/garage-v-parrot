<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Horaire;
use App\Entity\Prestations;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;


class DashboardController extends AbstractDashboardController
{
  #[Route('/admin', name: 'admin')]
  public function index(): Response
  {
    $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
    return $this->redirect($adminUrlGenerator->setController(UserCrudController::class)->generateUrl());
  
    return $this->render('admin/dashboard.html.twig');
  }


  public function configureDashboard(): Dashboard
  {
    return Dashboard::new()
      ->setTitle('Bienvenue')
      ->renderContentMaximized()
      ->setTranslationDomain('admin');
  }

  public function configureCrud() :Crud
  {
    return Crud::new()
      ->setDateTimeFormat('dd/MM/yyyy HH:mm:ss')
      ->setDateFormat('dd/MM/yyyy');
  }

  public function configureMenuItems(): iterable
  {
    yield MenuItem::linkToCrud('Utilisateur', 'fas fa-user', User::class);
    yield MenuItem::linkToCrud('Horaire', 'fas fa-clock', Horaire::class);
    yield MenuItem::linkToCrud('Prestations', 'fas fa-list', Prestations::class);
  }
}
