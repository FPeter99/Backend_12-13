<?php
declare(strict_types=1);

namespace Acme;

class Roller extends Jarmu
{
    protected int $kerekekSzama;

    public function __construct(string $gyarto, string $tipus, string $szin, int $kerekekSzama)
    {
        parent::__construct($gyarto, $tipus, $szin);
        $this->kerekekSzama = $kerekekSzama;
    }

    public function getKerekekSzama(): int { return $this->kerekekSzama; }

    public function __toString(): string
    {
        return "\"{$this->gyarto}\",\"{$this->tipus}\",\"{$this->szin}\",{$this->kerekekSzama}";
    }
}
