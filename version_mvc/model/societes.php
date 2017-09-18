<?php

// requête pour les sociétés fournisseurs
$query = 'SELECT * FROM societes, type where societes.fk_type = type.id_type AND type.id_type = 1 order by id_societe';
$stmt = $pdo->query($query);
$fournisseurs = $stmt->fetchAll();
// requête pour les sociétés clientes
$query = 'SELECT * FROM societes, type where societes.fk_type = type.id_type AND type.id_type = 2 order by id_societe';
$stmt = $pdo->query($query);
$clients = $stmt->fetchAll();
?>
