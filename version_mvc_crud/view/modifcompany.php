<?php include("header.php");?>
<!-- insérer ici les scripts spécifiques à la page -->
</head>
<body><div class="container">
  <!--Menu de navigation-->
  <?php include("menu.php");?><!--Contenu-->
  <h1>Bienvenue dans le système de facturation de la COGIP</h1>
  <?php if(isset($reponse)){ ?>
    <p><?=$reponse?></p>
    <?php } ?>
    <h2>Nouvelle société</h2>
    <form id="formulaire" action="" method="post" class="well form">
      <div class="form-group">
        <label for="nomsociete">Nom de la société</label>
        <input type="text" class="form-control champ" id="nomsociete" name="nomsociete" value="<?=$societe['nom_societe']?>" required>
      </div>
      <div class="form-group">
        <label for="adresse">Adresse</label>
        <textarea class="form-control champ" rows="3" id="adresse" name="adresse" required>
<?=$societe['adresse_societe']?>
        </textarea>
      </div>
      <div class="row">
        <div class="form-group col-md-4">
          <label for="telephone">Téléphone</label>
          <input type="text" class="form-control champ" id="telephone" name="telephone" value="<?=$societe['tel_societe']?>" required>
        </div>
        <div class="form-group col-md-4">
          <label for="tva">N° de TVA</label>
          <input type="text" class="form-control champ" id="tva" name="tva" value="<?=$societe['tva_societe']?>" required>
        </div>
        <div class="form-group col-md-4">
          <label for="typesociete">Type de société</label>
          <select id="typesociete" name="typesociete" class="form-control">
            <?php foreach ($type as $key => $value){
              if ($value['id_type'] == $societe['fk_type']) {
                $selected = "selected";
              }
              ?>
              <option <?php if (isset($selected)){echo $selected;}?> value="<?=$value['id_type']?>"><?=$value['type']?></option>
              <?php $selected="";
             } ?>
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
