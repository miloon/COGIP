<?php include("header.php");?>
</head>
<body><div class="container">
<!--Menu de navigation-->
<?php include("menu.php");?>
<!--Contenu-->

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
  <?php include("footer.php");?>
  <!-- insérer ici les scripts spécifiques à la page -->
  <?php include("scripts.php");?>
