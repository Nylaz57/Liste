<?php 

require 'data/db-connect.php';

$title = "Accueil";

// Pagination

$nbPerPage = 24;

if(!empty($_GET['search']))
{
    $search = strtolower($_GET['search']);
    $query = $dbh->query("SELECT COUNT(*) AS nbStagiaires FROM stagiaire WHERE nom LIKE '%$search%' OR prénom LIKE '%$search%'");
}
else
{
    $query = $dbh->query("SELECT COUNT(*) AS nbStagiaires FROM stagiaire");
}


$nbPages = ceil($query->fetch()['nbStagiaires'] / $nbPerPage);
$start = 0;
$currentPage = 1;

if(!empty($_GET['page']))
{
    $start = $_GET['page'] * $nbPerPage - $nbPerPage;
    $currentPage = $_GET['page'];
}

// Traitement du formulaire de recherche si une recherche est faite

    /*  Faire une recherche en local dans un fichier PHP (coté code)

     $stagiaires = array_filter($stagiaires, function($stagiaire) use ($search)
     {
       On vérifie que le nom ou le prénom contiennne la chaîne de caracteres recherchée
         return str_contains(strtolower($stagiaire['nom']), $search) || str_contains(strtolower($stagiaire['prénom']), $search);
     });

     $resultCount = count($stagiaires);*/

// Traitement du formulaire de recherche si une recherche est faite
if(!empty($_GET['search']))
{
    $search = strtolower($_GET['search']);
    $query = $dbh->query("SELECT * FROM stagiaire WHERE nom LIKE '%$search%' OR prénom LIKE '%$search%' ORDER BY nom ASC LIMIT $start,$nbPerPage");
    $stagiaires = $query->fetchAll();

    // Nombre de résultats totales
    $query = $dbh->query("SELECT COUNT(*) AS resultCount FROM stagiaire WHERE nom LIKE '%$search%' OR prénom LIKE '%$search%'");
    $resultCount = $query->fetch()['resultCount'];
}
else
{

    $query = $dbh->query("SELECT * FROM stagiaire ORDER BY nom ASC LIMIT $start,$nbPerPage");
    $stagiaires = $query->fetchAll();
}

// Affichage du template HTML
require 'template/home.html.php';