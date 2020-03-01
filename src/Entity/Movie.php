<?php


namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
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
     * @var string
     */
    private $title;

    /**
     * @ORM\Column(type="datetime")
     * @var DateTime
     */
    private $createAt;


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
}