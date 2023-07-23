<?php

namespace App\Controller;

use App\Entity\Prestations;
use App\Form\PrestationsType;
use App\Repository\PrestationsRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PrestationController extends AbstractController
{
  /**
   * Prestation Page
   */

  public function page(PrestationsRepository $repository): Response
  {
    $prestations = $repository->findAll();

    return $this->render('Pages/home/prestations.html.twig', [
      'prestations' => $prestations,
    ]);
  }

  /**
   * Prestation Admin Page
   */
  #[Route('admin/prestation', name: 'app_prestation_index')]
  public function index(PrestationsRepository $repository): Response
  {

    $prestations = $repository->findAll();

    return $this->render('prestation/index.html.twig', [
      'prestations' => $prestations,
    ]);
  }

  /**
   * New Prestation
   */
  #[Route('admin/prestation/new', name: 'app_prestation_new')]
  public function new(Request $request, ManagerRegistry $doctrine): Response
  {
    $prestations = new Prestations();

    $form = $this->createForm(PrestationsType::class, $prestations);

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $em = $doctrine->getManager();
      $em->persist($prestations);
      $em->flush();

      return $this->redirectToRoute('app_prestation_index');
    }

    return $this->render('prestation/new.html.twig', [
      'prestations' => $prestations,
      'form' => $form->createView(),
    ]);
  }
}
