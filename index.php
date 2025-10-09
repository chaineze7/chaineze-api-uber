<?php

require_once "./controllers/ChauffeurController.php";
require_once "./controllers/ClientController.php";
require_once "./controllers/VoitureController.php";
require_once "./controllers/TrajetController.php";

$chauffeurController = new ChauffeurController();
$clientController = new ClientController();
$voitureController = new VoitureController();
$trajetController = new TrajetController();

// Vérifie si le paramètre "page" est vide ou non présent dans l'URL
if (empty($_GET["page"])) {
    // Si le paramètre est vide, on affiche un message d'erreur
    echo "La page n'existe pas";
} else {
    // Sinon, on récupère la valeur du paramètre "page"
    // Par exemple, si l’URL est : index.php?page=chauffeurs/3
    // Alors $_GET["page"] vaut "chauffeurs/3"
    
    // On découpe cette chaîne en segments, en séparant sur le caractère "/"
    // Cela donne un tableau, ex : ["chauffeurs", "3"]
    $url = explode("/", $_GET['page']);
    
    // Affiche le contenu du tableau pour vérifier comment l’URL est interprétée
    //print_r($url);

    // On teste le premier segment pour déterminer la ressource demandée
    switch($url[0]) {
        case "chauffeurs" : 
            // Si un second segment est présent (ex: un ID), on l’utilise
            if (isset($url[1])) {
                // Exemple : /chauffeurs/3 → affiche les infos du chauffeur 3
                echo  $chauffeurController->getChauffeurById($url[1]);
            } else {
                // Sinon, on affiche tous les chauffeurs
                echo  $chauffeurController->getAllChauffeurs();
            }
            break;
        case "clients":
            if (isset($url[1])) {
                echo  $clientController->getClientById($url[1]);
            } else {
                echo $clientController->getAllClients();
            }
            break;

        case "voitures":
            if (isset($url[1])) {
                echo $voitureController->getVoitureById($url[1]);
            } else {
                echo $voitureController->getAllVoitures();
            }
            break;

        case "trajets":
            if (isset($url[1])) {
                echo  $trajetController->getTrajetById($url[1]);
            } else {
                echo $trajetController->getAllTrajets();
            }
            break;
        
        // Si la ressource n'existe pas, on renvoie un message d’erreur
        default :
            echo "La page n'existe pas";
    }
}