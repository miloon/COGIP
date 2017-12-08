<?php include("header.php");?>
<!-- insérer ici les scripts spécifiques à la page -->
</head>
<body><div class="container">
  <!--Menu de navigation-->
  <?php include("menu.php");?><!--Contenu-->
  <h1>Bienvenue dans le système de facturation de la COGIP</h1>
  <p>Ajouter une nouvelle société dans notre application.</p>
  <?php if(isset($reponse)){ ?>
    <p><?=$reponse?></p>
    <?php } ?>
    <h2>Nouvelle société</h2>
    <form id="formulaire" action="" method="post">
      <div class="form-group">
        <label for="nomsociete">Nom de la société</label>
        <input type="text" class="form-control champ" id="nomsociete" name="nomsociete" placeholder="Nom de la société" required>
      </div>
      <div class="form-group">
        <label for="adresse">Adresse</label>
        <textarea class="form-control champ" rows="3" id="adresse" name="adresse" required>
Adresse de la société
Code Postal Ville
        </textarea>
      </div>
      <div class="row">
        <div class="form-group col-md-4">
          <label for="telephone">Téléphone</label>
          <input type="text" class="form-control champ" id="telephone" name="telephone" placeholder="exemple : 0412 34 56 78" required>
        </div>
        <div class="form-group col-md-4">
          <label for="tva">N° de TVA</label>
          <input type="text" class="form-control champ" id="tva" name="tva" placeholder="exemple : BE 0123 456 789" required>
        </div>
        <div class="form-group col-md-4">
          <label for="typesociete">Type de société</label>
          <select id="typesociete" name="typesociete" class="form-control">
            <?php foreach ($type as $key => $value){?>
              <option value="<?=$value['id_type']?>"><?=$value['type']?></option>
              <?php } ?>
            </select>
          </div>
      </div>
        <button type="submit" id="envoi" class="btn btn-success">Submit</button>
      </form>
      <?php include("footer.php");?>
      <!-- insérer ici les scripts spécifiques à la page -->
      <script type="text/javascript">
      $(document).ready(function(){
          var $nomsociete = $('#nomsociete'),
              $telephone = $('#telephone'),
              $tva = $('#tva'),
              $champ = $('.champ');
          $nomsociete.keyup(function(){
              if($(this).val().length < 5){ // si la chaîne de caractères est inférieure à 5
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
              if($(this).val().length < 9){ // si la chaîne de caractères est inférieure à 5
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
          $tva.keyup(function(){
              if($(this).val().length < 9){ // si la chaîne de caractères est inférieure à 5
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
