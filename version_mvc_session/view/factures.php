  <?php include("header.php");?>
</head>
<body><div class="container">
<!--Menu de navigation-->
<?php include("menu.php");?>
  <!--Contenu-->
  <h1></h1>
  <h2>Liste des factures</h2>
  <table class="table table-striped">
    <tr>
      <th>N° de facture</th>
      <th>Date</th>
      <th>Société</th>
      <th>Type</th>
    </tr>
    <?php foreach ($societes as $key => $value){?>
      <tr>
        <td><a href="?idfacture=<?=$value['id_facture']?>"><?=$value['numero_facture']?></a></td>
        <td><?=date("d/m/Y", strtotime($value['date_facture']));?></td>
        <td><a href="?idsociete=<?=$value['id_societe']?>"><?=$value['nom_societe']?></a></td>
        <td><?=$value['type']?></td>
      </tr>
    <?php } ?>
  </table>
  <?php include("footer.php");?>
  <!-- insérer ici les scripts spécifiques à la page -->
  <?php include("scripts.php");?>
