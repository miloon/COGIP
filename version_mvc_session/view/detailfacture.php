  <?php include("header.php");?>
</head>
<body><div class="container">
<!--Menu de navigation-->
<?php include("menu.php");?>
  <!--Contenu-->
  <?php
  // si quelqu'un bidouille dans l'URL pour avoir accès à un autre ID mais que la facture/ID n'existe pas, on prévoit le cas en générant un message d'erreur.
  if(isset($erreur)){?>
    <h2><?=$erreur?></h2>
  <?php }else{ // si l'ID existe, alors on affiche les informations relatives à celui-ci
    ?>
  <h2>Information facture n°<?=$invoice['numero_facture']?> en date du <?=date("d/m/Y", strtotime($invoice['date_facture']))?></h2>
<div class="row">
  <div class="col-md-6">
    <h3>Société liée à la facture</h3>
    <table class="table table-striped">
      <tr>
        <td>Nom</td>
        <td>Adresse</td>
        <td>N° TVA</td>
      </tr>
      <tr>
        <td><a href="?idsociete=<?=$invoice['id_societe']?>"><?=$invoice["nom_societe"]?></a></td>
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
  <?php }
 include("footer.php");?>
  <!-- insérer ici les scripts spécifiques à la page -->
  <?php include("scripts.php");?>
