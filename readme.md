Ce projet met en place un conteneur Docker léger et optimisé combinant Nginx et PHP-FPM sur une base Alpine Linux.

L'image est construite pas à pas de la manière suivante :
FROM : On part de l'image officielle et légère php:8.3-fpm-alpine.

RUN : On met à jour le gestionnaire de paquets (apt) et on installe les dernières versions de nginx et php-fpm. On crée ensuite le dossier /run/php pour stocker les sockets PHP-FPM et on nettoie le cache d'installation pour optimiser la taille finale de l'image

COPY : On intègre les fichiers locaux (index.php & default.conf) directement dans les répertoires de configuration et de rendu du conteneur pour qu'il soit immédiatement prêt à l'emploi

EXPOSE : Indique explicitement que le conteneur travaille sur le port 80. Note : Cette instruction a un rôle purement indicatif/visuel et n'ouvre pas automatiquement le port sur l'hôte

CMD : La ligne finale démarre les services requis pour faire tourner l'architecture (lancement de PHP-FPM et de Nginx au premier plan)


⚠️ Point d'attention (Configuration FastCGI)
fastcgi_pass unix:/run/php/php8.4-fpm.sock;

Cette ligne posera problème si l'image utilise PHP 8.3

La bonne pratique sous Alpine (TCP Loopback) :
fastcgi_pass 127.0.0.1:9000;


🚀 Utilisation & Commandes
On commence par construire notre image
docker build -t websrv-lab01 .

Puis on lance notre conteneur avec notre image
docker run -d -p 8080:80 --name lab01 websrv-lab01


Ouvrez ensuite votre navigateur à l'adresse http://localhost:8080 pour visualiser la page d'acceuil
