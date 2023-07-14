<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



#[Route('/user')]
class UserController extends AbstractController
{
  #[Route('/', name: 'app_user_index', methods: ['GET'])]
  public function index(UserRepository $userRepository): Response
  {
    return $this->render('user/index.html.twig', [
      'users' => $userRepository->findAll(),
    ]);
  }

  /**
   * New User
   */
  #[Route('/new', name: 'app_user_new', methods: ['GET', 'POST'])]
  public function new(Request $request, UserRepository $userRepository, ManagerRegistry $doctrine): Response
  {
    $user = new User();
    $form = $this->createForm(UserType::class, $user);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {

      $em = $doctrine->getManager();
      $em->persist($user);
      $em->flush();

      $userRepository->save($user, true);

      return $this->redirectToRoute('app_user_index');
    }

    return $this->render('user/new.html.twig', [
      'user' => $user,
      'form' => $form,
    ]);
  }

  /**
   * Edit User
   */
  #[Route('/{id}/edit', name: 'app_user_edit', methods: ['GET', 'POST'])]
  public function edit(Request $request, User $user, UserRepository $userRepository, ManagerRegistry $doctrine): Response
  {
    $form = $this->createForm(UserType::class, $user);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $userRepository->save($user, true);

      $doctrine->getManager()->flush();

      return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    }

    return $this->render('user/edit.html.twig', [
      'user' => $user,
      'form' => $form,
    ]);
  }

  /**
   * Delete User
   */
  #[Route('/{id}', name: 'app_user_delete', methods: ['POST'])]
  public function delete(Request $request, User $user, UserRepository $userRepository, ManagerRegistry $doctrine): Response
  {
    if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->request->get('_token'))) {
      $userRepository->remove($user, true);
    }

    $em = $doctrine->getManager();
    $em->remove($user);
    $em->flush();

    return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
  }

  /**
   * Show User
   */
  #[Route('/{id}', name: 'app_user_show', methods: ['GET'])]
  public function show(User $user): Response
  {
    return $this->render('user/show.html.twig', [
      'user' => $user,
    ]);
  }
}
