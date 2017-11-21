<?php include("header.php");?>
</head>
<body><div class="container">
<!--Menu de navigation-->
<?php include("menu.php");?>
<!--Contenu-->
<h1>Bienvenue dans le système de facturation de la COGIP</h1>
<p>Insérer une nouvelle facture dans notre application.</p>
<?php if(isset($reponse)){ ?>
  <p><?=$reponse?></p>
<?php } ?>
<h2>Nouveau contact</h2>
<form action="" method="post" class="well form">
  <div class="row">
  <div class="form-group col-md-6">
    <label for="nom_personne">Nom</label>
    <input type="text" class="form-control champ" id="nom_personne" name="nom_personne" placeholder="Nom" required>
  </div>
  <div class="form-group col-md-6">
    <label for="prenom_personne">Prénom</label>
    <input type="text" class="form-control champ" id="prenom_personne" name="prenom_personne" placeholder="Prénom" required>
  </div>
</div>
<div class="row">
  <div class="form-group col-md-4">
    <label for="telephone">Téléphone</label>
    <input type="text" class="form-control champ" id="telephone" name="telephone" placeholder="exemple : 0412 34 56 78" required>
  </div>
  <div class="form-group col-md-4">
    <label for="email">E-mail</label>
    <input type="email" class="form-control champ" id="email" name="email" placeholder="email" required>
  </div>
  <div class="form-group col-md-4">
    <label for="societecontact">Société</label>
    <select id="societecontact" name="societecontact" class="form-control">
      <?php foreach ($societes as $key => $value){?>
        <option value="<?=$value['id_societe']?>"><?=$value['nom_societe']?></option>
        <?php } ?>
      </select>
    </div>
</div>

    <button type="submit" name="envoyer" class="btn btn-success">Submit</button>
  </form>
  <?php include("footer.php");?>
  <!-- insérer ici les scripts spécifiques à la page -->
  <script type="text/javascript">
  $(document).ready(function(){
      var $nom_personne = $('#nom_personne'),
          $prenom_personne = $('#prenom_personne'),
          $telephone = $('#telephone'),
          $email = $('#email'),
          $champ = $('.champ');
      $nom_personne.keyup(function(){
          if($(this).val().length < 2){ // si la chaîne de caractères est inférieure à 5
              $(this).css({ // on rend le champ rouge
                  borderColor : 'red',
              color : 'red'
              });
           }
           else{
               $(this).css({ // si tout est bon, on le rend vert
               borderColor : '#ccc',
               color : 'green'
           });
           }
      });
      $prenom_personne.keyup(function(){
          if($(this).val().length < 2){ // si la chaîne de caractères est inférieure à 5
              $(this).css({ // on rend le champ rouge
                  borderColor : 'red',
              color : 'red'
              });
           }
           else{
               $(this).css({ // si tout est bon, on le rend vert
               borderColor : '#ccc',
               color : 'green'
           });
           }
      });
      $telephone.keyup(function(){
        //var reg = new RegExp('^\\d+$');
        if(!reg.test($(this).val())){
            $(this).css({ // si la condition n'est pas remplie, on rend le champ rouge
            borderColor : 'red',
            color : 'red'
          });
        }else if($(this).val().length < 8){
            $(this).css({ // si la condition n'est pas remplie, on rend le champ rouge
            borderColor : 'red',
            color : 'red'
          });
        }else if($(this).val().length > 10){
            $(this).css({ // si la condition n'est pas remplie, on rend le champ rouge
            borderColor : 'red',
            color : 'red'
          });
        }
        else{
          $(this).css({ // si tout est bon, on le rend vert
            borderColor : 'green',
            color : 'green'
          });
        }
      });
      $email.keyup(function(){
          if($(this).val().length < 6){ // si la chaîne de caractères est inférieure à 5
              $(this).css({ // on rend le champ rouge
                  borderColor : 'red',
              color : 'red'
              });
           }
           else{
               $(this).css({ // si tout est bon, on le rend vert
               borderColor : '#ccc',
               color : 'green'
           });
           }
      });
  });
  </script>
  <?php include("scripts.php");?>
