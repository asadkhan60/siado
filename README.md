# siado

1) Placer vous dans le repertoire du projet en ligne de commande : cd [chemin vers le projet siado]

2) Installer les dépendances du projet via la commande :
	php composer.phar install

3) Créer une nouvelle base de donnée et configurer le fichier app/config/parameters.yml : 
	database_name: [nom de la nouvelle base de donnée créer]

4) Lancer la commande suivante pour créer toutes les tables de la BDD :
	php bin/console doctrine:schema:update --force

5) Démarrer le serveur :
	php bin/console server:run

6) Créer un administrateur et l'activer en ligne de commande pour ajouter des articles sur le site : 
	php bin/console fos:user:create username test@example.com p@ssword --super-admin
	php bin/console fos:user:activate username

7) Rendez vous sur http://[host]:[port]/admin et identifiez vous avec l'utilisateur créé juste avant.

8) Configurer votre fichier app/config/parameters.yml et le fichier app/config/config.yml pour envoyer/recevoir des mails
