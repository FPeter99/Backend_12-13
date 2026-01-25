<?php
declare(strict_types=1);

namespace Acme;

abstract class Gepjarmu extends Jarmu
{
    protected string $motor;

    protected function __construct(string $gyarto, string $tipus, string $szin, string $motor)
    {
        parent::__construct($gyarto, $tipus, $szin);
        $this->motor = $motor;
    }

    public function getMotor(): string { return $this->motor; }
}
