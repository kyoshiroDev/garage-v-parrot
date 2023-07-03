<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OccasionsController extends AbstractController
{
    #[Route('/occasions', name: 'occasions')]
    public function index(): Response
    {
        return $this->render('occasions/index.html.twig', [
            'controller_name' => 'OccasionsController',
        ]);
    }
}
