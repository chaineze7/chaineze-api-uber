<?php

require_once "models/VoitureModel.php";

class VoitureController
{
    private $model;

    public function __construct()
    {
        $this->model = new VoitureModel();
    }

    public function getAllVoitures()
    {
        $voitures = $this->model->getDBAllVoitures();
        echo json_encode($voitures);
    }
}
//$voitureController = new VoitureController();
//$voitureController->getAllVoitures();