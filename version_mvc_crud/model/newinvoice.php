<?php
/*
https://github.com/becodeorg/BeCode/wiki/Backend---traiter-un-formulaire
*/
$title="Ajout d'une nouvelle facture";
$query = "SELECT `nom_societe`, `id_societe` FROM `societes` ORDER BY nom_societe ASC;";
$stmt = $pdo->query($query);
$societes = $stmt->fetchAll();

$query = "SELECT `id_personne`,`nom_personne`, `prenom_personne`, `nom_societe`
FROM `personnes` p
LEFT JOIN societes s
ON p.fk_societe = s.id_societe
ORDER BY fk_societe;";
$stmt = $pdo->query($query);
$person = $stmt->fetchAll();


// si le formulaire a été envoyé
if(!empty($_POST)){
  $numerofacture = filter_var($_POST['numeroinv'], FILTER_SANITIZE_STRING);
  $dateinv = filter_var($_POST['dateinv'], FILTER_SANITIZE_STRING);
  $societe = filter_var($_POST['societeinv'], FILTER_SANITIZE_NUMBER_INT);
  $contactperson = filter_var($_POST['personinv'], FILTER_SANITIZE_NUMBER_INT);
    try {
      $pdo->beginTransaction();
      $pdo->exec("INSERT INTO `factures`(`numero_facture`, `date_facture`, `fk_societe`, `fk_personne`)
      VALUES ('$numerofacture', '$dateinv', '$societe', '$contactperson');");
      $pdo->commit();
      $reponse = "La facture n°".$numerofacture." a bien été ajoutée.";
    } catch (Exception $e) {
      $pdo->rollBack();
      echo "Failed: " . $e->getMessage();
    }
}
?>
