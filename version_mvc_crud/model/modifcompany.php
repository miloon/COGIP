<?php
$query = "SELECT * FROM societes, type
WHERE type.id_type = societes.fk_type AND id_societe = $idsociete";
$societe = $pdo->query($query)->fetch();

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
    $pdo->exec("UPDATE `societes` SET `nom_societe`='$nomsociete',`adresse_societe`='$adresse',`tel_societe`='$telephonesociete',`tva_societe`='$tva',`fk_type`='$typesociete' WHERE id_societe = $idsociete;");
    $pdo->commit();
    $reponse = "La société ".$nomsociete." a bien été modifiée.";
  } catch (Exception $e) {
    $pdo->rollBack();
    echo "Échec : " . $e->getMessage();
  }
}

$title="Modification des informations de ".$societe['nom_societe'];
?>
