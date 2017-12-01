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
        var question = confirm("Voulez-vous vraiment supprimer le membre " + nom + " ?");
        if (question) {
            document.location.href = "?delete_user=" + id;
        }
    }
</script>
</head>
<body><div class="container">
  <!--Menu de navigation-->
  <?php include("menu.php");?>
  <!--Contenu-->
  <h1>Bienvenue dans le système de facturation de la COGIP</h1>
  <p>
    <a href="?register" type="button" class="btn btn-success"><i class="fa fa-user-circle fa-lg"></i> Ajouter un membre</a>
        </p>
        <h2>Membres autorisés par la COGIP</h2>
        <table class="table table-striped">
          <tr>
            <th>Identifiant</th>
            <th>Accès</th>
            <th></th>
          </tr>
          <?php foreach ($members as $key => $value){?>
            <tr>
              <td><a href="?modifuser=<?=$value['id']?>"><?=$value['identifiant']?></a></td>
              <td><?=$value['autorisation']?></td>
              <td><i onmouseover="this.style.cursor='pointer';" onclick='confirmDeleteInv("<?=$value['identifiant']?>",<?=$value['id']?>)' class="fa fa-trash-o fa-lg"></i></a></td>
            </tr>
            <?php } ?>
          </table>
              <?php include("footer.php");?>
              <!-- insérer ici les scripts spécifiques à la page -->
              <?php include("scripts.php");?>
