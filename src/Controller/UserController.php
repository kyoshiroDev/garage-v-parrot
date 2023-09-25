<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Form\EditUserType;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('admin/user', name: 'app_user_')]
class UserController extends AbstractController
{

  #[Route('/', name: 'index', methods: ['GET'])]
  public function index(UserRepository $userRepository): Response
  {
    return $this->render('user/index.html.twig', [
      'users' => $userRepository->findAll(),
    ]);
  }

  #[Route('/all', name: 'users', methods: ['GET'])]
  public function users(UserRepository $userRepository): JsonResponse
  {
    $allUsers = $userRepository->findAll();

    $users = [];
    foreach($allUsers as $user) {
      $users[] = [
        'id' => $user->getId(),
        'last_name' => $user->getLastName(),
        'first_name' => $user->getFirstName(),
        'email' => $user->getEmail(),
        'roles' => $user->getRoles(),
        'created_at' => $user->getCreatedAt()->format('d/m/Y'),
      ];
    }

    return $this->json($users);
  }

  /**
   * New User
   */
  #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
  public function new(Request $request, UserRepository $userRepository, ManagerRegistry $doctrine, UserPasswordHasherInterface $passwordHasher): Response
  {
    $user = new User();

    $form = $this->createForm(UserType::class, $user);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {

      $plaintextPassword = $user->getPassword();

      $hashedPassword = $passwordHasher->hashPassword(
        $user,
        $plaintextPassword
      );

      $user->setPassword($hashedPassword);

      $em = $doctrine->getManager();
      $em->persist($user);
      $em->flush();

      $userRepository->save($user, true);

      return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    }

    return $this->render('user/new.html.twig', [
      'user' => $user,
      'form' => $form->createView(),
    ]);
  }

  /**
   * Edit User
   */
  #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
  public function edit(Request $request, User $user, UserRepository $userRepository, ManagerRegistry $doctrine, UserPasswordHasherInterface $passwordHasher): Response
  {

    $form = $this->createForm(EditUserType::class, $user);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {

      $plaintextPassword = $user->getPassword();

      $hashedPassword = $passwordHasher->hashPassword(
        $user,
        $plaintextPassword
      );

      $user->setPassword($hashedPassword);

      $em = $doctrine->getManager();
      $em->flush();

      $userRepository->save($user, true);

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
  #[Route('/{id}', name: 'delete', methods: ['POST'])]
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
  #[Route('/{id}', name: 'show', methods: ['GET'])]
  public function show(User $user): Response
  {
    return $this->render('user/show.html.twig', [
      'user' => $user,
    ]);
  }
}
