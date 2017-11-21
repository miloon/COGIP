<?php
/*
* Le fichier connect.php est le fichier qui s'occupe de la connexion à la base de données.
* Ici, la connexion à la DB se fait en PDO.
*/
try {
    $strConnection = 'mysql:host=localhost;dbname=cogip';
    $arrExtraParam= array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    $pdo = new PDO($strConnection, 'root', 'root', $arrExtraParam); // Instancie la connexion
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    $msg = 'ERREUR PDO dans ' . $e->getFile() . ' Ligne.' . $e->getLine() . ' : ' . $e->getMessage();
    die($msg);
}
