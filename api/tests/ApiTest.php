<?php
 
declare(strict_types=1);
 
namespace App\Tests;
 
use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
 
class UsersTest extends ApiTestCase
{
    public function testCreateUser()
    {
        $client = static::createClient();
        $response = $client->request('POST', '/users', ['json' => [
            'email' => 'dunglas+test@gmail.com'
        ]]);
        $this->assertSame(201, $response->getStatusCode());
 
        $responseContent = $response->toArray();
        $this->assertStringStartsWith('/users/', $responseContent['@id']);
    }
}
