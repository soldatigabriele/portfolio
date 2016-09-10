-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Set 02, 2015 alle 20:05
-- Versione del server: 5.1.71-community-log
-- PHP Version: 5.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_gabrielesoldati`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `configuration`
--

CREATE TABLE IF NOT EXISTS `configuration` (
  `id` int(20) NOT NULL,
  `userid` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `configuration`
--

INSERT INTO `configuration` (`id`, `userid`) VALUES
(1, 'userid');

-- --------------------------------------------------------

--
-- Struttura della tabella `ig_directory`
--

CREATE TABLE IF NOT EXISTS `ig_directory` (
  `S_ID` int(6) DEFAULT NULL,
  `Date` char(30) DEFAULT NULL,
  `Keyword` char(30) DEFAULT NULL,
  `Kind` char(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `ig_directory`
--

INSERT INTO `ig_directory` (`S_ID`, `Date`, `Keyword`, `Kind`) VALUES
(1, '2015-08-26', 'london eye', 'Tag'),
(1, '2015-08-26', 'london eye', 'Tag'),
(1, '2015-08-26', 'london eye', 'Tag'),
(1, '2015-08-26', 'london', 'Tag'),
(2, '2015-08-26', 'londoneye', 'Tag'),
(3, '2015-08-26', 'bigben', 'Tag'),
(4, '2015-09-01', 'lestblue', 'Username');

-- --------------------------------------------------------

--
-- Struttura della tabella `ig_keys`
--

CREATE TABLE IF NOT EXISTS `ig_keys` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `clientid` varchar(255) DEFAULT NULL,
  `clientsecret` varchar(255) DEFAULT NULL,
  `redirecturi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dump dei dati per la tabella `ig_keys`
--

INSERT INTO `ig_keys` (`id`, `clientid`, `clientsecret`, `redirecturi`) VALUES
(1, '2c719b899ce04c0398dc6d64147d7a3d', '878e4eabb08342539b4f7f4ee1541cda', 'http://www.gabrielesoldati.altervista.org/gabrielesoldati/streetview/php/instaindex.php');

-- --------------------------------------------------------

--
-- Struttura della tabella `ig_keys2`
--

