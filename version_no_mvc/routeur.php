<?php
// si GET est vide, on va à l'accueil
if(empty($_GET)){ // pas de variables get => ACCUEIL
  require_once 'accueil.php';

}elseif (isset($_GET['annuaire'])){
  $contact = $_GET['annuaire'];
  require_once "annuaire.php";
}elseif (isset($_GET['societes'])){
  $societes = $_GET['societes'];
  require_once "societes.php";
}elseif (isset($_GET['factures'])){
  $factures = $_GET['factures'];
  require_once "factures.php";

}elseif(isset($_GET['idcontact']) &&  is_numeric($_GET['idcontact'])){
  // conversion en variable locale en int
  $idcontact = (int)$_GET['idcontact'];
  // on importe la page détail qu'on a préparée
  require_once 'detailcontact.php';

}elseif(isset($_GET['idsociete']) &&  is_numeric($_GET['idsociete'])){
  $idsociete = (int)$_GET['idsociete'];
  require_once 'detailsociete.php';
}elseif(isset($_GET['idfacture']) &&  is_numeric($_GET['idfacture'])){
  $idfacture = (int)$_GET['idfacture'];
  require_once 'detailfacture.php';

  // rien n'est juste, on retourne à l'accueil
}else{
  require_once 'accueil.php';
}
