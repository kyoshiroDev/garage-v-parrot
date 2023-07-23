<?php

namespace App\Controller\Admin;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


#[Route('/admin', name: 'app_admin_')]
class DashboardController extends AbstractController
{
  #[Route('/', name:'index')]
  public function index(): Response
  {
    return $this->render('admin/dashboard.html.twig',[
      'controller_name' => 'DashboardController',
    ]);
  }
}