CREATE TABLE IF NOT EXISTS `ig_keys2` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `clientid` varchar(255) DEFAULT NULL,
  `clientsecret` varchar(255) DEFAULT NULL,
  `redirecturi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dump dei dati per la tabella `ig_keys2`
--

INSERT INTO `ig_keys2` (`id`, `clientid`, `clientsecret`, `redirecturi`) VALUES
(1, 'e979a93278ff4c8fafe599b548d7945c', 'db1d6199d8b542d7914bb325c29925ff', 'http://www.gabrielesoldati.altervista.org/follower/php/instaindex.php');

-- --------------------------------------------------------

--
-- Struttura della tabella `ig_research`
--

CREATE TABLE IF NOT EXISTS `ig_research` (
  `I_ID` int(6) DEFAULT NULL,
  `Date` char(30) DEFAULT NULL,
  `User` char(30) DEFAULT NULL,
  `Name` char(30) DEFAULT NULL,
  `LikesCount` char(30) DEFAULT NULL,
  `CommentsCount` char(30) DEFAULT NULL,
  `Filter` char(30) DEFAULT NULL,
  `idImage` char(30) DEFAULT NULL,
  `Url` char(30) DEFAULT NULL,
  `LinkJson` char(30) DEFAULT NULL,
  `Keyword` char(30) DEFAULT NULL,
  `Kind` char(10) DEFAULT NULL,
  UNIQUE KEY `id_unq` (`User`,`Name`,`Url`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `ig_research`
--

INSERT INTO `ig_research` (`I_ID`, `Date`, `User`, `Name`, `LikesCount`, `CommentsCount`, `Filter`, `idImage`, `Url`, `LinkJson`, `Keyword`, `Kind`) VALUES
(1, '2015-08-26', 'gtav.cool', 'gtav.cool', '0', '0', 'Normal', '1059980598971505814_1954605038', 'https://instagram.com/p/61zr0e', 'URL JSON', 'london', 'Tag'),
(1, '2015-08-26', 'danlgill', 'Dan Gill', '0', '0', 'Normal', '1059980595851155963_11670245', 'https://instagram.com/p/61zrxk', 'URL JSON', 'london', 'Tag'),
(1, '2015-08-26', 'fashionista.diaries.pk', '', '0', '0', 'Juno', '1059980565336425804_1585068200', 'https://instagram.com/p/61zrVJ', 'URL JSON', 'london', 'Tag'),
(1, '2015-08-26', 'alexcastropt', 'Alex Castro', '0', '0', 'Lark', '1059980555688979580_257807666', 'https://instagram.com/p/61zrMK', 'URL JSON', 'london', 'Tag'),
(2, '2015-08-26', 'melaniehinrichs', 'melaniehinrichs', '0', '0', 'Normal', '1059980414744335717_184563396', 'https://instagram.com/p/61zpI5', 'URL JSON', 'londoneye', 'Tag'),
(2, '2015-08-26', 'vanilla_smokers', '', '2', '0', 'Normal', '1059979762687515071_1313301509', 'https://instagram.com/p/61zfpo', 'URL JSON', 'londoneye', 'Tag'),
(2, '2015-08-26', 'vikyde', 'Neku', '5', '1', 'Slumber', '1059977436677389114_239976389', 'https://instagram.com/p/61y9zX', 'URL JSON', 'londoneye', 'Tag'),
(2, '2015-08-26', 'kirstyroach96', 'Kirsty Jane Elizabeth RoachðŸ’', '4', '0', 'Normal', '1059977013373494510_464298384', 'https://instagram.com/p/61y3pI', 'URL JSON', 'londoneye', 'Tag'),
(3, '2015-08-26', 'deeringggg', '', '0', '0', 'Normal', '1059980797861048035_14988978', 'https://instagram.com/p/61zutt', 'URL JSON', 'bigben', 'Tag'),
(3, '2015-08-26', 'justpaul023', 'Paul', '4', '0', 'Normal', '1059980198973762595_256184570', 'https://instagram.com/p/61zl_8', 'URL JSON', 'bigben', 'Tag'),
(3, '2015-08-26', 'meeelpgs', 'MÃ©lanie PagÃ¨s', '1', '0', 'Normal', '1059979716853394578_214237714', 'https://instagram.com/p/61ze-8', 'URL JSON', 'bigben', 'Tag'),
(3, '2015-08-26', 'eltw', '', '13', '1', 'Normal', '1059978716462530608_341758663', 'https://instagram.com/p/61zQbQ', 'URL JSON', 'bigben', 'Tag'),
(4, '2015-09-01', 'lestblue', 'Lestblue', '371', '0', 'Clarendon', '1064592842418191102_6434253', 'https://instagram.com/p/7GMYy6', 'URL JSON', 'lestblue', 'Username'),
(4, '2015-09-01', 'lestblue', 'Lestblue', '260', '24', 'Normal', '1064417578853759102_6434253', 'https://instagram.com/p/7FkiYA', 'URL JSON', 'lestblue', 'Username'),
(4, '2015-09-01', 'lestblue', 'Lestblue', '553', '2', 'Crema', '1064268292509825203_6434253', 'https://instagram.com/p/7FCl-Q', 'URL JSON', 'lestblue', 'Username'),
(4, '2015-09-01', 'lestblue', 'Lestblue', '524', '1', 'Normal', '1063978083700340946_6434253', 'https://instagram.com/p/7EAm4P', 'URL JSON', 'lestblue', 'Username');

-- --------------------------------------------------------

--
-- Struttura della tabella `sv_directory`
--

CREATE TABLE IF NOT EXISTS `sv_directory` (
  `D_ID` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `Date` char(30) DEFAULT NULL,
  `D_NAME` char(30) DEFAULT NULL,
  PRIMARY KEY (`D_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dump dei dati per la tabella `sv_directory`
--

INSERT INTO `sv_directory` (`D_ID`, `Date`, `D_NAME`) VALUES
(20, '2015-08-21', 'MILANO'),
(21, '2015-08-25', 'Italia'),
(18, '2015-08-04', 'Bosnia'),
(9, '2015-07-15', 'USA'),
(10, '2015-07-15', 'Canada'),
(11, '2015-07-15', 'Australia'),
(12, '2015-07-15', 'Sardegna'),
(14, '2015-07-16', 'Vietnam'),
(15, '2015-07-16', 'Russia');

-- --------------------------------------------------------

--
-- Struttura della tabella `sv_research`
--

