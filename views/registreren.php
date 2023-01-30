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
        <form class="form-style-8" method="post" action="../includes/auth/registreren.inc.php">
            <input type="text" name="voornaam" placeholder="Voornaam" />
            <input type="text" name="tussenvoegsel" placeholder="Tussenvoegsel" />
            <input type="text" name="achternaam" placeholder="Achternaam" />
            <input type="text" name="gebruikersnaam" placeholder="gebruikersnaam" />
            <input type="password" name="wachtwoord" placeholder="wachtwoord" />
            <input type="text" name="email" placeholder="Email" />
            <input type="text" name="telnr" placeholder="Telnr" />
            <button name="submit">Inloggen</button>
        </form>
    </main>
</body>
</html>