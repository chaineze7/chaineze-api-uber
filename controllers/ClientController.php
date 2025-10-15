<?php

require_once "models/ClientModel.php";

class ClientController
{
    private $model;

    public function __construct()
    {
        $this->model = new ClientModel();
    }

    public function getAllClients()
    {
        $clients = $this->model->getDBAllClients();
        echo json_encode($clients);
    }

    public function getClientById($idClient)
    {
        $lignesClient = $this->model->getDBClientById($idClient);
        echo  json_encode($lignesClient);
    }
}
//$clientController = new ClientController();
//$clientController->getAllClients();