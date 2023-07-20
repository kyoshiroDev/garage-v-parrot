<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CookiesController extends AbstractController
{
    #[Route('/cookies', name: 'app_cookies')]
    public function index(): Response
    {
        return $this->render('Pages/cookies/index.html.twig', [
            'controller_name' => 'CookiesController',
        ]);
    }
}
