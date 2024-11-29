-- Création de la base de données avec le bon jeu de caractères
CREATE DATABASE spectacles_parisiens CHARACTER SET = "utf8mb4" COLLATE = "utf8mb4_general_ci";

-- Sélectionner la base de données
USE spectacles_parisiens;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
SET NAMES utf8mb4;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `spectacles_parisiens`
--

-- --------------------------------------------------------

--
-- Structure de la table `artist`
--

DROP TABLE IF EXISTS `artist`;
CREATE TABLE IF NOT EXISTS `artist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `lastName` varchar(255) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `biography` text,
  `spectacle_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `spectacle_id` (`spectacle_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `artist`
--

INSERT INTO `artist` (`id`, `lastName`, `firstName`, `biography`, `spectacle_id`) VALUES
(1, 'Palmer', 'Michel', 'Une élégance irréprochable, une voix inimitable, des connaissances sur le monde circassien inégalées… En un mot comme en cent : un supplément d’âme ! Décidément, cet homme en rouge et noir a le don de se rendre indispensable tout en étant discret ! Dans son habit d’apparat, il entre sur la piste pour nous éclairer sur les numéros. En coulisses, il ne quitte pas ses amis artistes des yeux. Il VIT le spectacle de A à Z. Il a le don du partage et réussit toujours à nous glisser une anecdote, à citer une référence… Monsieur Loyal n’est pas un présentateur. C’est bien plus que cela : un guide, un ami, un complice et un artiste qui sert le cirque de manière magistrale !', 1),
(2, 'Bouglione', 'Régina', 'On ne présente plus Régina, fille du patriarche Émilien Bouglione, écuyer de légende ! Si elle a mené une carrière éclectique et s’est produite dans les chapiteaux les plus prestigieux, notamment outre-Atlantique, l’artiste a plaisir à retrouver la piste familiale et ses chevaux. Les aficionados du Cirque d’Hiver apprécient toujours la complicité que la cavalière sait créer entre les chevaux, les poneys et elle. Dans ce maxi-mini, toujours majestueuse, le port altier, Régina nous régale et nous subjugue. On en oublierait presque les mois d’entraînement indispensables pour parvenir à ces numéros équestres aussi flamboyants que tendres !', 1),
(3, 'Larible', 'David-Pierre', 'Qui n’a pas, dans ses jeunes années, essayé de jongler dans la cour de récré pour amuser la galerie ? Mais admirer la dextérité de David-Pierre Larible, c’est… renoncer à tout jamais à la jonglerie ! L’artiste est hors compétition. Et comme dirait le jeune public : « Y a du niveau ! ». Il faut dire que ce fils d’un grand clown à la renommée internationale a baigné toute son enfance dans l’univers circassien. S’il est tête en l’air, c’est pour mieux maîtriser quilles, cerceaux ou chapeaux. Tous ces objets lui obéissent au doigt et à l’œil quel que soit leur nombre. Impossible de les compter tant le rythme est endiablé !', 1),
(4, 'Troupe de Saint-Pétersbourg', NULL, 'La Troupe de Saint-Pétersbourg est une compagnie de ballet russe renommée, spécialisée dans les grands classiques du répertoire, dont Casse-Noisette. Formée dans la tradition du ballet classique russe, elle est célèbre pour ses performances élégantes et techniques, alliant tradition et innovation. Sa version de Casse-Noisette est un spectacle incontournable, apprécié pour sa beauté et sa magie.', 2),
(5, 'Vojnovic', 'Olga', 'Violoniste de renom, spécialisée dans la musique classique, avec une présence régulière lors de concerts d\'orchestre et d\'ensembles de musique de chambre.', 3),
(6, 'Marin', 'Andrea Carmen', 'La jeune soprano roumaine Andreea Carmen Marin, qui a déjà reçu de nombreux prix nationaux et internationaux', 3),
(7, 'Lamboley', 'Juliette', 'Juliette Lamboley est une actrice française reconnue pour son talent, notamment dans le rôle marquant de la pièce Edmond. Elle séduit le public par sa présence et sa capacité à incarner des rôles émouvants.', 4),
(8, 'Mulot', 'Christian', 'Christian Mulot est un acteur français apprécié pour sa polyvalence. Dans la pièce Edmond, il incarne un personnage avec finesse et énergie, contribuant ainsi au succès de la production.', 4),
(9, 'Dorset', 'Sandra', 'Sandra Dorset est une comédienne française, reconnue pour ses talents d\'actrice. Dans la pièce Edmond, elle apporte sa propre touche de sensibilité et de profondeur à son rôle, enrichissant ainsi l\'expérience théâtrale.', 4),
(10, 'Michalik', 'Alexis', 'Jeune prodigue français de la dramaturgie, Alexis Michalik rencontre le succès tant auprès des spectateurs que de la critique. Le talent reconnu d\'Alexis Michalik le hisse une nouvelle fois dans la liste des nommés aux Molières. En 2017, son nom est cité pour non moins de 7 prix, parmi lesquels ceux du meilleur spectacle de Théâtre privé, de la meilleure Comédie, du meilleur Auteur francophone vivant ou encore du meilleur Metteur en scène d’un spectacle de Théâtre privé.', 4),
(11, 'Ruhabura', 'Augustin', 'Augustin Ruhabura est un acteur prometteur, reconnu pour sa polyvalence et sa capacité à incarner des personnages avec une grande profondeur émotionnelle. Dans Edmond, il apporte une touche authentique et captivante, contribuant ainsi à la richesse de la pièce.', 4),
(12, 'Lupin', 'Jean-Michel', 'Jean-Michel Lupin est un magicien mentaliste de renommée, célèbre pour sa maîtrise des arts du mentalisme et de l\'illusion. Avec une approche unique, il fascine son public par des performances étonnantes qui mêlent psychologie, magie et perceptions extrasensorielles. Dans Sur les traces d\'Arsène Lupin - Entre magie et mentalisme, il captive les spectateurs avec des tours où la frontière entre réalité et illusion se fait subtilement floue.', 5),
(13, 'Seethanen', 'Anandha', 'Anandha est une comédienne et chanteuse polyvalente, capable de passer du chant lyrique à la Soul avec aisance. Elle a joué dans diverses productions théâtrales, dont Le Roi Lion, Hair, Swinging Life, Hairspray, Cabaret, Lost In The Stars, L’opéra de quat’sous et La vie parisienne. En tant qu’auteur-compositeur, elle a sorti un album solo, «In a Dance of Time», et elle se lance également dans le doublage voix.', 6),
(14, 'Johnson', 'Barry', 'Arrivé en France en 1980 de sa Californie natale, Barry chante, danse et joue la comédie sur scène depuis l’âge de 4 ans. Ayant étudié le chant dans une grande variété de styles, Barry enchante le public avec des influences soul, blues, rock, classique et comédie musicale. Avec plus de 40 ans de scène à son actif, Barry est un talent sûr et impressionnant.\r\n', 6),
(15, 'Hombel', 'Virginie', 'Chanteuse, auteure et compositrice autodidacte, elle démarre début 2000, avec des open mics dans différentes salles parisiennes où elle y présente ses morceaux dans un registre soul et r’n’b. Elle intégrera par la suite la distribution de spectacles comme Gospel pour 100 voix, la chorale Sankofa Unit ou encore l’émission The Voice.', 6),
(16, 'Bellance', 'Mômô', 'Originaire de la Martinique, Mômô est une danseuse pluridisciplinaire aux multiples facettes. Sa liberté, elle la puise dans ce parcours atypique qui offre une singularité remarquée à chacune de ses collaborations. Hip-hop, néo-classique, jazz, modern jazz, afro contemporain… Mômô est une artiste hybride, qui a tissé sa toile grâce son ouverture et sa curiosité…', 6),
(17, 'Alberi', 'William', 'Issu de la danse de rue, William intègre le milieu artistique dès son plus jeune âge. Une formation à L’AID lui permet d’apprendre de nouveaux styles de danse et démarrer la scène professionnelle avec les comédies musicales, les plateaux télé, les défilés de mode, le cabaret, le cirque et le circuit évènementiel.', 6),
(18, 'Blue', 'Presher', 'Presher commence la danse à la Paris Dance School en 2012. Il est formé aux styles les plus académiques comme les plus urbains. Ses multiples expériences, tant dans des clips, que des concerts ou d’autres comédies musicales, ont abouti à la naissance de son propre univers. Il est aussi le gagnant de plusieurs battle et concours chorégraphiques internationaux.', 6),
(19, 'Miky', NULL, 'Danseur polyvalent doté d’une grande capacité d’adaptation et d’une grande sensibilité artistique, après avoir obtenu son diplôme en danse contemporaine et suivi une formation de 2 ans à l’académie internationale de la danse. Il est maintenant capable d’exécuter des styles de danse et des chorégraphies différentes selon les styles musicaux.', 6);

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `idAvis` int NOT NULL AUTO_INCREMENT,
  `idSpectacle` int NOT NULL,
  `idUtilisateur` int NOT NULL,
  `commentaire` text,
  `note` int DEFAULT NULL,
  `date_avis` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idAvis`),
  KEY `fk_utilisateur` (`idUtilisateur`),
  KEY `fk_spectacle` (`idSpectacle`)
) ;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`idAvis`, `idSpectacle`, `idUtilisateur`, `commentaire`, `note`, `date_avis`) VALUES
(1, 1, 1, 'Magique, féerique...un spectacle magnifique pour un moment qui fait du bien. Nous sommes ressortis des étoiles plein les yeux ! Merci et bravo aux artistes !', 5, '2024-11-11 11:46:00'),
(2, 2, 2, 'Excellent spectacle !', 5, '2024-11-11 14:45:33'),
(3, 3, 3, 'Notre fils de 4 ans et nous même avons été enchantés. Les costumes, les chansons, les numéros. Tout est parfaitement orchestré, on ne s\'ennuie pas et il y en a pour tous les goûts. Je recommande !', 5, '2024-11-11 14:45:33'),
(4, 2, 4, 'Spectacle magnifique . Les artistes étaient tous exceptionnels et impressionnants nous avons adoré cet excellent moment passé avec nos petits enfants', 5, '2024-11-11 14:48:42'),
(5, 3, 5, 'Tout était parfait à part peut-être la musique un peu fort', 4, '2024-11-11 14:48:42'),
(6, 2, 6, 'Magique pour les petits et encore plus pour les grands!!', 5, '2024-11-11 14:48:42'),
(7, 1, 7, 'Nous y sommes allés mardi avec nos deux petites filles , c\'était magnifique', 5, '2024-11-11 14:51:35'),
(8, 1, 8, 'Très beau spectacle, très beau décor', 4, '2024-11-11 14:51:35'),
(9, 1, 9, 'Incroyable spectacle je le recommande pour toute la famille !', 5, '2024-11-11 14:51:35'),
(10, 2, 10, 'Très beau spectacle, beaux décors et costumes, excellents danseurs, super moment.', 5, '2024-11-11 14:55:02'),
(11, 3, 11, 'Excellente soirée grâce à des artistes de grande qualité. Je recommande vivement.', 4, '2024-11-11 14:55:02'),
(12, 3, 12, 'Le charme de Saint-Julien-le-Pauvre, comme un écrin de pierre, de bois et d\'or à la musique. La proximité avec les musiciens dont on voit chaque expression, chaque mouvement. La qualité de l\'interprétation d\'un beau programme éclectique : autant de qualités qui font de ce concert un excellent moment, à recommander.', 5, '2024-11-11 14:55:02'),
(13, 4, 13, 'Jeux d’acteurs extraordinaires, mise en scène formidable, on ne s’ennuie pas!', 5, '2024-11-11 14:58:09'),
(14, 4, 14, 'Sublime pièce, quel régal et quel bon moment ! Un plaisir un petit peu gâché quand même par l\'inconfort des sièges et la chaleur.', 4, '2024-11-11 14:58:09'),
(15, 4, 15, 'Excellente soirée depuis le temps que je souhaitais la voir. Une pièce entraînante des séquences hilarantes servis par des dialogues ciselés. Les comédiens sont géniaux. Je conseille vivement.', 5, '2024-11-11 14:58:09'),
(16, 4, 16, 'Un excellent moment passé au théâtre du grand palais ! Une mise en scène vivante, un décor riche, des acteurs habités par leurs rôles... nous n\'avons pas vu les 2 heures passer ! A voir absolument !', 5, '2024-11-11 15:01:55'),
(17, 5, 17, 'C\'est plus qu\'un spectacle de magie, c\'est un véritable hommage à Arsène Lupin et à son auteur. L\'artiste, un passionné, crée le mystère autour de ce personnage qui semble réel à partir de numéros de mentalisme incroyables. Passionnant et bien construit, allez voir ce spectacle !', 4, '2024-11-11 15:01:55'),
(18, 5, 18, 'Un très bon spectacle, des numéros de mentalisme stupéfiants qui vous laissent sans voix. On apprend plein d\'informations sur Arsène Lupin et son auteur avec des expériences mystérieuses mais amusantes. Vraiment je conseille !', 5, '2024-11-11 15:01:55'),
(19, 6, 16, 'C\'est un spectacle super magique, les numéros de mentalisme sont bluffants et l\'artiste est très doué. Il sait partager sa passion d\'Arsène Lupin. A voir absolument !', 5, '2024-11-11 15:10:05'),
(20, 6, 17, 'Génialissime!!! La troupe est extra, la mise en scène est top, ils nous envoûtent toute la soirée, on serait bien resté danser et chanter avec eux toute la nuit! Merci pour ce moment magique hors du temps!', 5, '2024-11-11 15:10:05'),
(21, 6, 18, 'Quelle énergie un très beau moment émouvant, gai,entraînant Bravo à la troupe aux acteurs toute à la fois chanteurs et danseurs et aux musiciens', 5, '2024-11-11 15:10:05'),
(22, 5, 19, 'Arsène Lupin raconté par un mentaliste, cela fait vraiment rêvé. Les numéros sont bluffants et très forts. Un spectacle mystérieux pour toute la famille. Je conseille vivement !', 5, '2024-11-11 15:15:43'),
(23, 5, 20, 'Un spectacle qui fait rêver d\'Arsène Lupin avec des numéros de mentalisme étonnants et vraiment bluffants. L\'artiste est très fort et très sympathique, il crée une ambiance à la fois mystérieuse et conviviale. Bravo !', 5, '2024-11-11 15:15:43'),
(24, 6, 1, 'On passe un moment exceptionnel, hors du temps: les voix, les costumes, les musiciens, les danseurs sont fabuleux. C est un très haut niveau de performance comme on le voit à Broadway !', 5, '2024-11-11 15:15:43');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `helpText` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `helpText`) VALUES
(1, 'Théâtre', 'Vous habitez à Paris ou êtes seulement de passage dans la capitale ? Vous êtes passionné d’art et de pièce de théâtre ? Vous êtes à la recherche de bons plans théâtre sur Paris ? Vous êtes au bon endroit. Nous vous tenons au courant des meilleures pièces de théâtre à venir à Paris. Réservez votre place en ligne et rendez-vous sur place le jour J pour retrouver vos spectacles et comédiens favoris.'),
(2, 'Spectacle', 'Découvrez les spectacles de performances proposés par nous à des prix imbattables !'),
(3, 'Concert', 'Assistez à des concerts classiques et des opéras mémorables dans les lieux les plus prestigieux de la capitale à des prix exceptionnels !'),
(4, 'Humour', 'Besoin de vous aérer l’esprit ? Stand-up, sketch, chant ou imitation, nous vous fait découvrir les nouveaux talents et les artistes immanquables du moment. One-man show, one-woman show, spectacle d’improvisation et plateau d’humoristes, craquez pour les meilleures spectacles d’humour et réservez vos places à prix tout doux à Paris !');

