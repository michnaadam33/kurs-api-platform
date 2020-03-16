<?php


namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity()
 * @ApiFilter(DateFilter::class, properties={"createAt"})
 */
class Movie
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column()
     * @Groups({"list", "read"})
     * @var string
     */
    private $title;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"list", "read"})
     * @var DateTime
     */
    private $createAt;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Type")
     * @Groups({"list", "read"})
     * @ORM\JoinColumn(nullable=false)
     * @var Type
     */
    private $type;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Movie
     */
    public function setId(int $id): Movie
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Movie
     */
    public function setTitle(string $title): Movie
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getCreateAt(): DateTime
    {
        return $this->createAt;
    }

    /**
     * @param DateTime $createAt
     * @return Movie
     */
    public function setCreateAt(DateTime $createAt): Movie
    {
        $this->createAt = $createAt;
        return $this;
    }

    /**
     * @return Type
     */
    public function getType(): Type
    {
        return $this->type;
    }

    /**
     * @param Type $type
     * @return Movie
     */
    public function setType(Type $type): Movie
    {
        $this->type = $type;
        return $this;
    }
}