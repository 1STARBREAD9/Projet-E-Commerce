-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 02 avr. 2024 à 14:29
-- Version du serveur : 8.0.27
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetweb`
--

DELIMITER $$
--
-- Procédures
--
DROP PROCEDURE IF EXISTS `Connexion`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Connexion` (IN `_email` VARCHAR(30), IN `in_pdw` VARCHAR(30))  BEGIN
SELECT * FROM utilisateur WHERE email = _email AND pdw = _email;
END$$

DROP PROCEDURE IF EXISTS `Verifutilisateur`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Verifutilisateur` (IN `in_email` VARCHAR(50) CHARSET utf8)  BEGIN
SELECT `Email` FROM `utilisateur` WHERE Email = in_email;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `historique_commandes`
--

DROP TABLE IF EXISTS `historique_commandes`;
CREATE TABLE IF NOT EXISTS `historique_commandes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int DEFAULT NULL,
  `date_commande` datetime DEFAULT NULL,
  `nom_voiture` varchar(15) NOT NULL,
  `prix` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `utilisateur_id` (`utilisateur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `historique_commandes`
--

INSERT INTO `historique_commandes` (`id`, `utilisateur_id`, `date_commande`, `nom_voiture`, `prix`) VALUES
(49, 1, '2024-02-21 08:46:57', 'Porsche Taycan', 85000);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id` int NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int DEFAULT NULL,
  `produit_id` int DEFAULT NULL,
  `quantite` int DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `lien_img` char(40) DEFAULT NULL,
  `nom_voiture` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=229 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `utilisateur_id`, `produit_id`, `quantite`, `prix`, `lien_img`, `nom_voiture`) VALUES
(220, 1, 4, 2, '85000.00', 'images/img_voiture/4.png', 'Porsche Taycan'),
(223, 2, 2, 1, '70000.00', 'images/img_voiture/2.png', 'Porsche 718 Cay'),
(226, 2, 4, 2, '85000.00', 'images/img_voiture/4.png', 'Porsche Taycan'),
(228, 1, 4, 2, '85000.00', 'images/img_voiture/4.png', 'Porsche Taycan');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID_utilisateur` int NOT NULL AUTO_INCREMENT,
  `Prenom` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Nom` char(30) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `pdw` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`ID_utilisateur`),
  UNIQUE KEY `ID_utilisateur` (`ID_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_utilisateur`, `Prenom`, `Nom`, `Email`, `pdw`) VALUES
(1, '', 'PAVLO', 'A', 'A'),
(2, '', 'DYLAN', 'C', 'C'),
(3, '', 'YACINE', 'B', 'B'),
(25, 'zez', 'azz', 'jn@gmail.com', '$2y$10$Iydg1liKScQH1Y7jHGTCxOmsA73zQJruP4eFvGYH04zFNar7XYZCy'),
(26, 'ZEZE', 'AOEZI', 'jn@gmail.co', '$2y$10$Mf570LTCL5yS8dIVfHNThOgZ47EbAfJU/0IUB5DBlT/nXAe9/zvXq'),
(27, 'ZEZE', 'AZE', 'jn@gmail.com', '$2y$10$QVP/E4E4PQk14tb/tSqv1uIz2zQ/XaVp6nlGCFInJYrkheR8xJdnC'),
(28, 'ZEZ', 'zEZ', 'pavlysha7771@gmail.com', '$2y$10$C4rfxbeT2yCCmX7zO58vj.Nd57DSTBJWw1knBlUcmnPJYp1uj/Eq6'),
(29, 'Z', 'Z', 'ZEZEZ@gelmfel', '$2y$10$JL/f3irUQ9oCWt0n4AxaH.AvQsWrj.6ZZ.4gepCmM.euLkGZ4DIXu');

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

DROP TABLE IF EXISTS `voiture`;
CREATE TABLE IF NOT EXISTS `voiture` (
  `ID_Voiture` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Prix` float NOT NULL,
  `Description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Couleur` char(10) NOT NULL,
  `Boite` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Moteur` int NOT NULL,
  `Energie` char(10) NOT NULL,
  `Mise_Date` date NOT NULL,
  `Lien_img` char(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`ID_Voiture`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`ID_Voiture`, `Nom`, `Prix`, `Description`, `Couleur`, `Boite`, `Moteur`, `Energie`, `Mise_Date`, `Lien_img`) VALUES
(2, 'Porsche 718 Cayman', 70000, 'For the sport of it.\r\nThe 718 models were made for the sport of it. They are mid-engined roadsters that unite the sporting spirit of the legendary Porsche 718 with the sports car of tomorrow – and transfer it to the roads of today’s world. With one goal: to take the everyday out of every day.', 'Gris', 'Automatique', 400, 'Essence', '2021-04-22', 'images/img_voiture/2.png'),
(3, 'Porsche 911', 90000, 'The 911 Carrera T.\r\nFewer kilograms equals more agility and contact with the road is more important than ever. The 911 Carrera T is a commitment to purism. A conscious release for increased driving pleasure.', 'Blanc', 'Automatique', 450, 'Essence', '2020-06-11', 'images/img_voiture/3.png'),
(4, 'Porsche Taycan', 85000, 'The new Taycan GTS.\r\nThe new Taycan GTS now charges the Porsche electric driving experience with even more intense emotions.', 'Blue', 'Automatique', 408, 'Electrique', '2023-04-10', 'images/img_voiture/4.png'),
(5, 'Porsche Panamera', 100005, 'Drive defines us.\r\nCan a vision be logical? Is it even allowed to be? Probably not. We believe that the more visionary an idea at the start, the more exciting it is at the end. Then it\'s worth fighting for. That was the case with the Panamera. A sports car for four? With impressive performance and great comfort?\r\n\r\nWith the dynamism typical of Porsche and simultaneously more efficient? Many said it was impossible. Others called it brave.', 'Noir', 'Automatique', 330, 'Essence', '2023-03-05', 'images/img_voiture/5.png'),
(6, 'Porsche Macan', 110000, 'The new Macan T.\r\nStanding out where others disappear into the masses: the new Macan T.\r\nContemporary, dynamic and urban, with extensive standard equipment, model-specific design features and of course, typical Porsche performance.\r\n', 'Blue', 'Manuelle', 324, 'Diesel', '2022-03-02', 'images/img_voiture/6.png'),
(7, 'Porsche Cayenne Coupé', 120000, 'The new Cayenne Turbo GT.\r\nAnother place on the Cayenne model range starting grid has now been taken – with intense performance and precise dynamics. The Cayenne Turbo GT has all the attributes to be ahead of the game from the start.', 'Blanc', 'Manuelle', 260, 'Diesel', '2023-07-01', 'images/img_voiture/7.png');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `historique_commandes`
--
ALTER TABLE `historique_commandes`
  ADD CONSTRAINT `historique_commandes_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`ID_utilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
