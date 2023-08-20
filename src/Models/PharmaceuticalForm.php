<?php

namespace Bluesourcery\Cima\Models;

class PharmaceuticalForm
{
    private int $id;
    private string $nombre;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->nombre = $data['nombre'];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->nombre;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'nombre' => $this->getName(),
        ];
    }
}
