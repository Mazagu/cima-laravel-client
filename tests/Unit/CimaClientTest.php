<?php

namespace Bluesourcery\Tests\Unit;

use Bluesourcery\Cima\Exceptions\HttpException;
use Bluesourcery\Cima\Models\Medication;
use Bluesourcery\Cima\CimaClient;
use Bluesourcery\Tests\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;

class CimaClientTest extends TestCase
{
    /** @test */
    public function it_can_find_a_medication()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], file_get_contents(__DIR__ . '/../Fixtures/medication_response.json')),
        ]);

        $client = new Client(['handler' => $mockHandler]);

        $cimaClient = new CimaClient($client);
        $medication = $cimaClient->find(1);
        $this->assertInstanceOf(Medication::class, $medication);
    }

    /** @test */
    public function it_throws_an_exception_when_the_medication_does_not_exist()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], '[]'),
        ]);

        $client = new Client(['handler' => $mockHandler]);

        $cimaClient = new CimaClient($client);
        $this->expectException(HttpException::class);
        $this->expectExceptionMessage('Medication not found');
        $cimaClient->find(1);
    }

    /** @test */
    public function it_lists_all_medications()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], file_get_contents(__DIR__ . '/../Fixtures/medications_list_response.json')),
        ]);

        $client = new Client(['handler' => $mockHandler]);

        $cimaClient = new CimaClient($client);
        $medicationList = $cimaClient->all();
        $this->assertInstanceOf(Medication::class, $medicationList->medications->first());
    }
}