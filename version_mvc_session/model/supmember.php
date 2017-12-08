<?php
/*
* On va vérifier qu'on ne s'auto supprime pas avant de supprimer le membre.
*/
if(!($iddeletemember == $_SESSION['idmember'])){
  try {
      $supprcontact = $pdo->exec("DELETE FROM user WHERE id= $iddeletemember;");
      header("Location: ?members");
  }catch (Exception $e) {
      echo "Erreur :".$e->getMessage();
      die();
  }
}else{
  echo "Vous ne pouvez pas vous auto-supprimer !!!";
}
