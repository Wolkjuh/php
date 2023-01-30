<?php declare(strict_types=1);

if (!defined('ABSPATH')) {
    header("Location: ../../");
}

class Product
{
    public string $naam;
    public string $afbeelding;
    public string $toelichting;
    public float $prijs;
    public float $korting;
    public int $categorie;
    public int $aantal;

    public function productToevoegen(string $naam, string $afbeelding, string $toelichting, float $prijs, int $categorie) : bool
    {
        $conn = new PDO("mysql:host=localhost;dbname=examen_realisatie", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $stmt = $conn->prepare("INSERT INTO users (naam, afbeelding, toelichting, prijs, korting, categorieenid) VALUES (:naam, :afbeelding, :toelichting, :prijs, :korting, :categorieenid)");
        $stmt->bindParam(':naam', $naam);
        $stmt->bindParam(':afbeelding', $afbeelding);
        $stmt->bindParam(':toelichting', $toelichting);
        $stmt->bindParam(':prijs', $prijs);
        $stmt->bindParam(':korting', $korting);
        $stmt->bindParam(':categorieenid', $categorie);
    
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function productAanpassen(int $id) : bool
    {
        return true;
    }

    public function productVerwijderen(int $id) : bool
    {
        $conn = new PDO("mysql:host=localhost;dbname=examen_realisatie", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("DELETE FROM producten WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function getProducts() : array
    {
        $conn = new PDO("mysql:host=localhost;dbname=examen_realisatie", "root", "");
        $stmt = $conn->prepare("SELECT * FROM producten");
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    public function getProduct(int $id) : Product
    {
        $conn = new PDO("mysql:host=localhost;dbname=examen_realisatie", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM producten WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        $productData = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Product($productData);
    }

    public function getAanbiedingen() : array
    {
        return [];
    }

    public function abonnementUitprinten() : Product
    {
        return new Product;
    }

}