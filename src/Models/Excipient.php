<?php

namespace Bluesourcery\Cima\Models;

class Excipient
{
    private int $id;
    private string $name;
    private string $amount;
    private string $unit;
    private int $order;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->name = $data['nombre'];
        $this->amount = $data['cantidad'];
        $this->unit = $data['unidad'];
        $this->order = $data['orden'];
    }

    public function getId(): int
    {
        return $this->id;
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
}
