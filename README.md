# GestionLivre
//creation projet sympfony
composer create-project symfony/skeleton:"6.4.*" NomDuProjet 

//ajout de twig bundle
composer require twig-bundle

//ajout du chemin pour les lien css et images
composer requipre asset

//install tout les package sur la meme ligne de commande
composer requipre validator form symfony/maker-bundle

//instalation doctrine
composer require symfony/orm-pack

creation de .env.dev

//demarrer le server
symfony server:start

//creation d'une class
symfony console make:entity nom de l'entity
puis ajout des param dans la console

//migration de la bdd
symfony console d:m:m
symfony console d:f:l

//installation des securité package
composer requipre security-csrf

//crée le crud des entity ATTENTION faire la migration avant
symfony console make:crud

