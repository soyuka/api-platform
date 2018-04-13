<?php

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Entity\Person;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use App\Controller\Custom;

/**
 * Class PersonList
 * @package App\Entity
 * @ApiResource(
 *     itemOperations={
 *          "get", "put", "delete",
 *     },
 *     attributes={
 *          "denormalization_context"={
 *              "groups"={"write"}
 *          },
 *          "normalization_context"={
 *              "groups"={"read"}
 *          }
 *     }
 *     )
 */
class PersonList
{
    /**
     * @var string
     * @Groups({"write", "read"})
     * @ApiProperty()
     * @Assert\NotBlank
     */
    public $name;

    /**
     * @ApiSubresource()
     * @var Person[]
     * @Groups({"write", "read"})
     * @Assert\Valid
     */
    public $people;

    /**
     * @ApiProperty(identifier=true)
     * @var mixed
     */
    public $id;
}