-- --------------------------------------------------------

--
-- Structure de la table `reaction`
--

DROP TABLE IF EXISTS `reaction`;
CREATE TABLE IF NOT EXISTS `reaction` (
  `id` int NOT NULL AUTO_INCREMENT,
  `reaction_type` enum('like','dislike','surprised','dubious') NOT NULL,
  `subscriber_id` int NOT NULL,
  `comment_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subscriber_id` (`subscriber_id`),
  KEY `comment_id` (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `representation`
--

DROP TABLE IF EXISTS `representation`;
CREATE TABLE IF NOT EXISTS `representation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_date` datetime NOT NULL,
  `last_date` datetime DEFAULT NULL,
  `spectacle_id` int NOT NULL,
  `room_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `spectacle_id` (`spectacle_id`),
  KEY `room_id` (`room_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `representation`
--

INSERT INTO `representation` (`id`, `first_date`, `last_date`, `spectacle_id`, `room_id`) VALUES
(1, '2024-11-10 17:50:00', '2025-03-09 17:50:00', 1, 1),
(2, '2025-01-07 20:00:00', '2025-01-12 20:00:00', 2, 2),
(3, '2024-11-11 19:00:00', '2025-08-30 19:00:00', 3, 3),
(4, '2024-11-11 20:30:00', '2025-03-30 20:30:00', 4, 4),
(5, '2024-11-10 15:00:00', '2024-12-15 15:00:00', 5, 5),
(6, '2024-11-14 21:00:00', '2025-03-02 21:00:00', 6, 6);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `role` varchar(255) DEFAULT 'acteur',
  `artist_id` int NOT NULL,
  `spectacle_id` int NOT NULL,
  PRIMARY KEY (`artist_id`,`spectacle_id`),
  KEY `fk_spectacle_role` (`spectacle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`role`, `artist_id`, `spectacle_id`) VALUES
('Magicien et acrobate', 1, 1),
('Acrobate', 2, 1),
('Clown', 3, 1),
('Danseurs', 4, 2),
('Chanteuse lyrique soprano', 5, 3),
('Violoniste', 6, 3),
('Actrice', 7, 4),
('Acteur', 8, 4),
('Actrice', 9, 4),
('Metteur en scène', 10, 4),
('Acteur', 11, 4),
('Magicien mentaliste', 12, 5),
('Chanteuse', 13, 6),
('Chanteur', 14, 6),
('Chanteuse', 15, 6),
('Danseuse', 16, 6),
('Danseur', 17, 6),
('Danseur', 18, 6),
('Danseur', 19, 6);

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `gauge` int DEFAULT NULL,
  `theater_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_theater_room` (`theater_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `room`
--

INSERT INTO `room` (`id`, `name`, `gauge`, `theater_id`) VALUES
(1, 'Cirque d\'Hiver', 1500, 1),
(2, 'Grand Amphithéâtre', 3723, 2),
(3, 'Eglise Saint-Julien Le Pauvre', 885, 3),
(4, 'Salle du Palais-Royal', 300, 4),
(5, 'Le Laurette théâtre', 50, 5),
(6, 'La salle de Bobino', 716, 6);

-- --------------------------------------------------------

--
-- Structure de la table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `date` datetime NOT NULL,
  `booked` int NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `amount` float NOT NULL,
  `comment` text,
  `notation` int DEFAULT NULL,
  `reactions` json DEFAULT NULL,
  `subscriber_id` int NOT NULL,
  `spectacle_id` int NOT NULL,
  PRIMARY KEY (`date`,`subscriber_id`,`spectacle_id`),
  KEY `fk_spectacle_schedule` (`spectacle_id`),
  KEY `fk_subscriber_schedule` (`subscriber_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `schedule`
--

INSERT INTO `schedule` (`date`, `booked`, `paid`, `amount`, `comment`, `notation`, `reactions`, `subscriber_id`, `spectacle_id`) VALUES
('2024-11-17 16:14:29', 1, 1, 50, 'Test booking', 5, NULL, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `spectacle`
--

DROP TABLE IF EXISTS `spectacle`;
CREATE TABLE IF NOT EXISTS `spectacle` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `synopsis` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `duration` time DEFAULT NULL,
  `price` float DEFAULT NULL,
  `language` enum('Français','Anglais','Espagnol','Allemand','Italien') DEFAULT 'Français',
  `category_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `spectacle`
--

INSERT INTO `spectacle` (`id`, `title`, `synopsis`, `duration`, `price`, `language`, `category_id`) VALUES
(1, 'Spectaculaire', 'Le Cirque d\'Hiver Bouglione est de retour avec un show féérique ! Découvrez des artistes exceptionnels : Régina Bouglione, David-Pierre Larible, le Duo Sweet Darkness, les Flying Tabares et bien d\'autres pour un moment inoubliable en famille.', '02:00:00', 16.5, 'Français', 2),
(2, 'Casse-Noisette', 'Le ballet Casse-Noisette raconte l\'histoire de Clara, qui reçoit un casse-noisette et plonge dans un rêve où elle affronte rats et soldats de plomb. Présenté pour la première fois en 1892, ce spectacle du Palais des Congrès offre une magie intemporelle po', '02:10:00', 45, 'Français', 2),
(3, 'Ensemble Royal de Paris', 'Venez vivre un voyage musical exceptionnel avec l\'Ensemble Royal de Paris à l\'Église Saint-Julien-le-Pauvre. Découvrez des chefs-d\'œuvre de Vivaldi, Mozart, Schubert, Bach, Händel et Saint-Saëns, interprétés par des solistes talentueux, dont la soprano An', '01:05:00', 19, 'Français', 3),
(4, 'Edmond', 'Edmond, la pièce à succès d\'Alexis Michalik, raconte la naissance tumultueuse de Cyrano de Bergerac. Avec ses 12 comédiens, cette œuvre primée aux Molières en 2017 pour 7 nominations, offre un théâtre de troupe dynamique. Michalik, auteur et metteur en sc', '01:50:00', 17.55, 'Français', 1),
(5, 'Sur les traces d\'Arsène Lupin - Entre magie et mentalisme', 'Sur les traces d\'Arsène Lupin - Entre magie et mentalisme, un spectacle interactif de Jean-Michel Lupin, vous plonge dans l\'univers du célèbre gentleman cambrioleur.', '01:15:00', 16.55, 'Français', 2),
(6, 'Black Legends', 'Black Legends, le spectacle musical à succès, revient à Bobino dès le 14 novembre 2024 ! Avec 37 tableaux mythiques retraçant un siècle de musique afro-américaine, de Nina Simone à Prince, ce spectacle vibrant rend hommage aux légendes de la soul, gospel du jazz et le Hip-Hop.', '01:45:00', 29, 'Français', 2);

-- --------------------------------------------------------

--
-- Structure de la table `subscriber`
--

DROP TABLE IF EXISTS `subscriber`;
CREATE TABLE IF NOT EXISTS `subscriber` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthdate` datetime DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `subscriber`
--

INSERT INTO `subscriber` (`id`, `username`, `password`, `email`, `birthdate`, `first_name`, `last_name`) VALUES
(2, 'LouisMartin', 'mdp123', 'louis.martin@gmail.com', '0000-00-00 00:00:00', 'Louis', 'Martin');

-- --------------------------------------------------------

--
-- Structure de la table `theatre`
--

DROP TABLE IF EXISTS `theatre`;
CREATE TABLE IF NOT EXISTS `theatre` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `presentation` text,
  `address` varchar(255) DEFAULT NULL,
  `borough` int DEFAULT NULL,
  `geolocation` point DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `theatre`
--

INSERT INTO `theatre` (`id`, `name`, `presentation`, `address`, `borough`, `geolocation`, `phone`, `email`) VALUES
(1, 'Cirque d\'Hiver Bouglione', 'Le cirque d\'hiver de Paris souvent appelé simplement le Cirque d\'Hiver est une salle de spectacle construite en 1852 par l\'architecte Jacques Hittorff. Il est inscrit au titre des monuments historiques depuis le 10 février 1975.', '110 rue Amelot', 75011, 0x000000000101000000b39f200c97f002404d800640816e4840, '01 47 00 28 81', 'billetterie@cirquedhiver.com'),
(2, 'Le Palais des Congrès', 'Le palais des congrès de Paris est un centre d\'affaires, de congrès et de spectacles de la capitale.', '2 Place de la Porte Maillot', 75017, 0x00000000010100000036e84b6f7f7048404205871744440240, '01 40 68 22 22', 'infos-exposants@viparis.com'),
(3, 'Église Saint-Julien le Pauvre', 'L\'église Saint-Julien-le-Pauvre est une église médiévale grecque-melkite-catholique depuis la fin du XIXe siècle de Paris, au rite byzantin.', '1 rue Saint-Julien le Pauvre', 75005, 0x000000000101000000000341800c6d4840a1698995d1c80240, '01 43 54 52 16', 'secretariat@sjlpmelkites.fr'),
(4, 'Théâtre du Palais Royal', 'Le théâtre du Palais-Royal est une salle de spectacle parisienne.', '38 rue de Montpensier', 75001, 0x000000000101000000dc10e335af6e48403333333333b30240, '01 42 97 40 00', 'tpr@theatrepalaisroyal.com'),
(5, 'Laurette Théâtre', 'Le Laurette Théâtre, nommé en hommage à Laurette Fugain, est une salle de spectacle ouverte aux créations de jeunes compagnies, one man shows, concerts, danse et spectacles enfants.', '36 rue Bichat', 75010, 0x00000000010100000087a3ab74776f4840c4e9245b5dee0240, '09 84 14 12 12', 'reservations@laurette-theatre.fr'),
(6, 'Bobino', 'Bobino est une salle de spectacle à Paris.', '14-20 rue de la Gaité', 75014, 0x000000000101000000f8dd74cb0e6b484019a9f7544e9b0240, '01 43 27 24 24', 'billetterie.bobino@gmail.com');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `fk_artist_role` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_spectacle_role` FOREIGN KEY (`spectacle_id`) REFERENCES `spectacle` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `fk_spectacle_schedule` FOREIGN KEY (`spectacle_id`) REFERENCES `spectacle` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_subscriber_schedule` FOREIGN KEY (`subscriber_id`) REFERENCES `subscriber` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
