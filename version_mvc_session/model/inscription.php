<?php
/*
documentation sur php.net pour comprendre ce que font ces fonctions :
http://php.net/manual/fr/function.password-hash.php
*/

// si le formulaire n'est pas vide, donc il a été rempli et envoyé :
if(!empty($_POST)) {
    $lelogin = htmlspecialchars(strip_tags(trim($_POST['lelogin'])),ENT_QUOTES);
    // le login ne doit pas déjà figurer dans la DB
    $query = "SELECT `identifiant` FROM `user` WHERE identifiant = '$lelogin'";
    $utilisateur = $pdo->query($query)->fetch();

    // le mot de passe doit avoir été confirmé correctement et l'utilisateur ne doit pas déjà figurer dans la DB
    if(($_POST['lepass'] == $_POST['lepass2']) && (empty($utilisateur))){
      $lepass = htmlspecialchars(strip_tags(trim($_POST['lepass'])),ENT_QUOTES);

          // Traitement du mot de passe envoyé par l'internaute :
          $options = [
              'cost' => 11,
              'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
          ];
          $lepasshash = password_hash('$lepass', PASSWORD_DEFAULT);

          // on envoie dans la DB
          try {
            $pdo->beginTransaction();
            $pdo->exec("INSERT INTO `user`(`identifiant`, `motdepasse`, `fk_acces`)
            VALUES ('$lelogin','$lepasshash',2);");
            $pdo->commit();
            $reponse = $lelogin. " est bien enregistré au sein de la COGIP";
          } catch (Exception $e) {
            $pdo->rollBack();
            $erreur = "Failed: " . $e->getMessage();
          }
    }elseif (!empty($utilisateur)) {
      $erreur = "Ce nom d'utilisateur est déjà pris. Veuillez en choisir un autre.";
    }else{
      $erreur = "Vos mots de passe n'étaient pas cohérents. Veuillez renseigner le même mot de passe dans les deux champs.";
    }


}
$title="Inscription à l'interface administrateur";
