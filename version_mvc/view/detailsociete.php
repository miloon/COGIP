  <?php include("header.php");?>
  <!--Contenu-->
  <?php
  // si quelqu'un bidouille dans l'URL pour avoir accès à un autre ID mais que la société/ID n'existe pas, on prévoit le cas en générant un message d'erreur.
  if(isset($erreur)){?>
    <h2><?=$erreur?></h2>
  <?php }else{ // si l'ID existe, alors on affiche les informations relatives à celui-ci
    ?>
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
    <?php }
    include("footer.php");?>
