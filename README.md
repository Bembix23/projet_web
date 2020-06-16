# README PROJET UF
## by Gauthier MICHON, Benjamin CHANCEREL et Jules DUPUIS

## Pour acceder au site

Sur votre PC, veuillez installer le logiciel XAMPP qui va vous permettre de faire fonctionner notre site.

Lors du premier lancement du logiciel, veuillez, si nécessaire, configurer la partie Apache et la partie MySQL. Lorsque vous avez fini la configuration de cela, vous pouvez les activer.

Vous aurez ainsi accès à PHPMyAdmin, qui nous a permis de gérer la base de données, mais qui va aussi vous permettre de la mettre sur notre site. 

Sur votre navigateur, saisissez dans votre barre URL: 

localhost:8080  (*port que vous avez saisi pendant la configuration*)    /phpmyadmin

Vous pourrez alors creer votre base de données grâce à notre script de création de notre BDD.

Téléchargez notre script de BDD à partir de notre Git, il est dans le dossier principal et se finit par .sql. 

Puis sur le PHPMyAdmin, après avoir créer la base de données, cliquez sur "Importer" dans le menu horizontal, sélectionner le fichier que vous venez de télécharger (le script) puis exécutez. Ca y est votre base de données est opérationelle.

Récuperez ensuite le dossier du site complet et insérez le dans le dossier htdocs de xampp de la manière suivante:

allez dans le dossier de votre disque dur, puis trouvez le dossier xampp, il s'y trouve un dossier php, ouvrez le. Ouvrez ensuite htdocs, vous pouvez y glisser le dossier du site.

Ensuite ouvrez votre navigateur et tapez l'URL:

localhost:8080(*port mis lors de la configuration*)/Projet_web/index.php

Ca y est, normalement vous êtes sur notre site.



