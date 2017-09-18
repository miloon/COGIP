
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
  <h2><?=$contact['nom_personne']?> <?=$contact['prenom_personne']?></h2>
  <p>Société : <a href="?idsociete=<?=$contact['id_societe']?>"><?=$contact["nom_societe"]?></a></p>
  <p><a href="mailto:<?=$contact['email_personne']?>"><?=$contact['email_personne']?></a> | Téléphone : <?=$contact['tel_personne']?></p>
  <h3>Factures</h3>
  <table class="table table-striped">
    <tr>
      <th>N° de facture</th>
      <th>Date</th>
    </tr>
    <?php foreach ($invoices as $key => $value){?>
      <tr>
        <td><a href="?idfacture=<?=$value['id_facture']?>"><?=$value['numero_facture']?></a></td>
        <td><?=date("d/m/Y", strtotime($value['date_facture']))?></td>
      </tr>
    <?php } ?>
  </table>
</div>
</body>
</html>
