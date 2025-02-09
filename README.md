# Scriptacle

Ce projet permet de gérer un annuaire de spectacles parisiens, incluant les lieux, les spectacles, les réservations et les commentaires des utilisateurs. Le système intègre des fonctionnalités telles que l'inscription des utilisateurs, la gestion des spectacles et des réservations, ainsi que l'attribution de notes et de commentaires.  

Le backend est développé en **PHP avec MySQL**, tandis que le frontend est réalisé avec **HTML/CSS et JavaScript**.

![Demo de l'application](/documentation/scriptacle_cap.png)

## Sommaire

- [Contexte](#contexte)
- - [Description des Choix Techniques](#description-des-choix-techniques)
  - [Backend - PHP & MySQL](#backend---php--mysql)
  - [Frontend - HTML, CSS, et JavaScript](#frontend---html-css-et-javascript)
- [Fonctionnalités Principales](#fonctionnalités-principales)
- [Installation](#installation)  
  - [Prérequis](#prérequis)  
  - [Installation et configuration](#installation-et-configuration)  
  - [Lancement du projet](#lancement-du-projet)  
- [Auteur](#auteurs)

## Contexte

Scriptacle est un projet visant à faciliter la gestion des spectacles parisiens en permettant aux utilisateurs de découvrir, réserver et évaluer des représentations.

## Installation

### Prérequis

Avant de démarrer le projet, assure-toi d'avoir installé les éléments suivants :

* **PHP** 8.0 ou supérieur
* **MySQL** 5.7 ou supérieur
* **Base de données** (MySQL)
* **Serveur local** (ex. WAMP, XAMPP ou LAMP)




1. Démarre le serveur local (WAMP, XAMPP, LAMP)
2. Accède au projet via :
   ```sh
   http://localhost/scriptacle
   ```

## Description des Choix Techniques

### Backend - PHP & MySQL
* **PHP** est utilisé pour la gestion des requêtes backend et des interactions avec la base de données.
* **MySQL** stocke les informations relatives aux utilisateurs, spectacles, réservations et commentaires.
* **PDO** est utilisé pour sécuriser les requêtes SQL et éviter les injections.

### Frontend - HTML, CSS, et JavaScript
* **HTML/CSS** pour la structure et le design de l'application.
* **JavaScript** pour l'interactivité, y compris la gestion des formulaires et des réservations.
* **Bootstrap** pour un design responsive.

## Fonctionnalités Principales

* **Inscription et connexion des utilisateurs**
* **Gestion des spectacles** (titre, description, intervenants, etc.)
* **Réservations** selon les places disponibles
* **Commentaires et notation** après visionnage
* **Réactions aux commentaires** (like, dislike, surpris, etc.)


### Installation et configuration
 **Cloner le projet** :
```bash
git clone https://github.com/Oscarj-jqt/scriptacle
cd scriptacle
```

Installer les dépendances PHP avec composer
```bash
composer install
```

Base de donnée

Importe la base de donnée "spectacles_parisiens", située dans : scriptacle/bdd, avec votre serveur local WAMP ou XAMPP

### Lancement du projet
```bash
php -S localhost:8000
```

### Accéder à la page d'accueil de l'application

http://localhost/scriptacle/template/


## Auteurs

Oscar, Alexis, Aryles, Baptiste, Hugo

