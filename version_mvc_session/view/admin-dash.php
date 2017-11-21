<?php include("header.php");?>
<!-- On utilise des font awesome pour afficher des petites icônes jolies -->
<link rel="stylesheet" href="view/css/font-awesome.min.css">
<script>
/* on crée une fonction par élément différent à supprimer
*car chaque fonction va demander le chargement d'une page model différente
* selon le type d'élément.
*
* On a besoin du nom de l'élément (qu'il s'agisse d'une facture, d'une personne ou d'une société)
* pour que l'utilisateur ait la confirmation qu'il va bien supprimer le bon élément.
* Avec la boîte de dialogue JS, il va confirmer que c'est bien l'élément qu'il souhaite supprimer
* Il a aussi besoin de l'ID de l'élément pour pouvoir l'insérer dans la requête SQL de suppression.
*/
    function confirmDeleteInv(nom, id) {
        var question = confirm("Voulez-vous vraiment supprimer la facture " + nom + " ?");
        if (question) {
            document.location.href = "?delete_invoice=" + id;
        }
    }
    function confirmDeleteCompany(nom, id) {
        var question = confirm("Voulez-vous vraiment supprimer la société " + nom + " ?");
        if (question) {
            document.location.href = "?delete_company=" + id;
        }
    }
    function confirmDeleteContact(nom, id) {
        var question = confirm("Voulez-vous vraiment supprimer " + nom + " ?");
        if (question) {
            document.location.href = "?delete_contact=" + id;
        }
    }
</script>
</head>
<body><div class="container">
  <!--Menu de navigation-->
  <?php include("menu.php");?>
  <!--Contenu-->
  <h1>Bienvenue dans le système de facturation de la COGIP</h1>
  <p>Bonjour <?=$_SESSION['identifiant']?> !<br/>Que souhaitez-vous faire aujourd'hui ?</p>
  <p>
    <a href="?newinvoice" type="button" class="btn btn-success"><i class="fa fa-plus fa-lg"></i> Nouvelle facture</a>
      <a href="?newcontact" type="button" class="btn btn-success"><i class="fa fa-plus fa-lg"></i> Nouveau contact</a>
        <a href="?newcompany" type="button" class="btn btn-success"><i class="fa fa-plus fa-lg"></i> Nouvelle société</a>
        </p>
        <h2>Dernières factures</h2>
        <table class="table table-striped">
          <tr>
            <th>Numéro facture</th>
            <th>Date facture</th>
            <th>Société</th>
            <th></th>
          </tr>
          <?php foreach ($invoices as $key => $value){?>
            <tr>
              <td><a href="?modifinv=<?=$value['id_facture']?>"><?=$value['numero_facture']?></a></td>
              <td><?=$value['date_facture']?></td>
              <td><a href="?modifcompany=<?=$value['id_societe']?>"><?=$value['nom_societe']?></a></td>
              <td><i onmouseover="this.style.cursor='pointer';" onclick='confirmDeleteInv("<?=$value['numero_facture']?>",<?=$value['id_facture']?>)' class="fa fa-trash-o fa-lg"></i></a></td>
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
              <th></th>
            </tr>
            <?php foreach ($contacts as $key => $value){?>
              <tr>
                <td><a href="?modifcontact=<?=$value['id_personne']?>"><?=$value['prenom_personne']?> <?=$value['nom_personne']?></a></td>
                <td><?=$value['tel_personne']?></td>
                <td><a href="mailto:<?=$value['email_personne']?>"><?=$value['email_personne']?></a></td>
                <td><a href="?modifcompany=<?=$value['id_societe']?>"><?=$value['nom_societe']?></a></td>
                <td><i onmouseover="this.style.cursor='pointer';" onclick='confirmDeleteContact("<?=$value['prenom_personne']?> <?=$value['nom_personne']?>",<?=$value['id_personne']?>)' class="fa fa-trash-o fa-lg"></i></a></td>
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
                <th></th>
              </tr>
              <?php foreach ($societes as $key => $value){?>
                <tr>
                  <td><a href="?modifcompany=<?=$value['id_societe']?>"><?=$value['nom_societe']?></a></td>
                  <td><?=$value['tel_societe']?></td>
                  <td><?=$value['tva_societe']?></td>
                  <td><?=$value['type']?></td>
                  <td><i onmouseover="this.style.cursor='pointer';" onclick='confirmDeleteCompany("<?=$value['nom_societe']?>",<?=$value['id_societe']?>)' class="fa fa-trash-o fa-lg"></i></a></td>
                </tr>
                <?php } ?>
              </table>
              <?php include("footer.php");?>
              <!-- insérer ici les scripts spécifiques à la page -->
              <?php include("scripts.php");?>
