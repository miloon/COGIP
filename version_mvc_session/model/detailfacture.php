<?php
// requête obtenir les informations sur la personne sélectionnée
$query =
"SELECT numero_facture, date_facture, id_personne, nom_personne, prenom_personne, email_personne, tel_personne, nom_societe, id_societe, adresse_societe, tva_societe
FROM factures, societes, personnes
WHERE factures.fk_societe = societes.id_societe
AND factures.fk_personne = personnes.id_personne
AND id_facture = $idfacture";
$invoice = $pdo->query($query)->fetch();
$title = "COGIP - Information facture n° ". $invoice['numero_facture'];
// si on n'a pas de facture
if(empty($invoice['numero_facture'])){
    // affichage erreur
    $erreur = "Aucune facture ne correspond à votre requête.";
}
?>
