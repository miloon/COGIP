<?php
// si le formulaire n'est pas vide, donc il a été rempli et envoyé :
if(!empty($_POST)) {
    $lelogin = htmlspecialchars(strip_tags(trim($_POST['lelogin'])),ENT_QUOTES);
    if($_POST['lepass'] == $_POST['lepass2']){
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
            echo "Failed: " . $e->getMessage();
          }
    }


}
$title="Inscription à l'interface administrateur";
