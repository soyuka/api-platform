<?php
namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use App\Controller\Custom;

/**
 * Class Person
 * @package App\Entity
 * @ApiResource(
 *     itemOperations={
 *          "get", "put", "delete",
 *          "custom": {
 *              "method"="GET",
 *              "path"="/person_lists/{id}/people/{personId}.{_format}",
 *              "controller"=Custom::class,
 *              "defaults": {"_api_receive": false},
 *              "swagger_context": {
 *                  "parameters": {
 *                     { "name": "id", "in": "path", "required": "true", "type": "string" },
 *                     { "name": "personId", "in": "path", "required": "true", "type": "string" },
 *                  }
 *              }
 *          }
 *     }
 * )
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
