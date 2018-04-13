<?php
namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * Class Person
 * @package App\Entity
 * @ApiResource
 */
class Person
{
    /**
     * @ApiProperty(identifier=true)
     * @Groups({"read"})
     * @var mixed
     */
    public $id;

    /**
     * @ApiProperty()
     * @Assert\NotBlank
     * @Assert\Length(min="5")
     * @Groups({"read", "write"})
     * @var string
     */
    public $name;
}