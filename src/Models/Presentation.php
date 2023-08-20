<?php

namespace Bluesourcery\Cima\Models;

class Presentation
{
    private string $cn;
    private string $name;
    private Status $status;
    private bool $comercialized;
    private bool $psum;

    public function __construct(array $data)
    {
        $this->cn = $data['cn'];
        $this->name = $data['nombre'];
        $this->status = new Status($data['estado']);
        $this->comercialized = $data['comerc'];
        $this->psum = $data['psum'];
    }

    public function getCn(): string
    {
        return $this->cn;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function isComercialized(): bool
    {
        return $this->comercialized;
    }

    public function isPsum(): bool
    {
        return $this->psum;
    }

    public function toArray(): array
    {
        return [
            'cn' => $this->getCn(),
            'nombre' => $this->getName(),
            'estado' => $this->getStatus()->toArray(),
            'comerc' => $this->isComercialized(),
            'psum' => $this->isPsum(),
        ];
    }
}
