# Répartition des Tâches - Projet Annuaire de Spectacles Parisiens

## 1. Base de Données (Oscar)
- **Conception initiale de la base de données :**
  - Création des tables principales (sans dépendances complexes) : `Lieu`, `Salle`, `Utilisateur`.
- **Création des scripts SQL :**
  - Scripts de base pour insérer, mettre à jour et supprimer des lieux et des salles indépendamment des autres tables.
- **Scripts de test :**
  - Génération de données de test de manière autonome.

---

## 2. Backend Utilisateurs (Baptiste)
- **Gestion des utilisateurs :**
  - Inscription, connexion et déconnexion des utilisateurs.
  - Gestion des profils utilisateurs de manière isolée (sans interaction directe avec les autres entités pour le moment).
- **Fonctionnalités liées aux utilisateurs :**
  - Validation des entrées et sécurité des mots de passe.

---

## 3. Backend Spectacles et Réservations (Alexis)
- **Gestion des spectacles :**
  - CRUD pour les spectacles, avec gestion des représentations (en utilisant des données simulées si la base n'est pas encore finalisée).
- **Réservation :**
  - Gestion des réservations pour des représentations (faux tickets ou places de test).
- **Dépendances simulées :**
  - Utilisation de données statiques pour les lieux ou les utilisateurs si les tâches liées ne sont pas encore finalisées.

---

## 4. Frontend (Issa)
- **Pages statiques HTML/CSS :**
  - Création des pages principales (page d'accueil, page de liste de spectacles, page d'inscription) sans connexion à la base de données pour le moment.
- **Intégration de formulaires :**
  - Mise en place des formulaires d'inscription et de réservation.
- **Styles CSS :**
  - Conception du thème général et des styles de base.

---

## 5. Tests et Géolocalisation (Hugo)
- **Implémentation du plan d'accès :**
  - Intégration d'un composant de géolocalisation simple (Google Maps ou autre) pour afficher un lieu avec des données simulées.
- **Prototypage interactif :**
  - Création d'une version statique ou avec des données simulées pour l'affichage du plan.

---
