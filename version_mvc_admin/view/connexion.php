<?php include("header.php");?>
</head>
<body><div class="container">
<!--Menu de navigation-->
<?php include("menu.php");?>
<!--Contenu-->
<h1>Bienvenue dans l'espace de connexion de la COGIP</h1>



<p>Voulez-vous bien vous identifier ?</p>
<div class="row">
<div class="col-md-offset-1 col-md-10">
  <!-- On prépare un endroit où on va afficher le message d'erreur pour l'utilisateur.-->
  <?php if(isset($erreur)){?>
    <p><?=$erreur?></p>
  <?php }
    ?>
    <!-- Formulaire de connexion -->
  <form method="post" action="" class="well form">
    <div class="form-group">
      <label for="lelogin">Votre identifiant</label>
      <input type="text" class="form-control" id="lelogin" name="lelogin" placeholder="Email">
    </div>
    <div class="form-group">
      <label for="lepass">Votre mot de passe</label>
      <input type="password" class="form-control" id="lepass" name="lepass" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
  </form>
</div>
</div>
<?php include("footer.php");?>
<!-- insérer ici les scripts spécifiques à la page -->
<?php include("scripts.php");?>
