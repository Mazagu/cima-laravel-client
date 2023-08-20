<?php

namespace Bluesourcery\Cima\Models;

class Photo
{
    private string $type;
    private string $url;
    private int $timestamp;

    public function __construct(array $data)
    {
        $this->type = $data['tipo'];
        $this->url = $data['url'];
        $this->timestamp = $data['fecha'];
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    /**
     * @return string The date in the format DD/MM/YYYY
     */
    public function getFormattedDate(): string
    {
        return date('d/m/Y', $this->timestamp / 1000);
    }

    public function toArray(): array
    {
        return [
            'tipo' => $this->getType(),
            'url' => $this->getUrl(),
            'fecha' => $this->getTimestamp(),
        ];
    }
}
