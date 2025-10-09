<?php

class ChauffeurModel
{
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=bruno_uber;charset=utf8", "root", "");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public function getDBAllChauffeurs()
    {
        $stmt = $this->pdo->query("SELECT * FROM Chauffeur");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDBChauffeurById ($idChauffeur) {
        return "Données de la BD du chauffeur : " . $idChauffeur;
    }
}

// $ChauffeurModel = new ChauffeurModel();
// print_r($ChauffeurModel->getDBAllChauffeurs());