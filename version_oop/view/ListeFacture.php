<?php require "view/head.php"; ?>
</head>
<body>

<?php
require_once "view/menu.php";
?>
  <table>
    <tr>
      <td>Numéro de facture</td>
      <td>Date</td>
      <td>Société</td>
      <td>Personne de contact</td>
    </tr>
<?php
foreach ($toutesLesFactures as $valeur){
  if (is_object($valeur)){
  }
  ?>
    <tr>
      <td><?=$valeur->getNumero_facture() ?></td>
      <td><?=$valeur->getDate_facture()?></td>
      <td><?=$valeur->getNom_societe()?></td>
      <td><?=$valeur->getPrenom_personne()?> <?=$valeur->getNom_personne()?></td>
    </tr>
<?php
}
?>
  </table>
</body>
</html>
