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


    public function getChauffeurById($idChauffeur)
    {
        $lignesChauffeur = $this->model->getDBChauffeurById($idChauffeur);
        echo  json_encode($lignesChauffeur);
    }

    public function createChauffeur($data) {
        $ligneChauffeur = $this->model->createDBChauffeur($data);
        http_response_code(201);
        echo json_encode($ligneChauffeur);
    }

    public function updateChauffeur($id,$data) {
        $success=$this->model->updateDBChauffeur($id, $data);
        if ($success) {
            http_response_code(204);
        } else {
            http_response_code(404);
            echo json_encode(["messge" => "Chauffeur non trouvé ou non modifié"]);
        }

    
    }

    public function deleteChauffeur($id) {
      $success=$this->model->deleteDBChauffeur($id);
       if ($success) {
            http_response_code(204);
        } else {
            http_response_code(404);
            echo json_encode(["messge" => "Chauffeur introuvable"]);
        }  
    }
}
//$chauffeurController = new ChauffeurController();
//$chauffeurController->getAllChauffeurs();