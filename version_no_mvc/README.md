# COGIP version sans MVC

## Organisation des fichiers
Tout dans le même dossier, sauf les images qui se trouvent dans le dossier ``img``.

``connect.php`` : Le fichier qui va permettre de faire le lien entre la base de données et le site internet.

``config.php`` : Ici, il n'y est pas mais normalement, on crée ce fichier pour stocker les données sensibles comme l'identifiant, le mot de passe, le nom de la base de données,... Ce fichier, on le place dans un .gitignore afin qu'il ne soit JAMAIS pushé sur GitHub.

``routeur.php`` : Ce fichier va servir à diriger ou rediriger l'internaute en fonction de ses choix (lien sur lequel il a cliqué) et/ou en fonction de ses permissions. Le routeur, c'est souvent un switch mais pour cet exemple, le routeur est rédigé sous forme de condition if/elseif/else. Il prend en compte toutes les pages auxquelles l'utilisateur a un droit d'accès et définit une page par défaut qui va s'affiche dans le cas où y'a une tentative d'accès à une page qui n'existe pas.

``index.php`` : le fichier qui va faire en sorte d'importer des fichiers sur toutes les pages. On importe donc le fichier ``connect.php`` et le ``routeur.php``.

``accueil.php`` : Page d'accueil du site internet. Pour notre projet, nous avons besoin que dès la page d'accueil on aille récupérer des informations depuis la base de données. Pareil pour les autres pages.

``detailcontact.php``, ``detailsociete.php``, ``detailfacture.php`` : Il s'agit de pages qui vont être générées en fonction ds paramètres passés en get onclick d'un lien. Les explications sont sur les fichiers.

``menu.php``, ``header.php``, ``footer.php`` : Ce sont des fichiers qui regroupent du code HTML à intégrer dans les différentes pages web. Les noms des fichiers sont tout de même assez explicites.
