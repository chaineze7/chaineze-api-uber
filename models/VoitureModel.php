<?php

class VoitureModel
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

    public function getDBAllVoitures()
    {
        $stmt = $this->pdo->query("SELECT * FROM Voiture");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDBVoitureById ($idVoiture)
    {
        $req = "
            SELECT * FROM Voiture
            WHERE voiture_id = :idVoiture
        ";
        $stmt = $this->pdo->prepare($req);
        $stmt->bindValue(":idVoiture", $idVoiture, PDO::PARAM_INT);
        $stmt->execute();
        $voiture = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $voiture;
    }
}
// $VoitureModel = new VoitureModel();
// print_r($VoitureModel->getDBAllVoitures());