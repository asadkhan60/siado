# siado

1) Placer vous dans le repertoire du projet en ligne de commande.
	cd <chemin vers le projet siado>

2) Installer les d�pendances du projet via la commande :
	php composer.phar install

3) Cr�er une nouvelle base de donn�e et configurer le fichier app/config/parameters.yml
	parameters:
		...
		database_name: <nom de la nouvelle base de donn�e cr�er>
		...

4) Lancer la commande suivante pour cr�er toutes les tables de la BDD :
	php bin/console doctrine:schema:update --force

5) D�marrer le serveur :
	php bin/console server:run

6) Ajouter des articles sur le site � l'adresse suivante :
	http://<host>:<port>/admin (identifiant et mot de passe = admin par d�faut)

7) Configurer votre fichier app/config/parameters pour envoyer/recevoir des mails en remplissant les lignes suivantes :
	parameters:
		...
		mailer_transport: 
    		mailer_host: 
    		mailer_user: 
    		mailer_password:
		...

   Et le fichier app/config/config.yml pour configurer l'envoyeur des mails :
	fos_user:
		...
		from_email:
			address:
			sender_name: