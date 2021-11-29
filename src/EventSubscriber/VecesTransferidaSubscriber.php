<?php

namespace App\EventSubscriber;

use App\Entity\Tareas;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Security;

class VecesTransferidaSubscriber implements EventSubscriberInterface
{

    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['setVecesTransferida'],
        ];
    }

    public function setVecesTransferida(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof Tareas)) {
            return;
        }

        $transferida = 0;
        $entity->setVecesTransferida($transferida);
    }

}