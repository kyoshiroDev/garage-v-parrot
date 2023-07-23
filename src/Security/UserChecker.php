<?php

namespace App\Security;


use App\Entity\User as AppUser;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UserChecker implements UserCheckerInterface
{ 
  private $urlGenerator;

  function __construct(UrlGeneratorInterface $urlGenerator)
    
  { 
    $this->urlGenerator = $urlGenerator;
  }

  public function checkPreAuth(UserInterface $user)
  {
    if (!$user instanceof AppUser) {
      return;
    }
  }
  
  public function checkPostAuth(UserInterface $user)
  {
    
    if (!$user instanceof AppUser) {
      return;
    }
    if ($user->getRoles('ROLE_ADMIN')) {
      return $this->urlGenerator->generate('app_user_index');
    }
  }
}
