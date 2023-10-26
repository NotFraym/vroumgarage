-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour garage
CREATE DATABASE IF NOT EXISTS `garage` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `garage`;

-- Listage de la structure de table garage. user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `statut` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table garage.user : ~3 rows (environ)
INSERT INTO `user` (`id`, `nom`, `mdp`, `statut`) VALUES
	(1, 'pene8', 'ee3087b54602aaa50a01166efbd20053427dc94ccb49f6ce5e69f45060d07f34', 'client'),
	(2, 'Bastian', '0afe5819d85843664997d776c4519d1b441ecea01deb9c36bad2d4d2c16aff9e', 'client'),
	(3, 'Garagiste_marc', 'a5c5b45aa0e69327eaf66605125d7620939c009d610d5040129b8f336e90646c', 'admin'),
	(4, 'shun', '520be1a970ab91c5375e7895faa41d718fb07a5e11ad406f8ca7a465cf873343', 'admin'),
	(5, 'Garagiste_R', '4697c20f8a70fcad6323e007d553cfe05d4433f81be70884ea3b4834b147f4c1', 'admin'),
	(6, 'Administrateur', '7459ff5e7a4959dcb071106f534b6ea223def9e42b33ddbf9b82b95c82ca9589', 'admin');

-- Listage de la structure de table garage. vehicule
CREATE TABLE IF NOT EXISTS `vehicule` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` char(50) DEFAULT NULL,
  `marque` char(50) DEFAULT NULL,
  `immatriculation` char(50) DEFAULT NULL,
  `modele` char(50) DEFAULT NULL,
  `date_premiere_circulation` date DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `date_rentree_garage` date DEFAULT NULL,
  `chevaux` float DEFAULT NULL,
  `description` longtext,
  `image` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table garage.vehicule : ~5 rows (environ)
INSERT INTO `vehicule` (`id`, `type`, `marque`, `immatriculation`, `modele`, `date_premiere_circulation`, `prix`, `date_rentree_garage`, `chevaux`, `description`, `image`) VALUES
	(15, 'voiture', 'Subaru', 'JONG87', 'Impreza', '0003-12-06', 700000, '2023-05-22', 160, 'Voiture ayant appartenu à Inka, le rebelle de la SIO.', 'JONG87.jpg'),
	(16, 'voiture', 'Mercedes-Benz', 'INKA21', 'B180', '2021-06-23', 1000000, '2023-05-04', 160, 'Voiture de Bastian, vendu avec lui dedans.', 'INKA21.jpg'),
	(17, 'voiture', 'Peugeot', 'FABI69', '208', '2015-08-01', 250000, '2023-03-23', 92, 'Quel squatteur ce Fabrice.', 'FABI69.jpg'),
	(18, 'voiture', 'Audi', 'PENE88', 'R8', '2022-06-21', 150000000, '2023-05-11', 420, 'Audi R8 tu connais', 'PENE88.jpg'),
	(19, 'moto', 'Citroën', 'vbsbzib', 'C3', '2023-03-16', 20, '2023-02-10', 456, 'zigjzigz', 'vbsbzib.jpg');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
