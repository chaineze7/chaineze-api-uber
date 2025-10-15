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

    public function getDBChauffeurById ($idChauffeur)
    {
        $req = "
            SELECT * FROM Chauffeur
            WHERE chauffeur_id = :idChauffeur
        ";
        $stmt = $this->pdo->prepare($req);
        $stmt->bindValue(":idChauffeur", $idChauffeur, PDO::PARAM_INT);
        $stmt->execute();
        $chauffeur = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $chauffeur;
    }

    public function createDBChauffeur($data) {
        $req = "INSERT INTO chauffeur (chauffeur_id,chauffeur_nom, chauffeur_telephone)
            VALUES (:chauffeur_id, :chauffeur_nom, :chauffeur_telephone)";
        $stmt = $this->pdo->prepare($req);

        $stmt->bindParam(":chauffeur_id", $data['chauffeur_id'], PDO::PARAM_INT);
        $stmt->bindParam(":chauffeur_nom", $data['chauffeur_nom'], PDO::PARAM_STR);
        $stmt->bindParam(":chauffeur_telephone", $data['chauffeur_telephone'], PDO::PARAM_INT);

        $stmt->execute();

        $chauffeur = $this->getDBChauffeurById($data['chauffeur_id']);



        return $chauffeur;
    }
}

// $ChauffeurModel = new ChauffeurModel();
// print_r($ChauffeurModel->getDBAllChauffeurs());