CREATE TABLE IF NOT EXISTS `sv_research` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `Date` char(30) DEFAULT NULL,
  `name` char(30) DEFAULT NULL,
  `D_ID` char(5) DEFAULT NULL,
  `Latitude` char(30) DEFAULT NULL,
  `Longitude` char(30) DEFAULT NULL,
  `Heading` char(30) DEFAULT NULL,
  `Pitch` char(30) DEFAULT NULL,
  `Fov` char(30) DEFAULT NULL,
  `Height` char(30) DEFAULT NULL,
  `Width` char(30) DEFAULT NULL,
  `Photos` char(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

--
-- Dump dei dati per la tabella `sv_research`
--

INSERT INTO `sv_research` (`id`, `Date`, `name`, `D_ID`, `Latitude`, `Longitude`, `Heading`, `Pitch`, `Fov`, `Height`, `Width`, `Photos`) VALUES
(66, '2015-08-21', 'Vittorio Emanuele', '20', '45.465614', '9.190050', '0', '0', '90', '640', '640', '9'),
(76, '2015-08-25', 'Expo 2', '21', '45.5169563', '9.110119', '0', '0', '90', '640', '640', '9'),
(75, '2015-08-25', 'torre', '21', '48.8562545', '2.2976734', '0', '0', '90', '640', '640', '9'),
(74, '2015-08-25', 'torre2', '21', '48.8568472', '2.2967633', '0', '60', '90', '640', '640', '9'),
(26, '2015-07-15', 'Cala Fuili', '12', '40.256822', '9.625798', '0', '0', '90', '640', '640', '9'),
(25, '2015-07-15', 'Santa Lucia', '12', '40.581788', '9.778634', '0', '0', '90', '640', '640', '9'),
(24, '2015-07-15', 'Orville', '12', '40.654124', '9.746733', '0', '0', '90', '640', '640', '9'),
(23, '2015-07-15', 'Golfo Aranci', '12', '40.997976', '9.622618', '0', '0', '90', '640', '640', '9'),
(73, '2015-08-25', 'torre', '21', '48.8568472', '2.2967633', '0', '0', '90', '640', '640', '9'),
(65, '2015-08-21', 'galleria Vittorio Emanuele', '20', 'VittorioEmanuele', 'milano', '0', '0', '90', '640', '640', '9'),
(28, '2015-07-16', 'Hanoi', '14', '11.080553', '105.830632', '0', '0', '90', '640', '640', '9'),
(30, '2015-07-16', 'Niagara Falls', '10', '43.08305', '-79.074111', '0', '0', '90', '640', '640', '9'),
(77, '2015-08-25', 'expo 3', '21', '45.5224396', '9.0950166', '0', '0', '90', '640', '640', '9'),
(64, '2015-08-21', 'duomo 2', '20', 'piazzaduomo', 'milano', '0', '0', '90', '640', '640', '9'),
(38, '2015-07-16', 'milano', '15', 'SanSiro', '', '0', '0', '90', '640', '640', '9'),
(45, '2015-07-16', 'San Siro, Milano', '15', '40.712133', '-74.014219', '0', '0', '60', '640', '640', '9'),
(43, '2015-07-16', 'San Siro, Milano', '15', '45.478873', '9.123636', '90', '0', '90', '640', '640', '9'),
(63, '2015-08-21', 'duomo 1', '20', 'duomo', 'milano', '0', '0', '90', '640', '640', '9'),
(58, '2015-07-25', 'test', '15', '45.512381', '12.065623', '0', '0', '90', '640', '640', '9'),
(59, '2015-07-25', 'test', '15', '45.512381', '12.065623', '0', '0', '90', '640', '640', '9'),
(60, '2015-07-25', 'test2', '15', '45.516839', '12.053199', '0', '0', '90', '640', '640', '9'),
(61, '2015-07-25', 'test2', '15', '45.516839', '12.053199', '0', '0', '90', '640', '640', '9'),
(62, '2015-07-25', 'test3', '15', '45.516839', '12.053199', '0', '0', '90', '640', '640', '9'),
(67, '2015-08-21', 'Vittorio Emanuele 2', '20', '45.465614', '9.190050', '0', '60', '90', '640', '640', '9'),
(68, '2015-08-21', 'Vittorio Emanuele 3', '20', '45.465614', '9.190050', '0', '90', '120', '640', '640', '9'),
(69, '2015-08-21', 'Piazza Duomo', '20', '45.464349', '9.189499', '0', '0', '90', '640', '640', '9'),
(70, '2015-08-21', 'Piazza Duomo 2', '20', '45.464349', '9.189499', '0', '90', '90', '640', '640', '9'),
(71, '2015-08-21', 'expo, milano', '20', 'expo', 'milano', '0', '0', '90', '640', '640', '9'),
(72, '2015-08-25', 'Pordenone', '21', '45.958507', '12.658527', '0', '0', '90', '640', '640', '9'),
(78, '2015-08-25', 'venezia 1', '21', 'sanmarco', 'venezia', '0', '0', '90', '640', '640', '9'),
(79, '2015-08-25', 'venezia 2', '21', '45.434275', '12.338828', '0', '0', '90', '640', '640', '9'),
(80, '2015-08-26', 'Venezia 3', '21', '45.4310569', '12.3315842', '0', '0', '90', '640', '640', '9'),
(81, '2015-08-26', 'venezia 4', '21', '45.4377791', '12.3355207', '0', '0', '90', '640', '640', '9'),
(82, '2015-08-26', 'venezia 5', '21', '45.4327748', '12.3403861', '0', '0', '90', '640', '640', '9');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` char(255) NOT NULL,
  `password` char(255) DEFAULT NULL,
  `email` char(255) DEFAULT NULL,
  `admin` int(2) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`username`, `password`, `email`, `admin`, `status`) VALUES
('admin', 'easyretrieve2015', 'admin@admin.com', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
