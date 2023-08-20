<?php

namespace Bluesourcery\Cima\Domain\Repository;

use Bluesourcery\Cima\Domain\Model\Medication;
use Bluesourcery\Cima\Domain\Model\MedicationList;

interface CimaRepositoryInterface
{
    public function find($id): Medication;
    public function all(): MedicationList;
}