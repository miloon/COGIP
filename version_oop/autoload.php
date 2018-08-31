<?php
// fonction permettant de récupérer les fichiers de classe à la volée, et uniquement si on en a besoin
// la fonction qui charge
function autoload($nomClasse){
    require 'model/'.$nomClasse.'.class.php';
}
// on indique que la fonction autoload doit être appelée dès que l'on fait une instance d'une classe inconnue
spl_autoload_register('autoload');
