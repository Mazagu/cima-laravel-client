<?php

namespace Bluesourcery\Cima\Models;

class ActivePrinciple
{
    private int $id;
    private string $code;
    private string $name;
    private string $amount;
    private string $unit;
    private int $order;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->code = $data['codigo'];
        $this->name = $data['nombre'];
        $this->amount = $data['cantidad'];
        $this->unit = $data['unidad'];
        $this->order = $data['orden'];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }

    public function getUnit(): string
    {
        return $this->unit;
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'codigo' => $this->getCode(),
            'nombre' => $this->getName(),
            'cantidad' => $this->getAmount(),
            'unidad' => $this->getUnit(),
            'orden' => $this->getOrder(),
        ];
    }
}
