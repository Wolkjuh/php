<?php declare(strict_types=1);

if (!defined('ABSPATH')) {
    header("Location: ../../");
}

class Behandeling
{
    public string $naam;
    public string $omschrijving;
    public int $tijdsblok;
    public float $prijs;

    public function createBehandeling(string $naam, string $omschrijving, int $tijdsblok, float $prijs) : bool
    {
        return true;
    }

    public function changeBehandeling(int $id) : bool
    {
        return true;
    }

    public function deleteBehandeling(int $id) : bool
    {
        return true;
    }

    public function getBehandelingen() : array
    {
        return [];
    }

    public function getBehandeling(int $id) : Behandeling
    {
        return new Behandeling;
    }
}