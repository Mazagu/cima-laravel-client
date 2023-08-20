<?php

namespace Bluesourcery\Cima\Domain\Model;


class Medication
{
    public $nregistro;
    public $nombre;
    public $pactivos;
    public $labtitular;
    public $cpresc;
    public $estado;
    public $comerc;
    public $receta;
    public $generico;
    public $conduc;
    public $triangulo;
    public $huerfano;
    public $biosimilar;
    public $nosustituible;
    public $psum;
    public $notas;
    public $materialesInf;
    public $ema;
    public $docs;
    public $fotos;
    public $atcs;
    public $principiosActivos;
    public $excipientes;
    public $viasAdministracion;
    public $presentaciones;
    public $formaFarmaceutica;
    public $formaFarmaceuticaSimplificada;
    public $vtm;
    public $dosis;

    public function __construct(array $data)
    {
        $this->nregistro = $data['nregistro'];
        $this->nombre = $data['nombre'];
        $this->pactivos = $data['pactivos']??[];
        $this->labtitular = $data['labtitular'];
        $this->cpresc = $data['cpresc'];
        $this->estado = $data['estado'];
        $this->comerc = $data['comerc'];
        $this->receta = $data['receta'];
        $this->generico = $data['generico'];
        $this->conduc = $data['conduc'];
        $this->triangulo = $data['triangulo'];
        $this->huerfano = $data['huerfano'];
        $this->biosimilar = $data['biosimilar'];
        $this->nosustituible = $data['nosustituible'];
        $this->psum = $data['psum'];
        $this->notas = $data['notas'];
        $this->materialesInf = $data['materialesInf'];
        $this->ema = $data['ema'];
        $this->docs = $data['docs'];
        $this->fotos = $data['fotos'];
        $this->atcs = $data['atcs']??[];
        $this->principiosActivos = $data['principiosActivos']??[];
        $this->excipientes = $data['excipientes']??[];
        $this->viasAdministracion = $data['viasAdministracion'];
        $this->presentaciones = $data['presentaciones']??[];
        $this->formaFarmaceutica = $data['formaFarmaceutica'];
        $this->formaFarmaceuticaSimplificada = $data['formaFarmaceuticaSimplificada'];
        $this->vtm = $data['vtm'];
        $this->dosis = $data['dosis'];
    }
}