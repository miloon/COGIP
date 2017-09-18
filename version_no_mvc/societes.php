<?php

// requête pour les factures fournisseurs
$query = 'SELECT * FROM societes, type where societes.fk_type = type.id_type AND type.id_type = 1 order by id_societe';
$stmt = $pdo->query($query);
$fournisseurs = $stmt->fetchAll();
// requête pour les factures clients
$query = 'SELECT * FROM societes, type where societes.fk_type = type.id_type AND type.id_type = 2 order by id_societe';
$stmt = $pdo->query($query);
$clients = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
  <?php include("header.php");?>
  <title>COGIP - sociétés</title>
</head>
<body><div class="container">
  <!--Menu de navigation-->
  <?php include("menu.php");?>
  <!--Contenu-->
  <h1>Annuaire des sociétés</h1>
  <div class="row">
    <div class="col-md-6">
      <h2>Liste des fournisseurs</h2>
      <table class="table table-striped">
        <tr>
          <th>Société</th>
          <th>Téléphone</th>
          <th>N° TVA</th>
        </tr>
        <?php foreach ($fournisseurs as $key => $value){?>
          <tr>
            <td><a href="?idsociete=<?=$value['id_societe']?>"><?=$value['nom_societe']?></a></td>
            <td><?=$value['tel_societe']?></td>
            <td><?=$value['tva_societe']?></td>
          </tr>
        <?php } ?>
      </table>
    </div>
    <div class="col-md-6">
      <h2>Liste des clients</h2>
      <table class="table table-striped">
        <tr>
          <th>Société</th>
          <th>Téléphone</th>
          <th>N° TVA</th>
        </tr>
        <?php foreach ($clients as $key => $value){?>
          <tr>
            <td><a href="?idsociete=<?=$value['id_societe']?>"><?=$value['nom_societe']?></a></td>
            <td><?=$value['tel_societe']?></td>
            <td><?=$value['tva_societe']?></td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</div>
</body>
</html>
