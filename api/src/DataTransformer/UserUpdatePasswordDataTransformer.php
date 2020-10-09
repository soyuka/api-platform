<?php
 
namespace App\DataTransformer;
 
use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use ApiPlatform\Core\Serializer\AbstractItemNormalizer;
use App\Dto\UserUpdatePassword;
use App\Entity\User;

 
final class UserUpdatePasswordDataTransformer implements DataTransformerInterface
{
    /**
     * {@inheritdoc}
     */
    public function transform($data, string $to, array $context = [])
    {

        dump($context[AbstractItemNormalizer::OBJECT_TO_POPULATE]);
        // $this->validator->validate($data);
        $user = new User();
        $user->setEmail($data->email);
        $user->setId(1);
        return $user;
    }
 
    /**
     * {@inheritdoc}
     */
    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        if ($data instanceof User) {
          return false;
        }
 
        return User::class === $to && UserUpdatePassword::class === ($context['input']['class'] ?? null);
    }
}
