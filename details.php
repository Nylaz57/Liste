<?php

// On vérifie que le paramètre est bien présent dans l'URL
if(isset($_GET['id'])){
    // On  vérifie que le paramètre existe en tant qu'indice dans le tableaux des stagaires
    require 'data/db-connect.php';

    $query = $dbh->query("SELECT * FROM stagiaire WHERE id = " . $_GET['id']);
    $stagiaire = $query->fetch();

    if($stagiaire)
    {

        $title = "Détail de " . $stagiaire['prénom'] . " " . $stagiaire['nom'];

        require 'template/details.html.php';
    }
    else 
    {
    header('HTTP/1.0 404 Not Found'); // On change le code de status de la réponse en 404
        require 'templates/404.html.php';
        die;
    }

        // Si oui on affiche la page avec les données correspondantes

        // Sinon on affiche un message d'erreur

} else {
    // Sinon on redirige vers la page d'accueil
    header('Location: /');
    die;
}