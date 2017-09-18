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
  <h2>Information facture n°<?=$invoice['numero_facture']?> en date du <?=date("d/m/Y", strtotime($invoice['date_facture']))?></h2>
  <div class="col-md-6">
    <h3>Société liée à la facture</h3>
    <table class="table table-striped">
      <tr>
        <td>Nom</td>
        <td>Adresse</td>
        <td>N° TVA</td>
      </tr>
      <tr>
        <td><a href="?societes=<?=$invoice['id_societe']?>"><?=$invoice["nom_societe"]?></a></td>
        <td><?=$invoice['adresse_societe']?></td>
        <td><?=$invoice['tva_societe']?></td>
      </tr>
    </table>
  </div>
  <div class="col-md-6">
    <h3>Personne de contact</h3>
    <table class="table table-striped">
      <tr>
        <td>Nom</td>
        <td>email</td>
        <td>Tel</td>
      </tr>
      <tr>
        <td><a href="?idcontact=<?=$invoice['id_personne']?>"><?=$invoice['prenom_personne']?> <?=$invoice['nom_personne']?></a></td>
        <td><a href="mailto:<?=$invoice['email_personne']?>"><?=$invoice['email_personne']?></a></td>
        <td><?=$invoice['tel_personne']?></td>
      </tr>
    </table>
  </div>
</div>
</body>
</html>
