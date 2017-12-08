<?php
$query = "SELECT acces.id as idaccess, acces.autorisation as autorisation, user.id as iduser, user.identifiant as identifiant, user.fk_acces as acces FROM user, acces
WHERE user.fk_acces = acces.id and user.id = $modifmember;";
$member = $pdo->query($query)->fetch();

$query = "SELECT * FROM acces";
$stmt = $pdo->query($query);
$acces = $stmt->fetchAll();

// si le formulaire a été envoyé
if(!empty($_POST)){
  $identifiant = htmlspecialchars(strip_tags(trim($_POST['identifiant'])), ENT_QUOTES);
  $autorisation = filter_var($_POST['autorisation'], FILTER_SANITIZE_NUMBER_INT);
  try {
    $pdo->beginTransaction();
    $pdo->exec("UPDATE `user` SET`identifiant`='$identifiant',`fk_acces`=$autorisation WHERE id = $modifmember");
    $pdo->commit();
    $reponse = $identifiant. " a bien été modifié.";
  } catch (Exception $e) {
    $pdo->rollBack();
    echo "Échec : " . $e->getMessage();
  }
}
$title="Modification de ".$member['identifiant'];
?>
