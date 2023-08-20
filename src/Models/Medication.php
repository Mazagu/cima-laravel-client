<?php

namespace Bluesourcery\Cima\Models;

use Illuminate\Database\Eloquent\Collection;

class Medication
{
    public int $nregistro;
    public string $nombre;
    public string $pactivos;
    public string $labtitular;
    public string $cpresc;
    public Status $estado;
    public bool $comerc;
    public bool $receta;
    public bool $generico;
    public bool $conduc;
    public bool $triangulo;
    public bool $huerfano;
    public bool $biosimilar;
    public NonSubstitutable $nosustituible;
    public bool $psum;
    public bool $notas;
    public bool $materialesInf;
    public bool $ema;
    public Collection $docs;
    public Collection $fotos;
    public Collection $atcs;
    public Collection $principiosActivos;
    public Collection $excipientes;
    public Collection $viasAdministracion;
    public Collection $presentaciones;
    public PharmaceuticalForm $formaFarmaceutica;
    public PharmaceuticalForm $formaFarmaceuticaSimplificada;
    public VirtualTherapeuticMolecule $vtm;
    public string $dosis;

    public function __construct(array $data)
    {
        $this->setRegistrationNumber($data['nregistro']);
        $this->setName($data['nombre']);
        $this->setActiveIngredients($data['pactivos'] ?? '');
        $this->setLaboratory($data['labtitular']);
        $this->setPrescription($data['cpresc']);
        $this->setStatus($data['estado']);
        $this->setCommercialized($data['comerc']);
        $this->setRequiresPrescription($data['receta']);
        $this->setGeneric($data['generico']);
        $this->setRequiresConduc($data['conduc']);
        $this->setHasTriangle($data['triangulo']);
        $this->setIsOrphan($data['huerfano']);
        $this->setIsBiosimilar($data['biosimilar']);
        $this->setNonSubstitutable($data['nosustituible']);
        $this->setIsPsum($data['psum']);
        $this->setHasNotes($data['notas']);
        $this->setHasInformationMaterials($data['materialesInf']);
        $this->setHasEmaApproval($data['ema']);
        $this->setDocuments($data['docs']);
        $this->setPhotos($data['fotos']);
        $this->setAtcs($data['atcs'] ?? []);
        $this->setActivePrinciples($data['principiosActivos'] ?? []);
        $this->setExcipients($data['excipientes'] ?? []);
        $this->setAdministrationRoutes($data['viasAdministracion']);
        $this->setPresentations($data['presentaciones'] ?? []);
        $this->setPharmaceuticalForm($data['formaFarmaceutica']);
        $this->setSimplifiedPharmaceuticalForm($data['formaFarmaceuticaSimplificada']);
        $this->setVtm($data['vtm']);
        $this->setDosage($data['dosis']);
    }

    public function getRegistrationNumber(): int
    {
        return $this->nregistro;
    }

    public function getName(): string
    {
        return $this->nombre;
    }

    public function getActiveIngredients(): string
    {
        return $this->pactivos;
    }

    public function getLaboratory(): string
    {
        return $this->labtitular;
    }

    public function getPrescription(): string
    {
        return $this->cpresc;
    }

    public function getStatus(): Status
    {
        return $this->estado;
    }

    public function isCommercialized(): bool
    {
        return $this->comerc;
    }

    public function requiresPrescription(): bool
    {
        return $this->receta;
    }

    public function isGeneric(): bool
    {
        return $this->generico;
    }

    public function requiresConduc(): bool
    {
        return $this->conduc;
    }

    public function hasTriangle(): bool
    {
        return $this->triangulo;
    }

    public function isOrphan(): bool
    {
        return $this->huerfano;
    }

    public function isBiosimilar(): bool
    {
        return $this->biosimilar;
    }

    public function getNonSubstitutable(): NonSubstitutable
    {
        return $this->nosustituible;
    }

    public function isPsum(): bool
    {
        return $this->psum;
    }

    public function hasNotes(): bool
    {
        return $this->notas;
    }

    public function hasInformationMaterials(): bool
    {
        return $this->materialesInf;
    }

    public function hasEmaApproval(): bool
    {
        return $this->ema;
    }

    public function getDocuments(): Collection
    {
        return $this->docs;
    }

    public function getPhotos(): Collection
    {
        return $this->fotos;
    }

    public function getAtcs(): Collection
    {
        return $this->atcs;
    }

    public function getActivePrinciples(): Collection
    {
        return $this->principiosActivos;
    }

    public function getExcipients(): Collection
    {
        return $this->excipientes;
    }

    public function getAdministrationRoutes(): Collection
    {
        return $this->viasAdministracion;
    }

    public function getPresentations(): Collection
    {
        return $this->presentaciones;
    }

    public function getPharmaceuticalForm(): PharmaceuticalForm
    {
        return $this->formaFarmaceutica;
    }

    public function getSimplifiedPharmaceuticalForm(): PharmaceuticalForm
    {
        return $this->formaFarmaceuticaSimplificada;
    }

    public function getVtm(): VirtualTherapeuticMolecule
    {
        return $this->vtm;
    }

    public function getDosage(): string
    {
        return $this->dosis;
    }

    public function setRegistrationNumber(int $nregistro): void
    {
        $this->nregistro = $nregistro;
    }

