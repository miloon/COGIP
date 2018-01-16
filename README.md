# COGIP

Un petit site à destination des stagiaires de BeCode avec du code, des commentaires et du design de mauvais goût.

![screenshot cogip](screenshot.jpg)

## requêtes SQL, routeur, MVC, liens

Ce site est un prétexte pour voir la connexion PDO, les requêtes SQL, l'affichage des variables, les GET, le routeur, l'architecture MVC, le CRUD, les sessions, les autorisations, les vérifications de sécurité,...

Dans chaque fichier, des commentaires avec des explications pour comprendre quoi fait quoi et où et surtout pourquoi.

## Une application de facturation pour Jean-Christian Ranu

Plusieurs versions de l'application :
- une [version simple sans MVC](version_no_mvc)
- une [version avec MVC simpliste](version_mvc) (pour comprendre la base des bases)
- une [version avec MVC simpliste et une administration avec CRUD basique](version_mvc_crud)
- une [version avec le package précédent + session](version_mvc_session) (un système d'enregistrement, modification et suppression des utilisateurs de l'application)

Dans un premier temps, il a été demandé aux stagiaires de réalisé un site avec les connaissances qu'ils avaient. Puis, il leur a été demandé de modifier l'architecture de l'application en respectant les principes de base du MVC, histoire de dédiaboliser le concept et de leur montrer que finalement, c'est pas compliqué.

Puis j'ai décidé de continuer ce site en ajoutant, au fur et à mesure, des fonctionnalités, sans utiliser de frameworks, toujours pour montrer que faire un site complet, c'est pas compliqué.

## Que dois-je savoir de plus ?

Dans chaque version, il y a un fichier ``cogip.sql`` qui contient la structure et les données de la base de données qui s'appelle cogip. Dans la version_no_mvc, le fichier se trouve à la racine. Dans la version_mvc, il se trouve dans le dossier model.

## Ce qu'il n'y a pas (encore) dans ce repo
- un système de tri pour les tableaux (je ne sais pas encore avec quelle techno, peut-être Angular)
- un script pour sanitizer les dates en php
- système de session avec autorisations différentes (droits d'administration) selon l'utilisateur connecté
- de l'orienté objet 
