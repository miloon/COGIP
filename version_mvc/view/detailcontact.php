  <?php include("header.php");?>
  <!--Contenu-->
<?php
// si quelqu'un bidouille dans l'URL pour avoir accès à un autre ID mais que le contact/ID n'existe pas, on prévoit le cas en générant un message d'erreur.
if(isset($erreur)){?>
  <h2><?=$erreur?></h2>
<?php }else{ // si l'ID existe, alors on affiche les informations relatives à celui-ci
  ?>
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
  <?php }
  include("footer.php");?>
