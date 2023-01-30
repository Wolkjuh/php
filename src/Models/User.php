<?php declare(strict_types=1);

if (!defined('ABSPATH')) {
    header("Location: ../../");
}

class User
{
    private string $password;
    public string $username;
    public string $voornaam;
    public string $tussenvoegsel;
    public string $achternaam;
    public string $email;
    public string $telnr;
    public int $rol;

    public function inloggen(string $username, string $password)
    {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=examen_realisatie", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $conn->prepare("SELECT wachtwoord FROM users WHERE gebruikersnaam = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (password_verify($password, $result['wachtwoord'])) {
                session_start();
                $_SESSION['gebruikersnaam'] = "Ja";
                return true;
            } else {
                return false;
            }
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function uitloggen() : void
    {
        session_start();
        session_unset();
        session_destroy();
    }

    public function getUsers() : array
    {
        $conn = new PDO("mysql:host=localhost;dbname=examen_realisatie", "root", "");
        $stmt = $conn->prepare("SELECT * FROM users");
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    public function getUserById(int $id) : User
    {
        $conn = new PDO("mysql:host=localhost;dbname=examen_realisatie", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        return new User($userData);
    }

    public function getUserByUsername(string $gebruikersnaam) : User
    {
        $conn = new PDO("mysql:host=localhost;dbname=examen_realisatie", "root", "");
        $stmt = $conn->prepare("SELECT * FROM users WHERE gebruikersnaam = :gebruikersnaam");
        $stmt->execute([':gebruikersnaam' => $gebruikersnaam]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return new User($user);
    }

    public function deleteUser(string $gebruikersnaam) : bool
    {
        $conn = new PDO("mysql:host=localhost;dbname=examen_realisatie", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("DELETE FROM users WHERE username = :gebruikersnaam");
        $stmt->bindParam(':gebruikersnaam', $gebruikersnaam, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function changeUser(string $gebruikersnaam) : bool
    {
        return true;
    }

    public function createUser(string $gebruikersnaam, string $password, string $voornaam, $tussenvoegsel, string $achternaam, string $email, string $telnr, int $rol) : bool
    {
        if($tussenvoegsel === null)
        {
            $tussenvoegsel = " ";
        }

        $conn = new PDO("mysql:host=localhost;dbname=examen_realisatie", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $stmt = $conn->prepare("INSERT INTO users (gebruikersnaam, voornaam, tussenvoegsel, wachtwoord, achternaam, email, telnr, rollen_id) VALUES (:gebruikersnaam, :voornaam, :tussenvoegsel, :wachtwoord, :achternaam, :email, :telnr, :rollen_id)");
        $stmt->bindParam(':gebruikersnaam', $gebruikersnaam);
        $stmt->bindParam(':voornaam', $voornaam);
        $stmt->bindParam(':tussenvoegsel', $tussenvoegsel);
        $stmt->bindParam(':achternaam', $achternaam);
        $stmt->bindParam(':wachtwoord', password_hash($password, PASSWORD_DEFAULT));
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telnr', $telnr);
        $stmt->bindParam(':rollen_id', $rol);
    
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    private function registreerBezoekFrequentie(int $bezoek) : void
    {
        return;
    }
}