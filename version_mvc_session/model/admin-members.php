<?php
// requête pour les utilisateurs
$query = 'SELECT acces.id, acces.autorisation, user.id, user.identifiant FROM user, acces WHERE user.fk_acces = acces.id ORDER BY acces.id DESC;';
$stmt = $pdo->query($query);
$members = $stmt->fetchAll();

$title="Administration des administrateurs de la COGIP";
?>
