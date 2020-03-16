<?php


namespace App\Dto;


use DateTime;

final class MovieInput
{
    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $type;

    /**
     * @var DateTime
     */
    public $createdAt;
}