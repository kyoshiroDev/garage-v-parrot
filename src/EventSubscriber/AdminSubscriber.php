<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Http\Event\LoginSuccessEvent;

class AdminSubscriber implements EventSubscriberInterface
{
    public function __construct(private UrlGeneratorInterface $urlGenerator)
    {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            LoginSuccessEvent::class => 'onLoginSuccess',
        ];
    }

    public function onLoginSuccess(LoginSuccessEvent $event)
    {
        $user = $event->getUser();

        if (in_array('ROLE_ADMIN' && 'ROLE_USER', $user->getRoles())) {
            $event->getResponse()->headers->set('Location', $this->urlGenerator->generate('app_user_index'));
        }
    }
}
