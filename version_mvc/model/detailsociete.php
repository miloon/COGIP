<?php
// requête obtenir les informations sur la société sélectionnée
$query =
"SELECT nom_societe, adresse_societe, tel_societe, tva_societe, id_societe, type
FROM societes, type
WHERE type.id_type = societes.fk_type
AND id_societe = $idsociete";
$societe = $pdo->query($query)->fetch();
$titre = "COGIP - fiche contact de ". $societe['nom_societe'];
// requête pour obtenir toutes les personnes travaillant dans cette société, s'il y en a
$query = "SELECT id_personne, nom_personne, prenom_personne, tel_personne, email_personne FROM personnes, societes WHERE personnes.fk_societe = societes.id_societe AND societes.id_societe = $idsociete ORDER BY nom_personne";
$stmt = $pdo->query($query);
$contacts = $stmt->fetchAll();
// requête pour obtenir toutes les factures associées à la société
$query = "SELECT id_facture, numero_facture, date_facture, nom_personne, prenom_personne
FROM factures, societes, personnes
WHERE factures.fk_societe = societes.id_societe
AND factures.fk_personne = personnes.id_personne
AND societes.id_societe = $idsociete
ORDER BY id_facture";
$stmt = $pdo->query($query);
$invoices = $stmt->fetchAll();
?>
