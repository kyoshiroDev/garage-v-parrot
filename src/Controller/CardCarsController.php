<?php

namespace App\Controller;

use App\Entity\CardCars;
use App\Form\CardCarsType;
use App\Repository\CardCarsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/card/cars')]
class CardCarsController extends AbstractController
{
    #[Route('/', name: 'app_card_cars_index', methods: ['GET'])]
    public function index(CardCarsRepository $cardCarsRepository): Response
    {
        return $this->render('card_cars/index.html.twig', [
            'card_cars' => $cardCarsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_card_cars_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CardCarsRepository $cardCarsRepository): Response
    {
        $cardCar = new CardCars();
        $form = $this->createForm(CardCarsType::class, $cardCar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cardCarsRepository->save($cardCar, true);

            return $this->redirectToRoute('app_card_cars_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('card_cars/new.html.twig', [
            'card_car' => $cardCar,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_card_cars_show', methods: ['GET'])]
    public function show(CardCars $cardCar): Response
    { 
        $marque = $cardCar->getMarque();
        $model = $cardCar->getModel();
        $kilo = $cardCar->getKilometre();
        $porte = $cardCar->getPorte();
        $puissance = $cardCar->getPuissance();
        $annee = $cardCar->getAnnee();
        $energie = $cardCar->getEnergie();
        $prix = $cardCar->getPrix();

        return $this->render('card_cars/show.html.twig', [
            'card_cars' => $cardCar,
            'marque' => $marque,
            'model' => $model,
            'kilo' => $kilo,
            'porte' => $porte,
            'puissance' => $puissance,
            'annee' => $annee,
            'energie' => $energie,
            'prix' => $prix,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_card_cars_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CardCars $cardCar, CardCarsRepository $cardCarsRepository): Response
    {
        $form = $this->createForm(CardCarsType::class, $cardCar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cardCarsRepository->save($cardCar, true);

            return $this->redirectToRoute('app_card_cars_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('card_cars/edit.html.twig', [
            'card_car' => $cardCar,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_card_cars_delete', methods: ['POST'])]
    public function delete(Request $request, CardCars $cardCar, CardCarsRepository $cardCarsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cardCar->getId(), $request->request->get('_token'))) {
            $cardCarsRepository->remove($cardCar, true);
        }

        return $this->redirectToRoute('app_card_cars_index', [], Response::HTTP_SEE_OTHER);
    }
}
