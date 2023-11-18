<?php

namespace App\Controller;

use App\Entity\Horaire;
use App\Repository\HoraireRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HoraireController extends AbstractController
{
  #[Route('/horaire', name: 'app_horaire')]
  public function horaire(HoraireRepository $repository, ManagerRegistry $doctrine): Response
  {
    $horaires = $repository->findAll();

    return $this->render('_part/horaire/index.html.twig', [
      'horaires' => $horaires,
    ]);
  }

  // New Horaire
  #[Route('/horaire/new', name: 'app_horaire_new')]
  public function new(Request $request, HoraireRepository $repository, ManagerRegistry $doctrine): Response
  {
    $horaire = new Horaire();
    $form = $this->createForm(HoraireType::class, $horaire);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $repository->save($horaire, true);

      $em = $doctrine->getManager();
      $em->persist($horaire);
      $em->flush();

      return $this->redirectToRoute('app_horaire', [], Response::HTTP_SEE_OTHER);
    }

    return $this->render('_part/horaire/new.html.twig', [
      'horaire' => $horaire,
      'form' => $form,
    ]);
  }

  // Edit Horaire
  #[Route('/horaire/{id}/edit', name: 'app_horaire_edit')]
  public function edit(Request $request, Horaire $horaire, HoraireRepository $repository, ManagerRegistry $doctrine): Response
  {
    $form = $this->createForm(HoraireType::class, $horaire);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $repository->save($horaire, true);

      $doctrine->getManager()->flush();

      return $this->redirectToRoute('app_horaire', [], Response::HTTP_SEE_OTHER);
    }

    return $this->render('_part/horaire/edit.html.twig', [
      'horaire' => $horaire,
      'form' => $form,
    ]);
  }

  // Delete Horaire
  #[Route('/horaire/{id}/delete', name: 'app_horaire_delete')]
  public function delete(Request $request, Horaire $horaire, HoraireRepository $repository, ManagerRegistry $doctrine): Response
  {
    if ($this->isCsrfTokenValid('delete' . $horaire->getId(), $request->request->get('_token'))) {
      $repository->delete($horaire, true);

      $em = $doctrine->getManager();
      $em->remove($horaire);
      $em->flush();
    }

    return $this->redirectToRoute('app_horaire', [], Response::HTTP_SEE_OTHER);
  }
}
