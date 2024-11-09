# Répartition des Tâches - Projet Annuaire de Spectacles Parisiens

## 1. Base de Données (Personne 1)
- **Conception initiale de la base de données :**
  - Création des tables principales (sans dépendances complexes) : `Lieu`, `Salle`, `Utilisateur`.
- **Création des scripts SQL :**
  - Scripts de base pour insérer, mettre à jour et supprimer des lieux et des salles indépendamment des autres tables.
- **Scripts de test :**
  - Génération de données de test de manière autonome.

---

## 2. Backend Utilisateurs (Personne 2)
- **Gestion des utilisateurs :**
  - Inscription, connexion et déconnexion des utilisateurs.
  - Gestion des profils utilisateurs de manière isolée (sans interaction directe avec les autres entités pour le moment).
- **Fonctionnalités liées aux utilisateurs :**
  - Validation des entrées et sécurité des mots de passe.

---

## 3. Backend Spectacles et Réservations (Personne 3)
- **Gestion des spectacles :**
  - CRUD pour les spectacles, avec gestion des représentations (en utilisant des données simulées si la base n'est pas encore finalisée).
- **Réservation :**
  - Gestion des réservations pour des représentations (faux tickets ou places de test).
- **Dépendances simulées :**
  - Utilisation de données statiques pour les lieux ou les utilisateurs si les tâches liées ne sont pas encore finalisées.

---

## 4. Frontend (Personne 4)
- **Pages statiques HTML/CSS :**
  - Création des pages principales (page d'accueil, page de liste de spectacles, page d'inscription) sans connexion à la base de données pour le moment.
- **Intégration de formulaires :**
  - Mise en place des formulaires d'inscription et de réservation sans requêtes serveur initiales.
- **Styles CSS :**
  - Conception du thème général et des styles de base.

---

## 5. Design et Géolocalisation (Personne 5)
- **Maquettes de l'interface :**
  - Design des pages principales (maquettes visuelles pour validation).
- **Implémentation du plan d'accès :**
  - Intégration d'un composant de géolocalisation simple (Google Maps ou autre) pour afficher un lieu avec des données simulées.
- **Prototypage interactif :**
  - Création d'une version statique ou avec des données simulées pour l'affichage du plan.

---

## Indépendance et Coordination
- **Communication entre membres :** Utilisez des données statiques ou des "mock" pour les tâches qui nécessitent des éléments non encore développés par un autre membre.
- **Validation croisée :** Une fois une tâche terminée, validez son intégration avec les autres composants.
- **Trello :** Créez des **cartes indépendantes** pour chaque fonctionnalité ou composant, et marquez les tâches critiques à valider pour réduire les dépendances.
