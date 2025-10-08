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
}
//$trajetController = new TrajetController();
//$trajetController->getAllTrajets();