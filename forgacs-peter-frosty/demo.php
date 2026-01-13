<?php
declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/IceCream.php';

use Faker\Factory;
$faker = Factory::create('hu_HU');


if ($argc < 2) {
    echo "Legalább 1 paraméter megadása szükséges!\n";
    exit(7);
}


$elso = $argv[1];
if (!is_numeric($elso) || (int)$elso < 1) {
    echo "Nem megfelelő paraméter!\n";
    echo "Az első paraméternek 0-nál nagyobb számnak kell lennie!\n";
    exit(17);
}

$number = (int)$elso;



$icecreams = [];


for ($i = 0; $i < $number; $i++) {
    $scoops = $faker->numberBetween(1, 5);
    $sweetCone = $faker->boolean();
    $flavours = [];


    $availableFlavours = ['vanilla', 'strawberry', 'chocolate', 'coconut'];
    for ($j = 0; $j < $scoops; $j++) {
        $flavours[] = $faker->randomElement($availableFlavours);
    }

    $icecream = new IceCream($scoops, $flavours, $sweetCone);
    $icecreams[] = $icecream;
}


foreach ($icecreams as $egyik) {
    echo $egyik . "\n";
}

//10%
foreach ($icecreams as $egyik) {
    $eddigi_ár = $egyik->get('price');
    $uj_ár = (int) round($eddigi_ár * 0.9);
    $egyik->setPrice($uj_ár);
}

// CSV out mappában
$outDir = __DIR__ . '/out';

$csvFile = $outDir . '/sale.csv';
$f = fopen($csvFile, 'w');

foreach ($icecreams as $egyik) {
    $arr = $egyik->toArray();

    $sor = $arr[0] . ';' . $arr[3] . ';' . '"' . $arr[2] . '";' . '"' . $arr[1] . '"';
    fwrite($f, $sor . "\n");
}

fclose($f);


?>