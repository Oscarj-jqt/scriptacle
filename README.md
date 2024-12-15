# Scriptacle

Ce projet permet de gérer un annuaire de spectacles parisiens, incluant les lieux, les spectacles, les réservations et les commentaires des utilisateurs. Le système inclut des fonctionnalités comme l'inscription des utilisateurs, la gestion des spectacles et des réservations, ainsi que l'attribution de notes et de commentaires. Le backend est développé en **PHP avec MySQL**, tandis que le frontend est réalisé avec **HTML/CSS et JavaScript**.

## Description des Choix Techniques

### Backend - PHP & MySQL
* **PHP** est utilisé pour la gestion des requêtes backend et des interactions avec la base de données. Le code backend inclut des fonctionnalités pour l'inscription des utilisateurs, la gestion des spectacles et des réservations.
* **MySQL** est la base de données choisie pour stocker toutes les informations relatives aux utilisateurs, spectacles, réservations et commentaires.
* **PDO** est utilisé pour sécuriser les interactions avec la base de données en utilisant des requêtes préparées et éviter les injections SQL.

### Frontend - HTML, CSS, et JavaScript
* Le **frontend** est développé avec du **HTML**, du **CSS** pour le design, et du **JavaScript** pour rendre l'application interactive. Les formulaires de connexion et d'inscription, ainsi que la gestion des réservations et des commentaires, sont gérés avec du JavaScript.
* **Bootstrap** est utilisé pour le design responsive et l'interface utilisateur.

## Fonctionnalités Principales
* **Inscription et connexion des utilisateurs** : Les utilisateurs peuvent s'inscrire et se connecter pour gérer leurs réservations et laisser des commentaires.
* **Gestion des spectacles** : Chaque spectacle a un titre, une description, et peut être associé à plusieurs parties prenantes (acteurs, metteur en scène, etc.).
* **Réservations** : Les utilisateurs peuvent réserver des places pour un spectacle, sous réserve de places disponibles.
* **Commentaires et notation** : Les utilisateurs peuvent commenter et noter un spectacle uniquement s'ils l'ont vu.
* **Réactions aux commentaires** : Les utilisateurs peuvent réagir aux commentaires avec des options prédéfinies (like, dislike, surprised, dubious).

## Prérequis

Avant de démarrer le projet, assure-toi d'avoir installé les éléments suivants :

* **PHP** 8.0 ou supérieur
* **MySQL** 5.7 ou supérieur
* **Base de données** (MySQL)
* **Serveur local** (ex. WAMP, XAMPP ou LAMP)

### Instructions pour l'installation

 **Cloner le projet** :
```bash
git clone https://github.com/Oscarj-jqt/scriptacle
cd scriptacle
```

### Installer les dépendances PHP avec composer
```bash
composer install
```

### Base de donnée
Importez la base de donnée "spectacles_parisiens" sur avec votre serveur local WAMP ou XAMPP

### Exécution du projet
```bash
php -S localhost:8000
```

### Accéder à la page d'accueil de l'application

http://localhost/scriptacle/template/


## Contributeurs au projet

Oscar, Alexis, Aryles, Baptiste, Hugo

