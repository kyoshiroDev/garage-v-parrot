<?php

namespace App\Controller;

use App\Repository\HoraireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HoraireController extends AbstractController
{
  #[Route('/horaire', name: 'app_horaire')]
  public function horaire(HoraireRepository $repository): Response
  {
    $horaires = $repository->findAll();

    return $this->render('_part/horaire/index.html.twig', [
      'horaires' => $horaires,
    ]);
  }
}
