<?php
// si GET est vide, on va à l'accueil. Regarde également comment est codé le lien de l'accueil dans le fichier menu.php
if(empty($_GET)){ // pas de variables get => ACCUEIL
  require_once 'accueil.php';

/*
* Pour comprendre l'accès aux pages suivantes, 
* tu peux regardes également la page menu.php
* Regarde comment sont notés les liens sur les deux fichiers
*/

}elseif (isset($_GET['annuaire'])){
  $contact = $_GET['annuaire'];
  require_once "annuaire.php";
}elseif (isset($_GET['societes'])){
  $societes = $_GET['societes'];
  require_once "societes.php";
}elseif (isset($_GET['factures'])){
  $factures = $_GET['factures'];
  require_once "factures.php";

/*
* Pour comprendre l'accès à la page idcontact avec l'id placé en variable
* regarde la page annuaire.php et plus spécifiquement la ligne :
* <a href="?idcontact=<?=$value['id_personne']?>">
* Note la structure => on a idcontact qui passe en get
* et quand on clique sur l'id, on stocke l'id (donc le nombre) dans la variable
*/
}elseif(isset($_GET['idcontact']) &&  is_numeric($_GET['idcontact'])){
  // conversion en variable locale en int
  $idcontact = (int)$_GET['idcontact'];
  // on importe la page détailcontact.php qu'on a préparée
  require_once 'detailcontact.php';

}elseif(isset($_GET['idsociete']) &&  is_numeric($_GET['idsociete'])){
  $idsociete = (int)$_GET['idsociete'];
  require_once 'detailsociete.php';
}elseif(isset($_GET['idfacture']) &&  is_numeric($_GET['idfacture'])){
  $idfacture = (int)$_GET['idfacture'];
  require_once 'detailfacture.php';

  // rien n'est juste, on retourne à l'accueil. On prend en compte les possibilités de bidouillages d'URL.
}else{
  require_once 'accueil.php';
}
