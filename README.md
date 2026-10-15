Depuis l'image php:8.3-fpm-alpine, on met à jour le gestionnaire apt puis installe
les paquets suivants sur leur dernières version:
- nginx, php-fpm

Ensuite on créer le dossier /run/php afin de stocker les sockets php-fpm et supprime le cache du gestionnaire de paquets APT
à des fins d'optimisation

On continue par la copie locale des deux fichiers de configuration (index.php & default.conf) vers leur repertoire
de configuration afin d'y apporter une configuration directement prête au build du conteneur

La ligne expose dit explicitement le port sur lequel le conteneur va travailler (80) mais n'est que visuel, il n'a aucune
incidence sur la configuration

La dernière ligne de notre Dockerfile démarre les services qu'on a besoin (càd nginx et php-fpm)



Pour le lancer:
docker build -t websrv-lab01 .
docker run -d -p 8080:80 --name lab01 websrv-lab

Une faille:
fastcgi_pass unix:/run/php/php8.4-fpm.sock;

