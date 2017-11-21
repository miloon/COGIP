  <?php include("header.php");?>
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
  <?php include("footer.php");?>
  <!-- insérer ici les scripts spécifiques à la page -->
  <?php include("scripts.php");?>
