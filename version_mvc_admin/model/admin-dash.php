<?php
// requête pour les factures
$query = 'SELECT * FROM factures, societes WHERE factures.FK_societe = societes.id_societe ORDER BY `date_facture` DESC LIMIT 5';
$stmt = $pdo->query($query);
$invoices = $stmt->fetchAll();

// requête pour les contacts
$query = 'SELECT * FROM personnes, societes where personnes.FK_societe = societes.id_societe order by personnes.id_personne DESC limit 5';
$stmt = $pdo->query($query);
$contacts = $stmt->fetchAll();

// requête pour les sociétés
$query = 'SELECT * FROM `societes`, type where societes.FK_type = type.id_type order by id_societe desc limit 5';
$stmt = $pdo->query($query);
$societes = $stmt->fetchAll();
$title="Administration de la facturation de la COGIP";
?>
