<?php

namespace Bluesourcery\Cima;

use Bluesourcery\Cima\Exceptions\HttpException;
use Bluesourcery\Cima\Models\Medication;
use Bluesourcery\Cima\Models\MedicationList;
use GuzzleHttp\Client;

final class CimaClient implements CimaClientInterface
{
    public const BASE_URL = 'https://cima.aemps.es/cima/rest';
    private array $query = [];

    public function __construct(private Client $client)
    {
        $this->client = $client;
    }

    /**
     * @throws HttpException
     */
    public function find($id): Medication
    {
        $response = $this->client->get(self::BASE_URL . "/medicamento?nregistro=$id");
        $data = json_decode($response->getBody()->getContents(), true);

        if($response->getStatusCode() !== 200) {
            throw new HttpException($response->getStatusCode());
        } elseif(empty($data)) {
            throw new HttpException(404, "Medication not found");
        }

        return new Medication($data);
    }

    public function all(): MedicationList
    {
        return $this->resetFilters()->page(1)->search();
    }

    public function resetFilters(): CimaClientInterface
    {
        $this->query = [];
        return $this;
    }

    public function search(): MedicationList
    {
        $query = $this->buildQuery();

        $response = $this->client->get(self::BASE_URL . "/medicamentos?$query");
        $data = json_decode($response->getBody()->getContents(), true);

        if($response->getStatusCode() !== 200) {
            throw new HttpException($response->getStatusCode());
        } elseif(empty($data)) {
            throw new HttpException(404, "Page not found");
        }

        return new MedicationList($data);
    }

    private function buildQuery(): string
    {
        return http_build_query($this->query);
    }

    public function page(int $page): CimaClientInterface
    {
        $this->query['pagina'] = $page;
        return $this;
    }

    public function filterByName(string $name): CimaClientInterface
    {
        $this->query['nombre'] = $name;
        return $this;
    }

    public function filterByLaboratory(string $laboratory): CimaClientInterface
    {
        $this->query['laboratorio'] = $laboratory;
        return $this;
    }

    public function filterByActiveIngredient1(string $activeIngredient1): CimaClientInterface
    {
        $this->query['practiv1'] = $activeIngredient1;
        return $this;
    }

    public function filterByActiveIngredient2(string $activeIngredient2): CimaClientInterface
    {
        $this->query['practiv2'] = $activeIngredient2;
        return $this;
    }

    public function filterByActiveIngredientId1(string $activeIngredientId1): CimaClientInterface
    {
        $this->query['idpractiv1'] = $activeIngredientId1;
        return $this;
    }

    public function filterByActiveIngredientId2(string $activeIngredientId2): CimaClientInterface
    {
        $this->query['idpractiv2'] = $activeIngredientId2;
        return $this;
    }

    public function filterByNationalCode(string $nationalCode): CimaClientInterface
    {
        $this->query['cn'] = $nationalCode;
        return $this;
    }

    public function filterByAtcCode(string $atcCode): CimaClientInterface
    {
        $this->query['atc'] = $atcCode;
        return $this;
    }

    public function filterByRegistrationNumber(string $registrationNumber): CimaClientInterface
    {
        $this->query['nregistro'] = $registrationNumber;
        return $this;
    }

    public function filterByActiveIngredientCount(int $count): CimaClientInterface
    {
        $this->query['npactiv'] = $count;
        return $this;
    }

    public function filterByTriangle(bool $hasTriangle): CimaClientInterface
    {
        $this->query['triangulo'] = $hasTriangle ? 1 : 0;
        return $this;
    }

    public function filterByOrphan(bool $isOrphan): CimaClientInterface
    {
        $this->query['huerfano'] = $isOrphan ? 1 : 0;
        return $this;
    }

    public function filterByBiosimilar(bool $isBiosimilar): CimaClientInterface
    {
        $this->query['biosimilar'] = $isBiosimilar ? 1 : 0;
        return $this;
    }

    public function filterByRegulationType(int $regulationType): CimaClientInterface
    {
        $this->query['sust'] = $regulationType;
        return $this;
    }

    public function filterByVmpId(string $vmpId): CimaClientInterface
    {
        $this->query['vmp'] = $vmpId;
        return $this;
    }

    public function filterByCommercialized(bool $isCommercialized): CimaClientInterface
    {
        $this->query['comerc'] = $isCommercialized ? 1 : 0;
        return $this;
    }

    public function filterByAuthorized(bool $isAuthorized): CimaClientInterface
    {
        $this->query['autorizados'] = $isAuthorized ? 1 : 0;
        return $this;
    }

    public function filterByPrescription(bool $requiresPrescription): CimaClientInterface
    {
        $this->query['receta'] = $requiresPrescription ? 1 : 0;
        return $this;
    }
}
