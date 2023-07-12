<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserAreaController extends AbstractController
{
    #[Route('/profile/user/area', name: 'app_user_area')]

    public function index(): Response
    {
        
        return $this->render('user_area/index.html.twig', [
            'controller_name' => 'UserAreaController',
        ]);
    }
}
