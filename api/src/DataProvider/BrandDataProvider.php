<?php

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use ApiPlatform\Core\DataProvider\CollectionDataProviderInterface;
use App\Entity\Brand;
use Symfony\Component\HttpClient\HttpClient;

final class BrandDataProvider implements RestrictedDataProviderInterface, CollectionDataProviderInterface 
{
    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return false;
    }

    public function getCollection(string $resourceClass, string $operationName = null)
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://private-anon-d3ed257f7c-carsapi1.apiary-mock.com/manufacturers');
        $data = json_decode($response->getContent());

        foreach($data as $brand) {
            $b = (new Brand())->setName($brand->name);
            // $b->setId($brand->id);
            yield $b;
        }
    }
}
