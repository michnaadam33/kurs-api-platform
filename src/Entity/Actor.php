<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Collection;

/**
 * @ORM\Entity()
 */
class Actor
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @var integer
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $firstName;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $lastName;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Movie")
     * @var Movie[]|Collection
     */
    private $movies;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Actor
     */
    public function setId(int $id): Actor
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return Actor
     */
    public function setFirstName(string $firstName): Actor
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return Actor
     */
    public function setLastName(string $lastName): Actor
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return Movie[]|Collection
     */
    public function getMovies()
    {
        return $this->movies;
    }

    /**
     * @param Movie[]|Collection $movies
     * @return Actor
     */
    public function setMovies($movies)
    {
        $this->movies = $movies;
        return $this;
    }
}