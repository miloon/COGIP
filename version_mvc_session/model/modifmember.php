<?php

// requête pour les utilisateurs
$query = 'SELECT acces.id, acces.autorisation, user.id, user.identifiant FROM user, acces WHERE user.fk_acces = acces.id and user.is = $idmember;';
$member = $pdo->query($query)->fetch();


$query = "SELECT * FROM `acces`";
$stmt = $pdo->query($query);
$acces = $stmt->fetchAll();


// si le formulaire a été envoyé
if(!empty($_POST)){
  $nom_personne = htmlspecialchars(strip_tags(trim($_POST['nom_personne'])), ENT_QUOTES);
  $prenom_personne = filter_var($_POST['prenom_personne'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $telephone = filter_var($_POST['telephone'], FILTER_SANITIZE_NUMBER_INT);
  $societecontact = filter_var($_POST['societecontact'], FILTER_SANITIZE_NUMBER_INT);
  try {
    $pdo->beginTransaction();
    $pdo->exec("UPDATE personnes SET nom_personne='$nom_personne',prenom_personne='$prenom_personne',tel_personne='$telephone',email_personne='$email',fk_societe='$societecontact' WHERE `id_personne` = $idcontact; ");
    $pdo->commit();
    $reponse = $prenom_personne." ".$nom_personne." a bien été modifié.";
  } catch (Exception $e) {
    $pdo->rollBack();
    echo "Échec : " . $e->getMessage();
    echo $telephone;
  }
}
$title="Modification de ".$contact['prenom_personne']." ".$contact['nom_personne'];
?>
