<?php

namespace Bluesourcery\Cima;

use Bluesourcery\Cima\Models\Medication;
use Bluesourcery\Cima\Models\MedicationList;

interface CimaClientInterface
{
    public function find($id): Medication;
    public function all(): MedicationList;
}