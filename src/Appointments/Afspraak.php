<?php declare(strict_types=1);

if (!defined('ABSPATH')) {
    header("Location: ../../");
}

class Afspraak
{
    public int $medewerker;
    public int $klant;
    public array $behandelingen = [];
    public $tijdstip;
    public $datum;

    public function afspraakMaken(int $medewerker, int $klant, $tijdstip, $datum, array $behandelingen = []) : bool
    {
        return true;
    }

    public function afspraakAanpassen(int $id) : bool
    {
        return true;
    }

    public function afspraakVerwijderen(int $id) : bool
    {
        return true;
    }

    public function getAfspraken() : array
    {
        return [];
    }

    public function getAfspraak(int $id) : Afspraak
    {
        return new Afspraak;
    }

    public function filterAfspraken() : array
    {
        return [];
    }
}