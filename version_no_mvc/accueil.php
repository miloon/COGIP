<?php
// requête pour les factures
$query = 'SELECT * FROM factures, societes WHERE factures.FK_societe = societes.id_societe ORDER BY `date_facture` LIMIT 5';
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
?>
<!DOCTYPE html>
<html>
<head>
  <?php include("header.php");?>
  <title>Bienvenue à la COGIP</title>
</head>
<body>
  <div class="container">
  <!--Menu de navigation-->
  <?php include("menu.php");?>
  <!--Contenu-->
  <h1>Bienvenue dans le système de facturation de la COGIP</h1>
    <p>Bonjour Jean-Christian !<br/>Voici les dernières entrées.</p>
  <h2>Dernières factures</h2>
  <table class="table table-striped">
    <tr>
      <th>Numéro facture</th>
      <th>Date facture</th>
      <th>Société</th>
    </tr>
    <?php foreach ($invoices as $key => $value){?>
      <tr>
        <td><a href="?idfacture=<?=$value['id_facture']?>"><?=$value['numero_facture']?></a></td>
        <td><?=$value['date_facture']?></td>
        <td><a href="?idsociete=<?=$value['id_societe']?>"><?=$value['nom_societe']?></a></td>
      </tr>
    <?php } ?>
  </table>
  <h2>Derniers contacts</h2>
  <table class="table table-striped">
    <tr>
      <th>Nom</th>
      <th>Téléphone</th>
      <th>E-mail</th>
      <th>Société</th>
    </tr>
    <?php foreach ($contacts as $key => $value){?>
      <tr>
        <td><a href="?idcontact=<?=$value['id_personne']?>"><?=$value['nom_personne']?> <?=$value['prenom_personne']?></a></td>
        <td><?=$value['tel_personne']?></td>
        <td><a href="mailto:<?=$value['email_personne']?>"><?=$value['email_personne']?></a></td>
        <td><a href="?idsociete=<?=$value['id_societe']?>"><?=$value['nom_societe']?></a></td>
      </tr>
    <?php } ?>
  </table>
  <h2>Dernières sociétés</h2>
  <table class="table table-striped">
    <tr>
      <th>Société</th>
      <th>Téléphone</th>
      <th>N° TVA</th>
      <th>Type</th>
    </tr>
    <?php foreach ($societes as $key => $value){?>
      <tr>
        <td><a href="?idsociete=<?=$value['id_societe']?>"><?=$value['nom_societe']?></a></td>
        <td><?=$value['tel_societe']?></td>
        <td><?=$value['tva_societe']?></td>
        <td><?=$value['type']?></td>
      </tr>
    <?php } ?>
  </table>
</div>
</body>
</html>
