<?php
/*
documentation sur php.net pour comprendre ce que font ces fonctions : 
http://php.net/manual/fr/function.password-verify.php
*/


// si le formulaire n'est pas vide, donc il a été rempli et envoyé :
if(!empty($_POST)) {

  // on récupère les données entrées par l'internaute :
    $lelogin = htmlspecialchars(strip_tags(trim($_POST['lelogin'])),ENT_QUOTES);
    $lepass = htmlspecialchars(strip_tags(trim($_POST['lepass'])),ENT_QUOTES);


    // Qu'y a-t-il dans la base de données ?
    $query = "SELECT * FROM `user` WHERE identifiant = '$lelogin'";
    $utilisateur = $pdo->query($query)->fetch();
    $userregistered = $utilisateur['identifiant'];
    $pwdregistered = $utilisateur['motdepasse'];

    // on compare l'identifiant et le mot de passe renseignés par l'utilisateur avec les constantes qu'on vient de définir.
    if($userregistered==$lelogin && password_verify('$lepass', $pwdregistered)){
           // si c'est OK, création de session valide
           $_SESSION['id'] = session_id();
           $_SESSION['identifiant'] = $userregistered;
           // redirection vers la page d'accueil de l'administration, et pas l'accueil normal
           header("Location: ?admin");
       }else{
          // s'il y a une erreur dans la connexion (mot de passe et/on identifiant incorrects, alors on prépare un message d'erreur;)
           $erreur = "Login et/ou mot de passe incorrect(s)";
       }
}
$title="Connexion à l'interface administrateur";
