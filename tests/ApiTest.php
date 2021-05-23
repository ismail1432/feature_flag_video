<?php

namespace App\Tests;

use App\FeatureRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiTest extends WebTestCase
{
    public function testApiToggleEnable(): void
    {
        $client = static::createClient();
        $repo = static::$container->get(FeatureRepositoryInterface::class);
        $repo->setValue(true);

        $client->request('GET', '/api');

        $this->assertResponseIsSuccessful();
        $response = json_decode($client->getResponse()->getContent(), true);

        $this->assertEquals(['lastName' => 'Dalton', 'firstName' => 'Joe'], $response);
    }

    public function testApiUsersToggleEnable()
    {

        $client = static::createClient();

        $repo = static::$container->get(FeatureRepositoryInterface::class);
        $repo->setValue(true);

        $client->request('GET', '/users');

        $response = json_decode($client->getResponse()->getContent(), true);

        $this->assertEquals(['data'=>'OK'], $response);

    }

    public function testApiToggleDisable(): void
    {

        $client = static::createClient();

        $repo = static::$container->get(FeatureRepositoryInterface::class);
        $repo->setValue(false);


        $client->request('GET', '/api');

        $this->assertResponseIsSuccessful();
        $response = json_decode($client->getResponse()->getContent(), true);

        $this->assertEquals(['lastName' => 'Dalton'], $response);
    }

    public function testApiUsersToggleDisable()
    {
        $client = static::createClient();

        $repo = static::$container->get(FeatureRepositoryInterface::class);
        $repo->setValue(false);

        $client->request('GET', '/users');

        $this->assertResponseStatusCodeSame(404);

    }
}
