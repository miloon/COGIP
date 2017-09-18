<?php
// requête pour les factures
$query = 'SELECT id_societe, type, nom_societe, id_personne, nom_personne, prenom_personne, email_personne FROM `personnes`, societes , type
WHERE personnes.fk_societe = societes.id_societe AND societes.fk_type = type.id_type order by id_type, nom_societe';
$stmt = $pdo->query($query);
$contacts = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
  <?php include("header.php");?>
  <title>COGIP - annuaire</title>
</head>
<body>
  <div class="container">
  <!--Menu de navigation-->
  <?php include("menu.php");?>
  <!--Contenu-->
<div class="row">
  <h2>Annuaire des contacts</h2>
  <table class="table table-striped">
    <tr>
      <th>Type</th>
      <th>Société</th>
      <th>Nom</th>
      <th>e-mail</th>
    </tr>
    <?php foreach ($contacts as $key => $value){?>
      <tr>
        <td><?=$value['type']?></td>
        <td><a href="?idsociete=<?=$value['id_societe']?>"><?=$value['nom_societe']?></a></td>
        <td><a href="?idcontact=<?=$value['id_personne']?>"><?=$value['prenom_personne']?> <?=$value['nom_personne']?></a></td>
        <td><?=$value['email_personne']?></td>
      </tr>
    <?php } ?>
  </table>
</div>
</div>
</body>
</html>
