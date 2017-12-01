<?php
/*
https://github.com/becodeorg/BeCode/wiki/Backend---traiter-un-formulaire
*/
$title="Ajout d'une nouvelle personne de contact";
$query = "SELECT `nom_societe`, `id_societe` FROM `societes` ORDER BY nom_societe ASC;";
$stmt = $pdo->query($query);
$societes = $stmt->fetchAll();

// si le formulaire a été envoyé
if(!empty($_POST)){
  $nom_personne = htmlspecialchars(strip_tags(trim($_POST['nom_personne'])), ENT_QUOTES);
  $prenom_personne = filter_var($_POST['prenom_personne'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $telephone = filter_var($_POST['telephone'], FILTER_SANITIZE_NUMBER_INT);
  $societecontact = filter_var($_POST['societecontact'], FILTER_SANITIZE_NUMBER_INT);
  try {
    $pdo->beginTransaction();
    $pdo->exec("INSERT INTO `personnes`(`nom_personne`, `prenom_personne`, `tel_personne`, `email_personne`, `fk_societe`)
    VALUES ('$nom_personne','$prenom_personne',$telephone,'$email',$societecontact)");
    $pdo->commit();
    $reponse = $prenom_personne." ".$nom_personne." a bien été ajoutée.";
  } catch (Exception $e) {
    $pdo->rollBack();
    echo "Failed: " . $e->getMessage();
  }
}
?>
