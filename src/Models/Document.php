<?php

namespace Bluesourcery\Cima\Models;

class Document
{
    private int $type;
    private string $url;
    private string $htmlUrl;
    private bool $hasSection;
    private int $timestamp;

    public function __construct(array $data)
    {
        $this->type = $data['tipo'];
        $this->url = $data['url'] ?? '';
        $this->htmlUrl = $data['urlHtml'] ?? '';
        $this->hasSection = $data['secc'];
        $this->timestamp = $data['fecha'] ?? 0;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getHtmlUrl(): string
    {
        return $this->htmlUrl;
    }

    public function hasSection(): bool
    {
        return $this->hasSection;
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
            'urlHtml' => $this->getHtmlUrl(),
            'secc' => $this->hasSection(),
            'fecha' => $this->getTimestamp(),
        ];
    }
}