    public function setName(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function setActiveIngredients(string $pactivos): void
    {
        $this->pactivos = $pactivos;
    }

    public function setLaboratory(string $labtitular): void
    {
        $this->labtitular = $labtitular;
    }

    public function setPrescription(string $cpresc): void
    {
        $this->cpresc = $cpresc;
    }

    public function setStatus(array $estado): void
    {
        $this->estado = new Status($estado);
    }

    public function setCommercialized(bool $comerc): void
    {
        $this->comerc = $comerc;
    }

    public function setRequiresPrescription(bool $receta): void
    {
        $this->receta = $receta;
    }

    public function setGeneric(bool $generico): void
    {
        $this->generico = $generico;
    }

    public function setRequiresConduc(bool $conduc): void
    {
        $this->conduc = $conduc;
    }

    public function setHasTriangle(bool $triangulo): void
    {
        $this->triangulo = $triangulo;
    }

    public function setIsOrphan(bool $huerfano): void
    {
        $this->huerfano = $huerfano;
    }

    public function setIsBiosimilar(bool $biosimilar): void
    {
        $this->biosimilar = $biosimilar;
    }

    public function setNonSubstitutable(array $nosustituible): void
    {
        $this->nosustituible = new NonSubstitutable($nosustituible);
    }

    public function setIsPsum(bool $psum): void
    {
        $this->psum = $psum;
    }

    public function setHasNotes(bool $notas): void
    {
        $this->notas = $notas;
    }

    public function setHasInformationMaterials(bool $materialesInf): void
    {
        $this->materialesInf = $materialesInf;
    }

    public function setHasEmaApproval(bool $ema): void
    {
        $this->ema = $ema;
    }

    public function setDocuments(array $docs): void
    {
        if (!empty($docs)) {
            $docs = array_map(function ($doc) {
                return new Document($doc);
            }, $docs);
        }

        $this->docs = new Collection($docs); // @phpstan-ignore-line
    }

    public function setPhotos(array $fotos): void
    {
        if (!empty($fotos)) {
            $fotos = array_map(function ($foto) {
                return new Photo($foto);
            }, $fotos);
        }

        $this->fotos = new Collection($fotos); // @phpstan-ignore-line
    }

    public function setAtcs(array $atcs): void
    {
        if (!empty($atcs)) {
            $atcs = array_map(function ($atc) {
                return new AnatomicalTherapeuticChemicals($atc);
            }, $atcs);
        }

        $this->atcs = new Collection($atcs); // @phpstan-ignore-line
    }

    public function setActivePrinciples(array $principiosActivos): void
    {
        if (!empty($principiosActivos)) {
            $principiosActivos = array_map(function ($principioActivo) {
                return new ActivePrinciple($principioActivo);
            }, $principiosActivos);
        }

        $this->principiosActivos = new Collection($principiosActivos); // @phpstan-ignore-line
    }

    public function setExcipients(array $excipientes): void
    {
        if (!empty($excipientes)) {
            $excipientes = array_map(function ($excipiente) {
                return new Excipient($excipiente);
            }, $excipientes);
        }

        $this->excipientes = new Collection($excipientes); // @phpstan-ignore-line
    }

    public function setAdministrationRoutes(array $viasAdministracion): void
    {
        if (!empty($viasAdministracion)) {
            $viasAdministracion = array_map(function ($viaAdministracion) {
                return new AdministrationRoute($viaAdministracion);
            }, $viasAdministracion);
        }

        $this->viasAdministracion = new Collection($viasAdministracion); // @phpstan-ignore-line
    }

    public function setPresentations(array $presentaciones): void
    {
        if (!empty($presentaciones)) {
            $presentaciones = array_map(function ($presentacion) {
                return new Presentation($presentacion);
            }, $presentaciones);
        }

        $this->presentaciones = new Collection($presentaciones); // @phpstan-ignore-line
    }

    public function setPharmaceuticalForm(array $formaFarmaceutica): void
    {
        $this->formaFarmaceutica = new PharmaceuticalForm($formaFarmaceutica);
    }

    public function setSimplifiedPharmaceuticalForm(array $formaFarmaceuticaSimplificada): void
    {
        $this->formaFarmaceuticaSimplificada = new PharmaceuticalForm($formaFarmaceuticaSimplificada);
    }

    public function setVtm(array $vtm): void
    {
        $this->vtm = new VirtualTherapeuticMolecule($vtm);
    }

    public function setDosage(string $dosis): void
    {
        $this->dosis = $dosis;
    }

    public function toArray(): array
    {
        return [
            'nregistro' => $this->getRegistrationNumber(),
            'nombre' => $this->getName(),
            'pactivos' => $this->getActiveIngredients(),
            'labtitular' => $this->getLaboratory(),
            'cpresc' => $this->getPrescription(),
            'estado' => $this->getStatus()->toArray(),
            'comerc' => $this->isCommercialized(),
            'receta' => $this->requiresPrescription(),
            'generico' => $this->isGeneric(),
            'conduc' => $this->requiresConduc(),
            'triangulo' => $this->hasTriangle(),
            'huerfano' => $this->isOrphan(),
            'biosimilar' => $this->isBiosimilar(),
            'nosustituible' => $this->getNonSubstitutable()->toArray(),
            'psum' => $this->isPsum(),
            'notas' => $this->hasNotes(),
            'materialesInf' => $this->hasInformationMaterials(),
            'ema' => $this->hasEmaApproval(),
            'docs' => $this->getDocuments()->toArray(),
            'fotos' => $this->getPhotos()->toArray(),
            'atcs' => $this->getAtcs()->toArray(),
            'principiosActivos' => $this->getActivePrinciples()->toArray(),
            'excipientes' => $this->getExcipients()->toArray(),
            'viasAdministracion' => $this->getAdministrationRoutes()->toArray(),
            'presentaciones' => $this->getPresentations()->toArray(),
            'formaFarmaceutica' => $this->getPharmaceuticalForm()->toArray(),
            'formaFarmaceuticaSimplificada' => $this->getSimplifiedPharmaceuticalForm()->toArray(),
            'vtm' => $this->getVtm()->toArray(),
            'dosis' => $this->getDosage(),
        ];
    }
}
