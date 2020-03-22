<?php


namespace App\Tests;


use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\Actor;

class ActorsTest extends ApiTestCase
{
    public function testGetCollection()
    {
        self::createClient()->request('GET', '/api/actors');

        $this->assertResponseIsSuccessful();
        $this->assertMatchesResourceCollectionJsonSchema(Actor::class);
    }

    public function testPost()
    {
        $options = [
            'body' => '{
              "firstName": "Test",
              "lastName": "Test2",
              "sex": "male"
            }',
            'headers' => [
                'Content-Type' => 'application/ld+json'
            ]
        ];
        self::createClient()->request('POST','/api/actors', $options);

        $this->assertResponseIsSuccessful();
        $this->assertMatchesJsonSchema('"type":"object"');
    }
}