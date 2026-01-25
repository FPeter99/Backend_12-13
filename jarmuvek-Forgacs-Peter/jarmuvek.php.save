<?php
declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use Acme\Auto;
use Acme\Busz;
use Acme\Roller;

$argv = $_SERVER['argv'];
array_shift($argv);

if (count($argv) > 2) {
    echo "Túl sok paraméter! Maximum 2 paraméter megengedett.\n";
    exit(1);
}

$vehicleType = $argv[0] ?? null;
$outputFile = $argv[1] ?? null;

if ($outputFile && pathinfo($outputFile, PATHINFO_EXTENSION) !== 'csv') {
    echo "Csak CSV kiterjesztés engedélyezett!\n";
    exit(1);
}

$vehicles = [
    new Busz("Ikarus", "280", "kék", "diesel", 36),
    new Auto("Tesla", "Model S", "fehér", "elektromos", 5),
    new Roller("Oxelo", "C900", "fekete", 2),
    new Roller("Blackwheels", "Blink gyerek roller", "színes", 3),
];

if (!$vehicleType) {
    foreach ($vehicles as $v) {
        echo "{$v->getGyarto()}, {$v->getTipus()}, {$v->getSzin()}\n";
    }
} else {
    $vehicleType = strtolower($vehicleType);
    $filtered = array_filter($vehicles, function($v) use ($vehicleType) {
        return strtolower((new \ReflectionClass($v))->getShortName()) === $vehicleType;
    });

    if (empty($filtered)) {
        echo "Helytelen járműtípus: {$vehicleType}\n";
        exit(1);
    }

    if (!$outputFile) {
        foreach ($filtered as $v) {
            echo $v . "\n";
        }
    } else {
        $outPath = __DIR__ . '/out/' . $outputFile;
        $fp = fopen($outPath, 'w');
        foreach ($filtered as $v) {
            fputcsv($fp, explode(",", str_replace('"', '', $v->__toString())));
        }
        fclose($fp);
        echo "Adatok kiírva: $outPath\n";
    }
}
