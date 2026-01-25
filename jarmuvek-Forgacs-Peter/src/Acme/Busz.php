<?php
declare(strict_types=1);

namespace Acme;

class Busz extends Gepjarmu
{
    protected int $ulesek;

    public function __construct(string $gyarto, string $tipus, string $szin, string $motor, int $ulesek)
    {
        parent::__construct($gyarto, $tipus, $szin, $motor);
        $this->ulesek = $ulesek;
    }

    public function getUlesek(): int { return $this->ulesek; }

    public function __toString(): string
    {
        return "\"{$this->gyarto}\",\"{$this->tipus}\",\"{$this->szin}\",\"{$this->motor}\",{$this->ulesek}";
    }
}
