
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="./">COGIP</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          <li role="presentation"><a href="./">Accueil</a></li>
          <li role="presentation"><a href="?factures">Factures</a></li>
          <li role="presentation"><a href="?societes">Sociétés</a></li>
          <li role="presentation"><a href="?annuaire">Annuaire</a></li>
          <?php
            // si on a une variable de session et qu'elle est valide
            if(isset($_SESSION['id']) && $_SESSION['id']==session_id()) { ?>
                <li role="presentation" class="dropdown">
          <a href="?admin" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="?admin">Dashboard</a></li>
            <li><a href="?newcompany">Nouvelle société</a></li>
            <li><a href="?newcontact">Nouveau contact</a></li>
            <li><a href="?newinvoice">Nouvelle facture</a></li>
            <li role="separator" class="divider"></li>
            <li role="presentation"><a href="?deconnect">Déconnexion</a></li>
          </ul>
        </li>
                <?php
            }else{ ?>
               <li role="presentation"><a href="?connect">Connexion</a></li>
            <?php
            }
            ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="jumbotron hidden-sm hidden-xs">
  <h1>COGIP : département facturation</h1>
</div>
