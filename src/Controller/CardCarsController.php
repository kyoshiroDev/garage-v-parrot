<?php

namespace App\Controller;

use App\Entity\CardCars;
use App\Form\CardCarsType;
use App\Repository\CardCarsRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('users/card/cars', name:'app_card_cars_')]
class CardCarsController extends AbstractController
{
  #[Route('/', name: 'index', methods: ['GET'])]
  public function index(CardCarsRepository $cardCarsRepository): Response
  {
    return $this->render('card_cars/index.html.twig', [
      'card_cars' => $cardCarsRepository->findAll(),
    ]);
  }

  // New CardCars
  #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
  public function new(Request $request, CardCarsRepository $cardCarsRepository, ManagerRegistry $doctrine): Response
  {
    $cardCar = new CardCars();
    $form = $this->createForm(CardCarsType::class, $cardCar);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $cardCarsRepository->save($cardCar, true);

      $em = $doctrine->getManager();
      $em->persist($cardCar);
      $em->flush();

      return $this->redirectToRoute('app_card_cars_index', [], Response::HTTP_SEE_OTHER);
    }

    return $this->render('card_cars/new.html.twig', [
      'card_car' => $cardCar,
      'form' => $form->createView()
    ]);
  }

  // Edit CardCars
  #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
  public function edit(Request $request, CardCars $cardCar, CardCarsRepository $cardCarsRepository, ManagerRegistry $doctrine): Response
  {
    $form = $this->createForm(CardCarsType::class, $cardCar);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $cardCarsRepository->save($cardCar, true);

      $doctrine->getManager()->flush();

      return $this->redirectToRoute('app_card_cars_index', [], Response::HTTP_SEE_OTHER);
    }

    return $this->render('card_cars/edit.html.twig', [
      'card_car' => $cardCar,
      'form' => $form,
    ]);
  }

  // Delete CardCars
  #[Route('/{id}/', name: 'delete', methods: ['POST'])]
  public function delete(Request $request, CardCars $cardCar, CardCarsRepository $cardCarsRepository, ManagerRegistry $doctrine): Response
  {
    if ($this->isCsrfTokenValid('delete' . $cardCar->getId(), $request->request->get('_token'))) {
      $cardCarsRepository->remove($cardCar, true);
    }

    $em = $doctrine->getManager();
    $em->remove($cardCar);
    $em->flush();
    return $this->redirectToRoute('app_card_cars_index', [], Response::HTTP_SEE_OTHER);
  }

  // Show CardCars
  #[Route('/{id}', name: 'show', methods: ['GET'])]
  public function show(CardCars $cardCar): Response
  {
    return $this->render('card_cars/show.html.twig', [
      'card_car' => $cardCar
    ]);
  }
}
