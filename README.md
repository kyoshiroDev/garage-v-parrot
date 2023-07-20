# garage-v-parrot


Site en ligne: 

https://ecf-garage-v-parrot-ad9426be4a47.herokuapp.com/

pour accéder au compte admin: 

email: vincent.parrot@gmail.com

mots de passe: pasword12345

Lien vers le pdf avec les graphiques, charte graphique, mock-up mobile et desktop:

https://drive.google.com/file/d/1dQssQIrAO_pRd3A3vdHCqsO-eJXoP5Qg/view?usp=drive_link

INSTALLATION EN LOCAL

1 Installation de l'environnement:

Afin de pouvoir exécuter l'application en local commencer par mettre en place l'environnement:

  - télécharger et installer le langage PHP 8 sur votre machine 
      https://www.php.net/downloads 
      prendre la version qui correspond à votre système d'exploitation

  - télécharger et installer le composer pour symfony
      https://getcomposer.org/download/
      prendre la version qui correspond à votre système d'exploitation

  - installer le symfony CLI en suivant les instructions 
      qui correspondents a votre système 
      https://symfony.com/download

2 exécution en local de l'application:

Pour lancer notre application en local nous devons d'abord mettre à jour 
notre composer.json pour cela ouvrir un terminal dans l'éditeur et taper la commande "composer update".

Une fois la mise à jour terminée fite dans le terminal un "symfony serve" et taper dans votre navigateur 
l'adresse 17.0.0.1:8000 vous voila sur notre application. 

3 Pour la création d'un utilisateur: 

  installer le plugin https://database-client.com/ 
  connecter vote base de données aller sur garage-v-parrot puis cliquer sur open query
  rentrer la commande "SELECT * FROM user;" appuyer sur ctrl et entrer

  et enfin renter la commande 
  INSERT INTO 'user'(email, roles, password, created_at, last_name, first_name) VALUES ('l\'adresse mail', 'le role', 'le password', 'la date de creation', 'le nom', 'le prenom')

  en remplaçant les valeurs de VALUES pour celle que vous voulez renter en base de données.

Pour accéder au site en ligne: 
