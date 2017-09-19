<?php
/*
* Le routeur est l'aiguilleur du website.
* C'est lui qui va dire quels fichiers utiliser pour afficher des trucs dans le navigateur.
*/


// si GET est vide, on va à l'accueil
if(empty($_GET)){ // pas de variables get => ACCUEIL
  /* à la base, on avait un seul fichier qui se nommait accueil.php.
  * dans ce fichier, il y avait du PHP au-dessus du DOCTYPE
  * et de l'HTML en-dessous.
  * Pour correspondre à la structure MVC, on a scindé ce fichier en deux.
  * On a placé la partie PHP (back-end) du fichier dans le dossier model/accueil.php
  * et la partie HTML (front-end) du fichier dans le dossier view/accueil.php
  */
  require_once 'model/accueil.php';
  require_once 'view/accueil.php';
}elseif (isset($_GET['annuaire'])){
  $contact = $_GET['annuaire'];
  // ce fichier va chercher les informations depuis la DB
  require_once "model/annuaire.php";
  // ce fichier va reprendre les informations de la DB que le fichier model/annuaire.php a demandé pour les afficher
  require_once "view/annuaire.php";
}elseif (isset($_GET['societes'])){
  $societes = $_GET['societes'];
  require_once "model/societes.php";
  require_once "view/societes.php";
}elseif (isset($_GET['factures'])){
  $factures = $_GET['factures'];
  // ce fichier va chercher les informations depuis la DB
  require_once "model/factures.php";
  // ce fichier va reprendre les informations de la DB que le fichier model/factures.php a demandé pour les afficher
  require_once "view/factures.php";
}elseif(isset($_GET['idcontact']) &&  is_numeric($_GET['idcontact'])){
  // conversion en variable locale en int
  $idcontact = (int)$_GET['idcontact'];
  // on importe la page détail qu'on a préparée
  require_once 'model/detailcontact.php';
  require_once 'view/detailcontact.php';
}elseif(isset($_GET['idsociete']) &&  is_numeric($_GET['idsociete'])){
  $idsociete = (int)$_GET['idsociete'];
  require_once 'model/detailsociete.php';
  require_once 'view/detailsociete.php';
}elseif(isset($_GET['idfacture']) &&  is_numeric($_GET['idfacture'])){
  $idfacture = (int)$_GET['idfacture'];
  require_once 'model/detailfacture.php';
  require_once 'view/detailfacture.php';
  // rien n'est juste, on retourne à l'accueil
}else{ // si ce que l'utilisateur fait ne correspond à aucun des cas ci-dessus,
  // alors par défaut, le navigateur affichera la page d'accueil.
  require_once 'model/accueil.php';
  require_once 'view/accueil.php';
}
