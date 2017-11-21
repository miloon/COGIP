<?php
/* on va supprimer la facture en fonction de l'id qui a été envoyé en POST
* si la transaction est réussie, l'utilisateur sera redirigé vers l'accueil admin.
* sinon, l'erreur s'affiche et aucune des transactions ne sera effectuée (ici, il n'y en a qu'une)
*/
try {
    $supprinvoice = $pdo->exec("DELETE FROM factures WHERE id_facture= $iddeleteinv;");
    header("Location: ?admin");
}catch (Exception $e) {
    echo "Erreur :".$e->getMessage();
    die();
}
