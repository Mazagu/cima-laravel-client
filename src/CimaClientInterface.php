<?php

namespace Bluesourcery\Cima;

use Bluesourcery\Cima\Models\Medication;
use Bluesourcery\Cima\Models\MedicationList;

interface CimaClientInterface
{
    public function find($id): Medication;
    public function all(): MedicationList;
    public function search(): MedicationList;
    public function page(int $page): CimaClientInterface;
    public function filterByName(string $name): CimaClientInterface;
    public function filterByLaboratory(string $laboratory): CimaClientInterface;
    public function filterByActiveIngredient1(string $activeIngredient1): CimaClientInterface;
    public function filterByActiveIngredient2(string $activeIngredient2): CimaClientInterface;
    public function filterByActiveIngredientId1(string $activeIngredientId1): CimaClientInterface;
    public function filterByActiveIngredientId2(string $activeIngredientId2): CimaClientInterface;
    public function filterByNationalCode(string $nationalCode): CimaClientInterface;
    public function filterByAtcCode(string $atcCode): CimaClientInterface;
    public function filterByRegistrationNumber(string $registrationNumber): CimaClientInterface;
    public function filterByActiveIngredientCount(int $count): CimaClientInterface;
    public function filterByTriangle(bool $hasTriangle): CimaClientInterface;
    public function filterByOrphan(bool $isOrphan): CimaClientInterface;
    public function filterByBiosimilar(bool $isBiosimilar): CimaClientInterface;
    public function filterByRegulationType(int $regulationType): CimaClientInterface;
    public function filterByVmpId(string $vmpId): CimaClientInterface;
    public function filterByCommercialized(bool $isCommercialized): CimaClientInterface;
    public function filterByAuthorized(bool $isAuthorized): CimaClientInterface;
    public function filterByPrescription(bool $requiresPrescription): CimaClientInterface;
    public function resetFilters(): CimaClientInterface;
}
