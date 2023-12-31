<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarrosserieController extends AbstractController
{
    #[Route('/carrosserie', name: 'app_carrosserie')]
    public function index(): Response
    {
        return $this->render('Pages/carrosserie/index.html.twig', [
            'controller_name' => 'CarrosserieController',
        ]);
    }
}
