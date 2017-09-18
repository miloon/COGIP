<?php
// connexion
include("connect.php");

// requête pour les factures
$query = 'SELECT id_facture, id_societe, nom_societe, numero_facture, date_facture, type FROM factures, societes, type
WHERE factures.fk_societe = societes.id_societe AND type.id_type = fk_type';
$stmt = $pdo->query($query);
$societes = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
  <?php include("header.php");?>
  <title>COGIP - Factures</title>
</head>
<body><div class="container">
  <!--Menu de navigation-->
  <?php include("menu.php");?>
  <!--Contenu-->
  <h1></h1>
  <h2>Liste des factures</h2>
  <table class="table table-striped">
    <tr>
      <th>N° de facture</th>
      <th>Date</th>
      <th>Société</th>
      <th>Type</th>
    </tr>
    <?php foreach ($societes as $key => $value){?>
      <tr>
        <td><a href="?idfacture=<?=$value['id_facture']?>"><?=$value['numero_facture']?></a></td>
        <td><?=date("d/m/Y", strtotime($value['date_facture']));?></td>
        <td><a href="?idsociete=<?=$value['id_societe']?>"><?=$value['nom_societe']?></a></td>
        <td><?=$value['type']?></td>
      </tr>
    <?php } ?>
  </table>
</div>
</body>
</html>
