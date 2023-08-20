<?php 

namespace Bluesourcery\Cima\Domain\Model;

use Illuminate\Support\Collection;

class MedicationList
{
    public int $totalRows;
    public int $currentPage;
    public int $pageSize;
    public Collection $medications;

    public function __construct(array $data)
    {
        $this->totalRows = $data['totalFilas'];
        $this->currentPage = $data['pagina'];
        $this->pageSize = $data['tamanioPagina'];
        
        $medicationData = $data['resultados'] ?? [];
        $this->medications = $this->mapMedications($medicationData);
    }

    protected function mapMedications(array $medicationData)
    {
        $medications = new Collection();

        foreach ($medicationData as $medicationItem) {
            $medications->push(new Medication($medicationItem));
        }

        return $medications;
    }
}
