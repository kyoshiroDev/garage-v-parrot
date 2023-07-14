<?php

namespace App\Controller;

use App\Entity\Prestations;
use App\Repository\PrestationsRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * 
     * New Prestation
     */
    #[Route('/prestation/new', name: 'app_prestation_new')]
    public function new(Request $request, ManagerRegistry $doctrine): Response
      {
        $prestation = new Prestations();

        $form = $this->createForm(PrestationType::class, $prestation);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
          $em = $doctrine->getManager();
          $em->persist($prestation);
          $em->flush();

          return $this->redirectToRoute('app_prestation');
        }

        return $this->render('prestation/new.html.twig', [
          'prestation' => $prestation,
          'form' => $form->createView(),
        ]);
      }
    
    
      
    
}
