<?php


namespace App\DataProvider;


use ApiPlatform\Core\DataProvider\CollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Entity\Type;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;

class TypeDataProvider implements CollectionDataProviderInterface, ItemDataProviderInterface, RestrictedDataProviderInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return Type::class === $resourceClass;
    }

    public function getItem(string $resourceClass, $id, string $operationName = null, array $context = [])
    {
        $repo = $this->entityManager->getRepository(Type::class);
        $result =  $repo->find($id);
        $result->setCheckDate(new DateTime());
        return$result;
    }

    public function getCollection(string $resourceClass, string $operationName = null)
    {
        $repo = $this->entityManager->getRepository(Type::class);
        $results = $repo->findAll();

        foreach ($results as $result){
            yield $result->setCheckDate(new DateTime());
        }
    }

}