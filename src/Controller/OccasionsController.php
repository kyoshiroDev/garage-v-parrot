<?php

namespace App\Controller;

use App\Repository\CardCarsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class OccasionsController extends AbstractController
{
  #[Route('/occasions', name: 'app_occasions', methods: ['GET'])]
  public function index(CardCarsRepository $cardCarsRepository): Response
  {
    $cardCars = $cardCarsRepository->findAll();

    return $this->render('occasions/index.html.twig', [
      'controller_name' => 'OccasionsController',
      'card_cars' => $cardCars,
    ]);
  }
}
