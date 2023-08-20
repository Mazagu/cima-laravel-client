<?php

namespace Bluesourcery\Cima\Models;

class Status
{
    private string $value;
    private int $date;

    public function __construct(array $data)
    {
        $this->value = key($data); // Assuming the key is the status like "aut", "susp", or "rev"
        $this->date = $data[$this->value];
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @return string The status in English
     */
    public function getStatus(): string
    {
        $statusMap = [
            'aut' => 'Authorized',
            'susp' => 'Suspended',
            'rev' => 'Revoked',
        ];

        return $statusMap[$this->value] ?? 'Unknown';
    }

    /**
     * @return string The date in the format DD/MM/YYYY
     */
    public function getFormattedDate(): string
    {
        return date('d/m/Y', $this->date);
    }

    public function toArray(): array
    {
        return [
            'value' => $this->getValue(),
            'date' => $this->getDate(),
        ];
    }
}
