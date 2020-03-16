<?php


namespace App\Action;


use App\Entity\Actor;
use Doctrine\ORM\EntityManagerInterface;

class OscarActorAction
{
    /** @var EntityManagerInterface  */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    public function __invoke(Actor $data)
    {
        $data->setHasOscar(true);
        $this->saveActor($data);

        return $data;
    }

    private function saveActor(Actor $actor)
    {
        $this->entityManager->persist($actor);
        $this->entityManager->flush();
    }
}
