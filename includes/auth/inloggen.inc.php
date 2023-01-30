<?php declare(strict_types=1);

include "../../src/models/User.php" ;

$username = $_POST['gebruikersnaam'];
$password = $_POST['wachtwoord'];

$user = new User();

if($user->inloggen($username, $password) === true)
{
    header("Location: ../../views/index.php");
}
else
{
    header("Location: ../../views/inloggen.php?error='incorrect_password'");
}