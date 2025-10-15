<?php

require_once "models/TrajetModel.php";

class TrajetController
{
    private $model;

    public function __construct()
    {
        $this->model = new TrajetModel();
    }

    public function getAllTrajets()
    {
        $trajets = $this->model->getDBAllTrajets();
        echo json_encode($trajets);
    }

     public function getTrajetById($idTrajet)
    {
        $lignesTrajet = $this->model->getDBTrajetById($idTrajet);
        echo  json_encode($lignesTrajet);
    }
}
//$trajetController = new TrajetController();
//$trajetController->getAllTrajets();