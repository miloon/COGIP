<?php
/*
* Le fichier index.php c'est un peu le maestro de ton site. Il appelle les fichiers essentiels au bon fonctionnement du site.
* Ici, on n'appelle que la connexion (pour que tout le site bénéficie de la connexion à la base de données)
* et le routeur pour que celui-ci (qui est un peu comme un aiguilleur de train) permette au site d'aller chercher les bons fichiers pour aller chercher les bonnes données dans la DB et pour afficher le bon code pour avoir l'affichage qu'on souhaite à l'écran.
*/
// on appelle le fichier qui va nous connecter à la base de données.
require("model/connect.php");
// routeur pour la navigation
require("controller/routeur.php");
