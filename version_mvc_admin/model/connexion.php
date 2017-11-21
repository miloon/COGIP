<?php
// si le formulaire n'est pas vide, donc il a été rempli et envoyé :
if(!empty($_POST)) {
    $lelogin = htmlspecialchars(strip_tags(trim($_POST['lelogin'])),ENT_QUOTES);
    $lepass = htmlspecialchars(strip_tags(trim($_POST['lepass'])),ENT_QUOTES);
    // pour le moment, on met les identifiants ici. C'est INTERDIT de faire ça tellement c'est déconseillé mais c'est en attendant.
    define("LOG","Jean-Christian");
    define("PWD","Ranu");
    // on compare l'identifiant et le mot de passe renseignés par l'utilisateur avec les constantes qu'on vient de définir.
    if((LOG==$lelogin) and ($lepass==PWD) ){
           // si c'est OK, création de session valide
           $_SESSION['id'] = session_id();
           $_SESSION['identifiant'] = $lelogin;
           // redirection vers la page d'accueil de l'administration, et pas l'accueil normal
           header("Location: ?admin");
       }else{
          // s'il y a une erreur dans la connexion (mot de passe et/on identifiant incorrects, alors on prépare un message d'erreur;)
           $erreur = "Login et/ou mot de passe incorrect(s)";
       }
}
$title="Connexion à l'interface administrateur";
