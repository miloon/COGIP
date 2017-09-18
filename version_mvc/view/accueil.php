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
