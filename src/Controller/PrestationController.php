<?php

namespace App\Controller;

use App\Repository\PrestationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrestationController extends AbstractController
{
    #[Route('/prestation', name: 'app_prestation')]
    public function index(PrestationsRepository $repository): Response
    {

        $prestations = $repository->findAll();

        return $this->render('prestation/index.html.twig', [
            'prestations' => $prestations,
        ]);
    }
}
