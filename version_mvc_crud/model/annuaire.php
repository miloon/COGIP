<?php
// requête pour obtenir les informations relatives aux personnes de contact
$query = 'SELECT id_societe, type, nom_societe, id_personne, nom_personne, prenom_personne, email_personne FROM `personnes`, societes , type
WHERE personnes.fk_societe = societes.id_societe AND societes.fk_type = type.id_type order by id_type, nom_societe';
$stmt = $pdo->query($query);
$contacts = $stmt->fetchAll();
$title="Annuaire de la COGIP";
?>
