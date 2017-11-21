<?php
try {
  /* on va supprimer la société en fonction de l'id qui a été envoyé en POST
  * si la transaction est réussie, l'utilisateur sera redirigé vers l'accueil admin.
  * sinon, l'erreur s'affiche et aucune des transactions ne sera effectuée (ici, il n'y en a qu'une)
  */
    $supprcompany = $pdo->exec("DELETE FROM societes WHERE id_societe=$iddeletecomp;");
    header("Location: ?admin");
}catch (Exception $e) {
    echo "Erreur :".$e->getMessage();
    die();
}
