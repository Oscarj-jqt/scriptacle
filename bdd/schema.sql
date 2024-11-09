-- -- Création de la base de donnée 

-- CREATE DATABASE spectacles_parisiens;
-- USE spectacles_parisiens;

-- -- Notes du schéma de la base de donnée (table, attributs, connections...)

-- CREATE TABLE Lieu (
--     idLieu INT AUTO_INCREMENT PRIMARY KEY,
--     nom VARCHAR(100) NOT NULL,
--     adresse VARCHAR(255) NOT NULL,
--     ville VARCHAR(255) NOT NULL
-- );

-- CREATE TABLE spectacle (
--     idSpectacle INT AUTO_INCREMENT PRIMARY KEY,
--     titre VARCHAR(100) NOT NULL,
--     information VARCHAR(255),
--     categorie VARCHAR(100)
-- );

-- CREATE TABLE utilisateur (
--     idUtilisateur INT AUTO_INCREMENT PRIMARY KEY,
--     nom VARCHAR(100) NOT NULL,
--     prenom VARCHAR(100) NOT NULL,
--     age INT NOT NULL,
--     motdepasse VARCHAR(255) NOT NULL,
--     email VARCHAR(100) NOT NULL UNIQUE
-- );

-- CREATE TABLE avis (
--     idAvis INT AUTO_INCREMENT PRIMARY KEY,
--     idSpectacle INT NOT NULL,      -- Référence à un spectacle
--     idUtilisateur INT NOT NULL,    -- Référence à un utilisateur
--     commentaire TEXT,              
--     note INT,                      -- Optionnel : note associée à l'avis (par exemple, 1 à 5 étoiles)
--     date_avis DATETIME DEFAULT CURRENT_TIMESTAMP,  -- Date de publication de l'avis
--     FOREIGN KEY (idSpectacle) REFERENCES spectacle(idSpectacle),
--     FOREIGN KEY (idUtilisateur) REFERENCES utilisateur(idUtilisateur)
-- );

-- CREATE TABLE participant (
--     idPrestataire INT AUTO_INCREMENT PRIMARY KEY,
--     nom VARCHAR(255) NOT NULL,
--     genre VARCHAR(100),
--     fonction VARCHAR(100) NOT NULL,
-- );



-- representation et salle à faire 

