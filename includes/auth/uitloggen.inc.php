<?php declare(strict_types=1);

include "../../src/models/User.php" ;

$user = new User();

$user->uitloggen();

header("Location: ../../views/index.php");