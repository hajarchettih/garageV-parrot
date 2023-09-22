# ECF garageV-parrot
## Introduction
Ce projet concerne la création d'un site web pour un garage fictif qui propose une gamme de services automobiles ainsi que la vente de véhicules d'occasion. L'administrateur, qui est également le gérant de l'entreprise, dispose d'un tableau de bord d'administration qui lui permet de gérer l'ensemble du site. Ses responsabilités incluent la création de comptes utilisateurs et d'employés, la publication d'annonces pour les véhicules d'occasion, la gestion des demandes des clients, ainsi que la supervision des avis clients, entre autres tâches.

Les employés ont également accès au tableau de bord d'administration, mais leurs autorisations sont limitées par rapport à celles de l'administrateur. Ils peuvent effectuer certaines tâches spécifiques assignées, contribuant ainsi au bon fonctionnement du site et à la satisfaction des clients.

## Lien du site
Non déployé, disponible en local en clonant le projet. 

## Environnement de travail
+ PHP 8 ou version supérieur
+ Un serveur de BDD compatible avec Symfony (par ex. MySQL)
+ Un serveur web (par.ex Wampserver)
+ Un gestionnaire de dépendance (par ex.composer)

## Installer le projet en local


+ Depuis votre terminal, lancez cette commande :
```
git clone https://github.com/hajarchettih/garageV-parrot.git
```

+ Accéder au repertoire du projet :
```
~ cd garageV-parrot
```


+ Installez les dépendances requises en utilisant Composer :
```
~ composer install
~ composer require webapp
```

+ Modifier le fichier .env à la racine du projet :
```
DATABASE_URL="mysql://nom_utilisateur:mot_de_passe@127.0.0.1:port/nom_du_projet?serverVersion=8&charset=utf8mb4"
```
+ Créez la base de données en exécutant la commande suivante :
```
 ~ symfony console doctrine:database:create
```
+ Créez les tables en utilisant les entités de votre application, attention vous aurez besoin du MakerBundle de Symfony pour exécuter ces commandes :
```
~ symfony console make:migration
~ symfony console doctrine:migrations:migrate
```

+ Démarrez le serveur Web interne de Symfony en exécutant la commande suivante :
  
```
~ symfony console serve -d
```

**Votre application Symfony est maintenant déployée et accessible à l'adresse http://127.0.0.1:8000**










