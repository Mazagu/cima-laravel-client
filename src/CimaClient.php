<?php

namespace Bluesourcery\Cima;

use Bluesourcery\Cima\Exceptions\HttpException;
use Bluesourcery\Cima\Models\Medication;
use Bluesourcery\Cima\Models\MedicationList;
use GuzzleHttp\Client;

class CimaClient implements CimaClientInterface
{
    const BASE_URL = 'https://cima.aemps.es/cima/rest';

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
        $response = $this->client->get(self::BASE_URL . "/medicamentos");
        $data = json_decode($response->getBody()->getContents(), true);
        
        if($response->getStatusCode() !== 200) {
            throw new HttpException($response->getStatusCode());
        } elseif(empty($data)) {
            throw new HttpException(404, "Page not found");
        }
        
        return new MedicationList($data);
    }
}
