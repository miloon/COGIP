<?php include("header.php");?>
<link rel="stylesheet" href="view/css/jquery.datetimepicker.min.css">
<!-- insérer ici les scripts spécifiques à la page -->
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
<h2>Nouvelle facture</h2>
<form action="" method="post">
  <div class="form-group">
    <label for="numeroinv">Numéro de facture</label>
    <small class="form-text text-muted">Format YYYYMMDDnumero</small>
    <input type="text" class="form-control" id="numeroinv" aria-describedby="emailHelp" placeholder="numéro de facture" required>
  </div>

  <div class="form-group">
    <label for="datetimepicker">Date de la facture</label>
    <small class="form-text text-muted">Format YYYY-MM-DD</small>
    <input type="date" class="form-control" id="datetimepicker" name="dateinv" placeholder="date de facture" required>
  </div>
<div class="row">
  <div class="form-group col-md-6">
    <label for="societeinv">Société affiliée à la facture</label>
    <select id="societeinv" name="societeinv" class="form-control">
      <?php foreach ($societes as $key => $value){?>
        <option value="<?=$value['id_societe']?>"><?=$value['nom_societe']?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="personinv">Personne de contact affiliée à la facture</label>
      <select id="personinv" name="personinv" class="form-control">
        <?php foreach ($person as $key => $value){?>
          <option value="<?=$value['id_personne']?>"><?=$value['prenom_personne']?> <?=$value['nom_personne']?> @ <?=$value['nom_societe']?></option>
          <?php } ?>
        </select>
      </div>
</div>

    <button type="submit" name="envoyer" class="btn btn-success">Submit</button>
  </form>
<?php include("footer.php");?>
<!-- insérer ici les scripts spécifiques à la page -->
<script type="text/javascript">
	//jQuery.datetimepicker.setLocale('fr');
	jQuery('#datetimepicker').datetimepicker({
		format: 'Y-m-d'
	});
</script>
<script type="text/javascript">
$(document).ready(function(){
    var $numeroinv = $('#numeroinv'),
        $datetimepicker = $('#datetimepicker'),
        $champ = $('.champ');
    $numeroinv.keyup(function(){
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
    $datetimepicker.keyup(function(){
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
