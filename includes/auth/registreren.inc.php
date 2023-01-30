<?php declare(strict_types=1);

include "../../src/models/User.php" ;

if(isset($_POST['submit']))
{
    $voornaam = $_POST['voornaam'];
    $tussenvoegsel = $_POST['tussenvoegsel'];
    $achternaam = $_POST['achternaam'];
    $gebruikersnaam = $_POST['gebruikersnaam'];
    $wachtwoord = $_POST['wachtwoord'];
    $email = $_POST['email'];
    $telnr = $_POST['telnr'];



    if($user->createUser($gebruikersnaam, $wachtwoord, $voornaam, $tussenvoegsel, $achternaam, $email, $telnr, 1) === true)
    {
        header("Location: ../../views/index.php");
    }
    else
    {
        header("Location: ../../views/inloggen.php?error='incorrect_password'");
    }
}


