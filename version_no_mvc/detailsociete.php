<?php
// requête obtenir les informations sur la personne sélectionnée
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
<!DOCTYPE html>
<html>
<head>
  <?php include("header.php");?>
  <title><?=$titre?></title>
</head>
<body><div class="container">
  <!--Menu de navigation-->
  <?php include("menu.php");?>
  <!--Contenu-->
  <h2>Société : <?=$societe['nom_societe']?></h2>
  <p>Adresse : <?=$societe['adresse_societe']?></a> | Téléphone : <?=$societe['tel_societe']?></p>
  <p>Numéro de TVA : <?=$societe['tva_societe']?></a> | Type : <?=$societe['type']?></p>
  <h3>Personnes de contact</h3>
  <table class="table table-striped">
    <tr>
      <th>Nom</th>
      <th>Tél direct</th>
      <th>E-mail</th>
    </tr>
    <?php foreach ($contacts as $key => $value){?>
      <tr>
        <td><a href="?idcontact=<?=$value['id_personne']?>"><?=$value['nom_personne']?> <?=$value['prenom_personne']?></a></td>
        <td><?=$value['tel_personne']?></td>
        <td><a href="mailto:<?=$value['email_personne']?>"><?=$value['email_personne']?></a></td>
      </tr>
    <?php } ?>
  </table>
  <h3>Factures</h3>
  <table class="table table-striped">
    <tr>
      <th>Numéro de facture</th>
      <th>Date de facture</th>
      <th>Personne affiliée</th>
    </tr>
    <?php foreach ($invoices as $key => $value){?>
      <tr>
        <td><a href="?idfacture=<?=$value['id_facture']?>"><?=$value['numero_facture']?></a></td>
        <td><?=date("d/m/Y", strtotime($value['date_facture']))?></td>
        <td><a href="?idcontact=<?=$value['id_personne']?>"><?=$value['nom_personne']?> <?=$value['prenom_personne']?></a></td>
      </tr>
    <?php } ?>
  </table>
</div>
</body>
</html>
