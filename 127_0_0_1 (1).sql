-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220702.4e19a88a1e
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2022 at 01:07 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flajerisanje`
--
DROP DATABASE IF EXISTS `flajerisanje`;
CREATE DATABASE IF NOT EXISTS `flajerisanje` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `flajerisanje`;

-- --------------------------------------------------------

--
-- Table structure for table `administratori`
--

DROP TABLE IF EXISTS `administratori`;
CREATE TABLE IF NOT EXISTS `administratori` (
  `IDadministratora` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(50) DEFAULT NULL,
  `prezime` varchar(50) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `sifra` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`IDadministratora`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administratori`
--

INSERT INTO `administratori` (`IDadministratora`, `ime`, `prezime`, `email`, `sifra`) VALUES
(1, 'Sanja', 'Vukelić', 'sanja.vukelic1997@gmail.com', '$2y$10$JHlc3xqBfVezrVzd9AD06uAKL0NY3vKzFu7xRHeulY5vSo0qog6bi');

-- --------------------------------------------------------

--
-- Table structure for table `adrese`
--

DROP TABLE IF EXISTS `adrese`;
CREATE TABLE IF NOT EXISTS `adrese` (
  `IDadrese` int(11) NOT NULL AUTO_INCREMENT,
  `IDulice` int(32) DEFAULT NULL,
  `ulica` varchar(200) DEFAULT NULL,
  `brojZgrade` varchar(200) DEFAULT NULL,
  `IDflajera` int(32) DEFAULT NULL,
  `brojFlajera` int(32) DEFAULT NULL,
  `IDaktiviste` int(32) DEFAULT NULL,
  `odobren` smallint(3) DEFAULT NULL,
  `flajerisano` smallint(3) DEFAULT NULL,
  `datumDodele` date DEFAULT NULL,
  `datumKraj` date DEFAULT NULL,
  PRIMARY KEY (`IDadrese`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adrese`
--

INSERT INTO `adrese` (`IDadrese`, `IDulice`, `ulica`, `brojZgrade`, `IDflajera`, `brojFlajera`, `IDaktiviste`, `odobren`, `flajerisano`, `datumDodele`, `datumKraj`) VALUES
(1, 1, 'Bulevar Kralja Aleksandra', '3', 2, 30, 1, 1, 0, '2022-06-20', NULL),
(2, 3, 'Ruzveltova', '3', 4, 25, 1, 1, 0, '2022-06-25', NULL),
(3, 7, 'Patrisa Lumube', '6', 5, 60, 1, 0, 0, NULL, NULL),
(4, 5, 'Gospodava Vučica', '8,9', 3, 50, 1, 1, 0, NULL, NULL),
(5, 8, 'Nušićeva', '6,7', 6, 100, 5, 1, 0, NULL, NULL),
(6, 8, 'Nušićeva', '12', 6, 60, 6, 1, 0, NULL, NULL),
(7, 7, 'Patrisa Lumube', '6', 5, 30, 8, 1, 0, NULL, NULL),
(8, 8, 'Nušićeva', '9', 6, 60, 2, 0, 0, NULL, NULL),
(9, 2, 'Kraljice Marije', '1,2', 1, 150, 2, 0, 0, NULL, NULL),
(10, 9, 'Milutina Milankovića', '25', 2, 100, 8, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `aktivisti`
--

DROP TABLE IF EXISTS `aktivisti`;
CREATE TABLE IF NOT EXISTS `aktivisti` (
  `IDaktiviste` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(50) DEFAULT NULL,
  `prezime` varchar(50) DEFAULT NULL,
  `telefon` varchar(45) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `sifra` varchar(200) DEFAULT NULL,
  `odobren` smallint(3) DEFAULT NULL,
  `listaIDFlajera` varchar(200) DEFAULT NULL,
  `listaBrojeva` varchar(200) DEFAULT NULL,
  `listaDatumaDodele` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`IDaktiviste`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aktivisti`
--

INSERT INTO `aktivisti` (`IDaktiviste`, `ime`, `prezime`, `telefon`, `email`, `sifra`, `odobren`, `listaIDFlajera`, `listaBrojeva`, `listaDatumaDodele`) VALUES
(1, 'Milica', 'Savić', '0645231985', 'milicasavic@gmail.com', '$2y$10$7UU8wkTBLTJvfFCVQya3kerLZJKqisAARR2cmJ6A.MH9BoH.TRFOC', 1, '2,4', '30,20', '2022-06-20,2022-06-25'),
(2, 'Sasa', 'Jovanović', '06452312536', 'sasajovanovic@gmail.com', '$2y$10$/ifbW4fGdaBgZDbzsMo3EOHRbAF7Ko1dhXgy1zj3.LP5VqJi9nNTu', 1, '2,4', '30,20', '2022-06-20,2022-06-25'),
(3, 'Marko', 'Ilić', '065236978', 'markoilic@gmail.com', '$2y$10$z.ia2BojFsR/az2QMOhOBedssWAS6mbOM45jCEk8gIsfeS82.6eZ2', 0, NULL, NULL, NULL),
(4, 'Marija', 'Jović', '0632569852', 'marijajovic@gmail.com', '$2y$10$pd5pEBCwu09kGjhm2jr2TOGRbdM6KGgr4j22dEGWRpmEd/HxHktsK', 0, NULL, NULL, NULL),
(5, 'Stefan', 'Petrović', '0623569874', 'stefanpetrovic@gmail.com', '$2y$10$YrRHgPl5dGhE0Tcl9vzvyeM6OpjPxKnncNoCUnCxxt9besv/caM0C', 1, NULL, NULL, NULL),
(6, 'Anastasija', 'Mitrović', '065239874', 'anastasijamitrovic@gmail.com', '$2y$10$DiElJAblREsfa3pCJH2EZOpdMHo/.j9jbzFrlP7jG1iRz0RT46oeS', 1, NULL, NULL, NULL),
(7, 'Nikola', 'Nedeljković', '0632598741', 'nikolanedeljkovic@gmail.com', '$2y$10$vfiPcSOQx6h1ymejyrVnwudJLtD313n4FECfSTT0Pk8bT4QLwdJpu', 1, NULL, NULL, NULL),
(8, 'Anita', 'Dabić', '0612369854', 'anitadabic@gmail.com', '$2y$10$Dj1iwGCQPNYLxPIfauIUwu44XwF5fh.efM35jBvacJlFDWC/Dac9.', 1, NULL, NULL, NULL),
(9, 'Luka ', 'Radivojević', '065896325', 'lukaradivojevic@gmail.com', '$2y$10$mQBoOobnq6fcrQYFzYmPCOIjiBJzEqn/duv9BDEblUZN//dEeolDy', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `flajeri`
--

DROP TABLE IF EXISTS `flajeri`;
CREATE TABLE IF NOT EXISTS `flajeri` (
  `IDflajera` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(50) DEFAULT NULL,
  `HTMLfajl` varchar(50) DEFAULT NULL,
  `PDFFajl` varchar(50) DEFAULT NULL,
  `brojFlajera` int(200) DEFAULT NULL,
  `brojPreostalihFlajera` int(200) DEFAULT NULL,
  `brojZgrada` int(200) DEFAULT NULL,
  `brojPreostalihZgrada` int(200) DEFAULT NULL,
  `javan` smallint(3) DEFAULT NULL,
  `odobren` smallint(3) DEFAULT NULL,
  PRIMARY KEY (`IDflajera`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flajeri`
--

INSERT INTO `flajeri` (`IDflajera`, `naziv`, `HTMLfajl`, `PDFFajl`, `brojFlajera`, `brojPreostalihFlajera`, `brojZgrada`, `brojPreostalihZgrada`, `javan`, `odobren`) VALUES
(1, 'Masaže', './flajeri/MasažeFile.html', './flajeri/MasažeFile.pdf', 400, 150, NULL, NULL, 1, 0),
(2, 'Afrička kultura', './flajeri/AfrickakulturaFile.html', './AfrickakulturaFile.pdf', 350, 350, NULL, NULL, 1, 0),
(3, 'FastFood', './flajeri/FastFoodFile.html', './flajeri/FastFoodFile.pdf', 200, 150, NULL, NULL, 1, 0),
(4, 'Teretana', './flajeri/TeretanaFile.html', './flajeri/TeretanaFile.pdf', 300, 0, NULL, NULL, 0, 0),
(5, 'ZUMBA', './flajeri/ZUMBAFile.html', './flajeri/ZUMBAFile.pdf', 150, 120, NULL, NULL, 1, 0),
(6, 'Domaći džem', './flajeri/Domaći džemFile.html', './flajeri/Domaći džemFile.pdf', 900, 740, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ulica`
--

DROP TABLE IF EXISTS `ulica`;
CREATE TABLE IF NOT EXISTS `ulica` (
  `IDulice` int(11) NOT NULL AUTO_INCREMENT,
  `ulica` varchar(200) DEFAULT NULL,
  `IDflajera` int(32) DEFAULT NULL,
  `brojevi` varchar(200) DEFAULT NULL,
  `nedodeljeniBrojevi` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`IDulice`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ulica`
--

INSERT INTO `ulica` (`IDulice`, `ulica`, `IDflajera`, `brojevi`, `nedodeljeniBrojevi`) VALUES
(1, 'Bulevar Kralja Aleksandra', 1, '2,3,4', ''),
(2, 'Kraljice Marije', 1, '1,2,3,4,5', '1,2,3,4,5'),
(3, 'Ruzveltova', 2, '2,3,4', '2,3,4'),
(4, 'Sinđelićeva', 3, '11,13,15', '11,13,15'),
(5, 'Gospodava Vučica', 3, '7,8,9', '7,8,9'),
(6, 'Višnjička', 4, '20,21', '20'),
(7, 'Patrisa Lumube', 5, '5,6,7,8,9,10', '5,6,9'),
(8, 'Nušićeva', 6, '9,3,7,6,12', '9,3,7,6,12'),
(9, 'Milutina Milankovića', 2, '33,52,1,6,18,25', '33,52,1,6,18,25');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



