<?php

namespace App\Controller;

use App\Entity\Horaire;
use App\Form\HorairesType;
use App\Repository\HoraireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

  #[Route('/horaire/new', name: 'app_horaire_new', methods: ['GET', 'POST'])]
  public function new(Request $request, EntityManagerInterface $manager): Response
  {
    $horaires = new Horaire();
    $form = $this->createForm(HorairesType::class, $horaires);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $horaires = $form->getData();

      $manager->persist($horaires);
      $manager->flush();

      $this->addFlash('success', 'Horaire ajouté avec succès');

      return $this->redirectToRoute('app_horaire');
      
    }

    return $this->render('_part/horaire/new.html.twig', [
      'form' => $form->createView(),
    ]);
  }
}
