<?php declare(strict_types=1);

if (!defined('ABSPATH')) {
    header("Location: ../../");
}

class Eigenaar extends User
{
    public function rolToewijzen(int $id, int $rol) : bool
    {
        $conn = new PDO("mysql:host=localhost;dbname=examen_realisatie", "root", "");
        $stmt = $conn->prepare("UPDATE users SET rollen_id = :rol WHERE id = :id");
        $stmt->bindParam(":rol", $rol, PDO::PARAM_INT);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function beschikbaarheidAangeven(int $id) : bool
    {
        return true;
    }

    public function beschikbaarhedenOphalendDag(string $dag) : array
    {
        return [];
    }
    
    public function beschikbaarheidOphalenUser(int $id) : array
    {
        $conn = new PDO("mysql:host=localhost;dbname=examen_realisatie", "root", "");
        $stmt = $conn->prepare('SELECT * FROM bezoekerfrequenties WHERE user_id = :id');
        $stmt->bindParam(':id', $id);

        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getBezoekFrequenties() : array
    {
        $conn = new PDO("mysql:host=localhost;dbname=examen_realisatie", "root", "");
        $stmt = $conn->prepare("SELECT * FROM bezoekfrequenties");
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
}