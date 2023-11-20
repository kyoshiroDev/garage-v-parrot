<?php

namespace App\Controller;

interface PasswordAuthenticatedUserInterface
{
  /**
   * Returns the hashed password used to authenticate the user.
   *
   * Usually on authentication, a plain-text password will be compared to this value.
   */
  public function getPassword(): ?string;
}

use App\Form\LoginType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
  #[Route(path: '/login', name: 'app_login', methods: ['GET', 'POST'])]

  public function login(AuthenticationUtils $authenticationUtils, Request $request): Response
  {
    $error = $authenticationUtils->getLastAuthenticationError();
    $lastUsername = $authenticationUtils->getLastUsername();

    $form = $this->createForm(LoginType::class);
    $form->handleRequest($request);
    $form->isSubmitted() && $form->isValid();

    return $this->render('security/login.html.twig', [
      'last_username' => $lastUsername,
      'error' => $error,
      'controller_name' => 'SecurityController',
      'form' => $form,
    ]);
  }

  #[Route(path: '/logout', name: 'app_logout', methods: ['GET'])]
  public function logout()
  {
    throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
  }
}
