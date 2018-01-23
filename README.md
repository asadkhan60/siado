# siado

1) Placer vous dans le repertoire du projet en ligne de commande : 
	cd <chemin vers le projet siado>

2) Installer les dépendances du projet via la commande :
	php composer.phar install

3) Créer une nouvelle base de donnée et configurer le fichier app/config/parameters.yml : 
	database_name: [nom de la nouvelle base de donnée créer]

4) Lancer la commande suivante pour créer toutes les tables de la BDD :
	php bin/console doctrine:schema:update --force

5) Démarrer le serveur :
	php bin/console server:run

6) Ajouter des articles sur le site à l'adresse suivante :
	http://[host]:[port]>/admin (identifiant et mot de passe = admin par défaut)

7) Configurer votre fichier app/config/parameters.yml et le fichier app/config/config.yml pour envoyer/recevoir des mails
