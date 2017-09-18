-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 03 Septembre 2017 à 12:18
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `cogip`
--

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

CREATE TABLE IF NOT EXISTS `factures` (
  `id_facture` tinyint(4) NOT NULL AUTO_INCREMENT,
  `numero_facture` varchar(25) NOT NULL,
  `date_facture` date NOT NULL,
  `fk_societe` tinyint(4) NOT NULL,
  `fk_personne` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_facture`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `factures`
--

INSERT INTO `factures` (`id_facture`, `numero_facture`, `date_facture`, `fk_societe`, `fk_personne`) VALUES
(1, '170830001', '2017-09-05', 1, 1),
(2, '170831002', '2017-09-06', 8, 7),
(3, '170524001', '2017-05-24', 9, 5),
(4, '170614002', '2017-06-14', 8, 7),
(5, '160925114', '2016-09-16', 12, 2),
(6, '160301001', '2016-03-01', 11, 3);

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE IF NOT EXISTS `personnes` (
  `id_personne` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nom_personne` varchar(25) NOT NULL,
  `prenom_personne` varchar(25) NOT NULL,
  `tel_personne` int(10) unsigned zerofill NOT NULL,
  `email_personne` varchar(30) NOT NULL,
  `fk_societe` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_personne`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `personnes`
--

INSERT INTO `personnes` (`id_personne`, `nom_personne`, `prenom_personne`, `tel_personne`, `email_personne`, `fk_societe`) VALUES
(1, 'Kapoor', 'Kelly', 0002456358, 'kelly.kapoor@proximus.be', 1),
(2, 'Dwight', 'Schrute', 0025478569, 'dwight@coldblood.com', 12),
(3, 'Palmer', 'Meredith', 0025478541, 'meredith@dundermifflin.com', 11),
(4, 'Beesly', 'Pam', 0456895745, 'pam.beesly@feutrefolie.net', 10),
(5, 'Morvan', 'Jeremy', 0025478547, 'jeremy@forever.com', 9),
(6, 'Vance', 'Phyllis', 0458962457, 'phyllis@dundermifflin.com', 11),
(7, 'Martin', 'Angela', 0025474125, 'angela@pc.net', 8),
(8, 'Hall', 'Monica ', 0555918360, 'monica.hall@raviga.com', 16),
(9, 'Bachman', 'Erlich', 0555918360, 'erlich@aviato.com', 17),
(10, 'Belson', 'Gavin', 0555918361, 'Gavin@hooli.com', 15),
(11, 'Howe', 'Cameron', 0555739828, 'cameron@mutiny.net', 14),
(12, 'Gregory', 'Peter', 0555918361, 'Peter.Gregory@raviga.com', 16);

-- --------------------------------------------------------

--
-- Structure de la table `societes`
--

CREATE TABLE IF NOT EXISTS `societes` (
  `id_societe` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nom_societe` varchar(25) NOT NULL,
  `adresse_societe` text NOT NULL,
  `tel_societe` int(10) unsigned zerofill NOT NULL,
  `tva_societe` varchar(20) NOT NULL,
  `fk_type` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_societe`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `societes`
--

INSERT INTO `societes` (`id_societe`, `nom_societe`, `adresse_societe`, `tel_societe`, `tva_societe`, `fk_type`) VALUES
(1, 'Proximus', 'Avenue du téléphone\r\n1000 Bruxelles', 0025551234, 'BE 0458 523 698', 1),
(8, 'Pierre Cailloux', 'Avenue du produit 15\r\n7540 Kain', 0024568975, 'BE 0458 963 214', 1),
(9, 'WonderfullWorld', 'Rue de la Clientèle\r\n1060 Bruxelles', 0456789852, 'BE 0589 745 201', 2),
(10, 'Feutres en folie', 'Rue de l''arte\r\n1452 Coloriage', 0025896325, 'BE 0456 789 741', 1),
(11, 'Dunder Mifflin', 'Avenue du Violon\r\n1542 Musique', 0458698525, 'BE 0589 632 785', 2),
(12, 'In Cold Blood', 'Rue du massacre 451\r\n8524 Redrum Town', 0025896541, 'BE 0458 785 214', 1),
(13, 'Pied Piper', 'Silicon Valley', 0555698741, 'USA-154 258 963', 2),
(14, 'Mutiny', 'Silicon Valley', 0555739824, 'USA-276 259 535', 2),
(15, 'Hooli', 'Silicon Valley', 0555918367, 'USA-852 478 328', 2),
(16, 'Raviga', 'Silicon Valley', 0555987532, 'USA-365 571 544', 2),
(17, 'Aviato', 'Silicon Valley', 0555542367, 'USA-154 236 785', 2);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id_type` tinyint(4) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`id_type`, `type`) VALUES
(1, 'fournisseur'),
(2, 'client');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
