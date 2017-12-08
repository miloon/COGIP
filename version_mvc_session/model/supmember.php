<?php
/* on va supprimer la personne de contact en fonction de l'id qui a été envoyé en POST
* si la transaction est réussie, l'utilisateur sera redirigé vers l'accueil admin.
* sinon, l'erreur s'affiche et aucune des transactions ne sera effectuée (ici, il n'y en a qu'une)
*/
try {
    $supprcontact = $pdo->exec("DELETE FROM user WHERE id= $iddeletemember;");
    header("Location: ?members");
}catch (Exception $e) {
    echo "Erreur :".$e->getMessage();
    die();
}
