<?php


namespace App\DataTransformer;


use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\Dto\MovieInput;
use App\Entity\Movie;
use App\Entity\Type;
use Doctrine\ORM\EntityManagerInterface;
use InvalidArgumentException;

final class MovieInputDataTransformer implements DataTransformerInterface
{
    /** @var EntityManagerInterface  */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param MovieInput $object
     * @param string $to
     * @param array $context
     * @return Movie|object
     */
    public function transform($object, string $to, array $context = [])
    {
        $repo = $this->entityManager->getRepository(Type::class);
        $type = $repo->findOneBy(['name'=>$object->type]);
        if (!$type){
            throw new InvalidArgumentException(sprintf("Type %s not found", $object->type));
        }

        $movie = new Movie();
        $movie->setTitle($object->title);
        $movie->setCreatedAt($object->createdAt);
        $movie->setType($type);
        return $movie;
    }

    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        if ($data instanceof Movie) {
            return false;
        }

        return Movie::class == $to && null !== ($context['input']['class'] ?? null);
    }

}