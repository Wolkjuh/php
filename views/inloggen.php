<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kapsalon</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
</head>
<body>
    <header>
        <nav>
            <div class="sidenav">
                <a href="index.php">Home</a>
                <a href="#">Contact</a>
                <a href="#">Webshop</a>
                <a href="inloggen.php">Inloggen</a>
            </div>
        </nav>
    </header>
    <main id="main">
        <form class="form-style-8" method="post" action="../includes/auth/inloggen.inc.php">
            <input type="text" name="gebruikersnaam" placeholder="Gebruikersnaam" />
            <input type="password" name="wachtwoord" placeholder="Wachtwoord" />
            <button name="submit">Registreer</button>
        </form>
    </main>
</body>
</html>