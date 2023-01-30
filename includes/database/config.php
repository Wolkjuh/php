<?php declare(strict_types=1);

if (!defined('ABSPATH')) {
    header("Location: ../../");
}

$host = "localhost";
$username = "root";
$password = "";
$database = "examen_realisatie";

$conn = mysqli_connect($host, $username, $password, $database);

if(!$conn)
{
    die("Connectie is kapot");
}