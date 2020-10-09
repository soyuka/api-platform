<?php

namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Entity\User;
use Symfony\Component\HttpFoundation\RequestStack;

final class UpdateUserDataPersister implements ContextAwareDataPersisterInterface
{
    private ?ContextAwareDataPersisterInterface $decorated;
    private RequestStack $requestStack;

    public function __construct(ContextAwareDataPersisterInterface $decorated = null, RequestStack $requestStack)
    {
        $this->decorated = $decorated;
        $this->requestStack = $requestStack;
    }

    public function supports($data, array $context = []): bool
    {
        return User::class === $context['resource_class'] && 'reset_password' === ($context['item_operation_name'] ?? null);
    }

    /**
     * {@inheritdoc}
     */
    public function persist($data, array $context = [])
    {
        dump($data);
        /** @var User **/
        $data = $this->requestStack->getCurrentRequest()->attributes->get('previous_data');
        // return $data;
        $data->setPasswordToken(bin2hex(random_bytes(10)));
        // $this->mailer->send($data->getEmail(), 'Nouveau password ?');
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function remove($data, array $context = []) 
    {
       $this->decorated->remove($data, $context);
    }
}
