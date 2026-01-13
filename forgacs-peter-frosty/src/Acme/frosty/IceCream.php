<?php

namespace Acme\Frosty;

class IceCream implements \Stringable
{
    private int $scoop;
    private int $price;
    private bool $sweetCone;
    private array $flavours = [];

    public static array $availableFlavours = [
        'vanilla',
        'strawberry',
        'chocolate',
        'coconut'
    ];

    public function __construct(int $scoop, bool $sweetCone, array $flavours)
    {
        $this->scoop = $scoop;
        $this->sweetCone = $sweetCone;
        $this->flavours = $flavours;
        $this->price = ($scoop * 400) + ($sweetCone ? 80 : 0);
    }

    public function __toString(): string
    {
        $flavoursUpper = array_map('strtoupper', $this->flavours);
        $flavourList = implode(', ', $flavoursUpper);

    if ($this->sweetCone) {
        $coneText = 'édes tölcsérben';
    } else {
        $coneText = 'normál tölcsérben';
    }

    return $this->scoop . ' gombócos fagylalt [' . $flavourList . '] ízekkel ' . $coneText . ' (' . $this->price . ' Ft)';
    }

    public function toArray(): array
    {
        return [
            $this->scoop,
            implode(', ', $this->flavours),
            $this->sweetCone ? 'édes' : 'normál',
            $this->price
        ];
    }



    public function get(string $name): mixed
    {
        return property_exists($this, $name) ? $this->$name : null;
    }

    public static function availableFlavours(): array
    {
        return self::$availableFlavours;
    }


    //ez azért kell mert a price property private és nekünk később10%-al csökkenteni kell
    public function setPrice(int $newPrice): void
    {
        $this->price = $newPrice;
    }
}

?>