<?php declare(strict_types=1);

if (!defined('ABSPATH')) {
    header("Location: ../../");
}

class Winkelwagen
{
    public array $producten = [];

    public function productToevoegenWinkelwagen(object $product) : void
    {
        return;
    }

    public function productVerwijderenWinkelwagen(object $product) : void
    {
        return;
    }

    public function bestellen() : bool
    {
        return true;
    }
}