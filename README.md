# Répartition des Tâches - Projet Annuaire de Spectacles Parisiens

## 1. Base de Données et API(Oscar)
- **Conception initiale de la base de données
- **Création des scripts SQL
- **Scripts de test

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

## 4. Frontend (Hugo)
- **Pages statiques HTML/CSS :**
  - Création des pages principales (page d'accueil, page de liste de spectacles, page d'inscription) sans connexion à la base de données pour le moment.
- **Styles CSS :**
  - Conception du thème général et des styles de base.

---