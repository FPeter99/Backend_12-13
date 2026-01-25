<?php
declare(strict_types=1);

namespace Acme;

class Auto extends Gepjarmu
{
    protected int $ajtok;

    public function __construct(string $gyarto, string $tipus, string $szin, string $motor, int $ajtok)
    {
        parent::__construct($gyarto, $tipus, $szin, $motor);
        $this->ajtok = $ajtok;
    }

    public function getAjtok(): int { return $this->ajtok; }

    public function __toString(): string
    {
        return "\"{$this->gyarto}\",\"{$this->tipus}\",\"{$this->szin}\",\"{$this->motor}\",{$this->ajtok}";
    }
}
