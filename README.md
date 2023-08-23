# SUBSKILL
###### Projet envoyé par l'entreprise Subskill dont le but est d'afficher des annonces de jobs en base de données et de pouvoir les filtrer ainsi que de les parcourir

## Prérequis
- PHP
- Composer
- npm ou choco ou ...

## Lancer le projet 

#### 1. Clonez le projet
###### git clone https://github.com/Clansou/SUBSKILL.git

#### 2.Allez dans le fichier
###### cd SUBSKILL

#### 3.Installez les dépendances PHP 
###### composer install

#### 4.Installez la Base de données
###### DATABASE_URL="mysql://votre_utilisateur:votre_mot_de_passe@127.0.0.1:3306/nom_de_la_base?serverVersion=8.0.32&charset=utf8mb4" dans le fichier .env
###### php bin/console doctrine:database:create
###### php bin/console doctrine:migrations:migrate
###### php bin/console doctrine:fixtures:load

#### 5.Lancez le projet
###### symfony server:start

#### 6.Enjoy :)


