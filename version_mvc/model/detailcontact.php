<?php
// requête obtenir les informations sur la personne sélectionnée
$query =
"SELECT nom_personne, prenom_personne, tel_personne, email_personne, nom_societe, id_societe
FROM personnes, societes
WHERE personnes.fk_societe = societes.id_societe
AND id_personne = $idcontact";
$contact = $pdo->query($query)->fetch();
$title = "COGIP - fiche contact de ". $contact['nom_personne']. " " . $contact['prenom_personne'];
// requête pour obtenir toutes les factures relatives à la personne, s'il y en a
$query = "SELECT id_facture, numero_facture, date_facture FROM factures, personnes WHERE factures.fk_personne = personnes.id_personne AND personnes.id_personne = $idcontact ORDER BY id_facture";
$stmt = $pdo->query($query);
$invoices = $stmt->fetchAll();
// si on n'a pas de contact
if(empty($contact['nom_personne'])){
    // affichage erreur
    $erreur = "Aucun contact ne correspond à votre requête.";
}
?>
