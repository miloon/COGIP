<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="./">COGIP</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item"><a class="nav-link" href="./">Accueil</a></li>
      <li class="nav-item"><a class="nav-link" href="?factures">Factures</a></li>
      <li class="nav-item"><a class="nav-link" href="?societes">Sociétés</a></li>
      <li class="nav-item"><a class="nav-link" href="?annuaire">Annuaire</a></li>
      <?php
        // si on a une variable de session et qu'elle est valide
        if(isset($_SESSION['id']) && $_SESSION['id']==session_id()) { ?>
      <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" href="?alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Admin
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="?admin"><i class="fa fa-unlock"></i> Administration</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="?newcompany"><i class="fa fa-building"></i> Nouvelle société</a>
          <a class="dropdown-item" href="?newcontact"><i class="fa fa-user-plus"></i> Nouveau contact</a>
          <a class="dropdown-item" href="?newinvoice"><i class="fa fa-file"></i> Nouvelle facture</a>
            <?php if($_SESSION['autorisation']  == "godmode"){ ?>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="?members"><i class="fa fa-user-circle"></i> Membres</a>
            <a class="dropdown-item" href="?register"><i class="fa fa-user-plus"></i> Ajouter un membre</a>
          <?php } ?>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="?deconnect"><i class="fa fa-sign-out"></i> Déconnexion</a>
      </li>
    <?php }else{ ?>
    <li class="nav-item"><a class="nav-link" href="?connect">Connexion</a></li>
    <?php } ?>
    </ul>
  </div>
</nav>
<!--jumbotron-->
<div class="jumbotron">
  <h1>COGIP : département facturation</h1>
</div>
<!--fin menu.php-->
