<?php

// Instanciation du Manager Facture (le modèle est récupéré depuis le contrôleur frontal grâce à l'autoload.php)
$gere_facture = new FactureManager($maconnexion);
// Instanciation du Manager Societe POUR RECUPERER LA LISTE DES SOCIETES POUR LES FORMULAIRES L'UPDATE ET L'INSERT (le modèle est récupéré depuis le contrôleur frontal grâce à l'autoload.php)
/*$gere_societe = new SocieteManager($maconnexion);*/

// si on est sur la page d'accueil (pas de variables GET)
if(empty($_GET)){
    // on va lister toutes les factures de la db
    // récupération des factures grâce à la méthode ListerFacture()
    $tous = $gere_facture->listerFacture();

    // création d'un objet de type Facture par résultat (pour vérification des données grâce aux setters)
    foreach ($tous as $valeur){
        $toutesLesFactures[] = new Facture($valeur);
      // c'est dans cette variable que l'hydratation se fait pas.
      // pr($toutesLesFactures);
    }
    // appel de la vue
    $title = "Ecran d'accueil";
    require_once "view/ListeFacture.php";
}
?>
