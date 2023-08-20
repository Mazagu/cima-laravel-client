<?php

namespace Bluesourcery\Tests\Unit;

use Bluesourcery\Cima\Domain\Exception\HttpException;
use Bluesourcery\Cima\Domain\Model\Medication;
use Bluesourcery\Cima\Domain\Repository\CimaRepository;
use Bluesourcery\Tests\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;

class CimaRepositoryTest extends TestCase
{
    /** @test */
    public function it_can_find_a_medication()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], file_get_contents(__DIR__ . '/../Fixtures/medication_response.json')),
        ]);

        $client = new Client(['handler' => $mockHandler]);

        $cimaRepository = new CimaRepository($client);
        $medication = $cimaRepository->find(1);
        $this->assertInstanceOf(Medication::class, $medication);
    }

    /** @test */
    public function it_throws_an_exception_when_the_medication_does_not_exist()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], '[]'),
        ]);

        $client = new Client(['handler' => $mockHandler]);

        $cimaRepository = new CimaRepository($client);
        $this->expectException(HttpException::class);
        $this->expectExceptionMessage('Medication not found');
        $cimaRepository->find(1);
    }

    /** @test */
    public function it_lists_all_medications()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], file_get_contents(__DIR__ . '/../Fixtures/medications_list_response.json')),
        ]);

        $client = new Client(['handler' => $mockHandler]);

        $cimaRepository = new CimaRepository($client);
        $medicationList = $cimaRepository->all();
        $this->assertInstanceOf(Medication::class, $medicationList->medications->first());
    }
}