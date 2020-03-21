<?php


namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Class Type
 * @package App\Entity
 * @ORM\Entity()
 */
class Type
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @var string
     * @ORM\Column()
     * @Groups({"list", "read"})
     *
     */
    private $name;

    /**
     * @var DateTime
     */
    private $checkDate;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return DateTime
     */
    public function getCheckDate(): DateTime
    {
        return $this->checkDate;
    }

    /**
     * @param DateTime $checkDate
     * @return Type
     */
    public function setCheckDate(DateTime $checkDate): Type
    {
        $this->checkDate = $checkDate;
        return $this;
    }
}