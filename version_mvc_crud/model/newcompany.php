<?php
/*
https://github.com/becodeorg/BeCode/wiki/Backend---traiter-un-formulaire
*/

$title="Ajout d'une nouvelle société";
$query = "SELECT * FROM `type`";
$stmt = $pdo->query($query);
$type = $stmt->fetchAll();

// si le formulaire a été envoyé
if(!empty($_POST)){
  $nomsociete = filter_var($_POST['nomsociete'], FILTER_SANITIZE_STRING);
  $adresse = filter_var($_POST['adresse'], FILTER_SANITIZE_STRING);
  $tva = filter_var($_POST['tva'], FILTER_SANITIZE_STRING);
  $telephonesociete = filter_var($_POST['telephone'], FILTER_SANITIZE_NUMBER_INT);
  $typesociete = filter_var($_POST['typesociete'], FILTER_SANITIZE_NUMBER_INT);
  try {
    $pdo->beginTransaction();
    $pdo->exec("INSERT INTO `societes`(`nom_societe`, `adresse_societe`, `tel_societe`, `tva_societe`, `fk_type`)
    VALUES ('$nomsociete','$adresse','$telephonesociete','$tva','$typesociete');");
    $pdo->commit();
    $reponse = "La société ".$nomsociete." a bien été ajoutée.";
  } catch (Exception $e) {
    $pdo->rollBack();
    echo "Failed: " . $e->getMessage();
  }
}
?>
