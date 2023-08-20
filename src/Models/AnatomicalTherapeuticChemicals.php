<?php

namespace Bluesourcery\Cima\Models;

class AnatomicalTherapeuticChemicals
{
    private string $code;
    private string $name;
    private int $level;

    public function __construct(array $data)
    {
        $this->code = $data['codigo'];
        $this->name = $data['nombre'];
        $this->level = $data['nivel'];
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function toArray(): array
    {
        return [
            'codigo' => $this->getCode(),
            'nombre' => $this->getName(),
            'nivel' => $this->getLevel(),
        ];
    }
}
