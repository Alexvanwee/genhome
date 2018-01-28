-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 28 jan. 2018 à 23:07
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `genhome`
--
CREATE DATABASE IF NOT EXISTS `genhome` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `genhome`;

-- --------------------------------------------------------

--
-- Structure de la table `home`
--

DROP TABLE IF EXISTS `home`;
CREATE TABLE IF NOT EXISTS `home` (
  `Home_ID` int(20) NOT NULL AUTO_INCREMENT,
  `Address` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `Number_of_rooms` int(3) DEFAULT '0',
  `Member_ID` int(4) DEFAULT NULL,
  `Home_name` varchar(40) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`Home_ID`),
  KEY `fk_member_id` (`Member_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `Member_ID` int(4) NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `Last_Name` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `Mail` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `Login` varchar(100) COLLATE utf8_bin DEFAULT 'admin',
  `Password` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT 'password',
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `Home_ID` int(20) DEFAULT NULL,
  `FirstConnection` tinyint(1) NOT NULL DEFAULT '1',
  `isOwner` tinyint(1) NOT NULL DEFAULT '0',
  `Product_ID` varchar(8) COLLATE utf8_bin DEFAULT NULL,
  `Primary_Home_ID` int(11) DEFAULT NULL,
  `Referrer_ID` int(11) DEFAULT NULL,
  `Step` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Member_ID`),
  KEY `fk_home_id` (`Home_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`Member_ID`, `First_Name`, `Last_Name`, `Mail`, `Login`, `Password`, `isAdmin`, `Home_ID`, `FirstConnection`, `isOwner`, `Product_ID`, `Primary_Home_ID`, `Referrer_ID`, `Step`) VALUES
(1, 'Administrator', 'Admin', 'web.genhome@gmail.com', 'web.genhome@gmail.com', 'WEd6L2hZOEs5ditWRU1nT3BvUDNSQT09', 1, NULL, 0, 0, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `Room_type` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `Number_sensors` int(25) NOT NULL DEFAULT '0',
  `Room_name` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `Room_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Home_ID` int(20) DEFAULT NULL,
  `isFavourite` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Room_ID`),
  KEY `fk_home_id_room` (`Home_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `sensors`
--

DROP TABLE IF EXISTS `sensors`;
CREATE TABLE IF NOT EXISTS `sensors` (
  `Sensor_ID` int(4) NOT NULL AUTO_INCREMENT,
  `Type_of_sensor` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `Room_ID` int(10) DEFAULT NULL,
  `Home_ID` int(20) DEFAULT NULL,
  `isFavourite` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Sensor_ID`),
  KEY `fk_home_id_sensor` (`Home_ID`),
  KEY `fk_room_id` (`Room_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `sold`
--

DROP TABLE IF EXISTS `sold`;
CREATE TABLE IF NOT EXISTS `sold` (
  `Serial_ID` varchar(8) COLLATE utf8_bin NOT NULL,
  `isRegistered` tinyint(1) NOT NULL DEFAULT '0',
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `sold`
--

INSERT INTO `sold` (`Serial_ID`, `isRegistered`, `ID`) VALUES
('H517833X', 0, 1),
('H271713X', 0, 2),
('H182680X', 0, 3),
('H454635X', 0, 4),
('H169522X', 0, 5),
('H908134X', 0, 6),
('H265087X', 0, 7),
('H751289X', 0, 8),
('H854942X', 0, 9),
('H860708X', 0, 10),
('H356569X', 0, 11),
('H460501X', 0, 12),
('H877927X', 0, 13),
('H270611X', 0, 14),
('H629702X', 0, 15),
('H508662X', 0, 16),
('H425450X', 0, 17),
('H289570X', 0, 18),
('H100048X', 0, 19),
('H204149X', 0, 20),
('H496481X', 0, 21),
('H644232X', 0, 22),
('H633701X', 0, 23),
('H283337X', 0, 24),
('H344118X', 0, 25),
('H271022X', 0, 26),
('H779548X', 0, 27),
('H259530X', 0, 28),
('H915086X', 0, 29),
('H733084X', 0, 30),
('H574759X', 0, 31),
('H452657X', 0, 32),
('H194690X', 0, 33),
('H681809X', 0, 34),
('H418681X', 0, 35),
('H277059X', 0, 36),
('H315486X', 0, 37),
('H517027X', 0, 38),
('H993356X', 0, 39),
('H507384X', 0, 40),
('H118524X', 0, 41),
('H971975X', 0, 42),
('H931891X', 0, 43),
('H626195X', 0, 44),
('H185857X', 0, 45),
('H753338X', 0, 46),
('H438965X', 0, 47),
('H923518X', 0, 48),
('H220809X', 0, 49),
('H281059X', 0, 50),
('H208131X', 0, 51),
('H532679X', 0, 52),
('H369977X', 0, 53),
('H812502X', 0, 54),
('H623508X', 0, 55),
('H268403X', 0, 56),
('H243491X', 0, 57),
('H162801X', 0, 58),
('H308592X', 0, 59),
('H901699X', 0, 60),
('H205472X', 0, 61),
('H503895X', 0, 62),
('H995168X', 0, 63),
('H562583X', 0, 64),
('H860287X', 0, 65),
('H786836X', 0, 66),
('H348790X', 0, 67),
('H536252X', 0, 68),
('H343958X', 0, 69),
('H830489X', 0, 70),
('H420049X', 0, 71),
('H234617X', 0, 72),
('H517740X', 0, 73),
('H401861X', 0, 74),
('H682624X', 0, 75),
('H423322X', 0, 76),
('H341209X', 0, 77),
('H756479X', 0, 78),
('H888151X', 0, 79),
('H768921X', 0, 80),
('H211137X', 0, 81),
('H327659X', 0, 82),
('H587413X', 0, 83),
('H918851X', 0, 84),
('H978112X', 0, 85),
('H947070X', 0, 86),
('H394647X', 0, 87),
('H668002X', 0, 88),
('H435640X', 0, 89),
('H567288X', 0, 90),
('H393016X', 0, 91),
('H994909X', 0, 92),
('H637214X', 0, 93),
('H422272X', 0, 94),
('H268267X', 0, 95),
('H739374X', 0, 96),
('H550657X', 0, 97),
('H545474X', 0, 98),
('H188908X', 0, 99),
('H106903X', 0, 100),
('H123456X', 1, 101),
('H112345X', 0, 102);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `home`
--
ALTER TABLE `home`
  ADD CONSTRAINT `fk_member_id` FOREIGN KEY (`Member_ID`) REFERENCES `members` (`Member_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `fk_home_id` FOREIGN KEY (`Home_ID`) REFERENCES `home` (`Home_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `fk_home_id_room` FOREIGN KEY (`Home_ID`) REFERENCES `home` (`Home_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sensors`
--
ALTER TABLE `sensors`
  ADD CONSTRAINT `fk_home_id_sensor` FOREIGN KEY (`Home_ID`) REFERENCES `home` (`Home_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_room_id` FOREIGN KEY (`Room_ID`) REFERENCES `room` (`Room_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
