<?php

namespace Bluesourcery\Tests\Unit;

use Bluesourcery\Cima\Exceptions\HttpException;
use Bluesourcery\Cima\Models\Medication;
use Bluesourcery\Cima\CimaClient;
use Bluesourcery\Cima\Models\NonSubstitutable;
use Bluesourcery\Cima\Models\PharmaceuticalForm;
use Bluesourcery\Cima\Models\Status;
use Bluesourcery\Cima\Models\VirtualTherapeuticMolecule;
use Bluesourcery\Tests\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use Illuminate\Database\Eloquent\Collection;

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
        $this->assertIsInt($medication->getRegistrationNumber());
        $this->assertIsString($medication->getName());
        $this->assertIsString($medication->getActiveIngredients());
        $this->assertIsString($medication->getLaboratory());
        $this->assertIsString($medication->getPrescription());
        $this->assertSame(Status::class, get_class($medication->getStatus()));
        $this->assertIsBool($medication->isCommercialized());
        $this->assertIsBool($medication->requiresPrescription());
        $this->assertIsBool($medication->isGeneric());
        $this->assertIsBool($medication->requiresConduc());
        $this->assertIsBool($medication->hasTriangle());
        $this->assertIsBool($medication->isOrphan());
        $this->assertIsBool($medication->isBiosimilar());
        $this->assertSame(NonSubstitutable::class, get_class($medication->getNonSubstitutable()));
        $this->assertIsBool($medication->isPsum());
        $this->assertIsBool($medication->hasNotes());
        $this->assertIsBool($medication->hasInformationMaterials());
        $this->assertIsBool($medication->hasEmaApproval());
        $this->assertSame(Collection::class, get_class($medication->getDocuments()));
        $this->assertSame(Collection::class, get_class($medication->getPhotos()));
        $this->assertSame(Collection::class, get_class($medication->getAtcs()));
        $this->assertSame(Collection::class, get_class($medication->getActivePrinciples()));
        $this->assertSame(Collection::class, get_class($medication->getExcipients()));
        $this->assertSame(Collection::class, get_class($medication->getAdministrationRoutes()));
        $this->assertSame(Collection::class, get_class($medication->getPresentations()));
        $this->assertSame(PharmaceuticalForm::class, get_class($medication->getPharmaceuticalForm()));
        $this->assertSame(PharmaceuticalForm::class, get_class($medication->getSimplifiedPharmaceuticalForm()));
        $this->assertSame(VirtualTherapeuticMolecule::class, get_class($medication->getVtm()));
        $this->assertIsString($medication->getDosage());
        $this->assertIsArray($medication->toArray());
        $this->assertSame(array_keys(json_decode(file_get_contents(__DIR__ . '/../Fixtures/medication_response.json'), true)), array_keys($medication->toArray()));
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
        $container = [];
        $history = Middleware::history($container);

        $mockHandler = new MockHandler([
            new Response(200, [], file_get_contents(__DIR__ . '/../Fixtures/medications_list_response.json')),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);
        $handlerStack->push($history);

        $client = new Client(['handler' => $handlerStack]);

        $cimaClient = new CimaClient($client);
        $medicationList = $cimaClient->all();
        $this->assertInstanceOf(Medication::class, $medicationList->medications->first());
    }

    static public function filter_provider()
    {
        return [
            ['filterByName', 'nombre=paracetamol', 'paracetamol'],
            ['filterByLaboratory', 'laboratorio=kern', 'kern'],
            ['filterByActiveIngredient1', 'practiv1=paracetamol', 'paracetamol'],
            ['filterByActiveIngredient2', 'practiv2=paracetamol', 'paracetamol'],
            ['filterByActiveIngredientId1', 'idpractiv1=1', 1],
            ['filterByActiveIngredientId2', 'idpractiv2=1', 1],
            ['filterByNationalCode', 'cn=659843', 659843],
            ['filterByAtcCode', 'atc=N02BE01', 'N02BE01'],
            ['filterByRegistrationNumber', 'nregistro=659843', 659843],
            ['filterByActiveIngredientCount', 'npactiv=1', 1],
            ['filterByTriangle', 'triangulo=1', 1],
            ['filterByOrphan', 'huerfano=1', 1],
            ['filterByBiosimilar', 'biosimilar=1', 1],
            ['filterByRegulationType', 'sust=1', 1],
            ['filterByVmpId', 'vmp=1', 1],
            ['filterByCommercialized', 'comerc=1', 1],
            ['filterByAuthorized', 'autorizados=1', 1],
            ['filterByPrescription', 'receta=1', 1],
        ];
    }

    /** @test 
     * @dataProvider filter_provider
    */
    public function it_searchs_filtering_by_name($filter, $expectedResult, $value)
    {
        $container = [];
        $history = Middleware::history($container);

        $mockHandler = new MockHandler([
            new Response(200, [], file_get_contents(__DIR__ . '/../Fixtures/medications_list_response.json')),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);
        $handlerStack->push($history);

        $client = new Client(['handler' => $handlerStack]);

        $cimaClient = new CimaClient($client);
        $medicationList = $cimaClient->{$filter}($value)->search();

        $this->assertEquals($expectedResult, $container[0]['request']->getUri()->getQuery());
        $this->assertInstanceOf(Medication::class, $medicationList->medications->first());
    }
}