<?php include("header.php");?>
</head>
<body><div class="container">
  <!--Menu de navigation-->
  <?php include("menu.php");?>
  <!--Contenu-->
  <h1>Bienvenue dans le système de facturation de la COGIP</h1>
  <?php if(isset($reponse)){ ?>
    <p><?=$reponse?></p>
    <?php } ?>
    <h2>Modification de l'accès de <?=$member['identifiant']?></h2>
    <form action="" method="post" class="well form">
      <div class="row">
        <div class="form-group col-md-6">
          <label for="identifiant">Identifiant</label>
          <input type="text" class="form-control champ" id="identifiant" name="identifiant" value="<?=$member['identifiant']?>" required>
        </div>
        <div class="form-group col-md-6">
          <label for="identifiant">Type d'autorisation</label>
          <select id="autorisation" name="autorisation" class="form-control">
            <?php foreach ($acces as $key => $value){
              if ($value['id'] == $member['acces']) {
                $selected = "selected";
              }
              ?>
              <option <?php if (isset($selected)){echo $selected;}?> value="<?=$value['id']?>"><?=$value['autorisation']?></option>
              <?php $selected="";
             } ?>
            </select>
        </div>
        <div class="col-md-12">
          <button type="submit" name="envoyer" class="btn btn-success">Submit</button>
        </div>
      </div>
    </form>

    <?php include("footer.php");?>
    <!-- insérer ici les scripts spécifiques à la page -->
    <script type="text/javascript">
    $(document).ready(function(){
      var $identifiant = $('#identifiant'),
      var reg = new RegExp('^\\d+$');
      $identifiant.keyup(function(){
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
});
</script>
<?php include("scripts.php");?>
