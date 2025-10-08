<?php

class TrajetModel
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

    public function getDBAllTrajets()
    {
        $stmt = $this->pdo->query("SELECT * FROM Trajet");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
//$TrajetModel = new TrajetModel();
//print_r($TrajetModel->getDBAllTrajets());