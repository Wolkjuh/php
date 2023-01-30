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
                <?php
                if(isset($_SESSION['gebruikersnaam']))
                {
                    echo "<a href='../includes/auth/uitloggen.inc.php'>Uitloggen</a>";
                }
                else
                {
                    echo "<a href='inloggen.php'>Inloggen</a>";
                }
                ?>
            </div>
        </nav>
    </header>
    <main id="main">
        <?php
        if(isset($_SESSION['gebruikersnaam']))
        {
            if($_SESSION['gebruikersnaam'] === "Ja")
            {
                echo "Welkom terug!";
            }
        }
        ?>
    </main>
</body>
</html>