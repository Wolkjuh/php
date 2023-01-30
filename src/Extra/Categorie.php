<?php declare(strict_types=1);

namespace Examen\Extra;

use PDO;
use PDOException;

require_once '../../includes/database/config.php';

if (!defined('ABSPATH')) {
    header("Location: ../../");
}

class Categorie
{
    public string $naam;
    private array $categories = [];

    public function __construct(string $naam)
    {
        $this->naam = $naam;
    }

    public function createCategorie(string $naam) : bool
    {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=examen_realisatie", "root", "");
            $stmt = $conn->prepare("INSERT INTO categories (name) VALUES (:naam)");
            $stmt->bindParam(':naam', $naam);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function changeCategorie(int $id, string $naam) : bool
    {
        $conn = new PDO("mysql:host=localhost;dbname=examen_realisatie", "root", "");
        $stmt = $conn->prepare("UPDATE categorieen SET naam = :naam WHERE id = :id");
        $stmt->bindParam(":naam", $naam, PDO::PARAM_INT);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteCategorie(int $id) : bool
    {
        $conn = new PDO("mysql:host=localhost;dbname=examen_realisatie", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("DELETE FROM categorieen WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getCategorieen() : array
    {
        $conn = new PDO("mysql:host=localhost;dbname=examen_realisatie", "root", "");
        $stmt = $conn->prepare("SELECT * FROM categorieen");
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }

    public function getCategorie(int $id) : Categorie
    {
        $conn = new PDO("mysql:host=localhost;dbname=examen_realisatie", "root", "");
        $stmt = $conn->prepare('SELECT * FROM categories WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return new Categorie($result);
    }
}