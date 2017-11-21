<?php

// requête pour les factures
$query = 'SELECT id_facture, id_societe, nom_societe, numero_facture, date_facture, type FROM factures, societes, type
WHERE factures.fk_societe = societes.id_societe AND type.id_type = fk_type';
$stmt = $pdo->query($query);
$societes = $stmt->fetchAll();
$title="Inventaire des factures";
?>
