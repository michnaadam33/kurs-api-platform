<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use Webmozart\Assert\Assert;

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
     * @Groups({"read", "create"})
     * @ORM\Column(type="string")
     * @var string
     */
    private $firstName;

    /**
     * @Groups({"read", "create"})
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
     * @ORM\Column()
     * @var string
     */
    private $sex;

    public function __construct()
    {
        $this->movies = new ArrayCollection();
    }

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
     * @return string
     */
    public function getSex(): string
    {
        return $this->sex;
    }

    /**
     * @param string $sex
     * @return Actor
     */
    public function setSex(string $sex): Actor
    {
        Assert::oneOf($sex, ['female', 'male']);
        $this->sex = $sex;
        return $this;
    }

    /**
     * @return Movie[]|Collection
     */
    public function getMovies()
    {
        return $this->movies;
    }

    public function addMovie(Movie $movie): self
    {
        $this->movies->add($movie);
        return $this;
    }
}