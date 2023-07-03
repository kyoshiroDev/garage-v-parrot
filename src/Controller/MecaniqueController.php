<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MecaniqueController extends AbstractController
{
    #[Route('/mecanique', name: 'mecanique')]
    public function index(): Response
    {
        return $this->render('mecanique/index.html.twig', [
            'controller_name' => 'MecaniqueController',
        ]);
    }
}
