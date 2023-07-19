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

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
  #[Route(path: '/login', name: 'app_login', methods: ['GET', 'POST'])]

  public function login(AuthenticationUtils $authenticationUtils): Response
  {

    if ($this->getUser()) {
      return $this->redirectToRoute('app_home');
    }

    // get the login error if there is one
    $error = $authenticationUtils->getLastAuthenticationError();
    // last username entered by the user
    $lastUsername = $authenticationUtils->getLastUsername();

    return $this->render('security/login.html.twig', [
      'last_username' => $lastUsername,
      'error' => $error,
      'controller_name' => 'SecurityController',
    ]);
  }

  #[Route(path: '/logout', name: 'app_logout', methods: ['GET'])]
  public function logout()
  {
    throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
  }
}
