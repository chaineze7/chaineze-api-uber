<?php

require_once "models/ChauffeurModel.php";

class ChauffeurController
{
    private $model;

    public function __construct()
    {
        $this->model = new ChauffeurModel();
    }

    public function getAllChauffeurs()
    {
        $chauffeurs = $this->model->getDBAllChauffeurs();
        echo json_encode($chauffeurs);
    }

    public function getChauffeurById ($idChauffeur) {
        $lignesChauffeur = $this->model->getDBChauffeurById($idChauffeur);
        echo $lignesChauffeur;
    }
}
//$chauffeurController = new ChauffeurController();
//$chauffeurController->getAllChauffeurs();