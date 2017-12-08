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
  /*
  * À partir d'ici, on va établir la liste des pages qui seront
  * accessibles uniquement par les utilisateurs connectés.
  */
}elseif (isset($_GET['admin'])){
  // affichera la page d'accueil spéciale pour l'administration
  require_once 'model/admin-dash.php';
  require_once 'view/admin-dash.php';
  /*
  * Nous allons traiter les pages d'ajout de données.
  */
}elseif (isset($_GET['newinvoice'])) {
  // redirection vers la page d'ajout d'une facture. Formulaire, exécution d'insertion dans la base de données.
  require_once 'model/newinvoice.php';
  require_once 'view/newinvoice.php';
}elseif (isset($_GET['newcompany'])) {
  // redirection vers la page d'ajout d'une société. Formulaire, exécution d'insertion dans la base de données.
  require_once 'model/newcompany.php';
  require_once 'view/newcompany.php';
}elseif (isset($_GET['newcontact'])) {
  // redirection vers la page d'ajout d'un contact. Formulaire, exécution d'insertion dans la base de données.
  require_once 'model/newcontact.php';
  require_once 'view/newcontact.php';
  /*
  * Nous allons traiter les pages de modification de données.
  */
}elseif(isset($_GET['modifcontact']) &&  is_numeric($_GET['modifcontact'])){
  // conversion en variable locale en int
  $idcontact = (int)$_GET['modifcontact'];
  // on importe la page de modification du contact
  require_once 'model/modifcontact.php';
  require_once 'view/modifcontact.php';
}elseif(isset($_GET['modifinv']) &&  is_numeric($_GET['modifinv'])){
  // conversion en variable locale en int
  $idfacture = (int)$_GET['modifinv'];
  // on importe la page de modification du contact
  require_once 'model/modifinv.php';
  require_once 'view/modifinv.php';
}elseif(isset($_GET['modifcompany']) &&  is_numeric($_GET['modifcompany'])){
  // conversion en variable locale en int
  $idsociete = (int)$_GET['modifcompany'];
  // on importe la page de modification du contact
  require_once 'model/modifcompany.php';
  require_once 'view/modifcompany.php';
/*
* Nous allons traiter les pages de suppression de données.
*/
}elseif(isset($_GET['delete_invoice']) &&  is_numeric($_GET['delete_invoice'])){
  // conversion en variable locale en int
  $iddeleteinv = (int)$_GET['delete_invoice'];
  // on lance la fonctionnalité de suppression depuis le fichier PHP contenant le script
  require_once 'model/supinv.php';
}elseif(isset($_GET['delete_contact']) &&  is_numeric($_GET['delete_contact'])){
  // conversion en variable locale en int
  $iddeletecontact = (int)$_GET['delete_contact'];
  // on lance la fonctionnalité de suppression depuis le fichier PHP contenant le script
  require_once 'model/supcontact.php';
}elseif(isset($_GET['delete_company']) &&  is_numeric($_GET['delete_company'])){
  // conversion en variable locale en int
  $iddeletecomp = (int)$_GET['delete_company'];
  // on lance la fonctionnalité de suppression depuis le fichier PHP contenant le script
  require_once 'model/supcomp.php';
  /*
  * Administration des membres qui ont accès au programme de la COGIP
  */
}elseif (isset($_GET['members'])){
  require_once 'model/admin-members.php';
  require_once 'view/admin-members.php';
}elseif (isset($_GET['modifmember']) &&  is_numeric($_GET['modifmember'])){
  $modifmember = (int)$_GET['modifmember'];
  require_once 'model/modifmember.php';
  require_once 'view/modifmember.php';
}elseif(isset($_GET['supmember']) &&  is_numeric($_GET['supmember'])){
  // conversion en variable locale en int
  $iddeletemember = (int)$_GET['supmember'];
  // on lance la fonctionnalité de suppression depuis le fichier PHP contenant le script
  require_once 'model/supmember.php';
}elseif (isset($_GET['register'])){
  // php nécessaire pour établir une connexion en tant que personne connectée
  require_once "model/inscription.php";
  // on affiche le formulaire
  require_once "view/inscription.php";
/*
* Via la page suivante, on se déconnecte
*/
}elseif (isset($_GET['deconnect'])){ // pour déconnecter l'utilisateur
  // php nécessaire pour supprimer la session et déconnecter l'utilisateur
  require_once "model/deconnect.php";
  // rien n'est juste, on retourne à l'accueil
}else{ // si ce que l'utilisateur fait ne correspond à aucun des cas ci-dessus,
  // alors par défaut, le navigateur affichera la page d'accueil de l'administration
  require_once 'model/admin-dash.php';
  require_once 'view/admin-dash.php';
}
