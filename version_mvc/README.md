# COGIP version avec MVC

## Organisation des dossiers

``index.php`` : C'est le fichier qui va être à la racine de ton site. Il est donc situé en dehors des dossiers. Le fichier va faire en sorte d'importer des fichiers sur toutes les pages. On importe donc le fichier ``connect.php`` et le ``routeur.php``.

### Controller

``routeur.php`` : Ce fichier va servir à diriger ou rediriger l'internaute en fonction de ses choix (lien sur lequel il a cliqué) et/ou en fonction de ses permissions. Le routeur, c'est souvent un switch mais pour cet exemple, le routeur est rédigé sous forme de condition if/elseif/else. Il prend en compte toutes les pages auxquelles l'utilisateur a un droit d'accès et définit une page par défaut qui va s'affiche dans le cas où y'a une tentative d'accès à une page qui n'existe pas.

### Model

``connect.php`` : Le fichier qui va permettre de faire le lien entre la base de données et le site internet.

``config.php`` : Ici, il n'y est pas mais normalement, on crée ce fichier pour stocker les données sensibles comme l'identifiant, le mot de passe, le nom de la base de données,... Ce fichier, on le place dans un .gitignore afin qu'il ne soit JAMAIS pushé sur GitHub.

``manifest.json`` : Fichier utilisé pour les Progressive Web Application.

``cogip.sql`` : Fichier SQL reprenant la structure et les données de la base de données utilisées pour le site.

``tous les autres fichiers`` : Contiennent les requêtes SQL qui vont récupérer les données à afficher dans les vues. On va également déterminer dans ce fichier la variable d'affichage qui contiendra le message d'erreur à afficher dans le cas où la requête SQL ne retourne pas de données à l'aide d'une condition. Également, on va générer une variable ``$title`` qui contiendra le titre de la page qui est chargée. Pour les pages ``detailcontact.php``, ``detailfacture.php`` et ``detailsociete.php``, le titre changera en fonction de la ligne sélectionnée dans la base de données par la requête SQL.

### View

``img`` : Dossier contenant les images. Il est important de bien organiser ses fichiers et de ne pas mettre les images et les fichiers php ensemble.

``css`` : Dossier contenant les fichiers CSS. RAPPEL : On place toujours le CSS dans un fichier CSS et pas dans le ``<head>`` de ses fichiers HTML. Même s'il n'y a qu'une ligne. Un fichier CSS pour gouverner tous les fichiers HTML !

``menu.php``, ``header.php``, ``footer.php`` : Ce sont des fichiers qui regroupent du code HTML à intégrer dans les différentes pages web. Les noms des fichiers sont tout de même assez explicites. RAPPEL : Comme le contenu sera identique sur toutes les pages, on regroupe le contenu sur un fichier unique qu'on appelle à un endroit précis de la page HTML à afficher. Dans le ``header.php``, o.n fait un appel à la variable ``$title`` qui est différente selon la page chargée.

``tous les autres fichiers`` : Dans la partie ``View``, il s'agira de coder la partie HTML qui s'affichera en plaçant aux bons endroits les boucles et les variables PHP contenant les données à afficher (et comme c'est trop long à écrire, j'appellerai ça des *variables d'affichage*).
