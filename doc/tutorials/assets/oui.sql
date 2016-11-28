-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Dim 27 Novembre 2016 à 19:49
-- Version du serveur :  5.7.16
-- Version de PHP :  7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;



-- -----------------------------------------------------
-- Schema oui
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `oui` ;

-- -----------------------------------------------------
-- Schema oui
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `oui` DEFAULT CHARACTER SET utf8 ;
USE `oui` ;



--
-- Base de données :  `oui`
--

-- --------------------------------------------------------

--
-- Structure de la table `concours`
--

CREATE TABLE `concours` (
  `id` int(11) NOT NULL,
  `equipe_id` int(11) NOT NULL,
  `titre` varchar(64) NOT NULL,
  `url_photo` varchar(128) NOT NULL,
  `url_video` varchar(128) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `lots` text NOT NULL,
  `reglement` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `concours`
--

INSERT INTO `concours` (`id`, `equipe_id`, `titre`, `url_photo`, `url_video`, `date_debut`, `date_fin`, `lots`, `reglement`, `description`) VALUES
(1, 1, 'T\'es pas cap', '/img/concours/tex.jpg', 'https://www.youtube.com/watch?v=k32voqQhODc', '2016-11-10 09:00:00', '2016-11-13 09:00:00', '3 paires de chaussettes komin >', 'pas de règlement', 'Ce concours vous permet d\'exprimer votre créativité...'),
(2, 3, 'Le plus défoncé de la soirée', '/img/concours/tiffaniechiche.jpg', 'https://www.youtube.com/watch?v=CLdCkU0eeKo', '2016-11-17 09:00:00', '2016-11-20 09:00:00', '3 bouteilles de rosé Chatellerault', 'être bourré', 'Ce concours vous permet d\'exprimer votre créativité...'),
(3, 3, 't-shirt mouillé', '/img/concours/tex.jpg', 'https://www.youtube.com/watch?v=GWWcVDfNukQ', '2016-11-24 09:00:00', '2016-11-27 09:00:00', 'Un string moulant', 'être une femme entre 16 et 60 ans', 'Ce concours vous permet d\'exprimer votre créativité...'),
(4, 3, 'Concours Lara Fabian', '/img/concours/Zidani.jpg', 'https://www.youtube.com/watch?v=uOlPHBG8dn0', '2016-12-07 09:00:00', '2016-12-10 09:00:00', 'Une perruque et un voyage avec Lara Fabian', 'être fan de Lara Fabian ou Demis Roussos', 'Ce concours vous permet d\'exprimer votre créativité...');

-- --------------------------------------------------------

--
-- Structure de la table `configuration`
--

CREATE TABLE `configuration` (
  `cle` varchar(64) NOT NULL,
  `valeur` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `coups_de_coeur`
--

CREATE TABLE `coups_de_coeur` (
  `id` int(11) NOT NULL,
  `videos_id` int(11) NOT NULL,
  `position` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `coups_de_coeur`
--

INSERT INTO `coups_de_coeur` (`id`, `videos_id`, `position`) VALUES
(1, 24, 0),
(2, 19, 1),
(3, 172, 2);

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `id` int(11) NOT NULL,
  `nom` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `equipe`
--

INSERT INTO `equipe` (`id`, `nom`) VALUES
(1, 'komin >'),
(2, 'equipe concours 1'),
(3, 'equipe concours 2'),
(4, 'equipe concours 3');

-- --------------------------------------------------------

--
-- Structure de la table `equipe_has_membres`
--

CREATE TABLE `equipe_has_membres` (
  `equipe_id` int(11) NOT NULL,
  `membres_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `equipe_has_membres`
--

INSERT INTO `equipe_has_membres` (`equipe_id`, `membres_id`) VALUES
(1, 1),
(3, 1),
(4, 1),
(2, 2),
(3, 2),
(4, 2),
(1, 3),
(3, 3),
(4, 3),
(1, 4),
(2, 4),
(4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `instruments`
--

CREATE TABLE `instruments` (
  `id` int(11) NOT NULL,
  `nom` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `instruments`
--

INSERT INTO `instruments` (`id`, `nom`) VALUES
(1, 'Arrangeur'),
(2, 'Auteur'),
(3, 'Chef d\'orchestre'),
(4, 'Compositeur'),
(5, 'Orchestrateur'),
(6, 'Parolier'),
(7, 'Tout'),
(8, 'Accordéon'),
(9, 'Alto'),
(10, 'Balalaika'),
(11, 'Bandonéon'),
(12, 'Banjo'),
(13, 'Basse'),
(14, 'Basson'),
(15, 'Batterie'),
(16, 'Beatbox'),
(17, 'Biniou'),
(18, 'Bombarde'),
(19, 'Bouzouki'),
(20, 'Bugle'),
(21, 'Chant'),
(22, 'Cithare'),
(23, 'Clarinette'),
(24, 'Clavecin'),
(25, 'Contrebasse'),
(26, 'Cornemuse'),
(27, 'Cornet'),
(28, 'Cor'),
(29, 'Cymbalum'),
(30, 'Didgeridoo'),
(31, 'Dj'),
(32, 'Euphonium'),
(33, 'Flugelhorn'),
(34, 'Flûtes traditionnelles'),
(35, 'Flûte traversière'),
(36, 'Flûte à bec'),
(37, 'Guitare folk'),
(38, 'Guitare electro acoustique'),
(39, 'Guitare électrique'),
(40, 'Harmonica'),
(41, 'Harmonium'),
(42, 'Harpe'),
(43, 'Hautbois'),
(44, 'Luth'),
(45, 'M.A.O'),
(46, 'Mandoline'),
(47, 'Mélodica'),
(48, 'Oud'),
(49, 'Orgue'),
(50, 'Orgue Hammond'),
(51, 'Percu africaines'),
(52, 'Percu classiques'),
(53, 'Percu orientales'),
(54, 'Percu traditionnelles'),
(55, 'Piano'),
(56, 'Piccolo'),
(57, 'Rhodes'),
(58, 'Saxophone'),
(59, 'Soubassophone'),
(60, 'Slam'),
(61, 'Synthétiseur'),
(62, 'Trombone'),
(63, 'Tabla'),
(64, 'Tuba'),
(65, 'Ukulélé'),
(66, 'Vielle à roue'),
(67, 'Viole'),
(68, 'Viole de gambe'),
(69, 'Violon'),
(70, 'Violon à pavillon'),
(71, 'Violoncelle'),
(72, 'Trompette');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `url_photo` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `email`, `url_photo`) VALUES
(1, 'clarisse', 'clarisse_doe@gmail.com', '/img/membre/clarisse.jpg'),
(2, 'marie-pierre', 'mp-du-37@me.com', '/img/membre/marie-pierre.jpg'),
(3, 'marion', 'hachis-parmentier@yahoo.fr', '/img/membre/marion.jpg'),
(4, 'paul', 'kerberos-934@yahoo.com', '/img/membre/paul.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `objet` varchar(64) NOT NULL,
  `message` text NOT NULL,
  `email` varchar(64) NOT NULL,
  `date_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `niveaux`
--

CREATE TABLE `niveaux` (
  `id` int(11) NOT NULL,
  `nom` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `niveaux`
--

INSERT INTO `niveaux` (`id`, `nom`) VALUES
(1, 'amateur'),
(2, 'semi-pro'),
(3, 'pro');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id` int(11) NOT NULL,
  `nom` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`id`, `nom`) VALUES
(1, 'Afghanistan'),
(2, 'Afrique du Sud'),
(3, 'Albanie'),
(4, 'Algérie'),
(5, 'Allemagne'),
(6, 'Andorre'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctique'),
(10, 'Antigua-et-Barbuda'),
(11, 'Antilles néerlandaises'),
(12, 'Arabie saoudite'),
(13, 'Argentine'),
(14, 'Arménie'),
(15, 'Aruba'),
(16, 'Australie'),
(17, 'Autriche'),
(18, 'Azerbaïdjan'),
(19, 'Égypte'),
(20, 'Émirats arabes unis'),
(21, 'Équateur'),
(22, 'Érythrée'),
(23, 'États-Unis'),
(24, 'Éthiopie'),
(25, 'Bahamas'),
(26, 'Bahreïn'),
(27, 'Bangladesh'),
(28, 'Barbade'),
(29, 'Bénin'),
(30, 'Belau'),
(31, 'Belgique'),
(32, 'Belize'),
(33, 'Bermudes'),
(34, 'Bhoutan'),
(35, 'Biélorussie'),
(36, 'Birmanie'),
(37, 'Bolivie'),
(38, 'Bosnie-Herzégovine'),
(39, 'Botswana'),
(40, 'Brésil'),
(41, 'Brunei'),
(42, 'Bulgarie'),
(43, 'Burkina Faso'),
(44, 'Burundi'),
(45, 'Cambodge'),
(46, 'Cameroun'),
(47, 'Canada'),
(48, 'Cap-Vert'),
(49, 'Côte d\'Ivoire'),
(50, 'Chili'),
(51, 'Chine'),
(52, 'Chypre'),
(53, 'Colombie'),
(54, 'Comores'),
(55, 'Congo'),
(56, 'Corée du Nord'),
(57, 'Corée du Sud'),
(58, 'Costa Rica'),
(59, 'Croatie'),
(60, 'Cuba'),
(61, 'Danemark'),
(62, 'Djibouti'),
(63, 'Dominique'),
(64, 'Espagne'),
(65, 'Estonie'),
(66, 'ex-République yougoslave de Macédoine'),
(67, 'Finlande'),
(68, 'France'),
(69, 'Gabon'),
(70, 'Gambie'),
(71, 'Géorgie'),
(72, 'Ghana'),
(73, 'Gibraltar'),
(74, 'Grèce'),
(75, 'Grenade'),
(76, 'Groenland'),
(77, 'Guadeloupe'),
(78, 'Guam'),
(79, 'Guatemala'),
(80, 'Guinée'),
(81, 'Guinée équatoriale'),
(82, 'Guinée-Bissao'),
(83, 'Guyana'),
(84, 'Guyane française'),
(85, 'Haïti'),
(86, 'Honduras'),
(87, 'Hong Kong'),
(88, 'Hongrie'),
(89, 'Ile Bouvet'),
(90, 'Ile Christmas'),
(91, 'Ile Norfolk'),
(92, 'Iles Cayman'),
(93, 'Iles Cook'),
(94, 'Iles des Cocos (Keeling)'),
(95, 'Iles Falkland'),
(96, 'Iles Féroé'),
(97, 'Iles Fidji'),
(98, 'Iles Géorgie du Sud et Sandwich du Sud'),
(99, 'Iles Heard et McDonald'),
(100, 'Iles Marshall'),
(101, 'Iles mineures éloignées des États-Unis'),
(102, 'Iles Pitcairn'),
(103, 'Iles Salomon'),
(104, 'Iles Svalbard et Jan Mayen'),
(105, 'Iles Turks-et-Caicos'),
(106, 'Iles Vierges américaines'),
(107, 'Iles Vierges britanniques'),
(108, 'Inde'),
(109, 'Indonésie'),
(110, 'Iran'),
(111, 'Iraq'),
(112, 'Irlande'),
(113, 'Islande'),
(114, 'Israël'),
(115, 'Italie'),
(116, 'Jamaïque'),
(117, 'Japon'),
(118, 'Jordanie'),
(119, 'Kazakhstan'),
(120, 'Kenya'),
(121, 'Kirghizistan'),
(122, 'Kiribati'),
(123, 'Koweït'),
(124, 'Laos'),
(125, 'Lesotho'),
(126, 'Lettonie'),
(127, 'Liban'),
(128, 'Liberia'),
(129, 'Libye'),
(130, 'Liechtenstein'),
(131, 'Lituanie'),
(132, 'Luxembourg'),
(133, 'Macao'),
(134, 'Madagascar'),
(135, 'Malaisie'),
(136, 'Malawi'),
(137, 'Maldives'),
(138, 'Mali'),
(139, 'Malte'),
(140, 'Mariannes du Nord'),
(141, 'Maroc'),
(142, 'Martinique'),
(143, 'Maurice'),
(144, 'Mauritanie'),
(145, 'Mayotte'),
(146, 'Mexique'),
(147, 'Micronésie'),
(148, 'Moldavie'),
(149, 'Monaco'),
(150, 'Mongolie'),
(151, 'Montserrat'),
(152, 'Mozambique'),
(153, 'Namibie'),
(154, 'Nauru'),
(155, 'Népal'),
(156, 'Nicaragua'),
(157, 'Niger'),
(158, 'Nigeria'),
(159, 'Nioué'),
(160, 'Norvège'),
(161, 'Nouvelle-Calédonie'),
(162, 'Nouvelle-Zélande'),
(163, 'Oman'),
(164, 'Ouganda'),
(165, 'Ouzbékistan'),
(166, 'Pakistan'),
(167, 'Panama'),
(168, 'Papouasie-Nouvelle-Guinée'),
(169, 'Paraguay'),
(170, 'Pays-Bas'),
(171, 'Pérou'),
(172, 'Philippines'),
(173, 'Pologne'),
(174, 'Polynésie française'),
(175, 'Porto Rico'),
(176, 'Portugal'),
(177, 'Qatar'),
(178, 'République centrafricaine'),
(179, 'République démocratique du Congo'),
(180, 'République dominicaine'),
(181, 'République tchèque'),
(182, 'Réunion'),
(183, 'Roumanie'),
(184, 'Royaume-Uni'),
(185, 'Russie'),
(186, 'Rwanda'),
(187, 'Sahara occidental'),
(188, 'Saint-Christophe-et-Niévès'),
(189, 'Saint-Marin'),
(190, 'Saint-Pierre-et-Miquelon'),
(191, 'Saint-Siège'),
(192, 'Saint-Vincent-et-les-Grenadines'),
(193, 'Sainte-Hélène'),
(194, 'Sainte-Lucie'),
(195, 'Salvador'),
(196, 'Samoa'),
(197, 'Samoa américaines'),
(198, 'Sao Tomé-et-Principe'),
(199, 'Sénégal'),
(200, 'Seychelles'),
(201, 'Sierra Leone'),
(202, 'Singapour'),
(203, 'Slovaquie'),
(204, 'Slovénie'),
(205, 'Somalie'),
(206, 'Soudan'),
(207, 'Sri Lanka'),
(208, 'Suède'),
(209, 'Suisse'),
(210, 'Suriname'),
(211, 'Swaziland'),
(212, 'Syrie'),
(213, 'Taïwan'),
(214, 'Tadjikistan'),
(215, 'Tanzanie'),
(216, 'Tchad'),
(217, 'Terres australes françaises'),
(218, 'Territoire britannique de l\'Océan Indien'),
(219, 'Thaïlande'),
(220, 'Timor Oriental'),
(221, 'Togo'),
(222, 'Tokélaou'),
(223, 'Tonga'),
(224, 'Trinité-et-Tobago'),
(225, 'Tunisie'),
(226, 'Turkménistan'),
(227, 'Turquie'),
(228, 'Tuvalu'),
(229, 'Ukraine'),
(230, 'Uruguay'),
(231, 'Vanuatu'),
(232, 'Venezuela'),
(233, 'Viêt Nam'),
(234, 'Wallis-et-Futuna'),
(235, 'Yémen'),
(236, 'Yougoslavie'),
(237, 'Zambie'),
(238, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Structure de la table `styles_musicaux`
--

CREATE TABLE `styles_musicaux` (
  `id` int(11) NOT NULL,
  `nom` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `styles_musicaux`
--

INSERT INTO `styles_musicaux` (`id`, `nom`) VALUES
(1, 'Acoustique'),
(2, 'Alternatif'),
(3, 'Blues'),
(4, 'Chanson française'),
(5, 'Classique'),
(6, 'Country'),
(7, 'Contemporain'),
(8, 'Danses de salon'),
(9, 'Disco'),
(10, 'Dub'),
(11, 'Drum n\'bass'),
(12, 'Electro'),
(13, 'Exprérimental'),
(14, 'Fanfare'),
(15, 'Flamenco'),
(16, 'Folk'),
(17, 'Funk'),
(18, 'Hard rock'),
(19, 'Hip Hop'),
(20, 'House'),
(21, 'Indépendant'),
(22, 'Jazz'),
(23, 'Jazz fusion'),
(24, 'Jazz manouche'),
(25, 'Jungle'),
(26, 'Klezmer'),
(27, 'Latino'),
(28, 'Métal'),
(29, 'Musette'),
(30, 'Musique du monde'),
(31, 'Musiques improvisées'),
(32, 'Opéra'),
(33, 'Pop'),
(34, 'Punk'),
(35, 'RnB'),
(36, 'Ragga'),
(37, 'Rap'),
(38, 'Reggae'),
(39, 'Rock'),
(40, 'Salsa'),
(41, 'Samba'),
(42, 'Ska'),
(43, 'Soul'),
(44, 'Techno'),
(45, 'Traditionnel'),
(46, 'Trip Hop'),
(47, 'Variétés'),
(48, 'Autre');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `email` varchar(64) NOT NULL,
  `pseudo` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `url_photo` varchar(128) NOT NULL,
  `nom` varchar(64) NOT NULL,
  `prenom` varchar(64) NOT NULL,
  `sexe` char(1) NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `code_postal` varchar(16) NOT NULL,
  `ville` varchar(64) NOT NULL,
  `pays_id` int(11) DEFAULT NULL,
  `niveaux_id` int(11) DEFAULT NULL,
  `biographie` text NOT NULL,
  `influences` text NOT NULL,
  `prochains_concerts` text NOT NULL,
  `sites_internet` text NOT NULL,
  `newsletter` enum('y','n') NOT NULL,
  `show_sexe` enum('y','n') NOT NULL,
  `show_date_naissance` enum('y','n') NOT NULL,
  `show_niveau` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `active`, `email`, `pseudo`, `password`, `url_photo`, `nom`, `prenom`, `sexe`, `date_naissance`, `code_postal`, `ville`, `pays_id`, `niveaux_id`, `biographie`, `influences`, `prochains_concerts`, `sites_internet`, `newsletter`, `show_sexe`, `show_date_naissance`, `show_niveau`) VALUES
(1, 1, 'roar@mail2slovenia.com', 'ianthe-3236maude', 'EHv!Dj@kv*', '/img/users/avatar/mtvdt21.jpg', 'chevy', 'hedwig', 'f', '1984-11-22', '59740', 'Stosswihr', 54, 3, 'Nullam at mi id justo consequat maximus eget in diam.\nSed malesuada, ante iaculis placerat auctor, urna elit rhoncus est, sed lobortis nunc dolor in lacus.\nQuisque aliquam massa nulla, et lobortis arcu luctus tempus.\nSuspendisse efficitur ex non velit elementum, eu congue enim dictum.\nLorem ipsum dolor sit amet, consectetur adipiscing elit.\nSed condimentum tincidunt sapien, nec iaculis arcu sodales vitae.\nNullam suscipit eu lectus non egestas.\nQuisque vehicula nec sapien et aliquet.', 'Quisque feugiat tristique metus vel blandit.\nQuisque eleifend nisl vel varius convallis.\nAliquam fringilla commodo lacus egestas efficitur.\nSed sodales, justo et vehicula faucibus, magna lectus luctus sem, a efficitur risus sem in nulla.\nMorbi vestibulum, sem et ullamcorper lobortis, neque sapien semper turpis, vel facilisis elit odio dapibus elit.\nIn pharetra venenatis purus ultrices viverra.\nVivamus eu sem sem.\nNam in odio pretium, mattis dui quis, molestie leo.\nSed ut dignissim diam, sed scelerisque nibh.\nAenean vehicula vestibulum tempor.', 'Nunc at neque dignissim, pretium tellus eget, placerat ante.\nCras quis dui sed lorem suscipit tincidunt vitae ut arcu.\nMauris non porta urna, id accumsan ex.\nIn luctus urna vel velit rhoncus lobortis.\nCurabitur mauris sem, volutpat id dictum ut, consectetur nec mauris.\nMauris vitae mi quis nibh posuere volutpat.\nLorem ipsum dolor sit amet, consectetur adipiscing elit.\nDonec sollicitudin tellus non massa posuere consequat id sed metus.\nFusce ornare odio ac venenatis eleifend.\nSuspendisse bibendum quam quis justo molestie fringilla.', '', 'n', 'n', 'n', 'n'),
(2, 1, 'do@bolt.com', 'dene-3767-perentie', 'V8lL:UTepx', '/img/users/avatar/dav.jpg', 'carey', 'mélanie', 'h', '1997-05-20', '09250', 'Saint-Pierre', 87, 3, 'Duis consectetur vestibulum consectetur.\nEtiam ac justo tempus, fermentum sapien et, finibus enim.\nMauris ex nibh, placerat at ligula at, molestie feugiat nibh.\nSuspendisse convallis felis ac varius aliquet.\nProin mattis pulvinar pretium.', 'Nulla sodales tristique magna id gravida.\nSed vel ullamcorper velit.\nMorbi in purus sit amet quam sollicitudin sollicitudin.\nEtiam laoreet lectus eu ipsum interdum dignissim.\nVivamus id lacus eget felis gravida pharetra.\nSed sodales urna sed dolor dictum sodales.\nPhasellus scelerisque eleifend dictum.\nDonec lacinia tellus id nisl fermentum consequat.', 'Donec lacinia tellus id nisl fermentum consequat.\nSuspendisse quis fringilla quam.\nCum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\nPraesent aliquet lacinia felis, ut fermentum nulla maximus non.\nMorbi in purus sit amet quam sollicitudin sollicitudin.', '', 'n', 'n', 'n', 'n'),
(3, 1, 'false@lycos.it', 'sonny371217-hoe', 'fU\\dlu005w', '/img/users/avatar/10265452_316665741871505_969364130650500585_o-1170x653.jpg', 'darwin', 'fareed', 'f', '1999-09-26', '59530', 'Labastide-Saint-Pierre', 219, 3, 'Integer suscipit ipsum dui, sed maximus eros molestie non.\nUt eu sapien eget neque lacinia fringilla ut et felis.\nPraesent gravida metus quam, eu porttitor purus tincidunt in.\nMauris ac finibus nisl.\nFusce elementum efficitur tincidunt.\nMauris diam dolor, pretium et dui luctus, imperdiet fringilla arcu.\nMorbi a purus vel velit vulputate feugiat in ut magna.\nSed mattis dui sed orci dapibus, a convallis sapien rutrum.\nNullam vitae lacinia justo.', 'Praesent gravida elementum nunc, quis porttitor massa consectetur in.\nNulla sodales tristique magna id gravida.\nDonec mi erat, malesuada et efficitur eget, elementum ac sem.\nDonec efficitur placerat molestie.\nMorbi non suscipit eros.\nVivamus vitae metus vel est facilisis elementum in quis erat.\nAenean et tincidunt mauris, quis eleifend dolor.\nAenean varius ex non est venenatis tincidunt.\nUt quam arcu, vehicula nec vulputate id, facilisis id eros.\nNulla lectus dolor, malesuada eget lectus ut, porta rhoncus nisi.', 'In porta dolor in aliquet dictum.\nSuspendisse vitae sem bibendum, molestie metus vel, posuere turpis.\nSuspendisse convallis felis ac varius aliquet.\nAenean iaculis vehicula velit, ac lobortis metus lobortis id.\nSuspendisse quis augue at nisl efficitur mattis tincidunt sit amet quam.\nCum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\nNam ac viverra tortor, at rhoncus diam.\nMauris tristique vestibulum dolor nec auctor.\nPellentesque vel luctus leo, eleifend tincidunt massa.\nPraesent commodo dolor at nibh rhoncus, sit amet rutrum nibh porttitor.', 'superuser.com\nmetro.co.uk\ndose.com\nconsumerreports.org', 'n', 'n', 'n', 'n'),
(4, 1, 'soap@tds.net', 'jarmilathey_765', '"V?pbenJ[=', '/img/users/avatar/tex.jpg', 'vaughn', 'gideon', 'h', '1977-03-15', '18200', 'L\'Orbrie', 145, 3, 'Vivamus ac purus sed magna rutrum ullamcorper.\nNam dui ex, dapibus in sem aliquam, sagittis sodales urna.\nSuspendisse porttitor pretium purus nec pharetra.\nCras vitae tortor ante.\nFusce iaculis laoreet metus, sit amet viverra quam molestie id.\nProin et sem eros.\nCras eu lorem quis neque sollicitudin gravida sed nec dolor.\nUt tellus lorem, convallis in lacinia sit amet, vulputate at libero.\nAliquam sagittis malesuada dolor, id sagittis purus gravida eu.\nCurabitur dapibus fermentum facilisis.', 'Nullam non mauris porta, rhoncus leo sit amet, dignissim sapien.\nSed fermentum rhoncus gravida.\nInteger eu efficitur orci.\nPraesent non est augue.\nNulla id mauris tincidunt, pulvinar ante eu, aliquet magna.\nMauris tristique vestibulum dolor nec auctor.\nAenean at mauris non nisl commodo ullamcorper.', 'Pellentesque semper eget velit at commodo.\nMorbi suscipit ex sem, a imperdiet ipsum porta eu.\nAliquam at leo diam.\nEtiam eget nunc et orci auctor hendrerit.\nNullam dignissim maximus mi in lobortis.\nNunc quis nisl eget quam ullamcorper suscipit.\nQuisque maximus dolor nunc, nec ultrices lorem feugiat vitae.\nNam ultrices tortor non lectus malesuada facilisis.\nDonec nisl orci, commodo a sollicitudin ac, volutpat tristique mauris.\nSuspendisse commodo vehicula mi sit amet facilisis.', 'lifehack.org', 'n', 'n', 'n', 'n'),
(5, 1, 'muster@yehaa.com', 'filippo530865jaquenette', '6alf1uwI^&', '/img/users/avatar/tiffaniechiche.jpg', 'loria', 'freek', 'f', '1966-09-22', '11290', 'La Llagonne', 106, 3, 'Pellentesque non varius mauris.\nDonec gravida feugiat consequat.\nNullam rutrum, libero non porttitor venenatis, quam neque iaculis ex, id imperdiet ligula ex nec sem.\nPhasellus non aliquam magna, vel varius nunc.\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris risus turpis, tristique a suscipit at, faucibus ac purus.\nCurabitur suscipit, dolor et convallis hendrerit, sem lectus mattis enim, facilisis euismod odio libero quis lectus.\nCurabitur mauris sem, volutpat id dictum ut, consectetur nec mauris.\nSed mauris libero, iaculis eu velit sit amet, porttitor consectetur urna.\nSuspendisse et egestas justo.\nSuspendisse potenti.', 'Curabitur nec tortor euismod, faucibus elit at, imperdiet risus.\nNam et tellus aliquet justo laoreet aliquet.\nMaecenas ac est aliquet, ornare diam et, lacinia leo.\nMaecenas ac est aliquet, ornare diam et, lacinia leo.\nNullam ut lacus ut felis porta consectetur.\nAenean varius ex non est venenatis tincidunt.\nMorbi et magna feugiat ante feugiat mattis vel iaculis elit.', 'Etiam non vulputate turpis.\nUt sodales erat eu ultrices feugiat.\nNulla et velit erat.\nSed quis magna aliquet, consectetur felis eget, vestibulum eros.\nMauris pellentesque venenatis mollis.\nDonec ut erat ac mauris eleifend pellentesque quis vel odio.\nMauris vitae mi quis nibh posuere volutpat.', 'arabiaweather.com\nicy-veins.com', 'n', 'n', 'n', 'n'),
(6, 1, 'drink@mail.bulgaria.com', 'jasen_mae_2', 'h;8_w|">#-', '/img/users/avatar/Sandrine.jpg', 'cary', 'diederik', 'h', '1999-05-27', '67120', 'Santa-Lucia-di-Mercurio', 67, 1, 'Mauris ut lectus vitae diam ultrices ornare vitae at lectus.\nEtiam iaculis efficitur nulla, a imperdiet ipsum ornare eget.\nIn pulvinar hendrerit rhoncus.\nPellentesque ex dui, commodo in faucibus eget, pellentesque sed nisl.\nFusce nulla urna, porttitor eget leo vel, ultricies elementum neque.\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.\nNam faucibus mauris quam, suscipit pulvinar velit efficitur sit amet.\nEtiam a eleifend metus.\nIn ut egestas est.', 'Etiam sodales faucibus interdum.\nMauris non porta urna, id accumsan ex.\nAliquam eros lorem, sodales a diam sed, aliquam feugiat augue.\nNunc a dignissim nisl.\nDonec diam eros, venenatis vitae interdum vitae, tempus fermentum nisl.', 'Donec cursus aliquet enim, at commodo lorem congue eu.\nInteger pharetra fringilla dolor vitae eleifend.\nNam imperdiet libero nec congue euismod.\nIn hac habitasse platea dictumst.\nAliquam erat volutpat.\nCras commodo lectus ut mauris semper, at vestibulum orci tincidunt.\nAenean eu lobortis neque.\nVivamus id ex ut leo tincidunt vulputate vitae a diam.\nProin vitae aliquam libero, ac consectetur nunc.', 'arstechnica.com\nrns.online', 'n', 'n', 'n', 'n'),
(7, 1, 'game@skim.com', 'oighrig592218', '^1G:ASQV1&', '/img/users/avatar/10265452_316665741871505_969364130650500585_o-1170x653.jpg', 'tallie', 'alpha', 'f', '1992-03-04', '17270', 'Méasnes', 128, 3, 'Vestibulum pellentesque lectus nec luctus lacinia.\nLorem ipsum dolor sit amet, consectetur adipiscing elit.\nDuis porttitor ipsum quis massa egestas ullamcorper.\nDuis facilisis interdum leo.\nProin dictum magna eu dui rutrum, id eleifend odio tincidunt.\nDonec eu augue eleifend, semper leo ut, mollis sem.\nPraesent dignissim erat at ipsum facilisis tempus.\nMaecenas suscipit sem tempor viverra faucibus.\nMauris sit amet sapien arcu.', 'Nullam viverra pulvinar risus, sit amet tincidunt nisi vehicula eu.\nSed feugiat feugiat risus, ac pretium nibh volutpat sed.\nMaecenas consectetur suscipit aliquet.\nSed condimentum tincidunt sapien, nec iaculis arcu sodales vitae.\nMorbi cursus metus rhoncus libero sodales tristique.\nUt eget velit eu enim condimentum maximus eu in dui.\nCras dictum sagittis tortor vel mollis.\nCras nec ligula congue, volutpat risus in, feugiat purus.\nMorbi luctus laoreet fermentum.', 'Suspendisse bibendum quam quis justo molestie fringilla.\nCras placerat at quam ac cursus.\nNullam dignissim maximus mi in lobortis.\nFusce ornare odio ac venenatis eleifend.\nMorbi non suscipit eros.', 'tzarmedia.com\ncomputerhope.com\nzarplata.ru\npayumoney.com', 'n', 'n', 'n', 'n'),
(8, 1, 'Cook@mail2bosnia.com', 'eideard_belly-238', 'n@zJ$}CLjw', '/img/users/avatar/SCHOUMSKY.jpg', 'katee', 'elliot', 'h', '1980-04-19', '10340', 'Trith-Saint-Léger', 12, 3, 'Sed mattis dui sed orci dapibus, a convallis sapien rutrum.\nMorbi lectus nisl, luctus hendrerit diam vel, fermentum placerat nibh.\nNunc iaculis dignissim sem, eget faucibus tortor gravida eget.\nUt sed porttitor ligula.\nAenean eu lobortis neque.\nNunc ultrices vehicula aliquet.\nVivamus justo quam, tincidunt quis cursus blandit, mollis vitae orci.\nPraesent ipsum eros, dictum eget diam a, feugiat convallis felis.\nNullam ornare ex quis dui viverra varius.', 'Nullam sed leo sit amet turpis congue imperdiet.\nMorbi vitae neque vitae erat cursus volutpat sed quis est.\nSed at pretium quam.\nNam volutpat, elit maximus auctor auctor, lectus massa pretium purus, et rutrum mauris sapien in diam.\nIn non ante dignissim, efficitur lorem sit amet, dapibus sapien.\nEtiam dapibus arcu eget ultrices sollicitudin.\nCurabitur nec tortor euismod, faucibus elit at, imperdiet risus.\nNulla condimentum eros et lacus cursus vestibulum.\nNam ac viverra tortor, at rhoncus diam.', 'Cras at libero varius nibh blandit fermentum.\nSuspendisse sed tristique nunc.\nPraesent dictum facilisis erat nec accumsan.\nCurabitur vel est nisi.\nCurabitur ut varius mauris, vel faucibus risus.', 'thepennyhoarder.com\nsaudiairlines.com', 'n', 'n', 'n', 'n'),
(9, 1, 'marsupial@chemist.com', 'OT_laurence-23510', 'aX%d#JO+lv', '/img/users/avatar/liam.jpg', 'saraann', 'ora', 'f', '1965-07-08', '17000', 'Courcerac', 226, 2, 'Vestibulum ut enim justo.\nAenean et tincidunt mauris, quis eleifend dolor.\nCurabitur imperdiet tortor quis est imperdiet laoreet.\nDuis id semper dolor, eu fermentum est.\nPhasellus vitae tortor velit.\nVestibulum lacinia volutpat tellus et finibus.\nProin mattis pulvinar pretium.\nSed suscipit at nibh nec luctus.', 'Phasellus vitae tortor velit.\nCurabitur neque quam, ultricies ut libero a, faucibus sollicitudin quam.\nMauris rhoncus quam eros, in sollicitudin elit tristique et.\nProin ullamcorper lacus nec ultrices lobortis.\nFusce tempus nulla nibh, at tincidunt mi facilisis vel.\nPhasellus imperdiet augue ac sapien congue, et pharetra ante tristique.\nSuspendisse sit amet mi nec nisi ultrices posuere.\nNam efficitur ipsum commodo nulla posuere, a dictum erat aliquet.', 'Nulla sodales tristique magna id gravida.\nVivamus venenatis malesuada magna, non eleifend nunc gravida vel.\nNam id purus vitae elit sagittis porttitor sit amet ut turpis.\nMaecenas nulla sapien, scelerisque quis lacus at, pulvinar sodales ex.\nNulla odio justo, convallis non sapien varius, pellentesque volutpat arcu.\nNam et felis congue, cursus dui nec, viverra mauris.', 'here.com\nextra.com.br\noanda.com\nmapion.co.jp', 'n', 'n', 'n', 'n'),
(10, 1, 'slab@indyracers.com', 'sledgegwilherm_394', '3=Yu~>A|kq', '/img/users/avatar/tiffaniechiche.jpg', 'orel', 'yoshi', 'h', '1994-11-06', '79600', 'Roches-de-Condrieu', 38, 3, 'Vivamus placerat dolor sed ante blandit hendrerit vitae ac magna.\nPellentesque eu justo a ligula imperdiet varius.\nFusce nunc lectus, accumsan quis tincidunt nec, gravida id felis.\nDuis eu nisl a lacus blandit congue eget in leo.\nQuisque ut nulla ac nibh semper ultricies ac id est.\nSuspendisse imperdiet mi vel dui semper, ac imperdiet tortor malesuada.\nNullam non mauris porta, rhoncus leo sit amet, dignissim sapien.\nNam in odio pretium, mattis dui quis, molestie leo.\nAliquam eu lectus id neque pharetra vestibulum.', 'Cras congue, eros id suscipit convallis, sem mauris iaculis lectus, venenatis varius risus lectus eget est.\nMauris velit lacus, mollis ut consequat eget, semper non lectus.\nSuspendisse vitae ornare leo, nec feugiat lacus.\nQuisque aliquam augue non nisl auctor scelerisque.\nFusce pretium dignissim lacus at tincidunt.\nCras consequat id odio ac molestie.\nVestibulum ac euismod justo.', 'Quisque efficitur id lorem eu lacinia.\nSed vitae enim augue.\nCurabitur efficitur tempor viverra.\nFusce et ex ut turpis scelerisque interdum.\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.\nUt iaculis magna et justo finibus, dignissim suscipit lorem faucibus.\nDonec malesuada a nulla nec hendrerit.\nCras posuere mi eget quam tincidunt, in tincidunt nibh pulvinar.', 'eonline.com\nofficedepot.com\n58.com\ngstatic.com', 'n', 'n', 'n', 'n'),
(11, 1, 'noah@radicalz.com', 'zimri_182johna', 'v#y{M% CZ_', '/img/users/avatar/justin.jpg', 'paige', 'heidrun', 'h', '1965-12-26', '82300', 'Vanclans', 41, 3, 'Nullam placerat nulla vel lacus suscipit, et viverra nisi mattis.\nQuisque nec nisi facilisis, dapibus leo sed, sodales sapien.\nProin placerat tincidunt sapien aliquet egestas.\nInteger porttitor nisl feugiat, efficitur nunc eu, ultrices velit.\nPhasellus quam tortor, accumsan eget congue nec, lacinia eu lectus.', 'Pellentesque lorem lacus, hendrerit sit amet dignissim ut, tincidunt in justo.\nProin ullamcorper pellentesque orci sit amet efficitur.\nVivamus sagittis sollicitudin lacinia.\nProin sed nisl a purus dapibus rhoncus ac non purus.\nMauris ut lectus vitae diam ultrices ornare vitae at lectus.', 'Aenean vitae lectus nisl.\nDuis massa massa, tempor at interdum id, consequat eget nulla.\nAenean id sem in magna consequat sollicitudin quis gravida massa.\nPellentesque et dapibus eros, auctor convallis augue.\nInteger urna lectus, tincidunt in urna quis, tincidunt fermentum sem.\nPhasellus mattis elementum bibendum.\nSed vulputate leo non tortor congue congue.\nSuspendisse potenti.', 'cuevana2.tv', 'n', 'n', 'n', 'n'),
(12, 1, 'CER@psv-supporter.com', 'uinseannanderea54', 'zfyVS)g[g*', '/img/users/avatar/Zidani.jpg', 'simonne', 'asenath', 'h', '1977-07-25', '87330', 'Farges-lès-Mâcon', 129, 2, 'Cras ut quam iaculis, tincidunt felis vitae, volutpat metus.\nPellentesque pretium condimentum tortor, vel interdum velit ultricies vel.\nMauris non porta urna, id accumsan ex.\nDonec efficitur placerat molestie.\nEtiam ut urna ex.\nAenean commodo augue ultrices, consectetur mi sed, rutrum velit.\nIn luctus urna vel velit rhoncus lobortis.\nVestibulum bibendum convallis ipsum, eget semper tortor.\nCurabitur nec tortor euismod, faucibus elit at, imperdiet risus.', 'Praesent in efficitur nunc.\nIn blandit, justo non iaculis efficitur, justo tortor sodales eros, vitae gravida purus massa ut dui.\nCras pharetra, erat ut ultricies condimentum, ipsum eros porttitor libero, at euismod augue mi non augue.\nQuisque congue ultrices est pretium laoreet.\nDonec molestie non augue a iaculis.\nNulla at augue quis sapien vehicula consectetur eget non ipsum.\nAliquam a lacus mollis, semper tellus ac, consectetur felis.\nQuisque vehicula nec sapien et aliquet.\nIn fermentum lectus non ipsum laoreet, sit amet viverra metus vehicula.\nQuisque finibus, nisi vel auctor sodales, lacus sem maximus urna, a molestie enim magna quis est.', 'Ut nec gravida mauris, et convallis tellus.\nVestibulum at mollis leo.\nCras dapibus dignissim nulla, id consequat sem euismod sit amet.\nUt iaculis, urna sit amet commodo porttitor, nisi dui rhoncus diam, sed feugiat erat ex in erat.\nPraesent commodo dolor at nibh rhoncus, sit amet rutrum nibh porttitor.\nNullam dignissim maximus mi in lobortis.\nPellentesque tempor, libero at feugiat imperdiet, lorem orci laoreet lacus, non porttitor lorem arcu in eros.', '', 'n', 'n', 'n', 'n'),
(13, 1, 'ropable@racefanz.com', 'nova_120_hall', 'pXAG29uDx^', '/img/users/avatar/Lexon.jpg', 'yoshi', 'conrado', 'f', '1996-04-07', '63470', 'Fabrezan', 3, 3, 'In pulvinar sit amet erat at tempor.\nPellentesque luctus vulputate faucibus.\nMaecenas vitae lorem viverra, fermentum sapien at, vestibulum quam.\nIn varius nisl sed odio tristique, et cursus lectus laoreet.\nIn congue arcu ut eros sollicitudin hendrerit.', 'Nulla ac suscipit felis.\nNulla elementum ac massa ac mollis.\nNam leo nisi, commodo id justo nec, vulputate sodales lectus.\nPraesent commodo, leo at cursus viverra, sem enim sodales tellus, ac porttitor ligula justo ut dolor.\nNunc ultrices vehicula aliquet.\nSuspendisse vitae ornare leo, nec feugiat lacus.\nProin accumsan nec mi sit amet finibus.\nQuisque velit nisi, vestibulum sit amet gravida sit amet, semper a felis.\nPraesent pharetra pharetra nibh, eget semper turpis vestibulum id.\nPellentesque aliquet, mi vitae egestas tincidunt, nibh massa pulvinar urna, eget ultrices nibh sem vel enim.', 'Integer ut sollicitudin ex.\nSed eget viverra leo, nec blandit turpis.\nLorem ipsum dolor sit amet, consectetur adipiscing elit.\nPellentesque pretium condimentum tortor, vel interdum velit ultricies vel.\nVivamus tempus turpis a neque aliquam, id pellentesque orci lacinia.\nNullam cursus lectus in placerat blandit.\nNullam nec metus sit amet erat mattis sollicitudin.', 'ksl.com', 'n', 'n', 'n', 'n'),
(14, 1, 'Austral@mail2kathleen.com', 'button-gordon-588224', '!k6ieirR8r', '/img/users/avatar/Sandrine.jpg', 'saul', 'jacek', 'h', '1993-09-04', '40120', 'Wingersheim', 42, 1, 'Integer porttitor nisl feugiat, efficitur nunc eu, ultrices velit.\nEtiam eget nunc et orci auctor hendrerit.\nAliquam fringilla tellus sed semper aliquet.\nVivamus eu sem sem.\nEtiam eu nunc consequat, egestas massa in, porttitor leo.\nQuisque auctor nisl id orci viverra, nec tincidunt dui laoreet.\nDonec elit quam, rhoncus sed ullamcorper et, lobortis ac enim.\nMauris eu libero vestibulum, auctor odio vel, pharetra lectus.\nSed condimentum eros at laoreet gravida.\nUt eget velit eu enim condimentum maximus eu in dui.', 'Nulla pharetra velit aliquam ex egestas imperdiet.\nNam tincidunt ipsum ex, in facilisis nibh sollicitudin eget.\nDonec auctor eu quam ac mollis.\nNam ac viverra tortor, at rhoncus diam.\nAenean in urna non ex tempor placerat.\nUt tellus lorem, convallis in lacinia sit amet, vulputate at libero.\nDonec consequat, leo sit amet auctor pharetra, nisl risus elementum dui, quis condimentum odio felis at libero.\nNulla sapien arcu, ullamcorper sit amet nunc a, malesuada fringilla diam.', 'Curabitur id neque dignissim, porta tortor et, posuere neque.\nDonec rutrum tempor tellus, sed condimentum ligula dictum sit amet.\nAliquam sit amet lorem sed risus semper fringilla.\nPraesent tristique lectus nibh, ut venenatis urna varius a.\nDonec sit amet ligula a turpis sollicitudin dapibus.', 'euronews.com\ndaily.co.jp\ntheatlantic.com', 'n', 'n', 'n', 'n'),
(15, 1, 'burramys@allmail.net', 'dom_40216-morwong', 'NaQMOK<KKV', '/img/users/avatar/dav.jpg', 'coralyn', 'zvonko', 'h', '1985-07-18', '89200', 'Lège-Cap-Ferret', 191, 3, 'Aenean urna massa, condimentum ut sem et, tristique euismod nibh.\nDonec felis nunc, hendrerit ut molestie vitae, suscipit a neque.\nDonec tempus arcu eget dolor laoreet mattis.\nAliquam fringilla commodo lacus egestas efficitur.\nIn iaculis tempus metus non ultricies.\nQuisque eget consequat nulla.\nDonec semper ac odio eu feugiat.', 'Donec in diam feugiat, convallis arcu at, facilisis dolor.\nMaecenas enim diam, auctor vitae odio nec, interdum tristique diam.\nCurabitur et venenatis sem.\nVestibulum mattis eros ac dignissim malesuada.\nProin at maximus lacus.\nNunc eget nulla ullamcorper, gravida nisl condimentum, posuere velit.\nSuspendisse quis fringilla quam.\nSed ornare risus et mauris interdum, et mollis neque volutpat.\nEtiam sed diam viverra, laoreet nisl sed, pretium lorem.', 'Nulla odio justo, convallis non sapien varius, pellentesque volutpat arcu.\nMauris libero felis, tincidunt aliquam est ut, imperdiet pretium neque.\nPhasellus cursus feugiat velit, ut suscipit tellus vulputate non.\nAenean ultricies nibh nec lorem posuere, a mattis sem blandit.\nSuspendisse vitae ornare leo, nec feugiat lacus.\nVivamus id lacus eget felis gravida pharetra.\nSuspendisse potenti.\nIn magna magna, volutpat eget eros at, euismod imperdiet odio.\nPellentesque vel luctus leo, eleifend tincidunt massa.', 'dostor.org\nmoneycontrol.com', 'n', 'n', 'n', 'n'),
(16, 1, 'pigs@the-biker.com', 'antoniettagum-659319', 'z8/"I.Agg/', '/img/users/avatar/1004086_10152360972129068_2009121485_n.jpg', 'renell', 'jordon', 'h', '1960-05-19', '84290', 'Rodemack', 237, 3, 'Aliquam sapien ex, tempus quis consequat at, dignissim quis magna.\nIn hac habitasse platea dictumst.\nCras nec ornare risus.\nMauris ultrices est vitae commodo fermentum.\nCurabitur mi libero, consectetur ac elementum quis, lacinia eu nulla.\nDuis at molestie lectus.\nSed a elementum erat, at lacinia felis.\nIn pharetra, tellus ut tristique semper, purus metus lacinia est, sed pellentesque lorem ligula sit amet erat.\nDonec diam eros, venenatis vitae interdum vitae, tempus fermentum nisl.\nNunc rhoncus finibus metus posuere aliquam.', 'Proin vitae aliquam libero, ac consectetur nunc.\nNunc aliquam placerat ante quis sodales.\nMaecenas condimentum, diam vel consequat auctor, nisi eros convallis magna, ut mollis ex quam nec enim.\nAenean sed porttitor purus.\nDonec gravida feugiat consequat.\nDuis vestibulum diam sapien.\nPellentesque vel luctus leo, eleifend tincidunt massa.\nVivamus eu sapien vulputate, semper sem ullamcorper, scelerisque ex.\nProin aliquam ultrices risus.\nDonec purus metus, cursus at tortor eu, interdum elementum nunc.', 'Etiam laoreet lectus eu ipsum interdum dignissim.\nCurabitur faucibus tincidunt pretium.\nCurabitur in augue in dolor fringilla euismod sit amet id turpis.\nIn pharetra gravida quam a gravida.\nPhasellus sit amet porttitor augue.\nMaecenas efficitur justo ante, in elementum odio tempor vel.\nCurabitur in augue in dolor fringilla euismod sit amet id turpis.\nPraesent gravida metus quam, eu porttitor purus tincidunt in.', 'bellemaison.jp', 'n', 'n', 'n', 'n'),
(17, 1, 'golly@mycity.com', 'zedekiah_963664taipan', '[O\\+hL8{O6', '/img/users/avatar/tiffaniechiche.jpg', 'tami', 'goffredo', 'h', '1982-02-03', '31510', 'Montchamp', 69, 2, 'Mauris placerat mi laoreet tortor euismod luctus.\nNullam et accumsan turpis.\nUt nec gravida mauris, et convallis tellus.\nCum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\nDonec gravida feugiat consequat.\nDuis id semper dolor, eu fermentum est.\nSed nec commodo sapien.\nNulla bibendum molestie risus, eu faucibus metus tristique eget.', 'Donec tincidunt tortor dolor, sed accumsan leo elementum sit amet.\nNulla venenatis blandit ligula, nec tincidunt nisi condimentum a.\nAenean consectetur eros at diam varius sodales.\nSuspendisse potenti.\nQuisque ut nulla ac nibh semper ultricies ac id est.\nDonec quis justo vitae diam iaculis mollis fringilla vitae mi.', 'Maecenas quis felis libero.\nAliquam tincidunt posuere iaculis.\nSuspendisse facilisis, mauris eu efficitur aliquet, dolor quam tempus magna, nec pellentesque magna est nec libero.\nNam volutpat augue vel tellus feugiat, sed cursus nunc vestibulum.\nNullam id orci faucibus, molestie orci in, euismod eros.\nPhasellus sed sem id arcu euismod aliquam.\nUt semper sodales sem, quis sodales ipsum.', 'haberler.com\nvoyeurhit.com\nmlb.com\nrightmove.co.uk', 'n', 'n', 'n', 'n'),
(18, 1, 'Mackellar@wouldilie.com', 'backbencher_010-naila', 'a/X]4Po26=', '/img/users/avatar/Lexon.jpg', 'kevin', 'anima', 'h', '1964-07-06', '47370', 'Vaux-et-Chantegrue', 238, 2, 'Nullam at mi id justo consequat maximus eget in diam.\nDonec laoreet ex ac nulla ullamcorper gravida.\nVivamus sed sodales arcu, a volutpat metus.\nEtiam at condimentum tellus.\nFusce tempus nulla nibh, at tincidunt mi facilisis vel.\nPellentesque dui nibh, sodales blandit accumsan id, porttitor in elit.\nDonec vel egestas ipsum.\nDonec congue sem lectus, sed hendrerit nisl porttitor ut.', 'In enim ipsum, semper in mauris sed, hendrerit maximus mi.\nDonec rutrum imperdiet ex, sit amet malesuada massa ullamcorper eu.\nAenean iaculis vehicula velit, ac lobortis metus lobortis id.\nPellentesque luctus vulputate faucibus.\nCras ultrices quam sed rhoncus malesuada.\nIn pharetra venenatis purus ultrices viverra.\nPraesent at tellus mauris.', 'Duis varius ante eget diam cursus fringilla.\nAliquam fringilla commodo lacus egestas efficitur.\nDuis porttitor ipsum quis massa egestas ullamcorper.\nCras commodo tortor id diam tristique porttitor.\nAenean blandit nec tortor nec tincidunt.\nIn vulputate condimentum arcu at lacinia.\nVestibulum venenatis arcu sit amet orci gravida, sed egestas lorem cursus.\nIn hac habitasse platea dictumst.', 'yaolan.com\nyandex.ua\nshihuo.cn', 'n', 'n', 'n', 'n'),
(19, 1, 'reservegrade@mail2potatohead.com', 'Eccles_ethelred-5186', 'Xb[>)KBjVz', '/img/users/avatar/kriss-571x361.jpg', 'celia', 'misha', 'h', '1974-05-18', '33710', 'Chailly-sur-Armançon', 166, 2, 'Quisque velit ex, efficitur et varius vel, venenatis et libero.\nDonec ac dui ex.\nUt lectus arcu, convallis et euismod non, feugiat ac velit.\nSed euismod nulla vitae ligula rutrum, eu dignissim eros volutpat.\nSed eu turpis justo.\nNullam eget nunc a purus varius pellentesque bibendum non dolor.', 'Duis vel bibendum dui, ac vestibulum mi.\nVivamus vel posuere erat.\nSed et ante non dolor eleifend eleifend ut in nisi.\nDuis felis sem, venenatis eu orci sed, porttitor fermentum augue.\nEtiam consectetur, nulla non semper dapibus, sem tellus varius nisl, nec blandit nunc felis at arcu.', 'Nam in odio pretium, mattis dui quis, molestie leo.\nProin ullamcorper pellentesque orci sit amet efficitur.\nPhasellus ut felis et est euismod pharetra.\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.\nCurabitur ut varius mauris, vel faucibus risus.\nEtiam consectetur, nulla non semper dapibus, sem tellus varius nisl, nec blandit nunc felis at arcu.\nPhasellus non diam commodo, maximus diam in, euismod metus.', 'allmyvideos.net\nadschemist.com', 'n', 'n', 'n', 'n'),
(20, 1, 'Darwin@yapost.com', 'bernard_frogmouth-445', 'Bl(4.pjtEw', '/img/users/avatar/10379731_10205216406911902_5313597620723502541_o-1170x1013.jpg', 'camey', 'irene', 'f', '1994-10-19', '14140', 'Moissac', 173, 1, 'Morbi mattis elit nec congue cursus.\nSed rutrum et tortor id euismod.\nProin ullamcorper pellentesque orci sit amet efficitur.\nSuspendisse porttitor pretium purus nec pharetra.\nCras vitae tortor ante.\nQuisque sollicitudin augue et erat tempor scelerisque.', 'Nullam enim diam, commodo ac lectus sed, vestibulum hendrerit eros.\nSuspendisse eleifend sed nulla sed dictum.\nVivamus in odio lacus.\nCras id ex neque.\nMaecenas ut iaculis tellus.\nIn hac habitasse platea dictumst.\nMorbi eu quam est.\nInteger id egestas sem.\nSed sodales, justo et vehicula faucibus, magna lectus luctus sem, a efficitur risus sem in nulla.\nProin vel euismod felis, quis pharetra nisi.', 'Donec venenatis odio neque, nec faucibus ipsum congue sed.\nMorbi in purus sit amet quam sollicitudin sollicitudin.\nAenean nec luctus leo, quis auctor lectus.\nMauris tristique erat vel leo porttitor, sed ultricies magna mattis.\nAliquam eget enim at lorem viverra ultrices.\nNam volutpat augue vel tellus feugiat, sed cursus nunc vestibulum.\nMaecenas posuere justo dolor, ac scelerisque arcu suscipit in.\nSuspendisse efficitur ex non velit elementum, eu congue enim dictum.\nSed nec commodo sapien.\nFusce vitae faucibus diam.', '', 'n', 'n', 'n', 'n'),
(21, 1, 'sly@mail2poseidon.com', 'estevan-imre-48', 'aG9Tf-;`.\\', '/img/users/avatar/liam.jpg', 'brandyn', 'tadeusz', 'f', '1960-03-19', '43420', 'Chapelles-Bourbon', 92, 1, 'Aliquam euismod nunc eget mi semper dictum.\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.\nDonec elit quam, rhoncus sed ullamcorper et, lobortis ac enim.\nDonec ultrices odio elit, et lacinia dui rutrum facilisis.\nEtiam volutpat dolor non velit imperdiet, eu vehicula nisl varius.', 'Donec ac dui ex.\nProin sed nisl a purus dapibus rhoncus ac non purus.\nMorbi luctus laoreet fermentum.\nProin condimentum tempus sapien.\nDuis vel risus at felis euismod vulputate.\nQuisque ac aliquet risus, non porttitor lacus.\nUt porttitor elit vitae pretium porta.', 'Nam ac viverra tortor, at rhoncus diam.\nDonec eu augue eleifend, semper leo ut, mollis sem.\nDuis ex eros, pellentesque cursus maximus in, lobortis quis quam.\nSed accumsan ex id bibendum porta.\nCras eu lorem quis neque sollicitudin gravida sed nec dolor.\nIn hac habitasse platea dictumst.\nProin commodo sed sem nec commodo.\nAenean commodo augue ultrices, consectetur mi sed, rutrum velit.\nCras sem dolor, ullamcorper bibendum scelerisque ac, imperdiet sed libero.', 'wapka.mobi', 'n', 'n', 'n', 'n'),
(22, 1, 'plonko@mail2london.com', 'kourtney_redback923', 'T2g6Kxi\'st', '/img/users/avatar/10379731_10205216406911902_5313597620723502541_o-1170x1013.jpg', 'sylvan', 'enoch', 'h', '1995-01-02', '71600', 'Besny-et-Loizy', 219, 3, 'Aliquam sagittis malesuada dolor, id sagittis purus gravida eu.\nMauris ut lectus vitae diam ultrices ornare vitae at lectus.\nMaecenas gravida ligula sed magna vehicula rutrum.\nVestibulum vel turpis auctor, lacinia odio sed, tristique risus.\nAenean posuere, nulla in placerat tempus, neque enim molestie ante, ac tempor mauris ex id purus.\nMaecenas vitae nisi ut metus scelerisque pretium.\nPellentesque ex dui, commodo in faucibus eget, pellentesque sed nisl.\nSed eu eros cursus, aliquet mi sit amet, dignissim dolor.\nUt iaculis, urna sit amet commodo porttitor, nisi dui rhoncus diam, sed feugiat erat ex in erat.', 'Praesent dapibus augue eleifend, iaculis tortor sit amet, mollis tortor.\nCurabitur vehicula nulla sit amet bibendum pretium.\nProin tristique dui vel sapien pharetra placerat.\nPellentesque vel luctus leo, eleifend tincidunt massa.\nMaecenas vel dictum lorem.\nIn aliquet nisi mattis, tempus massa ut, pretium velit.\nSed id sagittis arcu.\nMaecenas vitae nisi ut metus scelerisque pretium.\nQuisque sed odio augue.\nQuisque eget consequat nulla.', 'Integer et facilisis libero.\nSuspendisse efficitur, libero in blandit ullamcorper, magna lectus malesuada orci, in bibendum sem nunc eu enim.\nDonec elit orci, accumsan ut augue a, ornare scelerisque ante.\nNam leo nisi, commodo id justo nec, vulputate sodales lectus.\nDonec venenatis odio neque, nec faucibus ipsum congue sed.\nEtiam volutpat dolor non velit imperdiet, eu vehicula nisl varius.\nProin condimentum tempus sapien.', 'desire2learn.com\nnationwide.co.uk\nwwe.com', 'n', 'n', 'n', 'n'),
(23, 1, 'service@mail2cool.com', 'johannes_198_berkie', '(T(=:*2H0%', '/img/users/avatar/10379731_10205216406911902_5313597620723502541_o-1170x1013.jpg', 'thibaut', 'kumiko', 'h', '1983-05-23', '09110', 'Caffiers', 12, 3, 'Nam dui ex, dapibus in sem aliquam, sagittis sodales urna.\nMauris pellentesque venenatis mollis.\nSed risus risus, imperdiet ut auctor quis, molestie a nulla.\nQuisque at bibendum lectus.\nCras ipsum ligula, laoreet eget enim sit amet, fringilla dignissim magna.', 'Aenean ultricies nibh nec lorem posuere, a mattis sem blandit.\nPraesent eleifend nisl risus, at porttitor lacus tristique sed.\nInteger nisi neque, pellentesque et nisl a, ultrices dictum arcu.\nDonec congue sem lectus, sed hendrerit nisl porttitor ut.\nFusce semper quam sed tellus consectetur, eget interdum neque mollis.\nSed accumsan vel lorem sed auctor.\nSuspendisse potenti.\nSed sit amet elit at elit laoreet fermentum.', 'Etiam faucibus sem erat, non dignissim urna vehicula viverra.\nPraesent egestas, magna non dictum laoreet, turpis lacus consectetur arcu, vitae euismod lectus sapien iaculis nunc.\nAliquam erat volutpat.\nLorem ipsum dolor sit amet, consectetur adipiscing elit.\nMaecenas ac est aliquet, ornare diam et, lacinia leo.\nMauris in dictum mi, id rhoncus ante.\nDuis vestibulum diam sapien.\nEtiam ultricies efficitur imperdiet.\nNulla eget lacus molestie augue pharetra egestas nec vel felis.', 'hltv.org', 'n', 'n', 'n', 'n'),
(24, 1, 'marching@mail2close.com', 'bushranger349819buiron', '_&Fju |bqF', '/img/users/avatar/tiffaniechiche.jpg', 'daven', 'qiu', 'h', '1969-04-02', '39300', 'Labastide-Villefranche', 3, 2, 'Donec sed sagittis arcu.\nNullam enim diam, commodo ac lectus sed, vestibulum hendrerit eros.\nNam a vulputate dui.\nVestibulum lacinia, enim porta porttitor gravida, ex arcu ultrices diam, nec cursus libero lectus ac elit.\nCurabitur quis neque nisl.\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed lobortis et diam a pulvinar.\nPraesent purus ante, lobortis vitae ullamcorper ac, hendrerit in metus.\nCras maximus, augue vel fermentum sagittis, leo massa mattis ex, at consectetur nibh ligula nec tortor.\nNullam ut ipsum augue.', 'Cras quis dui sed lorem suscipit tincidunt vitae ut arcu.\nAenean facilisis non erat eu efficitur.\nNam malesuada est odio, eu tincidunt metus sodales vel.\nDonec sodales mi id risus lobortis, sed dapibus eros pellentesque.\nAenean ultricies nibh nec lorem posuere, a mattis sem blandit.\nQuisque ac ex purus.\nCurabitur efficitur eget elit vel dictum.\nMauris vehicula ipsum a tristique porttitor.\nDuis vestibulum diam sapien.\nNulla a malesuada urna, bibendum tristique ipsum.', 'Ut elementum risus id vehicula venenatis.\nSed nec ex nibh.\nDonec auctor eu quam ac mollis.\nLorem ipsum dolor sit amet, consectetur adipiscing elit.\nMauris ex nibh, placerat at ligula at, molestie feugiat nibh.\nMorbi egestas ligula ligula, et iaculis diam posuere id.\nUt ut lobortis elit.\nNam et tellus aliquet justo laoreet aliquet.\nPraesent ullamcorper viverra dolor in mattis.', 'republika.co.id', 'n', 'n', 'n', 'n'),
(25, 1, 'batchor@wombles.com', 'kimo-beau-7755', '9Bn1aQqzT`', '/img/users/avatar/steph.jpg', 'cello', 'lilja', 'h', '1960-03-04', '67350', 'Lesbœufs', 222, 2, 'Curabitur iaculis, mauris sit amet consectetur finibus, leo ex commodo metus, sed efficitur felis purus in enim.\nVivamus suscipit nunc vitae consequat venenatis.\nVivamus suscipit nunc vitae consequat venenatis.\nIn vel gravida mauris, euismod egestas orci.\nDonec ullamcorper, sapien eu placerat mattis, enim justo porta sapien, in iaculis nunc nibh ac ante.\nCras ultrices quam sed rhoncus malesuada.\nSed euismod nulla vitae ligula rutrum, eu dignissim eros volutpat.\nNam tempor lacus dui, tempor fringilla lectus fermentum nec.\nAliquam aliquam justo nec mauris fermentum, ac congue eros pretium.', 'Fusce sed leo vitae sapien pulvinar ullamcorper sed tempus purus.\nUt sed facilisis turpis, eu vulputate neque.\nPraesent dapibus augue eleifend, iaculis tortor sit amet, mollis tortor.\nSuspendisse et odio nec neque bibendum dignissim.\nInteger neque erat, ullamcorper eget feugiat eu, scelerisque nec nisi.', 'Ut nec gravida mauris, et convallis tellus.\nQuisque congue ultrices est pretium laoreet.\nNulla eu justo ullamcorper, condimentum justo quis, sodales odio.\nDuis at molestie lectus.\nMorbi luctus laoreet fermentum.', 'torrentz.in\n3dnews.ru\n24home.com', 'n', 'n', 'n', 'n'),
(26, 1, 'coon@fromindiana.com', 'vallie_56282pilot', '_ghd2X](S`', '/img/users/avatar/dav.jpg', 'karrie', 'owen', 'f', '1994-10-21', '76200', 'Payroux', 134, 1, 'Etiam non vulputate turpis.\nDuis varius ante eget diam cursus fringilla.\nMauris pellentesque venenatis mollis.\nInteger elementum rhoncus sapien, accumsan iaculis ligula feugiat vitae.\nAliquam erat volutpat.', 'Vivamus ac purus sed magna rutrum ullamcorper.\nQuisque sollicitudin augue et erat tempor scelerisque.\nNullam tristique nisi sed ullamcorper faucibus.\nSed at pretium quam.\nIn consectetur tempus magna nec lobortis.\nMauris nec blandit purus, scelerisque porttitor arcu.\nEtiam et rutrum sapien, eu auctor dui.', 'Integer condimentum erat enim, eget mollis arcu molestie in.\nIn condimentum nulla in eleifend luctus.\nUt sed facilisis turpis, eu vulputate neque.\nIn iaculis tempus metus non ultricies.\nEtiam vehicula, enim non dictum viverra, elit urna eleifend magna, at auctor mi nibh ac tortor.\nDonec a nibh nisl.\nMauris fermentum erat massa, vel eleifend sem lacinia sit amet.\nPellentesque iaculis eu quam vestibulum rutrum.\nMauris tristique erat vel leo porttitor, sed ultricies magna mattis.\nPellentesque lorem lacus, hendrerit sit amet dignissim ut, tincidunt in justo.', 'chinaz.com\nanswers.com\ntattoodo.com', 'n', 'n', 'n', 'n'),
(27, 1, 'mark@mail2nancy.com', 'boomerang_2482_erica', '!&o3=<"pp5', '/img/users/avatar/10265452_316665741871505_969364130650500585_o-1170x653.jpg', 'dinny', 'iola', 'f', '2001-01-14', '56690', 'Auvers-le-Hamon', 24, 2, 'Nunc imperdiet molestie odio, vitae sollicitudin urna tincidunt vel.\nDonec congue ultricies lectus mollis consequat.\nDuis faucibus orci tincidunt, mollis mi a, auctor neque.\nPraesent non est augue.\nSuspendisse quis fringilla quam.\nDuis at ligula in lectus placerat vehicula.\nCurabitur vehicula nulla sit amet bibendum pretium.', 'Phasellus imperdiet augue ac sapien congue, et pharetra ante tristique.\nCras placerat at quam ac cursus.\nDonec lacinia tellus id nisl fermentum consequat.\nMauris vehicula ipsum a tristique porttitor.\nNunc pharetra varius sapien at tempor.', 'Nulla cursus rhoncus urna, interdum aliquam est cursus sit amet.\nDonec faucibus lacinia ipsum, sed mollis ante dictum sed.\nNam volutpat, elit maximus auctor auctor, lectus massa pretium purus, et rutrum mauris sapien in diam.\nVestibulum posuere vitae lectus id fringilla.\nDonec ut erat ac mauris eleifend pellentesque quis vel odio.\nProin ac felis nec tortor lacinia tincidunt.', 'smartsheet.com', 'n', 'n', 'n', 'n'),
(28, 1, 'Hamersley@sendme.cz', 'FAHA_2593lena', '6\\hVCdaQ7*', '/img/users/avatar/10265452_316665741871505_969364130650500585_o-1170x653.jpg', 'chad', 'rogelio', 'f', '1997-04-27', '67480', 'Monnetay', 213, 2, 'Fusce eget ipsum at elit faucibus fringilla.\nQuisque nec quam eget felis tempus sagittis.\nNulla bibendum molestie risus, eu faucibus metus tristique eget.\nNullam dapibus interdum feugiat.\nPellentesque pretium condimentum tortor, vel interdum velit ultricies vel.\nNam et felis congue, cursus dui nec, viverra mauris.\nSed vitae nisl viverra ipsum tempus sollicitudin et vitae dui.', 'Mauris ut lectus vitae diam ultrices ornare vitae at lectus.\nDonec neque nisl, pellentesque ut imperdiet eu, porta ut nisi.\nSed eget viverra leo, nec blandit turpis.\nVivamus quis ipsum vel felis euismod suscipit.\nAliquam mattis, massa non auctor imperdiet, nisl metus pretium diam, vitae imperdiet dui quam ac odio.\nSed faucibus tincidunt metus, sed accumsan quam mollis nec.', 'Nullam consequat odio et orci pellentesque auctor.\nNullam at augue ultricies, posuere neque ac, mollis leo.\nMaecenas quam tortor, semper eget turpis sed, congue vulputate libero.\nNunc pharetra varius sapien at tempor.\nSuspendisse et egestas justo.\nMorbi cursus metus rhoncus libero sodales tristique.\nFusce a quam ante.', 'yourstory.com', 'n', 'n', 'n', 'n'),
(29, 1, 'dasyure@mail2denmark.com', 'erishkigal-0129rouseabout', '#(x)FyX;:w', '/img/users/avatar/tex.jpg', 'abey', 'lleulu', 'h', '1994-08-10', '24380', 'Saint-Égrève', 9, 2, 'Quisque aliquam massa nulla, et lobortis arcu luctus tempus.\nNulla sodales tristique magna id gravida.\nDonec at urna ut sem auctor iaculis eu sed elit.\nSed arcu urna, interdum at ornare non, facilisis vitae ligula.\nSed sit amet feugiat tellus.\nVestibulum ut enim justo.\nAenean vitae lectus nisl.\nNunc quam leo, tincidunt ut diam nec, consectetur volutpat lectus.\nAliquam erat volutpat.', 'Interdum et malesuada fames ac ante ipsum primis in faucibus.\nPellentesque pretium tortor et eros venenatis elementum.\nEtiam rutrum quis magna quis pharetra.\nProin vel euismod felis, quis pharetra nisi.\nEtiam neque purus, commodo luctus viverra ut, molestie quis mi.\nIn maximus neque a odio tincidunt, eu dapibus augue varius.\nMauris placerat metus at mi imperdiet venenatis sit amet in leo.', 'Nam tincidunt lectus ac volutpat venenatis.\nAenean consectetur eros at diam varius sodales.\nNullam eu risus sagittis lorem iaculis commodo.\nNullam id sapien ex.\nCurabitur sit amet libero est.\nPhasellus vitae tortor velit.\nMaecenas sit amet aliquet lectus.\nDonec malesuada nisl quis velit rutrum tincidunt.', 'next.co.uk\nrepublika.co.id\nhongkiat.com\nwikimapia.org', 'n', 'n', 'n', 'n'),
(30, 1, 'bandicoot@myiris.com', 'stanwood-6-calaverite', 'i!n?rsl;>A', '/img/users/avatar/steph.jpg', 'dex', 'håvard', 'f', '1994-12-22', '83136', 'Villemotier', 38, 1, 'Praesent ac enim ac metus mattis mollis eu nec ex.\nSuspendisse eleifend sed nulla sed dictum.\nMaecenas vitae nisi ut metus scelerisque pretium.\nMaecenas in facilisis erat, nec auctor est.\nQuisque congue ultrices est pretium laoreet.\nCras maximus, augue vel fermentum sagittis, leo massa mattis ex, at consectetur nibh ligula nec tortor.\nMaecenas feugiat mi eget nisi convallis, sit amet consectetur augue accumsan.', 'Pellentesque cursus vestibulum elementum.\nDonec sit amet ligula a turpis sollicitudin dapibus.\nVivamus justo quam, tincidunt quis cursus blandit, mollis vitae orci.\nEtiam non neque quis ante semper mollis.\nNullam at mi id justo consequat maximus eget in diam.', 'Mauris fermentum erat massa, vel eleifend sem lacinia sit amet.\nFusce ornare odio ac venenatis eleifend.\nMauris pellentesque venenatis lectus, quis porttitor libero fermentum nec.\nDonec ac dui ex.\nNullam ac tempus nulla, et convallis nulla.\nCras vel tincidunt justo.', 'caranddriver.com', 'n', 'n', 'n', 'n'),
(31, 1, 'nip@ymail.com', 'Parkes_8710dalis', '-*":HfqNTy', '/img/users/avatar/liam.jpg', 'witty', 'awstin', 'h', '2001-01-30', '27400', 'Abreschviller', 89, 3, 'Etiam blandit vestibulum sem, eget auctor massa maximus nec.\nVestibulum ut enim justo.\nNullam nec metus sit amet erat mattis sollicitudin.\nSuspendisse efficitur ex non velit elementum, eu congue enim dictum.\nMorbi eu quam est.\nNulla eu justo ullamcorper, condimentum justo quis, sodales odio.\nAenean iaculis vehicula velit, ac lobortis metus lobortis id.\nVivamus tempus turpis a neque aliquam, id pellentesque orci lacinia.\nMaecenas auctor, lectus et cursus aliquet, turpis quam facilisis neque, sit amet tempus urna nisi eget sapien.', 'Duis id leo arcu.\nFusce ornare odio ac venenatis eleifend.\nAliquam lacus diam, auctor id faucibus vitae, tempor id nunc.\nPraesent mollis vehicula diam non aliquet.\nQuisque velit nisi, vestibulum sit amet gravida sit amet, semper a felis.\nNam tincidunt ipsum ex, in facilisis nibh sollicitudin eget.\nQuisque lobortis ante arcu, pulvinar iaculis mi pulvinar ut.\nPraesent gravida elementum nunc, quis porttitor massa consectetur in.', 'Morbi non ante egestas, interdum nibh id, pharetra elit.\nInteger at odio hendrerit, volutpat erat eget, sagittis sem.\nNullam luctus facilisis convallis.\nEtiam dapibus arcu eget ultrices sollicitudin.\nNam leo nisi, commodo id justo nec, vulputate sodales lectus.\nDonec a nibh nisl.\nFusce consequat luctus arcu, euismod sagittis sem consequat non.\nNulla ut nisi nec risus tempus efficitur.\nAenean posuere, nulla in placerat tempus, neque enim molestie ante, ac tempor mauris ex id purus.', 'glassdoor.com\narecio.work', 'n', 'n', 'n', 'n'),
(32, 1, 'manchester@fastmessaging.com', 'rove_clementius58344', '~v ?F+F gx', '/img/users/avatar/tiffaniechiche.jpg', 'weylin', 'cillian', 'f', '1999-05-12', '46120', 'Bourg-Bruche', 85, 2, 'Integer neque erat, ullamcorper eget feugiat eu, scelerisque nec nisi.\nAenean iaculis vehicula velit, ac lobortis metus lobortis id.\nVestibulum in ultricies sapien.\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;.\nFusce et ex ut turpis scelerisque interdum.\nSed mattis dui sed orci dapibus, a convallis sapien rutrum.\nMorbi suscipit turpis ac diam porttitor, nec aliquet augue eleifend.\nVestibulum tellus nibh, efficitur at nunc eget, dignissim vulputate ante.\nIn vulputate condimentum arcu at lacinia.', 'Suspendisse tempus ex at justo blandit congue.\nNulla condimentum eros et lacus cursus vestibulum.\nPellentesque id porttitor nunc, sed luctus velit.\nSed feugiat arcu vel ligula porta vestibulum.\nVivamus venenatis malesuada magna, non eleifend nunc gravida vel.\nNam finibus eget mi sit amet mattis.\nFusce id finibus risus.\nFusce ac nisi vel tellus condimentum varius vel ac magna.\nMaecenas vitae lorem viverra, fermentum sapien at, vestibulum quam.', 'Fusce eget dui et libero maximus faucibus sed non nunc.\nUt iaculis magna et justo finibus, dignissim suscipit lorem faucibus.\nNullam facilisis mi non ex viverra, nec rutrum ipsum lobortis.\nSuspendisse ante tortor, blandit non dolor eget, tincidunt vehicula nunc.\nNam tincidunt lectus ac volutpat venenatis.\nNunc venenatis mi vel metus placerat blandit quis a risus.\nNunc mauris dolor, rhoncus nec laoreet sed, faucibus a turpis.', 'zulily.com', 'n', 'n', 'n', 'n'),
(33, 1, 'crook@mail2fever.com', 'mozzletammi15369', 'F)/1V@F><T', '/img/users/avatar/steph.jpg', 'ephrayim', 'benedikt', 'h', '1991-12-02', '21170', 'La Chapelle-Thireuil', 232, 1, 'Curabitur vestibulum et orci nec vestibulum.\nNullam sed leo nec ipsum cursus laoreet.\nDonec id lacinia ligula.\nUt iaculis convallis risus rutrum lacinia.\nAenean ultricies nibh nec lorem posuere, a mattis sem blandit.\nDuis porttitor ipsum quis massa egestas ullamcorper.\nAliquam vel malesuada nulla, non ornare neque.\nDonec dictum tincidunt congue.\nIn condimentum nulla in eleifend luctus.', 'Morbi vitae neque vitae erat cursus volutpat sed quis est.\nSed vulputate euismod tempor.\nEtiam faucibus sem erat, non dignissim urna vehicula viverra.\nDuis ex eros, pellentesque cursus maximus in, lobortis quis quam.\nNunc vitae feugiat ligula.\nDuis suscipit at diam vitae aliquam.\nNullam placerat nulla vel lacus suscipit, et viverra nisi mattis.', 'In vulputate condimentum arcu at lacinia.\nCras quis dui sed lorem suscipit tincidunt vitae ut arcu.\nNullam facilisis mi non ex viverra, nec rutrum ipsum lobortis.\nCurabitur ac rutrum risus, non facilisis quam.\nDuis porttitor ipsum quis massa egestas ullamcorper.\nDonec vel egestas ipsum.\nSed tellus urna, scelerisque id massa non, tristique semper nulla.\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.\nMorbi efficitur dolor sapien, et sollicitudin mauris mollis ut.', 'screenrant.com', 'n', 'n', 'n', 'n');
INSERT INTO `users` (`id`, `active`, `email`, `pseudo`, `password`, `url_photo`, `nom`, `prenom`, `sexe`, `date_naissance`, `code_postal`, `ville`, `pays_id`, `niveaux_id`, `biographie`, `influences`, `prochains_concerts`, `sites_internet`, `newsletter`, `show_sexe`, `show_date_naissance`, `show_niveau`) VALUES
(34, 1, 'babbler@macmail.com', 'betteann_PG195', 'hmEO!3bGjl', '/img/users/avatar/10379731_10205216406911902_5313597620723502541_o-1170x1013.jpg', 'miles', 'jaquelyn', 'h', '1993-10-02', '23260', 'Fontenay-sur-Loing', 111, 2, 'Nunc pharetra magna bibendum, viverra dolor nec, blandit tellus.\nNam quis nunc feugiat, feugiat sem vitae, tristique ante.\nDonec efficitur placerat molestie.\nMaecenas faucibus bibendum nibh, ornare volutpat dolor.\nMaecenas quis felis libero.', 'Curabitur aliquet turpis in faucibus pharetra.\nNunc tristique, arcu vitae ultricies tincidunt, lacus tellus mattis ligula, molestie ornare nulla turpis a velit.\nFusce gravida posuere mauris, dignissim mollis dui maximus vitae.\nPellentesque tempus ullamcorper mauris, id semper augue imperdiet et.\nDonec consequat, leo sit amet auctor pharetra, nisl risus elementum dui, quis condimentum odio felis at libero.\nQuisque faucibus vel lacus sed vestibulum.\nNam et tellus aliquet justo laoreet aliquet.\nQuisque lobortis ante arcu, pulvinar iaculis mi pulvinar ut.\nIn blandit, justo non iaculis efficitur, justo tortor sodales eros, vitae gravida purus massa ut dui.\nSed elit nisl, mattis tristique congue ac, bibendum in justo.', 'Praesent vel enim ut nisl vestibulum bibendum.\nQuisque velit nisi, vestibulum sit amet gravida sit amet, semper a felis.\nNunc pharetra magna bibendum, viverra dolor nec, blandit tellus.\nNam leo nisi, commodo id justo nec, vulputate sodales lectus.\nSed a velit nec risus tristique placerat nec vel quam.\nNulla venenatis blandit ligula, nec tincidunt nisi condimentum a.\nSed vitae hendrerit mi.\nAliquam fringilla tellus sed semper aliquet.\nPraesent eleifend nisl risus, at porttitor lacus tristique sed.', 'bama.ir\nlidl.de\nblog.jp\naddictinggames.com', 'n', 'n', 'n', 'n'),
(35, 1, 'cobber@mail2dude.com', 'barramundi-kapel36208', 'X;yUjgH]pj', '/img/users/avatar/steph.jpg', 'earvin', 'reena', 'h', '1977-09-19', '40320', 'Begnécourt', 192, 1, 'Pellentesque tempor, libero at feugiat imperdiet, lorem orci laoreet lacus, non porttitor lorem arcu in eros.\nAenean at mauris non nisl commodo ullamcorper.\nPellentesque faucibus lectus et mi vulputate pellentesque.\nNunc pharetra magna bibendum, viverra dolor nec, blandit tellus.\nNulla cursus rhoncus urna, interdum aliquam est cursus sit amet.\nDonec pharetra placerat venenatis.\nProin at leo in leo dapibus ultrices.\nVestibulum posuere vitae lectus id fringilla.\nAliquam eu facilisis libero.\nDonec lacinia tincidunt felis, vitae pulvinar augue scelerisque interdum.', 'Quisque congue ultrices est pretium laoreet.\nIn vulputate condimentum arcu at lacinia.\nMaecenas scelerisque sem et semper porta.\nNunc eu semper ligula.\nSuspendisse convallis felis ac varius aliquet.\nMaecenas vitae lorem viverra, fermentum sapien at, vestibulum quam.\nProin dictum magna eu dui rutrum, id eleifend odio tincidunt.\nCras ipsum ligula, laoreet eget enim sit amet, fringilla dignissim magna.\nNulla placerat quis neque id dictum.\nUt erat sapien, tristique ac hendrerit ultrices, porta id nisl.', 'Nam sit amet fringilla diam, nec pellentesque purus.\nDonec eleifend felis eu velit gravida semper.\nCras id ex neque.\nDonec nisl orci, commodo a sollicitudin ac, volutpat tristique mauris.\nAenean posuere, nulla in placerat tempus, neque enim molestie ante, ac tempor mauris ex id purus.\nNullam cursus lectus in placerat blandit.\nInteger tempus arcu a lorem pharetra rutrum.', 'hateblo.jp', 'n', 'n', 'n', 'n'),
(36, 1, 'silver@asurfer.com', 'clearing_51561_timotha', 'NJ1QL9VA P', '/img/users/avatar/mtvdt21.jpg', 'emory', 'dionysodoros', 'f', '1984-11-15', '39800', 'Isturits', 2, 1, 'Suspendisse pharetra erat sit amet fermentum egestas.\nNam lorem justo, aliquet nec erat at, facilisis rutrum tellus.\nNulla eget lacus molestie augue pharetra egestas nec vel felis.\nIn porta dolor in aliquet dictum.\nInteger elementum rhoncus sapien, accumsan iaculis ligula feugiat vitae.\nVivamus suscipit nunc vitae consequat venenatis.\nMorbi vel tincidunt nisl.\nNunc ut est quis sem accumsan dignissim.\nNunc sit amet lectus non nisi congue facilisis.\nDonec cursus turpis ac ante imperdiet, at ullamcorper odio varius.', 'Donec ut erat ac mauris eleifend pellentesque quis vel odio.\nProin placerat tincidunt sapien aliquet egestas.\nInteger et facilisis libero.\nVivamus id ex ut leo tincidunt vulputate vitae a diam.\nAliquam at leo diam.', 'Donec eleifend felis eu velit gravida semper.\nVivamus sed sodales arcu, a volutpat metus.\nFusce pretium dignissim lacus at tincidunt.\nVivamus id lacus eget felis gravida pharetra.\nNulla nec nisi ac neque venenatis rutrum quis sit amet metus.\nPraesent erat justo, maximus in nunc eu, pharetra vehicula ligula.\nNulla cursus rhoncus urna, interdum aliquam est cursus sit amet.', '', 'n', 'n', 'n', 'n'),
(37, 1, 'sallee@the-spaceman.com', 'rebeca_806066_beauty', 'YUm/l<&%2R', '/img/users/avatar/tex.jpg', 'nickey', 'wybert', 'h', '1974-01-26', '19140', 'Lichères-sur-Yonne', 100, 2, 'Nullam ac tempus nulla, et convallis nulla.\nFusce nunc lectus, accumsan quis tincidunt nec, gravida id felis.\nPhasellus scelerisque eleifend dictum.\nDonec eleifend, ipsum et egestas molestie, dolor purus maximus ex, a eleifend lacus augue vitae mauris.\nUt eu sapien eget neque lacinia fringilla ut et felis.', 'Nullam id sapien ex.\nVivamus massa nisl, varius in dolor a, consectetur faucibus mi.\nUt iaculis magna et justo finibus, dignissim suscipit lorem faucibus.\nVestibulum bibendum convallis ipsum, eget semper tortor.\nIn pulvinar hendrerit rhoncus.\nNunc neque ante, lacinia eget sodales vel, placerat nec sem.\nAliquam eu lectus id neque pharetra vestibulum.', 'Cras suscipit tempor lacinia.\nNunc eget nulla ullamcorper, gravida nisl condimentum, posuere velit.\nLorem ipsum dolor sit amet, consectetur adipiscing elit.\nSed maximus non mauris ac blandit.\nMorbi lectus nisl, luctus hendrerit diam vel, fermentum placerat nibh.', '', 'n', 'n', 'n', 'n'),
(38, 1, 'crust@ezcybersearch.com', 'noble_947534_leigha', '+gQM[5VF.[', '/img/users/avatar/Lexon.jpg', 'moll', 'buffy', 'h', '1982-10-23', '41140', 'Rejet-de-Beaulieu', 42, 1, 'Praesent scelerisque sem ut nunc pellentesque euismod vitae et augue.\nNullam et venenatis magna.\nCurabitur convallis ultrices diam a vehicula.\nMauris placerat metus at mi imperdiet venenatis sit amet in leo.\nDuis consectetur vestibulum consectetur.', 'Donec vel mattis purus.\nSed condimentum tincidunt sapien, nec iaculis arcu sodales vitae.\nNullam rutrum, libero non porttitor venenatis, quam neque iaculis ex, id imperdiet ligula ex nec sem.\nUt turpis lectus, ornare id tristique et, sollicitudin eget augue.\nUt venenatis rutrum tincidunt.\nMauris sit amet tellus ligula.', 'Curabitur vel est nisi.\nSuspendisse non congue velit.\nNulla sem magna, tempor sit amet mi et, vulputate sodales diam.\nAliquam vel malesuada nulla, non ornare neque.\nEtiam blandit vestibulum sem, eget auctor massa maximus nec.\nPraesent quis elit sit amet justo pharetra lacinia quis vel dolor.\nNullam pharetra et eros vel dignissim.\nMorbi lobortis faucibus malesuada.\nAliquam sit amet lorem sed risus semper fringilla.', '', 'n', 'n', 'n', 'n'),
(39, 1, 'Sydneysider@mailme.dk', 'ptolemy_dasyure-82152', 'DcX#>l/oCd', '/img/users/avatar/10379731_10205216406911902_5313597620723502541_o-1170x1013.jpg', 'kayne', 'erato', 'f', '1977-08-16', '76730', 'Fervaques', 81, 1, 'Integer pharetra fringilla dolor vitae eleifend.\nCurabitur convallis, nulla posuere vulputate sollicitudin, eros nibh finibus lacus, eu pulvinar diam dui vitae ex.\nMorbi gravida varius orci.\nAliquam in ligula lobortis, auctor lectus nec, volutpat tortor.\nUt sed porttitor ligula.\nNulla ac viverra velit, in interdum massa.\nFusce vitae faucibus diam.\nDonec tempus arcu eget dolor laoreet mattis.\nPraesent efficitur nec mauris tristique maximus.\nProin consequat neque a ex semper, ut vehicula massa convallis.', 'Integer massa massa, viverra ac lacus vitae, ultrices fermentum urna.\nNunc nec velit vitae ligula pellentesque porta tincidunt eget felis.\nCurabitur vel est nisi.\nLorem ipsum dolor sit amet, consectetur adipiscing elit.\nCras posuere blandit leo, iaculis auctor odio commodo vel.\nFusce ligula leo, viverra ac eros nec, convallis tincidunt dolor.', 'Vestibulum scelerisque, augue et sollicitudin egestas, nulla velit pharetra eros, non iaculis nibh eros in ipsum.\nAliquam eu lectus id neque pharetra vestibulum.\nQuisque eget consequat nulla.\nMauris tristique erat vel leo porttitor, sed ultricies magna mattis.\nSed tincidunt erat maximus orci rutrum cursus.\nQuisque lobortis ante arcu, pulvinar iaculis mi pulvinar ut.', 'usnews.com\nworld.tmall.com\nglobo.com', 'n', 'n', 'n', 'n'),
(40, 1, 'golden@mail2adore.com', 'meagan-sutton-3', 't|~i,aeibI', '/img/users/avatar/SCHOUMSKY.jpg', 'gib', 'kiarra', 'h', '1962-10-16', '31530', 'Maillane', 84, 1, 'Nulla pharetra velit aliquam ex egestas imperdiet.\nCras at libero varius nibh blandit fermentum.\nProin mattis pulvinar pretium.\nMauris placerat metus at mi imperdiet venenatis sit amet in leo.\nMorbi vel sem neque.\nSed nec pretium urna.\nIn non ante dignissim, efficitur lorem sit amet, dapibus sapien.\nSed sit amet feugiat tellus.\nAliquam at sem et lacus dictum molestie.', 'In venenatis laoreet elit in rutrum.\nAliquam turpis massa, malesuada quis tincidunt eu, molestie sit amet felis.\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris risus turpis, tristique a suscipit at, faucibus ac purus.\nDonec congue sem lectus, sed hendrerit nisl porttitor ut.\nSed et nibh nec ante commodo rhoncus et a ex.\nUt eu sapien eget neque lacinia fringilla ut et felis.\nUt aliquet risus id maximus volutpat.', 'Integer nisi neque, pellentesque et nisl a, ultrices dictum arcu.\nMaecenas fermentum sapien ac ornare ullamcorper.\nIn hac habitasse platea dictumst.\nUt ut mi tincidunt, suscipit ex sit amet, rutrum nibh.\nFusce pharetra nisi sit amet finibus egestas.\nCras commodo tortor id diam tristique porttitor.\nSed quis nunc sodales nulla finibus mattis.\nVestibulum pharetra libero eu mi lobortis, ut congue lorem dignissim.\nCurabitur iaculis, mauris sit amet consectetur finibus, leo ex commodo metus, sed efficitur felis purus in enim.', 'irctc.co.in', 'n', 'n', 'n', 'n'),
(41, 1, 'BHP@mail2hestia.com', 'Oldfelicie_8679', 'ELU,DYR\\N8', '/img/users/avatar/dav.jpg', 'ingamar', 'mustafa', 'h', '1980-07-03', '47430', 'Saint-Pierre-d\'Alvey', 217, 3, 'Duis dapibus id elit nec venenatis.\nSuspendisse pharetra erat sit amet fermentum egestas.\nCum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\nMaecenas sed ante diam.\nFusce pulvinar, tortor at lobortis egestas, augue dui semper neque, at scelerisque sem diam interdum ex.\nProin dui nisl, eleifend vitae efficitur eget, aliquam sit amet tellus.\nQuisque in pharetra tortor, quis luctus ipsum.\nPraesent tristique lectus nibh, ut venenatis urna varius a.', 'Pellentesque semper eget velit at commodo.\nSed vitae laoreet nisl.\nSed in mauris justo.\nAenean varius ex non est venenatis tincidunt.\nSed nec pretium urna.\nEtiam aliquam nisi id commodo ultrices.\nNam malesuada est odio, eu tincidunt metus sodales vel.\nInteger pharetra fringilla dolor vitae eleifend.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.\nMorbi lobortis faucibus malesuada.\nMorbi a purus vel velit vulputate feugiat in ut magna.\nPhasellus quam tortor, accumsan eget congue nec, lacinia eu lectus.\nCras euismod est in lorem semper, id convallis velit mollis.\nNunc at ligula tempus, congue lectus eget, dapibus ante.', '', 'n', 'n', 'n', 'n'),
(42, 1, 'jillaroo@webtopmail.com', 'jayme_dinkum_34442', 'QGpCCvm9_\'', '/img/users/avatar/liam.jpg', 'silvie', 'malandra', 'f', '1990-08-23', '76790', 'Ponsonnas', 220, 3, 'Proin accumsan nec mi sit amet finibus.\nNullam nec massa elit.\nNam scelerisque lobortis nisl, quis sagittis est rhoncus et.\nSuspendisse pharetra erat sit amet fermentum egestas.\nPellentesque lorem lacus, hendrerit sit amet dignissim ut, tincidunt in justo.\nInteger iaculis magna tincidunt, auctor risus non, tempor ligula.\nSuspendisse vitae ornare leo, nec feugiat lacus.\nInteger condimentum erat enim, eget mollis arcu molestie in.\nAliquam turpis massa, malesuada quis tincidunt eu, molestie sit amet felis.', 'Sed at pretium quam.\nAliquam eget enim at lorem viverra ultrices.\nPraesent quis elit sit amet justo pharetra lacinia quis vel dolor.\nSed augue dui, blandit aliquam convallis sit amet, luctus tincidunt nulla.\nPraesent ac enim ac metus mattis mollis eu nec ex.\nVivamus sagittis sollicitudin lacinia.\nInteger at odio hendrerit, volutpat erat eget, sagittis sem.', 'Nam quis nunc feugiat, feugiat sem vitae, tristique ante.\nAenean facilisis non erat eu efficitur.\nNullam non mauris porta, rhoncus leo sit amet, dignissim sapien.\nNullam dignissim maximus mi in lobortis.\nCras iaculis mollis viverra.\nMorbi vel sem neque.', 'elitedaily.com', 'n', 'n', 'n', 'n'),
(43, 1, 'yarran@mail2rwanda.com', 'street221carrol', 'BsHC*NEYVs', '/img/users/avatar/mtvdt21.jpg', 'dylan', 'mícheál', 'f', '1962-01-19', '01250', 'Saint-Paterne-Racan', 91, 1, 'Sed nec pretium urna.\nMaecenas ultricies sem eget mauris ullamcorper ultrices.\nMorbi ultricies feugiat nisl, ut pharetra purus pretium id.\nNulla dignissim dui odio, id pharetra sem sodales at.\nQuisque porta justo sit amet nunc rutrum dapibus.\nCurabitur id mi in risus mollis convallis.\nNullam dictum pellentesque eros quis auctor.', 'Vestibulum nunc nisi, luctus a facilisis vitae, pellentesque a lacus.\nDuis facilisis interdum leo.\nLorem ipsum dolor sit amet, consectetur adipiscing elit.\nIn ultrices quam sem, quis commodo tellus lacinia a.\nVestibulum consequat finibus leo, a lacinia leo tempus eu.\nVestibulum ac nunc sem.\nCurabitur in augue in dolor fringilla euismod sit amet id turpis.', 'Nulla consectetur facilisis sapien, non tempor eros convallis at.\nDonec id lacinia ligula.\nDuis porttitor ipsum quis massa egestas ullamcorper.\nIn at tempor dolor.\nCurabitur ligula tellus, semper sed congue vel, porttitor condimentum nulla.\nPraesent nisi ligula, sollicitudin sed arcu et, aliquam placerat massa.\nVivamus in odio lacus.\nNam sodales fringilla dui sed pulvinar.\nNullam tempor felis augue, vel facilisis elit fringilla eu.\nMaecenas consequat massa quis libero tincidunt, convallis facilisis libero cursus.', '', 'n', 'n', 'n', 'n'),
(44, 1, 'nannygai@plusmail.com.br', 'hedvigBuckleys_04833', 'ZsAO=z@P%P', '/img/users/avatar/SCHOUMSKY.jpg', 'cy', 'hermann', 'f', '1998-09-18', '39210', 'Grillon', 212, 2, 'Sed magna ex, interdum quis imperdiet sit amet, laoreet id augue.\nPhasellus efficitur ipsum eu turpis ornare rhoncus.\nProin dictum magna eu dui rutrum, id eleifend odio tincidunt.\nVivamus tempus turpis a neque aliquam, id pellentesque orci lacinia.\nQuisque efficitur id lorem eu lacinia.', 'Mauris pellentesque venenatis lectus, quis porttitor libero fermentum nec.\nDuis pulvinar ultricies mauris id maximus.\nDonec eu augue eleifend, semper leo ut, mollis sem.\nProin sed augue accumsan, cursus est quis, egestas augue.\nSed condimentum eros at laoreet gravida.\nDonec ullamcorper vitae ex ac commodo.\nNunc orci lorem, mattis et posuere sit amet, sollicitudin at ante.\nAenean consectetur eros at diam varius sodales.', 'Etiam euismod purus eros, eget lacinia lectus ullamcorper ut.\nCras viverra dui dictum mi tristique, sed suscipit nunc pellentesque.\nLorem ipsum dolor sit amet, consectetur adipiscing elit.\nProin bibendum, turpis id lobortis commodo, nulla urna venenatis ligula, ac ultricies quam libero vitae turpis.\nCum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'jorudan.co.jp\ncomicbook.com\nbttiantang.com', 'n', 'n', 'n', 'n'),
(45, 1, 'crooked@i12.com', 'eetu-bevin88412', 'f2432W\\=bu', '/img/users/avatar/10379731_10205216406911902_5313597620723502541_o-1170x1013.jpg', 'zachary', 'tria', 'f', '1999-05-03', '65190', 'Loubens', 15, 3, 'Nulla auctor lorem in arcu accumsan varius.\nUt nisl sapien, sollicitudin rhoncus convallis vitae, ultrices eu justo.\nEtiam faucibus sem erat, non dignissim urna vehicula viverra.\nAenean nec luctus leo, quis auctor lectus.\nMorbi vel tincidunt nisl.\nSuspendisse potenti.\nSuspendisse vitae ornare leo, nec feugiat lacus.\nMorbi varius ex tincidunt enim rhoncus sollicitudin.', 'Donec ultrices odio elit, et lacinia dui rutrum facilisis.\nNam ultrices tortor non lectus malesuada facilisis.\nEtiam vehicula, enim non dictum viverra, elit urna eleifend magna, at auctor mi nibh ac tortor.\nSed fermentum libero enim, eu consequat sem feugiat ut.\nDonec ultrices dignissim euismod.\nSuspendisse imperdiet mi vel dui semper, ac imperdiet tortor malesuada.\nNam consectetur velit blandit nisl porttitor sodales.\nNunc ultrices vehicula aliquet.\nSuspendisse efficitur ex non velit elementum, eu congue enim dictum.\nMauris malesuada, purus sed semper egestas, ligula mi porttitor elit, ut feugiat lorem felis sollicitudin nunc.', 'Phasellus non aliquam magna, vel varius nunc.\nEtiam sodales faucibus interdum.\nDonec congue sem lectus, sed hendrerit nisl porttitor ut.\nAliquam urna eros, elementum vitae vestibulum malesuada, condimentum nec tellus.\nSed eu sollicitudin nisl.\nNam in ullamcorper odio, id viverra leo.\nInteger nec massa non urna cursus elementum interdum ac metus.\nSed sit amet elit at elit laoreet fermentum.\nCurabitur vehicula nulla sit amet bibendum pretium.\nMauris vulputate, odio aliquet feugiat pellentesque, libero nisl gravida leo, sed auctor mi diam non elit.', 'lumosity.com\ntimesjobs.com\nqingdaonews.com\nsapo.pt', 'n', 'n', 'n', 'n'),
(46, 1, 'lair@austin.rr.com', 'elmo_Pty_463436', '/uHX qDv5-', '/img/users/avatar/mtvdt21.jpg', 'car', 'raimunde', 'f', '1967-02-08', '14430', 'Belleville-sur-Meuse', 72, 2, 'Integer et facilisis libero.\nLorem ipsum dolor sit amet, consectetur adipiscing elit.\nLorem ipsum dolor sit amet, consectetur adipiscing elit.\nMauris fermentum erat massa, vel eleifend sem lacinia sit amet.\nUt vitae neque convallis dui efficitur tempus vel a est.\nEtiam feugiat ligula et condimentum dictum.\nIn hac habitasse platea dictumst.\nUt at porta neque.\nNullam sollicitudin at ipsum at vehicula.', 'Cras ultrices quam sed rhoncus malesuada.\nVivamus nec lacinia ligula, a consequat tortor.\nCras posuere mi eget quam tincidunt, in tincidunt nibh pulvinar.\nFusce egestas ex imperdiet dui pharetra imperdiet.\nSed augue dui, blandit aliquam convallis sit amet, luctus tincidunt nulla.\nAliquam in ligula lobortis, auctor lectus nec, volutpat tortor.\nAenean eu lobortis neque.\nInteger elementum, nisl et congue congue, ex metus sollicitudin est, eget lobortis quam elit sed odio.\nAenean iaculis vehicula velit, ac lobortis metus lobortis id.', 'In vel gravida mauris, euismod egestas orci.\nMorbi egestas ligula ligula, et iaculis diam posuere id.\nAenean id sem in magna consequat sollicitudin quis gravida massa.\nDuis ex eros, pellentesque cursus maximus in, lobortis quis quam.\nInteger nec felis diam.\nDonec ut erat ac mauris eleifend pellentesque quis vel odio.', 'protect0r.com\nnaukri.com\nmydomainadvisor.com', 'n', 'n', 'n', 'n'),
(47, 1, 'House@mail2bolivia.com', 'giustino_434341_karan', '@o7c:al?G=', '/img/users/avatar/220016_10151082327939909_2069687454_o.jpg', 'jard', 'giuseppina', 'h', '1965-03-03', '70500', 'La Bruère-sur-Loir', 95, 3, 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\nDuis massa massa, tempor at interdum id, consequat eget nulla.\nDonec ac dui ex.\nCum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\nFusce id finibus risus.\nNullam tempus mauris a augue ornare molestie.\nDonec faucibus lacinia ipsum, sed mollis ante dictum sed.\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.\nDuis pulvinar ultricies mauris id maximus.', 'Sed a velit nec risus tristique placerat nec vel quam.\nNulla et velit erat.\nProin eget dictum tortor.\nSuspendisse convallis felis ac varius aliquet.\nEtiam sodales faucibus interdum.\nEtiam sit amet elit sed mauris euismod mollis.\nMorbi vel sem neque.\nDonec hendrerit ipsum purus, finibus tincidunt nisi dapibus consequat.\nUt nec gravida mauris, et convallis tellus.\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.', 'Nullam viverra pulvinar risus, sit amet tincidunt nisi vehicula eu.\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.\nUt tellus lorem, convallis in lacinia sit amet, vulputate at libero.\nNullam eget mauris elit.\nPellentesque ex dui, commodo in faucibus eget, pellentesque sed nisl.\nDuis ex eros, pellentesque cursus maximus in, lobortis quis quam.\nPellentesque non varius mauris.\nNullam sed leo nec ipsum cursus laoreet.', 'leparisien.fr', 'n', 'n', 'n', 'n'),
(48, 1, 'cowal@speedpost.net', 'phalanger5246-gwyn', '@{UR5u@c=1', '/img/users/avatar/MaMSoN-Dance-As-You-Are-1.jpg', 'waverley', 'xochitl', 'f', '1983-08-30', '86400', 'Laveraët', 6, 3, 'Nullam ornare ex quis dui viverra varius.\nMorbi vitae neque vitae erat cursus volutpat sed quis est.\nDuis ipsum quam, lacinia sit amet libero iaculis, vestibulum convallis ligula.\nIn eu ex vitae metus commodo dignissim.\nSuspendisse fringilla velit tempus odio porta posuere.\nDonec nisl orci, commodo a sollicitudin ac, volutpat tristique mauris.\nDonec eu augue eleifend, semper leo ut, mollis sem.', 'Duis massa massa, tempor at interdum id, consequat eget nulla.\nNunc at neque dignissim, pretium tellus eget, placerat ante.\nQuisque ac aliquet risus, non porttitor lacus.\nPhasellus imperdiet augue ac sapien congue, et pharetra ante tristique.\nDuis massa massa, tempor at interdum id, consequat eget nulla.\nVivamus nec lacinia ligula, a consequat tortor.\nVivamus sed sodales arcu, a volutpat metus.\nMaecenas consectetur erat id lectus auctor, eget iaculis urna maximus.\nUt vitae porttitor magna, vitae molestie lacus.\nDonec molestie non augue a iaculis.', 'Fusce vitae velit ut sapien sollicitudin faucibus.\nQuisque feugiat tristique metus vel blandit.\nDonec dictum tincidunt congue.\nMorbi non suscipit eros.\nCurabitur sit amet libero est.\nIn pharetra, tellus ut tristique semper, purus metus lacinia est, sed pellentesque lorem ligula sit amet erat.\nCras eu lorem quis neque sollicitudin gravida sed nec dolor.\nPellentesque blandit pellentesque lacus, vitae dictum lacus viverra vel.\nNunc iaculis dignissim sem, eget faucibus tortor gravida eget.', 'viator.com\nspeakingtree.in\nsanspo.com', 'n', 'n', 'n', 'n'),
(49, 1, 'plate@the-dutchman.com', 'kimiko_crack_45465', 'o{K%k3yK*Z', '/img/users/avatar/mtvdt21.jpg', 'danny', 'vencel', 'f', '1974-05-05', '39230', 'Cannessières', 169, 1, 'In vel gravida mauris, euismod egestas orci.\nMauris nec blandit purus, scelerisque porttitor arcu.\nNulla pharetra velit aliquam ex egestas imperdiet.\nUt scelerisque, massa sit amet bibendum feugiat, sapien sapien sollicitudin metus, eu molestie ante mauris eu justo.\nNam ut placerat felis.', 'Praesent erat justo, maximus in nunc eu, pharetra vehicula ligula.\nFusce ac nisi vel tellus condimentum varius vel ac magna.\nNullam sollicitudin at ipsum at vehicula.\nMaecenas ut iaculis tellus.\nSed sit amet elit at elit laoreet fermentum.\nSuspendisse facilisis, mauris eu efficitur aliquet, dolor quam tempus magna, nec pellentesque magna est nec libero.\nFusce nunc lectus, accumsan quis tincidunt nec, gravida id felis.\nPellentesque eu justo a ligula imperdiet varius.\nMaecenas finibus consequat placerat.', 'Vivamus placerat dolor sed ante blandit hendrerit vitae ac magna.\nMaecenas vitae lorem viverra, fermentum sapien at, vestibulum quam.\nSed a velit nec risus tristique placerat nec vel quam.\nUt varius, tortor id tristique vulputate, tellus turpis laoreet massa, eu facilisis diam ipsum luctus elit.\nSuspendisse tristique arcu vitae sodales faucibus.\nNunc quis nisl eget quam ullamcorper suscipit.\nVivamus eget nisl molestie, lacinia libero a, hendrerit nisi.\nNulla ligula justo, egestas quis ultrices id, tristique et dolor.\nMorbi suscipit ex sem, a imperdiet ipsum porta eu.', '', 'n', 'n', 'n', 'n'),
(50, 1, 'roaring@buyersusa.com', 'tony-229720_qiu', '%Wqr`Cp3ZU', '/img/users/avatar/220016_10151082327939909_2069687454_o.jpg', 'alberik', 'lesia', 'h', '1983-05-29', '16230', 'Jaligny-sur-Besbre', 101, 1, 'Integer ultricies magna eu bibendum gravida.\nMorbi a purus vel velit vulputate feugiat in ut magna.\nPellentesque vel luctus leo, eleifend tincidunt massa.\nSed fermentum libero enim, eu consequat sem feugiat ut.\nInterdum et malesuada fames ac ante ipsum primis in faucibus.\nNullam vitae lacinia justo.', 'Interdum et malesuada fames ac ante ipsum primis in faucibus.\nSuspendisse tristique sodales semper.\nMauris vulputate, odio aliquet feugiat pellentesque, libero nisl gravida leo, sed auctor mi diam non elit.\nPraesent non est augue.\nCurabitur a feugiat justo.\nCurabitur dapibus fermentum facilisis.', 'Pellentesque et dapibus eros, auctor convallis augue.\nProin vel euismod felis, quis pharetra nisi.\nQuisque vehicula nec sapien et aliquet.\nVivamus justo quam, tincidunt quis cursus blandit, mollis vitae orci.\nMorbi sollicitudin dui porttitor rutrum posuere.\nInteger lacinia viverra orci, vestibulum laoreet justo consequat sit amet.\nMaecenas pellentesque lacinia nisl eu euismod.\nUt varius suscipit justo eget hendrerit.\nPellentesque iaculis eu quam vestibulum rutrum.\nInteger ac mattis felis.', 'archiveofourown.org', 'n', 'n', 'n', 'n'),
(51, 1, 'comedown@mail2apollo.com', 'AWA_222sheri', '8j(Ww9 i=P', '/img/users/avatar/1004086_10152360972129068_2009121485_n.jpg', 'gael', 'elpidius', 'h', '1981-11-21', '40120', 'Lucey', 141, 1, 'Maecenas consectetur suscipit aliquet.\nDonec tincidunt tempus sodales.\nEtiam a eleifend metus.\nCras nec ligula congue, volutpat risus in, feugiat purus.\nDuis dapibus id elit nec venenatis.\nAenean ante nulla, sagittis eu ipsum sed, dignissim tincidunt tellus.\nSuspendisse maximus laoreet lorem, ut blandit dolor laoreet nec.\nSuspendisse potenti.', 'Integer pharetra fringilla dolor vitae eleifend.\nVivamus a rutrum enim.\nCras vel tincidunt justo.\nNunc iaculis dignissim sem, eget faucibus tortor gravida eget.\nSed sit amet elit at elit laoreet fermentum.\nAenean quis quam ligula.\nCras vel tincidunt justo.', 'In consectetur tempus magna nec lobortis.\nAliquam eu lectus id neque pharetra vestibulum.\nSuspendisse eleifend sed nulla sed dictum.\nSed sit amet elit at elit laoreet fermentum.\nQuisque congue pharetra accumsan.', '1and1.com\nd1ev.com', 'n', 'n', 'n', 'n'),
(52, 1, 'sylvanite@mail2juggler.com', 'meir-strata_075204', 'P}jW=?G$@P', '/img/users/avatar/mtvdt21.jpg', 'gustave', 'rogelio', 'f', '1977-09-22', '39250', 'Prats-de-Carlux', 66, 1, 'In eget tellus ante.\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed lobortis et diam a pulvinar.\nVivamus imperdiet eleifend luctus.\nCurabitur nec nibh id quam sodales commodo nec vitae nunc.\nCurabitur nec tortor euismod, faucibus elit at, imperdiet risus.\nDonec sem orci, molestie nec erat at, suscipit ultrices dolor.', 'Donec consequat, leo sit amet auctor pharetra, nisl risus elementum dui, quis condimentum odio felis at libero.\nNullam et venenatis magna.\nInteger elementum, nisl et congue congue, ex metus sollicitudin est, eget lobortis quam elit sed odio.\nSed quis magna aliquet, consectetur felis eget, vestibulum eros.\nCras commodo lectus ut mauris semper, at vestibulum orci tincidunt.\nFusce ornare odio ac venenatis eleifend.\nNam ac sagittis nulla.\nDuis pulvinar ultricies mauris id maximus.', 'Ut iaculis, urna sit amet commodo porttitor, nisi dui rhoncus diam, sed feugiat erat ex in erat.\nDonec posuere tellus a neque molestie viverra et ac augue.\nEtiam tellus risus, congue eu tortor id, vulputate eleifend est.\nSed vitae nisl viverra ipsum tempus sollicitudin et vitae dui.\nEtiam iaculis efficitur nulla, a imperdiet ipsum ornare eget.\nCurabitur quis neque nisl.\nPraesent in efficitur nunc.\nMorbi suscipit turpis ac diam porttitor, nec aliquet augue eleifend.', 'flirt4free.com\nbollywoodbubble.com\nabola.pt', 'n', 'n', 'n', 'n'),
(53, 1, 'bluey@mail2presbyterian.com', 'gustav-24chuttie', ' !)`QF<2p_', '/img/users/avatar/Zidani.jpg', 'arlin', 'gaylord', 'h', '1986-04-22', '20246', 'Arçais', 142, 3, 'Vestibulum pellentesque lectus nec luctus lacinia.\nNullam vestibulum, leo non euismod pellentesque, ipsum arcu commodo risus, in venenatis nulla justo et metus.\nQuisque aliquam massa nulla, et lobortis arcu luctus tempus.\nPhasellus eget diam euismod, faucibus nisi ac, ultrices lorem.\nPraesent quis accumsan augue, et pellentesque felis.\nEtiam eu nunc consequat, egestas massa in, porttitor leo.\nIn venenatis laoreet elit in rutrum.', 'Curabitur sollicitudin, est sed vestibulum scelerisque, est mauris accumsan mauris, eget auctor tortor magna in risus.\nAliquam in ligula lobortis, auctor lectus nec, volutpat tortor.\nNullam sed leo sit amet turpis congue imperdiet.\nDonec semper sem ac mollis cursus.\nIn porttitor venenatis sem, ut dignissim odio interdum a.\nPraesent pharetra pharetra nibh, eget semper turpis vestibulum id.\nNunc ac ipsum dapibus, tincidunt sapien quis, aliquet eros.', 'Nam quis nunc feugiat, feugiat sem vitae, tristique ante.\nPraesent efficitur nec mauris tristique maximus.\nSed sodales, justo et vehicula faucibus, magna lectus luctus sem, a efficitur risus sem in nulla.\nDonec cursus aliquet enim, at commodo lorem congue eu.\nCurabitur efficitur eget elit vel dictum.', 'actcorp.in', 'n', 'n', 'n', 'n'),
(54, 1, 'daddy@guessmail.com', 'puttyhelah590697', '|>0T>515le', '/img/users/avatar/liam.jpg', 'ric', 'jodene', 'h', '1996-05-23', '80320', 'Espinchal', 92, 3, 'Maecenas vel dictum lorem.\nMaecenas enim diam, auctor vitae odio nec, interdum tristique diam.\nQuisque feugiat tristique metus vel blandit.\nCras maximus, augue vel fermentum sagittis, leo massa mattis ex, at consectetur nibh ligula nec tortor.\nVivamus sed sodales arcu, a volutpat metus.', 'Etiam eget nunc et orci auctor hendrerit.\nDonec sit amet ligula a turpis sollicitudin dapibus.\nIn magna magna, volutpat eget eros at, euismod imperdiet odio.\nVivamus eleifend sapien neque, at pulvinar lorem sagittis vel.\nInteger iaculis magna tincidunt, auctor risus non, tempor ligula.\nDuis condimentum mi ac erat scelerisque sodales.\nAenean ut mauris tincidunt, dictum justo non, faucibus felis.\nInteger blandit, elit quis mollis vestibulum, diam dolor hendrerit orci, at ultrices enim augue non tellus.\nUt semper sodales sem, quis sodales ipsum.\nNulla ac suscipit felis.', 'Aenean posuere, nulla in placerat tempus, neque enim molestie ante, ac tempor mauris ex id purus.\nProin ullamcorper pellentesque orci sit amet efficitur.\nNullam cursus lectus in placerat blandit.\nAenean facilisis non erat eu efficitur.\nProin placerat tincidunt sapien aliquet egestas.\nSed eu sollicitudin nisl.\nMauris vehicula, mauris vel condimentum efficitur, ante lorem laoreet metus, mollis posuere ligula urna malesuada nunc.\nPellentesque blandit pellentesque lacus, vitae dictum lacus viverra vel.', 'sina.com.tw\nnetgear.com\nrednet.cn\ndkb.de', 'n', 'n', 'n', 'n'),
(55, 1, 'blackwood@snail-mail.net', 'kobe_jobina281933', 'jWFu>mr^a/', '/img/users/avatar/steph.jpg', 'claudianus', 'kelcey', 'h', '1971-08-18', '72600', 'Saint-Symphorien-de-Marmagne', 87, 2, 'Cras eu lorem quis neque sollicitudin gravida sed nec dolor.\nAenean sed porttitor purus.\nPraesent eleifend nisl risus, at porttitor lacus tristique sed.\nIn blandit, justo non iaculis efficitur, justo tortor sodales eros, vitae gravida purus massa ut dui.\nProin fringilla justo quis arcu fringilla, a accumsan augue placerat.\nVivamus hendrerit, nisl in aliquam vulputate, enim urna hendrerit velit, vehicula congue nisi est a elit.\nNulla porttitor, nisl eget accumsan rutrum, elit sem eleifend purus, a ornare nibh sem id nisl.\nVivamus viverra sed quam sit amet condimentum.\nMorbi eu quam est.', 'Mauris libero felis, tincidunt aliquam est ut, imperdiet pretium neque.\nMorbi mattis elit nec congue cursus.\nPellentesque et dapibus eros, auctor convallis augue.\nVivamus sagittis sollicitudin lacinia.\nDuis feugiat nulla orci, dapibus aliquet nisi volutpat eu.\nUt sed posuere purus, vel rhoncus eros.\nMauris eget neque tincidunt, faucibus elit at, tempus leo.\nPellentesque semper eget velit at commodo.\nSuspendisse fringilla velit tempus odio porta posuere.\nAliquam fringilla commodo lacus egestas efficitur.', 'Cras congue, eros id suscipit convallis, sem mauris iaculis lectus, venenatis varius risus lectus eget est.\nSuspendisse potenti.\nMorbi non suscipit eros.\nNullam ornare ex quis dui viverra varius.\nCras commodo lectus ut mauris semper, at vestibulum orci tincidunt.\nEtiam feugiat ligula et condimentum dictum.', '', 'n', 'n', 'n', 'n'),
(56, 1, 'cockney@avh.hu', 'jónatan_eugene-396688', 'd9WXGn0HL}', '/img/users/avatar/kriss-571x361.jpg', 'meir', 'noach', 'f', '1999-01-09', '54450', 'Vinay', 36, 3, 'Sed sit amet elit at elit laoreet fermentum.\nDonec efficitur placerat molestie.\nProin id quam ultricies, maximus nisl a, lacinia ex.\nPellentesque luctus vulputate faucibus.\nQuisque feugiat tristique metus vel blandit.', 'Vivamus lectus nunc, faucibus euismod laoreet nec, condimentum ut ex.\nCum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\nEtiam sit amet fermentum dui, eu placerat sem.\nSed sit amet dui nec urna hendrerit vulputate.\nDuis auctor odio eget metus accumsan malesuada.\nAenean et tincidunt mauris, quis eleifend dolor.\nAliquam id turpis congue, vehicula sem ac, vehicula risus.\nMaecenas porttitor molestie elementum.\nMaecenas ultricies sem eget mauris ullamcorper ultrices.', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.\nVivamus sed aliquet metus, id condimentum urna.\nNunc et sapien eu justo tincidunt vulputate vitae nec dolor.\nSuspendisse efficitur ex non velit elementum, eu congue enim dictum.\nSuspendisse pharetra erat sit amet fermentum egestas.\nNullam id sapien ex.\nNunc pharetra magna bibendum, viverra dolor nec, blandit tellus.\nCras consequat id odio ac molestie.\nVivamus lacus nisl, luctus in pellentesque et, efficitur a dui.\nSed vitae laoreet nisl.', 'admaimai.com\nebay.com.au\ntwitter.com\nchip.de', 'n', 'n', 'n', 'n'),
(57, 1, 'FAHA@mail2sky.com', 'Hughes_59017_rhett', ' !%LAehi.]', '/img/users/avatar/MaMSoN-Dance-As-You-Are-1.jpg', 'emory', 'hussein', 'f', '1988-03-12', '08300', 'Le Coteau', 90, 1, 'Nullam ut lacus ut felis porta consectetur.\nMaecenas mauris purus, volutpat et gravida eget, accumsan non ex.\nVestibulum mauris lorem, vestibulum volutpat lectus ut, elementum viverra quam.\nPhasellus vel sollicitudin erat.\nPellentesque sodales magna et arcu malesuada tempor.\nNullam id orci faucibus, molestie orci in, euismod eros.\nSuspendisse non felis nec libero convallis pharetra condimentum et libero.\nNam dui ex, dapibus in sem aliquam, sagittis sodales urna.', 'Mauris fermentum erat massa, vel eleifend sem lacinia sit amet.\nNullam dapibus interdum feugiat.\nNam id purus vitae elit sagittis porttitor sit amet ut turpis.\nEtiam eu nisl non mauris varius varius.\nNullam cursus lectus in placerat blandit.\nNullam malesuada, velit at consectetur lobortis, mauris nulla tincidunt felis, nec gravida tortor lorem sed velit.', 'Pellentesque nulla quam, faucibus ac tincidunt vitae, eleifend sed ligula.\nCurabitur ultrices est vel tempus pharetra.\nFusce nunc lectus, accumsan quis tincidunt nec, gravida id felis.\nAliquam euismod nunc eget mi semper dictum.\nDonec auctor eu quam ac mollis.\nDuis auctor odio eget metus accumsan malesuada.', 'scout.com', 'n', 'n', 'n', 'n'),
(58, 1, 'nap@the-ministry.com', 'hut-leah13', '^GJ-c5KdEL', '/img/users/avatar/tex.jpg', 'marlyn', 'ranj', 'f', '1992-07-17', '17170', 'Levainville', 118, 1, 'In blandit, justo non iaculis efficitur, justo tortor sodales eros, vitae gravida purus massa ut dui.\nNullam luctus facilisis convallis.\nNulla auctor lorem in arcu accumsan varius.\nSuspendisse at augue neque.\nDuis in felis et sapien maximus rutrum in in ante.\nIn maximus neque a odio tincidunt, eu dapibus augue varius.\nDonec cursus aliquet enim, at commodo lorem congue eu.', 'Nam vel ante vitae felis ornare finibus.\nMaecenas condimentum, diam vel consequat auctor, nisi eros convallis magna, ut mollis ex quam nec enim.\nIn eget tellus ante.\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.\nQuisque id tempor nunc.\nSed fermentum libero enim, eu consequat sem feugiat ut.\nDonec neque nisl, pellentesque ut imperdiet eu, porta ut nisi.', 'Proin magna ex, dictum nec mollis ac, pellentesque a nibh.\nQuisque imperdiet rhoncus nulla id scelerisque.\nDuis vel risus at felis euismod vulputate.\nMaecenas quam tortor, semper eget turpis sed, congue vulputate libero.\nAenean nec luctus leo, quis auctor lectus.\nSed scelerisque elit ut tristique cursus.\nFusce pulvinar, tortor at lobortis egestas, augue dui semper neque, at scelerisque sem diam interdum ex.\nInteger vitae facilisis arcu.', 'fanatik.com.tr\nsuperuser.com\nathome.co.jp', 'n', 'n', 'n', 'n'),
(59, 1, 'paspalum@netexecutive.com', 'kenton_stick_651', '4.r8rS| vk', '/img/users/avatar/justin.jpg', 'enoch', 'lenore', 'h', '1987-07-29', '33230', 'Cherves-Châtelars', 58, 1, 'Morbi bibendum accumsan magna, non ornare diam mollis vitae.\nQuisque varius et massa bibendum porta.\nSed quis dictum dolor, nec mollis justo.\nMaecenas finibus consequat placerat.\nNam sed dolor eros.\nCras nec ligula congue, volutpat risus in, feugiat purus.\nSed eget nunc eget justo viverra euismod.\nFusce in turpis scelerisque, faucibus felis sit amet, cursus augue.\nSed pretium sapien mi, eget dignissim nunc ornare non.\nNullam non mauris porta, rhoncus leo sit amet, dignissim sapien.', 'Nulla ac suscipit felis.\nProin id tortor convallis, hendrerit nibh non, pharetra elit.\nNullam pretium justo est, in scelerisque eros lobortis vitae.\nAliquam quis odio elementum nunc maximus hendrerit.\nCurabitur mi libero, consectetur ac elementum quis, lacinia eu nulla.\nQuisque lacinia et odio nec ultrices.\nDuis varius ante eget diam cursus fringilla.\nUt ut mi tincidunt, suscipit ex sit amet, rutrum nibh.\nCurabitur neque quam, ultricies ut libero a, faucibus sollicitudin quam.\nPraesent erat mi, pharetra quis magna ac, suscipit dapibus diam.', 'Mauris tristique vestibulum dolor nec auctor.\nCurabitur nisi arcu, pretium et sapien ac, cursus vulputate sem.\nIn gravida est et sem volutpat, in vestibulum nisi bibendum.\nEtiam ultricies efficitur imperdiet.\nDonec varius purus eget mollis lobortis.\nUt scelerisque, massa sit amet bibendum feugiat, sapien sapien sollicitudin metus, eu molestie ante mauris eu justo.', 'freecharge.in\nexpressen.se', 'n', 'n', 'n', 'n'),
(60, 1, 'daisy@city-of-swansea.com', 'kangaroo_rani_1552', 'dz{4+(K)To', '/img/users/avatar/kriss-571x361.jpg', 'agustin', 'ashanti', 'f', '1979-08-31', '21410', 'Goncelin', 1, 2, 'Quisque at bibendum lectus.\nNulla vel rutrum sem, id congue velit.\nSed fermentum libero enim, eu consequat sem feugiat ut.\nAenean commodo augue ultrices, consectetur mi sed, rutrum velit.\nPhasellus finibus arcu ac elementum tempus.\nNullam facilisis mi non ex viverra, nec rutrum ipsum lobortis.\nSed eleifend magna quis feugiat vestibulum.\nMorbi eu quam est.\nCurabitur iaculis, mauris sit amet consectetur finibus, leo ex commodo metus, sed efficitur felis purus in enim.', 'Ut sed porttitor ligula.\nPhasellus vitae tortor velit.\nVestibulum at tincidunt magna.\nMorbi eget bibendum ipsum.\nDonec sem orci, molestie nec erat at, suscipit ultrices dolor.\nPhasellus id leo at orci finibus mollis.', 'Integer urna lectus, tincidunt in urna quis, tincidunt fermentum sem.\nAenean posuere, nulla in placerat tempus, neque enim molestie ante, ac tempor mauris ex id purus.\nInteger commodo tempor arcu, eu aliquet sapien gravida in.\nEtiam non neque quis ante semper mollis.\nNullam dignissim maximus mi in lobortis.\nDuis vestibulum diam sapien.\nMaecenas feugiat nulla dui.\nCurabitur ipsum purus, commodo vel mauris at, varius convallis mauris.\nInteger nec felis diam.', 'goo-net.com\nmarinetraffic.com', 'n', 'n', 'n', 'n'),
(61, 1, 'Treasurer@frommontana.com', 'godwin461436-abey', 'oUL99\\w8J+', '/img/users/avatar/tex.jpg', 'myrta', 'charmian', 'f', '1962-08-25', '35330', 'Chanteuges', 229, 2, 'Aenean consectetur eros at diam varius sodales.\nNam ut placerat felis.\nCras ut quam iaculis, tincidunt felis vitae, volutpat metus.\nPellentesque nulla quam, faucibus ac tincidunt vitae, eleifend sed ligula.\nDuis varius ante eget diam cursus fringilla.\nSuspendisse at lectus rutrum, faucibus justo eu, vulputate enim.\nAliquam dignissim erat eget dictum hendrerit.\nCras nec ornare risus.\nCras congue, eros id suscipit convallis, sem mauris iaculis lectus, venenatis varius risus lectus eget est.', 'Nulla ac suscipit felis.\nEtiam blandit vestibulum sem, eget auctor massa maximus nec.\nDonec id lacinia ligula.\nNunc eget odio dignissim, malesuada nibh sed, posuere mauris.\nIn luctus urna vel velit rhoncus lobortis.\nFusce convallis, ex nec dignissim convallis, mi nunc molestie elit, ac lobortis arcu augue vel mi.\nSed sit amet dui nec urna hendrerit vulputate.\nSed condimentum eros at laoreet gravida.', 'Quisque at pharetra magna.\nInteger suscipit ipsum dui, sed maximus eros molestie non.\nUt ut lobortis elit.\nCras posuere mi eget quam tincidunt, in tincidunt nibh pulvinar.\nNullam ut ipsum augue.', 'sabay.com.kh\nhuffingtonpost.com\nstumbleupon.com\nnypost.com', 'n', 'n', 'n', 'n'),
(62, 1, 'skirt@fromutah.com', 'fairlietiger-367', 'VDrh@XZ0{E', '/img/users/avatar/mtvdt21.jpg', 'breanne', 'reginald', 'f', '1963-06-07', '68870', 'Le Monêtier-les-Bains', 53, 1, 'Curabitur tempor nisi erat, eget consequat diam tempus ut.\nVivamus lectus nunc, faucibus euismod laoreet nec, condimentum ut ex.\nDonec lacinia tellus id nisl fermentum consequat.\nVivamus sed sodales arcu, a volutpat metus.\nIn hac habitasse platea dictumst.\nSed et nibh nec ante commodo rhoncus et a ex.\nAenean eu lobortis neque.\nDonec lacinia tincidunt felis, vitae pulvinar augue scelerisque interdum.\nNam volutpat augue vel tellus feugiat, sed cursus nunc vestibulum.', 'Quisque eleifend nisl vel varius convallis.\nSed fermentum libero enim, eu consequat sem feugiat ut.\nMauris nec blandit purus, scelerisque porttitor arcu.\nDonec sed lacus nibh.\nCras nec ligula congue, volutpat risus in, feugiat purus.\nSuspendisse sed tristique nunc.\nInteger condimentum erat enim, eget mollis arcu molestie in.\nCras commodo lectus ut mauris semper, at vestibulum orci tincidunt.', 'Quisque velit ex, efficitur et varius vel, venenatis et libero.\nDuis a augue quis nisi placerat posuere aliquet ut massa.\nNam suscipit mi felis, id pulvinar quam gravida at.\nProin eget dictum tortor.\nNunc a dignissim nisl.\nMaecenas feugiat mi eget nisi convallis, sit amet consectetur augue accumsan.\nVivamus id leo maximus, porttitor augue sed, mattis est.\nMaecenas posuere justo dolor, ac scelerisque arcu suscipit in.\nNulla at augue quis sapien vehicula consectetur eget non ipsum.', 'younow.com', 'n', 'n', 'n', 'n'),
(63, 1, 'board@pathfindermail.com', 'symanjón_83647', 'ABOx=F,O*W', '/img/users/avatar/mtvdt21.jpg', 'emlyn', 'gijs', 'h', '1995-07-20', '62620', 'Toutainville', 171, 1, 'Aliquam erat volutpat.\nMauris fermentum erat massa, vel eleifend sem lacinia sit amet.\nNam tincidunt ipsum ex, in facilisis nibh sollicitudin eget.\nEtiam lacinia nibh sed fermentum sollicitudin.\nFusce consequat odio congue urna tempor luctus.\nDuis dapibus id elit nec venenatis.\nSuspendisse vitae ornare leo, nec feugiat lacus.', 'Vivamus imperdiet eleifend luctus.\nPhasellus non diam commodo, maximus diam in, euismod metus.\nPraesent pharetra pharetra nibh, eget semper turpis vestibulum id.\nCurabitur vel est nisi.\nUt quam arcu, vehicula nec vulputate id, facilisis id eros.\nCras commodo lectus ut mauris semper, at vestibulum orci tincidunt.\nIn magna magna, volutpat eget eros at, euismod imperdiet odio.\nMauris sit amet egestas libero.\nNunc quam leo, tincidunt ut diam nec, consectetur volutpat lectus.\nMauris placerat mi laoreet tortor euismod luctus.', 'Nulla et velit erat.\nCras iaculis mollis viverra.\nNulla auctor lorem in arcu accumsan varius.\nInteger porttitor nisl feugiat, efficitur nunc eu, ultrices velit.\nPellentesque aliquet, mi vitae egestas tincidunt, nibh massa pulvinar urna, eget ultrices nibh sem vel enim.\nCurabitur vehicula nulla sit amet bibendum pretium.\nDonec eu augue eleifend, semper leo ut, mollis sem.', 'extratorrent.cc', 'n', 'n', 'n', 'n'),
(64, 1, 'double@mail2paraguay.com', 'giacomo-2_shark', '?j: }A`%A ', '/img/users/avatar/liam.jpg', 'josephina', 'gus', 'h', '1984-04-11', '14140', 'Bouillé-Loretz', 141, 2, 'Ut vel fringilla elit, sed aliquet est.\nNulla placerat quis neque id dictum.\nSed ac libero at sapien molestie egestas in vel libero.\nNullam id sapien ex.\nNulla bibendum molestie risus, eu faucibus metus tristique eget.\nEtiam ullamcorper turpis sapien, at pretium ex faucibus sed.\nIn iaculis tempus metus non ultricies.\nAliquam lacus diam, auctor id faucibus vitae, tempor id nunc.', 'Curabitur convallis, nulla posuere vulputate sollicitudin, eros nibh finibus lacus, eu pulvinar diam dui vitae ex.\nSed rutrum et tortor id euismod.\nEtiam ligula nisi, pellentesque quis mattis vitae, accumsan ut ex.\nVivamus pretium fermentum massa, non tristique quam condimentum ut.\nEtiam dapibus arcu eget ultrices sollicitudin.\nMaecenas fermentum sapien ac ornare ullamcorper.', 'Phasellus vestibulum tortor sed nisi aliquet facilisis.\nDonec faucibus lacinia ipsum, sed mollis ante dictum sed.\nVestibulum ut enim justo.\nSuspendisse et odio nec neque bibendum dignissim.\nVestibulum mattis eros ac dignissim malesuada.\nAenean mauris leo, aliquam in sollicitudin vel, sagittis eu magna.\nNulla sapien arcu, ullamcorper sit amet nunc a, malesuada fringilla diam.\nDuis id leo arcu.\nPhasellus vitae tortor velit.', 'macrumors.com', 'n', 'n', 'n', 'n'),
(65, 1, 'Wran@mail2potatohead.com', 'Notogaea_2160_iosep', '?C3dNW\'2bx', '/img/users/avatar/10379731_10205216406911902_5313597620723502541_o-1170x1013.jpg', 'lyman', 'swietomierz', 'h', '1966-09-21', '19380', 'Villers-Vicomte', 152, 2, 'Nulla auctor lorem in arcu accumsan varius.\nCurabitur convallis, nulla posuere vulputate sollicitudin, eros nibh finibus lacus, eu pulvinar diam dui vitae ex.\nDonec molestie non augue a iaculis.\nCras commodo tortor id diam tristique porttitor.\nIn pharetra gravida quam a gravida.\nAenean urna massa, condimentum ut sem et, tristique euismod nibh.\nNullam sed leo nec ipsum cursus laoreet.\nMorbi sagittis eros quis purus ornare fringilla.\nMaecenas suscipit sem tempor viverra faucibus.', 'Duis quam orci, hendrerit at nibh sit amet, viverra sagittis risus.\nNam lorem justo, aliquet nec erat at, facilisis rutrum tellus.\nVestibulum quis nulla maximus, fermentum lacus vel, congue ligula.\nProin quis lacus sit amet risus ullamcorper pharetra.\nVestibulum bibendum convallis ipsum, eget semper tortor.\nUt lectus arcu, convallis et euismod non, feugiat ac velit.\nUt sed facilisis turpis, eu vulputate neque.\nDonec hendrerit ipsum purus, finibus tincidunt nisi dapibus consequat.', 'Etiam laoreet lectus eu ipsum interdum dignissim.\nQuisque eleifend nisl vel varius convallis.\nMorbi lectus nisl, luctus hendrerit diam vel, fermentum placerat nibh.\nQuisque maximus dolor nunc, nec ultrices lorem feugiat vitae.\nNunc at ligula tempus, congue lectus eget, dapibus ante.\nCras maximus, augue vel fermentum sagittis, leo massa mattis ex, at consectetur nibh ligula nec tortor.\nNullam dictum pellentesque eros quis auctor.\nDuis quam orci, hendrerit at nibh sit amet, viverra sagittis risus.', '', 'n', 'n', 'n', 'n'),
(66, 1, 'sunbeam@azimiweb.com', 'sweetheart-17210_anisa', 'wGZE\\<H}:T', '/img/users/avatar/SCHOUMSKY.jpg', 'neil', 'jules', 'h', '1979-10-26', '18310', 'Cordes-sur-Ciel', 140, 1, 'Mauris nec suscipit leo, at vulputate justo.\nPraesent commodo dolor at nibh rhoncus, sit amet rutrum nibh porttitor.\nNullam ut lacus ut felis porta consectetur.\nPellentesque ut tincidunt diam, non consectetur nulla.\nPhasellus id leo at orci finibus mollis.\nUt lectus arcu, convallis et euismod non, feugiat ac velit.\nSed accumsan vel lorem sed auctor.', 'Maecenas posuere justo dolor, ac scelerisque arcu suscipit in.\nIn enim ipsum, semper in mauris sed, hendrerit maximus mi.\nPraesent elementum eu massa vitae posuere.\nSuspendisse eget lectus et velit sollicitudin pharetra.\nDonec posuere tellus a neque molestie viverra et ac augue.\nIn elementum id ligula ac lobortis.\nVivamus massa nisl, varius in dolor a, consectetur faucibus mi.\nPellentesque vel turpis efficitur, elementum dui eget, accumsan erat.\nPellentesque cursus vestibulum elementum.\nPraesent egestas, magna non dictum laoreet, turpis lacus consectetur arcu, vitae euismod lectus sapien iaculis nunc.', 'Nullam suscipit eu lectus non egestas.\nCurabitur in augue in dolor fringilla euismod sit amet id turpis.\nNullam facilisis mi non ex viverra, nec rutrum ipsum lobortis.\nUt semper sodales sem, quis sodales ipsum.\nNullam non dapibus est.', '', 'n', 'n', 'n', 'n');
INSERT INTO `users` (`id`, `active`, `email`, `pseudo`, `password`, `url_photo`, `nom`, `prenom`, `sexe`, `date_naissance`, `code_postal`, `ville`, `pays_id`, `niveaux_id`, `biographie`, `influences`, `prochains_concerts`, `sites_internet`, `newsletter`, `show_sexe`, `show_date_naissance`, `show_niveau`) VALUES
(67, 1, 'tucker@mail2dallas.com', 'grape014072-gerda', 'dH$F4t3qV?', '/img/users/avatar/justin.jpg', 'hernando', 'martirio', 'f', '1964-08-25', '80190', 'Castanet-Tolosan', 150, 3, 'Vivamus lacus nisl, luctus in pellentesque et, efficitur a dui.\nNulla at augue quis sapien vehicula consectetur eget non ipsum.\nMorbi cursus metus rhoncus libero sodales tristique.\nProin vehicula viverra nunc vitae luctus.\nUt facilisis hendrerit augue, eu tempor nibh molestie ac.\nProin accumsan nec mi sit amet finibus.', 'Aenean posuere, nulla in placerat tempus, neque enim molestie ante, ac tempor mauris ex id purus.\nNunc sit amet ullamcorper lacus.\nUt elementum risus id vehicula venenatis.\nMauris fermentum erat massa, vel eleifend sem lacinia sit amet.\nNullam cursus lectus in placerat blandit.\nMorbi vestibulum vitae urna vel aliquam.\nQuisque finibus, nisi vel auctor sodales, lacus sem maximus urna, a molestie enim magna quis est.', 'Integer ultricies magna eu bibendum gravida.\nProin at maximus lacus.\nMaecenas vel dictum lorem.\nSed placerat tellus dui, ut tempus urna pretium nec.\nIn hac habitasse platea dictumst.\nMauris id nisl in arcu pharetra ullamcorper sed ac dolor.', 'aastocks.com\ngoogle.co.kr\nbiquge.la\nmudah.my', 'n', 'n', 'n', 'n'),
(68, 1, 'tuan@mehrani.com', 'doug-1741-hatter', ',#dYH%28b\\', '/img/users/avatar/MaMSoN-Dance-As-You-Are-1.jpg', 'amandi', 'freddy', 'f', '1990-03-26', '81300', 'La Buisse', 184, 2, 'Praesent elementum eu massa vitae posuere.\nDonec ultrices dignissim euismod.\nVivamus viverra sed quam sit amet condimentum.\nNam ac sagittis nulla.\nMorbi eu quam est.\nIn luctus urna vel velit rhoncus lobortis.\nNulla vel rutrum sem, id congue velit.\nUt at finibus lacus, eu tempus magna.', 'Mauris pellentesque venenatis lectus, quis porttitor libero fermentum nec.\nCurabitur efficitur eget elit vel dictum.\nNullam dapibus interdum feugiat.\nSed luctus facilisis nunc, eget faucibus lacus ornare ac.\nMorbi bibendum accumsan magna, non ornare diam mollis vitae.\nCurabitur sit amet libero est.\nNunc a ipsum ac ex placerat convallis a id nisi.\nDonec ullamcorper vitae ex ac commodo.', 'Nunc quis nisl eget quam ullamcorper suscipit.\nMaecenas feugiat mi eget nisi convallis, sit amet consectetur augue accumsan.\nSuspendisse potenti.\nUt iaculis convallis risus rutrum lacinia.\nMauris malesuada, purus sed semper egestas, ligula mi porttitor elit, ut feugiat lorem felis sollicitudin nunc.\nMaecenas feugiat nulla dui.\nCras nec ornare risus.', 'wlp-acs.com\nvnexpress.net', 'n', 'n', 'n', 'n'),
(69, 1, 'bulldog@cortinet.com', 'bottlebrush-153230_pádraig', 'wQN`,yl(O*', '/img/users/avatar/Zidani.jpg', 'gan', 'breda', 'f', '1990-07-05', '77950', 'Saint-Projet', 29, 3, 'Pellentesque lorem lacus, hendrerit sit amet dignissim ut, tincidunt in justo.\nSed vulputate leo non tortor congue congue.\nSuspendisse potenti.\nSuspendisse vitae sem bibendum, molestie metus vel, posuere turpis.\nSuspendisse porttitor pretium purus nec pharetra.\nMaecenas mattis turpis a risus fermentum venenatis.\nFusce tempus nulla nibh, at tincidunt mi facilisis vel.\nVivamus suscipit nunc vitae consequat venenatis.', 'Fusce pulvinar, tortor at lobortis egestas, augue dui semper neque, at scelerisque sem diam interdum ex.\nSed sodales, justo et vehicula faucibus, magna lectus luctus sem, a efficitur risus sem in nulla.\nSuspendisse et odio nec neque bibendum dignissim.\nIn bibendum, nisl sed fermentum dapibus, orci orci fringilla lorem, et dictum nibh lorem eu ex.\nMaecenas finibus consequat placerat.\nUt posuere id velit et ornare.\nDuis vitae auctor augue.\nPraesent non est augue.\nSed et nibh nec ante commodo rhoncus et a ex.', 'Aliquam pellentesque fringilla pulvinar.\nVivamus eleifend sapien neque, at pulvinar lorem sagittis vel.\nMaecenas feugiat nulla dui.\nSed scelerisque elit ut tristique cursus.\nMauris eget neque tincidunt, faucibus elit at, tempus leo.\nDonec mi erat, malesuada et efficitur eget, elementum ac sem.\nIn pharetra venenatis purus ultrices viverra.\nNulla venenatis blandit ligula, nec tincidunt nisi condimentum a.', 'newsru.com\nnetteller.com\nmic.com\ncvs.com', 'n', 'n', 'n', 'n'),
(70, 1, 'angora@fromminnesota.com', 'slippery_482909_ra', 'ckQXl>PH)[', '/img/users/avatar/1004086_10152360972129068_2009121485_n.jpg', 'toddy', 'hasim', 'f', '1965-08-14', '19320', 'Lasserre', 115, 2, 'Fusce egestas ex imperdiet dui pharetra imperdiet.\nLorem ipsum dolor sit amet, consectetur adipiscing elit.\nNam vitae pretium dui, a condimentum diam.\nNam tincidunt ipsum ex, in facilisis nibh sollicitudin eget.\nCurabitur faucibus tincidunt pretium.', 'Curabitur congue efficitur nibh, in malesuada nisi.\nPellentesque neque turpis, fringilla quis tempus sagittis, pellentesque a ante.\nNunc congue auctor porttitor.\nCurabitur ligula tellus, semper sed congue vel, porttitor condimentum nulla.\nSed quis pellentesque libero, a posuere urna.\nInteger id egestas sem.\nUt iaculis, urna sit amet commodo porttitor, nisi dui rhoncus diam, sed feugiat erat ex in erat.\nQuisque congue pharetra accumsan.\nCurabitur imperdiet tortor quis est imperdiet laoreet.', 'Duis vitae finibus libero, et sagittis eros.\nSed accumsan ex id bibendum porta.\nSed maximus non mauris ac blandit.\nProin blandit rhoncus nunc, auctor pharetra quam tristique et.\nEtiam iaculis efficitur nulla, a imperdiet ipsum ornare eget.\nDonec diam eros, venenatis vitae interdum vitae, tempus fermentum nisl.\nDuis lacus nulla, accumsan id turpis ut, viverra auctor mauris.\nFusce in turpis scelerisque, faucibus felis sit amet, cursus augue.\nQuisque lobortis ante arcu, pulvinar iaculis mi pulvinar ut.\nNam volutpat, elit maximus auctor auctor, lectus massa pretium purus, et rutrum mauris sapien in diam.', 'level3.com\nid.net\n4gamer.net\ngoogle.com.py', 'n', 'n', 'n', 'n'),
(71, 1, 'quarrian@rednecks.com', 'der_5_omega', '$\',=\'"`8)h', '/img/users/avatar/mtvdt21.jpg', 'karoly', 'gib', 'h', '1966-04-25', '57645', 'Aigaliers', 107, 3, 'Nulla pharetra velit aliquam ex egestas imperdiet.\nProin eget ipsum vitae velit facilisis rhoncus.\nAenean ut mauris tincidunt, dictum justo non, faucibus felis.\nLorem ipsum dolor sit amet, consectetur adipiscing elit.\nIn luctus urna vel velit rhoncus lobortis.\nPraesent commodo, leo at cursus viverra, sem enim sodales tellus, ac porttitor ligula justo ut dolor.\nFusce nec ex ut ipsum iaculis imperdiet id nec dui.\nQuisque nec nisi facilisis, dapibus leo sed, sodales sapien.', 'Morbi gravida varius orci.\nEtiam laoreet lectus eu ipsum interdum dignissim.\nNulla vel rutrum sem, id congue velit.\nNullam tempor felis augue, vel facilisis elit fringilla eu.\nCurabitur nec nibh id quam sodales commodo nec vitae nunc.\nPellentesque tempor, libero at feugiat imperdiet, lorem orci laoreet lacus, non porttitor lorem arcu in eros.\nNullam cursus lectus in placerat blandit.', 'Morbi cursus metus rhoncus libero sodales tristique.\nPellentesque pretium condimentum tortor, vel interdum velit ultricies vel.\nMaecenas at eros sed orci tincidunt posuere.\nMauris pellentesque venenatis mollis.\nMauris rhoncus quam eros, in sollicitudin elit tristique et.\nNam malesuada est odio, eu tincidunt metus sodales vel.\nNullam sodales mi a risus fringilla aliquet.\nProin non sagittis tellus.\nEtiam eu nunc consequat, egestas massa in, porttitor leo.\nPraesent dignissim erat at ipsum facilisis tempus.', '', 'n', 'n', 'n', 'n'),
(72, 1, 'scunge@technologist.com', 'picnic82619_merwyn', 'pttHNgu]}J', '/img/users/avatar/SCHOUMSKY.jpg', 'hubey', 'luitpold', 'f', '1971-09-23', '11580', 'Montfaucon', 176, 2, 'Morbi a nulla rhoncus, convallis justo nec, scelerisque velit.\nFusce nec ex ut ipsum iaculis imperdiet id nec dui.\nQuisque eleifend nisl vel varius convallis.\nPellentesque aliquet, mi vitae egestas tincidunt, nibh massa pulvinar urna, eget ultrices nibh sem vel enim.\nPellentesque dui nibh, sodales blandit accumsan id, porttitor in elit.\nEtiam vehicula, enim non dictum viverra, elit urna eleifend magna, at auctor mi nibh ac tortor.\nDonec vel mattis purus.\nSed luctus facilisis nunc, eget faucibus lacus ornare ac.\nSed vitae hendrerit mi.', 'Aenean sed porttitor purus.\nNam dui ex, dapibus in sem aliquam, sagittis sodales urna.\nDonec eleifend felis eu velit gravida semper.\nUt vel fringilla elit, sed aliquet est.\nQuisque faucibus vel lacus sed vestibulum.\nSuspendisse non congue velit.', 'Sed vestibulum ut est quis luctus.\nNam eleifend lorem est.\nEtiam rutrum quis magna quis pharetra.\nAliquam posuere id dolor sed pretium.\nPhasellus scelerisque eleifend dictum.\nAliquam at sem et lacus dictum molestie.\nPellentesque lorem lacus, hendrerit sit amet dignissim ut, tincidunt in justo.\nVivamus id leo maximus, porttitor augue sed, mattis est.', 'currys.co.uk\nfrys.com\nimgur.com', 'n', 'n', 'n', 'n'),
(73, 1, 'collect@mail2ballerina.com', 'eastern-339663_rita', '_P^;l)~"nW', '/img/users/avatar/Zidani.jpg', 'rozanna', 'vlasi', 'h', '1983-08-23', '89460', 'Airvault', 162, 3, 'Morbi lectus nisl, luctus hendrerit diam vel, fermentum placerat nibh.\nNam ultrices tortor non lectus malesuada facilisis.\nNunc rhoncus finibus metus posuere aliquam.\nLorem ipsum dolor sit amet, consectetur adipiscing elit.\nAliquam erat volutpat.', 'Cras commodo tortor id diam tristique porttitor.\nFusce quis lectus eu risus elementum congue.\nSed eget nunc eget justo viverra euismod.\nPellentesque cursus vestibulum elementum.\nFusce pretium dignissim lacus at tincidunt.', 'Quisque id tempor nunc.\nInteger a eros sagittis, auctor sapien vitae, faucibus est.\nSed eget nunc eget justo viverra euismod.\nSed euismod nulla vitae ligula rutrum, eu dignissim eros volutpat.\nQuisque eget consequat nulla.\nNulla tempor nibh et dui porta eleifend.\nIn porta dolor in aliquet dictum.\nQuisque feugiat tristique metus vel blandit.\nCurabitur mauris sem, volutpat id dictum ut, consectetur nec mauris.\nUt iaculis convallis risus rutrum lacinia.', 'carnival.com\nxiami.com', 'n', 'n', 'n', 'n'),
(74, 1, 'rabbitproof@internetegypt.com', 'mariamne0361-turpentine', 'G}Cc%<fKGa', '/img/users/avatar/MaMSoN-Dance-As-You-Are-1.jpg', 'hakeem', 'fionn', 'h', '1983-07-20', '77440', 'Vattetot-sur-Mer', 190, 1, 'Duis enim felis, eleifend quis sem commodo, condimentum cursus elit.\nVivamus vitae metus vel est facilisis elementum in quis erat.\nVestibulum lacinia, enim porta porttitor gravida, ex arcu ultrices diam, nec cursus libero lectus ac elit.\nFusce iaculis laoreet metus, sit amet viverra quam molestie id.\nVivamus hendrerit, nisl in aliquam vulputate, enim urna hendrerit velit, vehicula congue nisi est a elit.\nUt iaculis magna et justo finibus, dignissim suscipit lorem faucibus.\nSuspendisse et egestas justo.\nMorbi varius ex tincidunt enim rhoncus sollicitudin.\nDonec rutrum imperdiet ex, sit amet malesuada massa ullamcorper eu.', 'Cras nec ligula congue, volutpat risus in, feugiat purus.\nFusce posuere tempor elit, sed pretium lorem.\nIn luctus urna vel velit rhoncus lobortis.\nProin commodo aliquam semper.\nAliquam eu facilisis libero.\nCurabitur convallis ultrices diam a vehicula.', 'Nam leo nisi, commodo id justo nec, vulputate sodales lectus.\nCurabitur non eros lacus.\nProin commodo aliquam semper.\nNullam ut ipsum augue.\nNulla facilisi.\nCurabitur congue efficitur nibh, in malesuada nisi.\nPhasellus quis turpis vitae libero pellentesque accumsan et nec sem.', 'folha.uol.com.br\ngivemesport.com\nhubpages.com\nusenet.nl', 'n', 'n', 'n', 'n'),
(75, 1, 'soap@uno.ee', 'theo782_mako', 'rJNZ4?&o=~', '/img/users/avatar/10265452_316665741871505_969364130650500585_o-1170x653.jpg', 'patrick', 'adolf', 'f', '2001-05-12', '97134', 'Baromesnil', 185, 3, 'Ut ut mi tincidunt, suscipit ex sit amet, rutrum nibh.\nDuis suscipit at diam vitae aliquam.\nMorbi vulputate consectetur sapien, id lacinia orci pulvinar sit amet.\nQuisque finibus sed velit at gravida.\nProin sed augue accumsan, cursus est quis, egestas augue.\nDuis id leo arcu.\nCurabitur vestibulum et orci nec vestibulum.', 'Nam in odio pretium, mattis dui quis, molestie leo.\nSuspendisse efficitur, libero in blandit ullamcorper, magna lectus malesuada orci, in bibendum sem nunc eu enim.\nFusce ligula leo, viverra ac eros nec, convallis tincidunt dolor.\nInteger massa massa, viverra ac lacus vitae, ultrices fermentum urna.\nMaecenas feugiat nulla dui.\nMaecenas ac interdum orci.\nDuis eu quam vitae elit fermentum suscipit non a purus.\nMaecenas fermentum sapien ac ornare ullamcorper.', 'Nullam pretium justo est, in scelerisque eros lobortis vitae.\nNunc ultrices vehicula aliquet.\nProin bibendum, turpis id lobortis commodo, nulla urna venenatis ligula, ac ultricies quam libero vitae turpis.\nMorbi lacinia purus nunc, et faucibus nisi suscipit eget.\nNam volutpat, elit maximus auctor auctor, lectus massa pretium purus, et rutrum mauris sapien in diam.\nMorbi ultricies feugiat nisl, ut pharetra purus pretium id.', '', 'n', 'n', 'n', 'n'),
(76, 1, 'lash@praize.com', 'SATisidro905', '~m56TF-HJU', '/img/users/avatar/10265452_316665741871505_969364130650500585_o-1170x653.jpg', 'innis', 'taliba', 'h', '1973-10-23', '83400', 'Chaudun', 206, 2, 'Proin vel euismod felis, quis pharetra nisi.\nFusce in turpis scelerisque, faucibus felis sit amet, cursus augue.\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.\nAliquam sit amet lorem sed risus semper fringilla.\nDonec viverra sollicitudin enim vitae vehicula.\nDonec id lacinia ligula.\nNullam ut lacus ut felis porta consectetur.', 'Integer suscipit ipsum dui, sed maximus eros molestie non.\nMauris ut lectus vitae diam ultrices ornare vitae at lectus.\nIn eu ex vitae metus commodo dignissim.\nMauris vehicula ipsum a tristique porttitor.\nSuspendisse porttitor pretium purus nec pharetra.\nSed sit amet feugiat tellus.\nCurabitur ac rutrum risus, non facilisis quam.\nPellentesque non varius mauris.', 'Quisque at pharetra magna.\nNullam iaculis dolor condimentum suscipit laoreet.\nPellentesque vel luctus leo, eleifend tincidunt massa.\nMorbi cursus metus rhoncus libero sodales tristique.\nCurabitur suscipit, dolor et convallis hendrerit, sem lectus mattis enim, facilisis euismod odio libero quis lectus.\nDuis ipsum quam, lacinia sit amet libero iaculis, vestibulum convallis ligula.\nVivamus viverra sed quam sit amet condimentum.\nNullam sodales mi a risus fringilla aliquet.\nDonec sem orci, molestie nec erat at, suscipit ultrices dolor.\nInteger suscipit ipsum dui, sed maximus eros molestie non.', 'douyutv.com\nxb11766.com\ngoogle.kz', 'n', 'n', 'n', 'n'),
(77, 1, 'handpiece@mail2keith.com', 'steamer_kayode_076960', '\'`<hYb7~kh', '/img/users/avatar/mtvdt21.jpg', 'arnie', 'paulina', 'f', '1979-05-20', '46130', 'Putanges-Pont-Écrepin', 171, 2, 'Donec eleifend felis eu velit gravida semper.\nPraesent sit amet metus sed neque condimentum semper.\nPellentesque volutpat bibendum neque, sit amet egestas ex rutrum at.\nNullam dictum pellentesque eros quis auctor.\nFusce pulvinar, tortor at lobortis egestas, augue dui semper neque, at scelerisque sem diam interdum ex.\nFusce mauris est, rutrum a accumsan sit amet, pellentesque ut enim.\nDuis feugiat nulla orci, dapibus aliquet nisi volutpat eu.\nMaecenas mollis at erat ut pharetra.\nNunc dignissim arcu in vulputate porta.\nPraesent maximus est vel elit hendrerit, vel rhoncus lorem convallis.', 'Donec at urna ut sem auctor iaculis eu sed elit.\nSed vestibulum ut est quis luctus.\nAliquam lacus diam, auctor id faucibus vitae, tempor id nunc.\nDuis consectetur vestibulum consectetur.\nFusce ac nisi vel tellus condimentum varius vel ac magna.\nPellentesque pretium tortor et eros venenatis elementum.\nSed suscipit at nibh nec luctus.\nSuspendisse potenti.\nUt aliquet risus id maximus volutpat.', 'Quisque ut nulla ac nibh semper ultricies ac id est.\nSed facilisis ex nisi, pellentesque egestas lorem iaculis cursus.\nAliquam fringilla tellus sed semper aliquet.\nSed nec ipsum non nibh commodo tempus et eu ex.\nNullam aliquam laoreet gravida.\nPhasellus sit amet porttitor augue.', '', 'n', 'n', 'n', 'n'),
(78, 1, 'mia@latino.com', 'squatteredyta_0800', '6CPt&;x+V|', '/img/users/avatar/tiffaniechiche.jpg', 'ignazio', 'teman', 'f', '1974-06-19', '54210', 'Saint-Pierre-de-Rivière', 17, 1, 'Fusce eget ipsum at elit faucibus fringilla.\nPhasellus vitae justo et mi commodo interdum.\nAenean urna massa, condimentum ut sem et, tristique euismod nibh.\nEtiam faucibus sem erat, non dignissim urna vehicula viverra.\nAenean iaculis vehicula velit, ac lobortis metus lobortis id.\nMorbi vulputate consectetur sapien, id lacinia orci pulvinar sit amet.\nPraesent commodo dolor at nibh rhoncus, sit amet rutrum nibh porttitor.\nPhasellus id leo at orci finibus mollis.\nEtiam lacinia nibh sed fermentum sollicitudin.\nNulla a malesuada urna, bibendum tristique ipsum.', 'Etiam ligula nisi, pellentesque quis mattis vitae, accumsan ut ex.\nIn ultrices quam sem, quis commodo tellus lacinia a.\nSed augue dui, blandit aliquam convallis sit amet, luctus tincidunt nulla.\nEtiam euismod purus eros, eget lacinia lectus ullamcorper ut.\nCurabitur ipsum purus, commodo vel mauris at, varius convallis mauris.\nNam quis nunc feugiat, feugiat sem vitae, tristique ante.\nNam vel ante vitae felis ornare finibus.\nUt posuere id velit et ornare.', 'Pellentesque sodales magna et arcu malesuada tempor.\nNam id purus vitae elit sagittis porttitor sit amet ut turpis.\nVestibulum lacinia volutpat tellus et finibus.\nEtiam et velit dui.\nNullam et venenatis magna.\nSed magna ex, interdum quis imperdiet sit amet, laoreet id augue.', 'blogspot.com.ng\neater.com\ndailyliked.net', 'n', 'n', 'n', 'n'),
(79, 1, 'wog@topchat.com', 'ula_486635_katrina', '&:1njAL_/c', '/img/users/avatar/220016_10151082327939909_2069687454_o.jpg', 'kayley', 'destinee', 'f', '2001-03-27', '51170', 'Meslay', 47, 1, 'Integer at odio hendrerit, volutpat erat eget, sagittis sem.\nMaecenas sed ante diam.\nSed sodales urna sed dolor dictum sodales.\nNam condimentum molestie blandit.\nNulla eu justo ullamcorper, condimentum justo quis, sodales odio.\nNullam rutrum, libero non porttitor venenatis, quam neque iaculis ex, id imperdiet ligula ex nec sem.\nDonec ultrices dignissim euismod.', 'Suspendisse et egestas justo.\nDuis vel bibendum dui, ac vestibulum mi.\nAliquam eu lectus id neque pharetra vestibulum.\nDonec efficitur placerat molestie.\nNunc orci lorem, mattis et posuere sit amet, sollicitudin at ante.\nNullam eget nunc a purus varius pellentesque bibendum non dolor.', 'Quisque varius et massa bibendum porta.\nCras posuere blandit leo, iaculis auctor odio commodo vel.\nMaecenas ultricies sem eget mauris ullamcorper ultrices.\nEtiam eu nisl non mauris varius varius.\nMaecenas at eros sed orci tincidunt posuere.\nCurabitur faucibus tincidunt pretium.\nEtiam laoreet lectus eu ipsum interdum dignissim.\nPellentesque fringilla libero ut lobortis aliquam.\nMaecenas eleifend, ligula interdum bibendum luctus, tortor metus gravida orci, non luctus velit tellus eget quam.', 'shmoop.com\nblogimg.jp', 'n', 'n', 'n', 'n'),
(80, 1, 'football@r-o-o-t.com', 'piecerafe_144581', 'K M).j#YEc', '/img/users/avatar/liam.jpg', 'tamas', 'concepta', 'f', '1980-07-14', '89140', 'Saint-Crépin-et-Carlucet', 176, 2, 'Aenean vehicula vestibulum tempor.\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.\nSed vel nisl orci.\nCras id ex neque.\nDonec ultrices dignissim euismod.\nPhasellus vitae tortor velit.\nNam leo nisi, commodo id justo nec, vulputate sodales lectus.\nMauris tristique vestibulum dolor nec auctor.\nNam molestie gravida justo, ac feugiat arcu eleifend in.\nMauris eget neque tincidunt, faucibus elit at, tempus leo.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.\nNulla auctor lorem in arcu accumsan varius.\nAenean rutrum tortor id sapien lacinia pulvinar.\nDuis felis sem, venenatis eu orci sed, porttitor fermentum augue.\nInteger eu efficitur orci.\nPraesent et tortor porta, pharetra tortor eu, sollicitudin dui.', 'Integer a eros sagittis, auctor sapien vitae, faucibus est.\nDonec ultrices dignissim euismod.\nSed quis magna aliquet, consectetur felis eget, vestibulum eros.\nMauris sit amet sapien arcu.\nMauris ultrices est vitae commodo fermentum.\nInteger et facilisis libero.\nProin blandit rhoncus nunc, auctor pharetra quam tristique et.\nMauris ac finibus nisl.\nDonec quis justo vitae diam iaculis mollis fringilla vitae mi.\nAliquam quis odio elementum nunc maximus hendrerit.', 'flashx.tv\nlittlebux.com\ncreditonebank.com\ncenturylink.com', 'n', 'n', 'n', 'n'),
(81, 1, 'behind@sunumail.sn', 'piaangora_450001', '6eD.Tgv6`Y', '/img/users/avatar/220016_10151082327939909_2069687454_o.jpg', 'darn', 'boguslaw', 'h', '1968-10-30', '71100', 'Lizac', 178, 2, 'Praesent scelerisque sem ut nunc pellentesque euismod vitae et augue.\nMaecenas eget eros nec ante congue tincidunt nec in nulla.\nCras placerat at quam ac cursus.\nMaecenas interdum cursus diam, a iaculis leo ornare nec.\nEtiam dapibus arcu eget ultrices sollicitudin.', 'Nulla ac viverra velit, in interdum massa.\nInterdum et malesuada fames ac ante ipsum primis in faucibus.\nSuspendisse commodo vehicula mi sit amet facilisis.\nVivamus et viverra lorem.\nNullam dictum pellentesque eros quis auctor.\nMorbi vel tincidunt nisl.\nDonec a enim sed turpis luctus eleifend sit amet cursus arcu.\nMauris non tempus mi, eu dapibus dolor.', 'Sed feugiat arcu vel ligula porta vestibulum.\nFusce in turpis scelerisque, faucibus felis sit amet, cursus augue.\nCurabitur egestas nibh iaculis, eleifend mauris eu, tristique mauris.\nIn hac habitasse platea dictumst.\nIn luctus urna vel velit rhoncus lobortis.\nInteger id egestas sem.\nIn non ante dignissim, efficitur lorem sit amet, dapibus sapien.', 'o2.pl\ngovdelivery.com', 'n', 'n', 'n', 'n'),
(82, 1, 'yachtie@easy.to', 'Port_08-mafalda', 'b,,ee5T)G}', '/img/users/avatar/steph.jpg', 'tara', 'branka', 'f', '1979-09-15', '28330', 'Lennon', 142, 1, 'Nunc aliquam, tellus et pretium fermentum, mi magna viverra eros, sit amet interdum diam nunc nec ante.\nNunc neque ante, lacinia eget sodales vel, placerat nec sem.\nSed gravida suscipit magna, ut finibus lacus varius in.\nAliquam quis odio elementum nunc maximus hendrerit.\nEtiam vehicula, enim non dictum viverra, elit urna eleifend magna, at auctor mi nibh ac tortor.\nAenean eu lobortis neque.\nQuisque consectetur est felis, sed varius lectus malesuada nec.', 'Curabitur dapibus fermentum facilisis.\nNam turpis nunc, maximus vitae lectus semper, bibendum mollis ex.\nDuis vitae finibus libero, et sagittis eros.\nAenean iaculis vehicula velit, ac lobortis metus lobortis id.\nQuisque imperdiet rhoncus nulla id scelerisque.\nDonec ac dui ex.', 'Praesent elementum eu massa vitae posuere.\nMauris ac finibus nisl.\nVestibulum at mollis leo.\nNunc mauris dolor, rhoncus nec laoreet sed, faucibus a turpis.\nPraesent pulvinar ante ac auctor interdum.\nProin pharetra rhoncus lacinia.', '', 'n', 'n', 'n', 'n'),
(83, 1, 'mainland@mail2djibouti.com', 'lurk_mattie8146', 'eYwp!sb!HF', '/img/users/avatar/mtvdt21.jpg', 'electra', 'czcibor', 'f', '1972-05-28', '69550', 'Goux-sous-Landet', 183, 2, 'Sed faucibus tincidunt metus, sed accumsan quam mollis nec.\nSuspendisse tempus ex at justo blandit congue.\nProin at maximus leo.\nSed a velit nec risus tristique placerat nec vel quam.\nDonec ut justo vehicula purus ultrices tempor.', 'Proin non sagittis tellus.\nProin sed nisl a purus dapibus rhoncus ac non purus.\nSed nec pretium urna.\nSed eu sollicitudin nisl.\nAliquam erat volutpat.\nPraesent gravida metus quam, eu porttitor purus tincidunt in.\nPellentesque faucibus lectus et mi vulputate pellentesque.', 'Donec faucibus lacinia ipsum, sed mollis ante dictum sed.\nIn consectetur tempus magna nec lobortis.\nSed vulputate euismod tempor.\nQuisque nec quam eget felis tempus sagittis.\nDonec semper ac odio eu feugiat.\nFusce semper quam sed tellus consectetur, eget interdum neque mollis.\nMorbi bibendum accumsan magna, non ornare diam mollis vitae.\nVivamus nec purus leo.\nUt scelerisque, massa sit amet bibendum feugiat, sapien sapien sollicitudin metus, eu molestie ante mauris eu justo.', 'domain.com.au\nonlymyhealth.com', 'n', 'n', 'n', 'n'),
(84, 1, 'Barry@incamail.com', 'Boldrewood_marcy-857549', '&^OZ`&<ovr', '/img/users/avatar/Sandrine.jpg', 'hermie', 'echo', 'f', '1974-01-12', '18300', 'Chambéon', 107, 3, 'Nunc at ligula tempus, congue lectus eget, dapibus ante.\nSed sed dapibus mauris.\nAliquam fringilla tellus sed semper aliquet.\nUt nisl sapien, sollicitudin rhoncus convallis vitae, ultrices eu justo.\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.\nInteger iaculis magna tincidunt, auctor risus non, tempor ligula.\nIn at tempor dolor.', 'Vivamus imperdiet eleifend luctus.\nNulla ac viverra velit, in interdum massa.\nVivamus suscipit nunc vitae consequat venenatis.\nAliquam pellentesque fringilla pulvinar.\nMaecenas in suscipit urna.\nAliquam commodo condimentum orci eu maximus.', 'Aenean urna massa, condimentum ut sem et, tristique euismod nibh.\nVivamus hendrerit, nisl in aliquam vulputate, enim urna hendrerit velit, vehicula congue nisi est a elit.\nVivamus placerat dolor sed ante blandit hendrerit vitae ac magna.\nPraesent ac enim ac metus mattis mollis eu nec ex.\nMorbi suscipit turpis ac diam porttitor, nec aliquet augue eleifend.\nQuisque at bibendum lectus.\nSed magna ex, interdum quis imperdiet sit amet, laoreet id augue.\nNullam iaculis dolor condimentum suscipit laoreet.', 'domain.com.au\nadme.ru', 'n', 'n', 'n', 'n'),
(85, 1, 'Holt@mail2ask.com', 'Geelong-kelsi_0330', 'lvXaC*l8MM', '/img/users/avatar/Sandrine.jpg', 'haley', 'mervyn', 'f', '1963-06-18', '91470', 'Rupt-en-Woëvre', 143, 1, 'Donec vitae nisi in urna dignissim accumsan et nec velit.\nPraesent et tortor porta, pharetra tortor eu, sollicitudin dui.\nMaecenas a lectus nulla.\nMorbi velit odio, gravida nec turpis nec, ultricies cursus metus.\nProin lacinia sem orci, at aliquet leo sagittis at.\nSed quis magna aliquet, consectetur felis eget, vestibulum eros.\nDonec id lacinia ligula.\nNulla ac viverra velit, in interdum massa.\nDonec sem orci, molestie nec erat at, suscipit ultrices dolor.\nDuis lacus nulla, accumsan id turpis ut, viverra auctor mauris.', 'Cras id ex neque.\nSuspendisse non felis nec libero convallis pharetra condimentum et libero.\nNulla venenatis blandit ligula, nec tincidunt nisi condimentum a.\nVivamus tempus turpis a neque aliquam, id pellentesque orci lacinia.\nSed feugiat arcu vel ligula porta vestibulum.\nSuspendisse non felis nec libero convallis pharetra condimentum et libero.\nQuisque varius et massa bibendum porta.', 'In ut egestas est.\nMauris tristique erat vel leo porttitor, sed ultricies magna mattis.\nMauris euismod tortor sit amet sagittis convallis.\nDuis faucibus orci tincidunt, mollis mi a, auctor neque.\nAliquam a lacus mollis, semper tellus ac, consectetur felis.\nSed rutrum et tortor id euismod.', '', 'n', 'n', 'n', 'n'),
(86, 1, 'mallee@soon.com', 'slushy_533301_papagena', '$\\ohEfZwJ{', '/img/users/avatar/liam.jpg', 'larine', 'teasag', 'f', '1962-03-22', '30580', 'Pluvet', 13, 3, 'Integer laoreet mi quis arcu bibendum, quis consectetur leo pretium.\nMaecenas vel dictum lorem.\nUt lectus arcu, convallis et euismod non, feugiat ac velit.\nAliquam mattis, massa non auctor imperdiet, nisl metus pretium diam, vitae imperdiet dui quam ac odio.\nQuisque congue pharetra accumsan.\nDonec lacinia tellus id nisl fermentum consequat.\nNunc ut est quis sem accumsan dignissim.\nSuspendisse imperdiet mi vel dui semper, ac imperdiet tortor malesuada.', 'Proin id quam ultricies, maximus nisl a, lacinia ex.\nPhasellus sit amet porttitor augue.\nDuis a augue quis nisi placerat posuere aliquet ut massa.\nDonec efficitur non lacus vitae lobortis.\nIn bibendum, nisl sed fermentum dapibus, orci orci fringilla lorem, et dictum nibh lorem eu ex.\nNam malesuada id erat a condimentum.\nAliquam aliquam justo nec mauris fermentum, ac congue eros pretium.\nSuspendisse vitae lobortis quam, id aliquet enim.\nVestibulum pharetra libero eu mi lobortis, ut congue lorem dignissim.\nInteger porttitor nisl feugiat, efficitur nunc eu, ultrices velit.', 'Praesent pulvinar ante ac auctor interdum.\nNam faucibus mauris quam, suscipit pulvinar velit efficitur sit amet.\nPhasellus non diam commodo, maximus diam in, euismod metus.\nUt sodales erat eu ultrices feugiat.\nUt sodales erat eu ultrices feugiat.\nNam id purus vitae elit sagittis porttitor sit amet ut turpis.\nPraesent ac enim ac metus mattis mollis eu nec ex.\nDonec ultrices dignissim euismod.\nVestibulum hendrerit tempus velit cursus rhoncus.\nProin quis lacus sit amet risus ullamcorper pharetra.', 'ponta.jp\namd.com', 'n', 'n', 'n', 'n'),
(87, 1, 'break@mailbox.as', 'lacey9_lurk', '7fI9I|[^Eb', '/img/users/avatar/liam.jpg', 'humberto', 'barna', 'h', '1994-10-06', '88640', 'Bendorf', 134, 1, 'Proin mattis pulvinar pretium.\nMaecenas vel dictum lorem.\nFusce id finibus risus.\nNullam id orci faucibus, molestie orci in, euismod eros.\nSuspendisse vitae lobortis quam, id aliquet enim.\nPhasellus pulvinar lorem et sem dignissim euismod.\nFusce id finibus risus.', 'Nunc quam leo, tincidunt ut diam nec, consectetur volutpat lectus.\nMaecenas ac est aliquet, ornare diam et, lacinia leo.\nNulla facilisi.\nIn hac habitasse platea dictumst.\nNunc quam leo, tincidunt ut diam nec, consectetur volutpat lectus.\nPellentesque volutpat bibendum neque, sit amet egestas ex rutrum at.\nPhasellus viverra tristique sapien, eu maximus justo vestibulum ac.', 'Morbi dictum ornare augue, quis ultricies diam facilisis eu.\nVivamus quis ipsum vel felis euismod suscipit.\nDonec nec risus orci.\nAenean commodo augue ultrices, consectetur mi sed, rutrum velit.\nCras viverra dui dictum mi tristique, sed suscipit nunc pellentesque.\nNullam tempor felis augue, vel facilisis elit fringilla eu.\nCurabitur mauris sem, volutpat id dictum ut, consectetur nec mauris.\nFusce semper quam sed tellus consectetur, eget interdum neque mollis.\nMauris in dictum mi, id rhoncus ante.', 'payseal.com\nmp3lio.co', 'n', 'n', 'n', 'n'),
(88, 1, 'roar@geopia.com', 'spin9265-tyson', 'QPWSr``F^`', '/img/users/avatar/steph.jpg', 'field', 'elli', 'h', '1993-05-22', '28150', 'Châtelus', 6, 1, 'Proin eget dictum tortor.\nMauris eu libero vestibulum, auctor odio vel, pharetra lectus.\nNunc at ligula tempus, congue lectus eget, dapibus ante.\nUt varius, tortor id tristique vulputate, tellus turpis laoreet massa, eu facilisis diam ipsum luctus elit.\nDonec at urna ut sem auctor iaculis eu sed elit.\nNulla sem magna, tempor sit amet mi et, vulputate sodales diam.\nMorbi lectus nisl, luctus hendrerit diam vel, fermentum placerat nibh.\nDonec eleifend felis eu velit gravida semper.', 'Pellentesque lorem lacus, hendrerit sit amet dignissim ut, tincidunt in justo.\nNam dui libero, faucibus sit amet quam et, mattis vehicula purus.\nMaecenas consequat massa quis libero tincidunt, convallis facilisis libero cursus.\nCras viverra dui dictum mi tristique, sed suscipit nunc pellentesque.\nInteger tincidunt lectus eros, vel ornare nisl hendrerit vitae.\nAliquam lobortis quam non blandit aliquam.', 'Proin mattis pulvinar pretium.\nMorbi vel tincidunt nisl.\nEtiam eu nisl non mauris varius varius.\nDonec viverra sollicitudin enim vitae vehicula.\nUt sed facilisis turpis, eu vulputate neque.\nNulla dignissim dui odio, id pharetra sem sodales at.\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;.\nNullam dapibus interdum feugiat.\nMaecenas ac est aliquet, ornare diam et, lacinia leo.', 'android.com\nstreamcomplet.com', 'n', 'n', 'n', 'n'),
(89, 1, 'silvertail@thezhangs.net', 'skipper-779160caelestis', 'Dvi"g)kL11', '/img/users/avatar/mtvdt21.jpg', 'bail', 'jacintha', 'h', '1990-11-07', '55160', 'Mirbel', 71, 1, 'Quisque lobortis ante arcu, pulvinar iaculis mi pulvinar ut.\nNullam tristique nisi sed ullamcorper faucibus.\nEtiam tempor blandit est vel feugiat.\nMaecenas mattis turpis a risus fermentum venenatis.\nAliquam sit amet lorem sed risus semper fringilla.\nPellentesque faucibus lectus et mi vulputate pellentesque.\nDuis condimentum mi ac erat scelerisque sodales.', 'Curabitur id neque dignissim, porta tortor et, posuere neque.\nCras eu nisl quam.\nNam sed dolor eros.\nNullam tempus mauris a augue ornare molestie.\nSed vel nisl orci.', 'Mauris malesuada, purus sed semper egestas, ligula mi porttitor elit, ut feugiat lorem felis sollicitudin nunc.\nDonec ultrices odio elit, et lacinia dui rutrum facilisis.\nUt vitae neque convallis dui efficitur tempus vel a est.\nMauris semper nec magna sit amet maximus.\nMauris pellentesque venenatis lectus, quis porttitor libero fermentum nec.\nNunc pharetra magna bibendum, viverra dolor nec, blandit tellus.\nUt nec gravida mauris, et convallis tellus.\nVivamus et viverra lorem.\nVivamus quis ipsum vel felis euismod suscipit.', '', 'n', 'n', 'n', 'n'),
(90, 1, 'Barry@uk8.net', 'louie_437-earbash', '^1RFe`Vc40', '/img/users/avatar/1004086_10152360972129068_2009121485_n.jpg', 'wittie', 'orville', 'f', '1982-03-07', '77250', 'Bélesta', 170, 2, 'Etiam dignissim quam lorem.\nMaecenas pellentesque lacinia nisl eu euismod.\nProin sed augue accumsan, cursus est quis, egestas augue.\nNam malesuada id erat a condimentum.\nProin sed nisl a purus dapibus rhoncus ac non purus.\nQuisque finibus sed velit at gravida.\nIn non augue sagittis dui semper feugiat.\nNullam non sollicitudin ex.\nUt porttitor elit vitae pretium porta.', 'Sed at pretium quam.\nVestibulum at tincidunt magna.\nIn hac habitasse platea dictumst.\nCras dictum sagittis tortor vel mollis.\nAenean ut mauris tincidunt, dictum justo non, faucibus felis.\nAenean quis quam ligula.\nProin at maximus lacus.\nProin in ante convallis, hendrerit neque eu, rutrum massa.\nMaecenas sit amet aliquet lectus.', 'Curabitur nec nibh id quam sodales commodo nec vitae nunc.\nSuspendisse eleifend sed nulla sed dictum.\nCras non leo facilisis, pellentesque arcu sodales, pharetra sapien.\nUt et imperdiet nisl.\nProin pharetra rhoncus lacinia.\nMorbi convallis purus sit amet laoreet eleifend.\nSuspendisse imperdiet mi vel dui semper, ac imperdiet tortor malesuada.\nMaecenas consectetur suscipit aliquet.', '', 'n', 'n', 'n', 'n'),
(91, 1, 'ocker@mail.entrepeneurmag.com', 'RAAFmariano71276', '&/`Bi_DdUx', '/img/users/avatar/10379731_10205216406911902_5313597620723502541_o-1170x1013.jpg', 'drugi', 'skylar', 'f', '1976-09-12', '21500', 'Saint-Mathurin', 2, 1, 'Suspendisse efficitur ex non velit elementum, eu congue enim dictum.\nMauris pellentesque venenatis lectus, quis porttitor libero fermentum nec.\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.\nMauris tristique vestibulum dolor nec auctor.\nPhasellus sed sem id arcu euismod aliquam.\nSed vel nisl orci.\nIn magna magna, volutpat eget eros at, euismod imperdiet odio.', 'Maecenas fermentum sapien ac ornare ullamcorper.\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.\nNulla condimentum eros et lacus cursus vestibulum.\nPhasellus quam tortor, accumsan eget congue nec, lacinia eu lectus.\nDonec mattis velit non nisi molestie tempor.\nAliquam eu lectus id neque pharetra vestibulum.', 'Duis quam orci, hendrerit at nibh sit amet, viverra sagittis risus.\nProin consequat neque a ex semper, ut vehicula massa convallis.\nNunc ac ipsum dapibus, tincidunt sapien quis, aliquet eros.\nNunc vitae feugiat ligula.\nCurabitur a feugiat justo.\nDonec hendrerit ipsum purus, finibus tincidunt nisi dapibus consequat.\nCurabitur mi libero, consectetur ac elementum quis, lacinia eu nulla.', 'google.com.af', 'n', 'n', 'n', 'n'),
(92, 1, 'boil@mail2victoria.com', 'Furphy-allegria_065176', 'S1_k>^ZtN%', '/img/users/avatar/1004086_10152360972129068_2009121485_n.jpg', 'dorise', 'riley', 'h', '1973-06-27', '88300', 'Chanteix', 110, 1, 'Donec mi erat, malesuada et efficitur eget, elementum ac sem.\nVivamus sed aliquet metus, id condimentum urna.\nMorbi et magna feugiat ante feugiat mattis vel iaculis elit.\nPellentesque blandit pellentesque lacus, vitae dictum lacus viverra vel.\nNunc eu semper ligula.', 'Nulla ligula justo, egestas quis ultrices id, tristique et dolor.\nPraesent scelerisque sem ut nunc pellentesque euismod vitae et augue.\nPraesent dictum facilisis erat nec accumsan.\nMaecenas mauris purus, volutpat et gravida eget, accumsan non ex.\nDuis at molestie lectus.\nNullam sodales mi a risus fringilla aliquet.\nEtiam blandit vestibulum sem, eget auctor massa maximus nec.\nAenean mauris leo, aliquam in sollicitudin vel, sagittis eu magna.', 'Pellentesque et dapibus eros, auctor convallis augue.\nEtiam a eleifend metus.\nMaecenas ac est aliquet, ornare diam et, lacinia leo.\nCras eu nisl quam.\nProin vel euismod felis, quis pharetra nisi.\nDonec eleifend felis eu velit gravida semper.', 'dafont.com\ncomplex.com\ndailyliked.net\ncurse.com', 'n', 'n', 'n', 'n'),
(93, 1, 'desert@blackplanet.com', 'kirbie_18606lyudmyla', 'CUS%CTB&m+', '/img/users/avatar/liam.jpg', 'ty', 'gaia', 'f', '1972-01-18', '71150', 'Chaux-lès-Port', 109, 2, 'Nam consectetur velit blandit nisl porttitor sodales.\nPhasellus vitae tortor velit.\nNam dui libero, faucibus sit amet quam et, mattis vehicula purus.\nDonec tempus arcu eget dolor laoreet mattis.\nDonec cursus turpis ac ante imperdiet, at ullamcorper odio varius.\nDonec sodales mi id risus lobortis, sed dapibus eros pellentesque.\nNullam ac tempus nulla, et convallis nulla.\nDonec ac sollicitudin felis.\nAliquam sapien ex, tempus quis consequat at, dignissim quis magna.\nFusce tincidunt leo accumsan elementum dapibus.', 'Mauris semper nec magna sit amet maximus.\nDonec scelerisque quam ut efficitur mattis.\nPraesent vel enim ut nisl vestibulum bibendum.\nProin tristique dui vel sapien pharetra placerat.\nNulla odio justo, convallis non sapien varius, pellentesque volutpat arcu.\nProin porta, lectus vel viverra maximus, turpis erat lobortis sapien, vel cursus ex enim eu justo.\nAliquam in ligula lobortis, auctor lectus nec, volutpat tortor.\nUt venenatis rutrum tincidunt.', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris risus turpis, tristique a suscipit at, faucibus ac purus.\nVestibulum dignissim eros a dictum blandit.\nNam malesuada massa magna, vel dictum urna ullamcorper ac.\nPraesent quis accumsan augue, et pellentesque felis.\nProin consequat neque a ex semper, ut vehicula massa convallis.\nVestibulum eget nunc et est feugiat lacinia a ac augue.\nSed sed dapibus mauris.', 'cdstm.cn\nd1ev.com', 'n', 'n', 'n', 'n'),
(94, 1, 'continental@mail2sara.com', 'will-88498-dezsõ', 'oz#\'x}4Xng', '/img/users/avatar/steph.jpg', 'cly', 'luvinia', 'f', '1974-08-13', '28120', 'La Chapelle-sur-Usson', 117, 1, 'Suspendisse efficitur, libero in blandit ullamcorper, magna lectus malesuada orci, in bibendum sem nunc eu enim.\nProin consequat neque a ex semper, ut vehicula massa convallis.\nMauris eget neque tincidunt, faucibus elit at, tempus leo.\nDonec lacinia tellus id nisl fermentum consequat.\nQuisque eget porta nulla.\nSed nec velit lacus.', 'Proin mattis pulvinar pretium.\nNunc vitae feugiat ligula.\nNam suscipit mi felis, id pulvinar quam gravida at.\nSed arcu urna, interdum at ornare non, facilisis vitae ligula.\nAenean at mauris non nisl commodo ullamcorper.\nSed id sagittis arcu.', 'Nullam id orci faucibus, molestie orci in, euismod eros.\nUt vel fringilla elit, sed aliquet est.\nVivamus nec purus leo.\nPellentesque ut tincidunt diam, non consectetur nulla.\nQuisque at leo vestibulum enim rhoncus convallis.\nDuis vitae auctor augue.\nNunc pharetra magna bibendum, viverra dolor nec, blandit tellus.\nNullam suscipit eu lectus non egestas.', 'monova.org\nmobafire.com', 'n', 'n', 'n', 'n'),
(95, 1, 'Mackellar@mail2grenada.com', 'vlad_79611-anthia', 'lD9#hF[d#N', '/img/users/avatar/dav.jpg', 'igor', 'indra', 'h', '1990-06-18', '76210', 'Saint-Félix', 230, 1, 'Mauris sit amet sapien arcu.\nAliquam eros lorem, sodales a diam sed, aliquam feugiat augue.\nDonec gravida feugiat consequat.\nIn iaculis tempus metus non ultricies.\nUt scelerisque, massa sit amet bibendum feugiat, sapien sapien sollicitudin metus, eu molestie ante mauris eu justo.\nCurabitur vehicula nulla sit amet bibendum pretium.\nInteger commodo tempor arcu, eu aliquet sapien gravida in.\nNunc rhoncus finibus metus posuere aliquam.\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.', 'Phasellus efficitur ipsum eu turpis ornare rhoncus.\nSed risus risus, imperdiet ut auctor quis, molestie a nulla.\nQuisque nec quam eget felis tempus sagittis.\nPraesent ornare, massa at sollicitudin eleifend, dui urna ultricies mi, in tincidunt urna turpis eu ante.\nIn fermentum lectus non ipsum laoreet, sit amet viverra metus vehicula.\nNulla ac viverra velit, in interdum massa.', 'Maecenas pellentesque lacinia nisl eu euismod.\nMorbi lectus nisl, luctus hendrerit diam vel, fermentum placerat nibh.\nDonec tincidunt tempus sodales.\nSuspendisse tristique arcu vitae sodales faucibus.\nUt nec gravida mauris, et convallis tellus.\nPellentesque fringilla libero ut lobortis aliquam.', 'docusign.com\n2gis.ru', 'n', 'n', 'n', 'n'),
(96, 1, 'shot@mail2jones.com', 'farr862_woollybutt', 'Ao%}Mp=U!P', '/img/users/avatar/tex.jpg', 'mose', 'aileen', 'h', '1973-03-17', '26740', 'Besançon', 29, 2, 'Aenean posuere, nulla in placerat tempus, neque enim molestie ante, ac tempor mauris ex id purus.\nUt eget velit eu enim condimentum maximus eu in dui.\nCras suscipit tempor lacinia.\nAenean in urna non ex tempor placerat.\nPellentesque vel turpis efficitur, elementum dui eget, accumsan erat.\nNulla venenatis blandit ligula, nec tincidunt nisi condimentum a.\nDuis ipsum quam, lacinia sit amet libero iaculis, vestibulum convallis ligula.', 'Curabitur egestas nibh iaculis, eleifend mauris eu, tristique mauris.\nMorbi non suscipit eros.\nIn fermentum lectus non ipsum laoreet, sit amet viverra metus vehicula.\nCurabitur nisi arcu, pretium et sapien ac, cursus vulputate sem.\nIn blandit, justo non iaculis efficitur, justo tortor sodales eros, vitae gravida purus massa ut dui.\nCurabitur sit amet libero est.\nSuspendisse ac mollis odio, vitae porttitor augue.\nIn aliquet nisi mattis, tempus massa ut, pretium velit.\nDuis pulvinar ultricies mauris id maximus.', 'Donec scelerisque quam ut efficitur mattis.\nPellentesque fringilla libero ut lobortis aliquam.\nNulla ac suscipit felis.\nSuspendisse potenti.\nNulla nec nisi ac neque venenatis rutrum quis sit amet metus.\nVivamus sagittis sollicitudin lacinia.', '', 'n', 'n', 'n', 'n'),
(97, 1, 'small@m-hmail.com', 'aranrhod-459896-hum', '&c+o*LqQz\\', '/img/users/avatar/steph.jpg', 'mirilla', 'vladimir', 'h', '1961-07-12', '19430', 'Morsalines', 181, 1, 'Phasellus tincidunt, arcu et imperdiet congue, tortor ligula malesuada purus, ac rhoncus lorem nisl eget orci.\nDonec sollicitudin tellus non massa posuere consequat id sed metus.\nMaecenas eleifend, ligula interdum bibendum luctus, tortor metus gravida orci, non luctus velit tellus eget quam.\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris risus turpis, tristique a suscipit at, faucibus ac purus.\nPellentesque neque turpis, fringilla quis tempus sagittis, pellentesque a ante.\nNullam ornare ex quis dui viverra varius.\nAenean blandit nec tortor nec tincidunt.\nDonec venenatis odio neque, nec faucibus ipsum congue sed.\nNunc dignissim arcu in vulputate porta.', 'Aenean at mauris non nisl commodo ullamcorper.\nFusce accumsan tellus at lectus condimentum, vehicula viverra odio placerat.\nFusce egestas ex imperdiet dui pharetra imperdiet.\nIn fermentum lectus non ipsum laoreet, sit amet viverra metus vehicula.\nNullam viverra pulvinar risus, sit amet tincidunt nisi vehicula eu.\nPellentesque non varius mauris.\nVestibulum ut enim justo.', 'Sed egestas placerat neque.\nLorem ipsum dolor sit amet, consectetur adipiscing elit.\nMorbi cursus metus rhoncus libero sodales tristique.\nNam ac sagittis nulla.\nPellentesque pretium tortor et eros venenatis elementum.\nEtiam non vulputate turpis.\nPellentesque tempus ullamcorper mauris, id semper augue imperdiet et.', '', 'n', 'n', 'n', 'n'),
(98, 1, 'pinkeye@wx88.net', 'waite_nong_35936', '|}igK2yt=M', '/img/users/avatar/Sandrine.jpg', 'red', 'ornella', 'f', '1974-09-03', '76640', 'Couesmes', 114, 2, 'Quisque ut nulla ac nibh semper ultricies ac id est.\nNulla nec nisi ac neque venenatis rutrum quis sit amet metus.\nSuspendisse vitae ornare leo, nec feugiat lacus.\nQuisque congue pharetra accumsan.\nDuis suscipit at diam vitae aliquam.', 'Mauris tristique vestibulum dolor nec auctor.\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nullam sed libero posuere, ornare felis ac, fringilla lorem.\nFusce tempus nulla nibh, at tincidunt mi facilisis vel.\nNunc ac ipsum dapibus, tincidunt sapien quis, aliquet eros.\nFusce vitae faucibus diam.', 'Nullam at mi id justo consequat maximus eget in diam.\nDuis vel risus at felis euismod vulputate.\nEtiam volutpat dolor non velit imperdiet, eu vehicula nisl varius.\nQuisque finibus, nisi vel auctor sodales, lacus sem maximus urna, a molestie enim magna quis est.\nDonec malesuada a nulla nec hendrerit.\nCurabitur nec nibh id quam sodales commodo nec vitae nunc.\nMauris id nisl in arcu pharetra ullamcorper sed ac dolor.', 'over-blog.com\nkoha.net\nmashreghnews.ir\nneogaf.com', 'n', 'n', 'n', 'n'),
(99, 1, 'back@mailchoose.co', 'reservepyrrhus546', '%F]}t}#N\'J', '/img/users/avatar/MaMSoN-Dance-As-You-Are-1.jpg', 'garwood', 'ríoghnach', 'f', '1985-03-31', '51310', 'Saint-Pal-de-Chalencon', 238, 1, 'In hac habitasse platea dictumst.\nEtiam et velit dui.\nQuisque aliquam augue non nisl auctor scelerisque.\nNam vitae pretium dui, a condimentum diam.\nSed vel ullamcorper velit.\nCurabitur convallis, nulla posuere vulputate sollicitudin, eros nibh finibus lacus, eu pulvinar diam dui vitae ex.\nMaecenas a lectus nulla.', 'Cras vel tincidunt justo.\nSed magna ex, interdum quis imperdiet sit amet, laoreet id augue.\nVestibulum rutrum diam vel augue vehicula, non pulvinar sem euismod.\nMauris malesuada, purus sed semper egestas, ligula mi porttitor elit, ut feugiat lorem felis sollicitudin nunc.\nAenean commodo augue ultrices, consectetur mi sed, rutrum velit.\nCras nec ligula congue, volutpat risus in, feugiat purus.\nMorbi ornare porttitor dapibus.\nAenean ut mauris tincidunt, dictum justo non, faucibus felis.\nNullam cursus lectus in placerat blandit.', 'In fermentum lectus non ipsum laoreet, sit amet viverra metus vehicula.\nNullam cursus lectus in placerat blandit.\nMorbi vitae neque vitae erat cursus volutpat sed quis est.\nNullam tempor felis augue, vel facilisis elit fringilla eu.\nMaecenas consectetur erat id lectus auctor, eget iaculis urna maximus.\nSed a elementum erat, at lacinia felis.\nCras iaculis mollis viverra.', '', 'n', 'n', 'n', 'n'),
(100, 1, 'wallaroo@mail2methodist.com', 'too_489982_niccolo', 'loC<=Ow3RW', '/img/users/avatar/kriss-571x361.jpg', 'pascale', 'marcy', 'h', '1971-04-21', '49540', 'Ablancourt', 148, 1, 'In risus arcu, venenatis at porta ut, faucibus eget odio.\nCras euismod est in lorem semper, id convallis velit mollis.\nAenean mauris leo, aliquam in sollicitudin vel, sagittis eu magna.\nQuisque nec quam eget felis tempus sagittis.\nPellentesque neque turpis, fringilla quis tempus sagittis, pellentesque a ante.', 'Vivamus lacus nisl, luctus in pellentesque et, efficitur a dui.\nUt porttitor elit vitae pretium porta.\nVestibulum at mollis leo.\nFusce consequat luctus arcu, euismod sagittis sem consequat non.\nDonec tincidunt tortor dolor, sed accumsan leo elementum sit amet.\nDonec mattis velit non nisi molestie tempor.', 'Maecenas condimentum, diam vel consequat auctor, nisi eros convallis magna, ut mollis ex quam nec enim.\nPraesent scelerisque sem ut nunc pellentesque euismod vitae et augue.\nMaecenas posuere justo dolor, ac scelerisque arcu suscipit in.\nProin ac felis nec tortor lacinia tincidunt.\nFusce vitae velit ut sapien sollicitudin faucibus.', '', 'n', 'n', 'n', 'n'),
(101, 1, 'lingtalfi@gmail.com', 'lingtalfi', 'pyjama', '/img/site/default-user.jpg', '', '', 'h', NULL, '', '', NULL, NULL, '', '', '', '', 'n', 'n', 'n', 'n');

-- --------------------------------------------------------

--
-- Structure de la table `users_has_instruments`
--

CREATE TABLE `users_has_instruments` (
  `users_id` int(11) NOT NULL,
  `instruments_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users_has_instruments`
--

INSERT INTO `users_has_instruments` (`users_id`, `instruments_id`) VALUES
(16, 1),
(89, 1),
(5, 2),
(19, 2),
(78, 3),
(50, 4),
(38, 5),
(52, 5),
(73, 5),
(17, 6),
(19, 6),
(26, 6),
(35, 6),
(83, 8),
(1, 10),
(7, 10),
(11, 11),
(54, 11),
(72, 11),
(100, 12),
(61, 14),
(35, 15),
(49, 15),
(61, 15),
(23, 16),
(50, 19),
(76, 19),
(13, 21),
(67, 21),
(3, 23),
(45, 23),
(75, 24),
(48, 26),
(49, 26),
(50, 26),
(6, 27),
(9, 27),
(20, 27),
(40, 28),
(75, 28),
(14, 30),
(43, 31),
(50, 31),
(11, 32),
(78, 33),
(100, 33),
(67, 34),
(42, 35),
(69, 35),
(35, 36),
(37, 36),
(86, 38),
(16, 39),
(18, 39),
(74, 39),
(79, 39),
(94, 39),
(51, 40),
(74, 40),
(84, 40),
(11, 41),
(16, 41),
(17, 42),
(54, 42),
(90, 42),
(16, 44),
(48, 44),
(21, 46),
(99, 46),
(28, 47),
(31, 47),
(6, 50),
(9, 52),
(13, 52),
(62, 52),
(81, 53),
(20, 54),
(6, 55),
(57, 55),
(43, 56),
(74, 59),
(9, 60),
(24, 60),
(36, 60),
(93, 60),
(72, 61),
(39, 63),
(7, 64),
(73, 64),
(32, 65),
(39, 65),
(67, 65),
(25, 66),
(79, 66),
(52, 67),
(77, 68),
(53, 70),
(57, 71),
(59, 71),
(61, 72);

-- --------------------------------------------------------

--
-- Structure de la table `users_has_styles_musicaux`
--

CREATE TABLE `users_has_styles_musicaux` (
  `users_id` int(11) NOT NULL,
  `styles_musicaux_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users_has_styles_musicaux`
--

INSERT INTO `users_has_styles_musicaux` (`users_id`, `styles_musicaux_id`) VALUES
(7, 1),
(47, 1),
(49, 1),
(59, 1),
(67, 1),
(7, 2),
(37, 2),
(48, 3),
(54, 3),
(8, 4),
(56, 4),
(71, 4),
(3, 5),
(80, 5),
(36, 6),
(75, 7),
(36, 8),
(80, 8),
(100, 8),
(36, 9),
(47, 9),
(74, 9),
(3, 10),
(79, 10),
(51, 11),
(18, 12),
(45, 12),
(47, 12),
(81, 12),
(26, 13),
(72, 15),
(32, 16),
(36, 16),
(71, 17),
(79, 17),
(88, 17),
(1, 18),
(2, 18),
(5, 18),
(21, 18),
(86, 19),
(27, 20),
(92, 20),
(94, 20),
(28, 21),
(36, 21),
(48, 21),
(51, 21),
(3, 22),
(10, 22),
(87, 22),
(37, 23),
(4, 24),
(16, 24),
(19, 24),
(20, 24),
(66, 24),
(84, 24),
(14, 25),
(16, 25),
(20, 25),
(6, 26),
(67, 27),
(16, 29),
(53, 30),
(95, 30),
(11, 31),
(47, 31),
(86, 31),
(34, 32),
(73, 32),
(84, 32),
(16, 33),
(53, 34),
(67, 34),
(23, 35),
(48, 35),
(48, 36),
(95, 36),
(20, 37),
(80, 37),
(69, 39),
(85, 40),
(15, 41),
(37, 41),
(48, 41),
(24, 42),
(36, 42),
(41, 42),
(78, 43),
(7, 45),
(26, 45),
(29, 45),
(57, 46),
(59, 46),
(23, 47),
(2, 48),
(17, 48),
(44, 48),
(85, 48);

-- --------------------------------------------------------

--
-- Structure de la table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `users_id` int(11) NOT NULL,
  `concours_id` int(11) NOT NULL,
  `titre` varchar(64) NOT NULL,
  `url` varchar(128) NOT NULL,
  `url_photo` varchar(128) NOT NULL,
  `nb_likes` int(11) NOT NULL,
  `nb_vues` int(11) NOT NULL,
  `date_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `videos`
--

INSERT INTO `videos` (`id`, `active`, `users_id`, `concours_id`, `titre`, `url`, `url_photo`, `nb_likes`, `nb_vues`, `date_creation`) VALUES
(1, 1, 71, 4, 'Curabitur tempor nisi erat, eget consequat diam tempus ut.', 'https://www.youtube.com/watch?v=5RhVamAmeMU', '/img/video/1395905_634327293272014_754055284_n.jpg', 6028, 1649, '2016-12-18 13:22:54'),
(2, 1, 15, 1, 'Suspendisse maximus laoreet lorem, ut blandit dolor laoreet nec.', 'https://www.youtube.com/watch?v=AzNf-IVdnVo', '/img/video/1450686_634329106605166_1706356459_n.jpg', 3268, 8995, '2016-11-17 17:54:57'),
(3, 1, 6, 4, 'Donec lacinia tincidunt felis, vitae pulvinar augue scelerisque ', 'https://www.youtube.com/watch?v=Yhdp9Sd_UYc', '/img/video/379660_634326683272075_268544450_n1.jpg', 8142, 4569, '2016-11-09 06:57:40'),
(4, 1, 99, 1, 'Suspendisse fringilla velit tempus odio porta posuere.', 'https://www.youtube.com/watch?v=uNx-WAoIlrI', '/img/video/1395905_634327293272014_754055284_n.jpg', 7914, 6726, '2016-12-25 16:20:39'),
(5, 1, 89, 1, 'Phasellus id leo at orci finibus mollis.', 'https://www.youtube.com/watch?v=RF7z_eVyMyY', '/img/video/1395905_634327293272014_754055284_n.jpg', 8417, 7928, '2016-11-10 18:49:27'),
(6, 1, 5, 4, 'In iaculis tempus metus non ultricies.', 'https://www.youtube.com/watch?v=zjx8l2AZG2w', '/img/video/1450686_634329106605166_1706356459_n.jpg', 1909, 3955, '2016-12-14 02:02:36'),
(7, 1, 35, 3, 'Etiam at condimentum tellus.', 'https://www.youtube.com/watch?v=vdnKpV68po8', '/img/video/551352_634331416604935_842741253_n.jpg', 904, 6439, '2016-11-17 15:00:03'),
(8, 1, 91, 4, 'Donec vitae nisi in urna dignissim accumsan et nec velit.', 'https://www.youtube.com/watch?v=XqRJSVy2hSM', '/img/video/1450686_634329106605166_1706356459_n.jpg', 7660, 6870, '2016-10-31 11:40:00'),
(9, 1, 29, 2, 'Duis dapibus id elit nec venenatis.', 'https://www.youtube.com/watch?v=yOBQyEo3haY', '/img/video/969211_634326263272117_1748858864_n.jpg', 5020, 2593, '2016-12-10 05:17:51'),
(10, 1, 75, 4, 'Nullam fermentum purus sed sem eleifend vestibulum.', 'https://www.youtube.com/watch?v=tCuHHHNi-l8', '/img/video/1395905_634327293272014_754055284_n.jpg', 1590, 7173, '2016-11-23 15:12:12'),
(11, 1, 54, 4, 'Duis ex eros, pellentesque cursus maximus in, lobortis quis quam', 'https://www.youtube.com/watch?v=ru0ruEZeqa0', '/img/video/551352_634331416604935_842741253_n.jpg', 5947, 8145, '2016-11-16 04:13:09'),
(12, 1, 92, 4, 'Phasellus mattis elementum bibendum.', 'https://www.youtube.com/watch?v=F5UMNcy5OSY', '/img/video/969211_634326263272117_1748858864_n.jpg', 3698, 243, '2016-11-11 22:17:58'),
(13, 1, 80, 2, 'Sed vel nisl orci.', 'https://www.youtube.com/watch?v=2hFjbQNrcQ4', '/img/video/1424259_634325986605478_1373331786_n.jpg', 2115, 9103, '2016-12-24 15:28:19'),
(14, 1, 43, 1, 'Proin blandit rhoncus nunc, auctor pharetra quam tristique et.', 'https://www.youtube.com/watch?v=sPjsfMSK5ig', '/img/video/1395905_634327293272014_754055284_n.jpg', 9201, 7535, '2016-11-24 16:31:54'),
(15, 1, 13, 3, 'Pellentesque ut risus egestas, elementum magna ut, consequat ris', 'https://www.youtube.com/watch?v=2KWeKZyxEZA', '/img/video/969211_634326263272117_1748858864_n.jpg', 7073, 7281, '2016-11-25 22:01:02'),
(16, 1, 56, 3, 'Nullam luctus facilisis convallis.', 'https://www.youtube.com/watch?v=NcmJ8B-3uh4', '/img/video/1424259_634325986605478_1373331786_n.jpg', 1436, 4809, '2016-11-13 04:20:57'),
(17, 1, 85, 3, 'Donec molestie non augue a iaculis.', 'https://www.youtube.com/watch?v=FlyKXrY5ak0', '/img/video/969211_634326263272117_1748858864_n.jpg', 1005, 760, '2016-11-25 11:44:04'),
(18, 1, 70, 4, 'Proin eu gravida nulla.', 'https://www.youtube.com/watch?v=TQyF2HV5axk', '/img/video/1395905_634327293272014_754055284_n.jpg', 6654, 5394, '2016-12-25 20:10:24'),
(19, 1, 76, 2, 'Morbi velit odio, gravida nec turpis nec, ultricies cursus metus', 'https://www.youtube.com/watch?v=y8DrSKj3PA0', '/img/video/1424259_634325986605478_1373331786_n.jpg', 6399, 7399, '2016-11-03 18:05:49'),
(20, 1, 57, 1, 'Nullam sodales mi a risus fringilla aliquet.', 'https://www.youtube.com/watch?v=ppoKyDh4VK8', '/img/video/969211_634326263272117_1748858864_n.jpg', 8791, 5226, '2016-12-04 14:11:16'),
(21, 1, 37, 4, 'Nulla dignissim dui odio, id pharetra sem sodales at.', 'https://www.youtube.com/watch?v=GeM6pU5czTQ', '/img/video/1424259_634325986605478_1373331786_n.jpg', 947, 7582, '2016-11-07 14:56:29'),
(22, 1, 25, 1, 'Mauris rhoncus quam eros, in sollicitudin elit tristique et.', 'https://www.youtube.com/watch?v=MgMAvC_FFuI', '/img/video/379660_634326683272075_268544450_n1.jpg', 7064, 2281, '2016-11-30 17:38:21'),
(23, 1, 96, 3, 'Aenean urna massa, condimentum ut sem et, tristique euismod nibh', 'https://www.youtube.com/watch?v=iBzpokwYWbI', '/img/video/969211_634326263272117_1748858864_n.jpg', 6569, 6103, '2016-11-11 11:04:47'),
(24, 1, 28, 4, 'Mauris pellentesque venenatis lectus, quis porttitor libero ferm', 'https://www.youtube.com/watch?v=d2lHQJFJ-nc', '/img/video/1424259_634325986605478_1373331786_n.jpg', 6900, 1677, '2016-11-13 11:00:57'),
(25, 1, 98, 1, 'Sed placerat tellus dui, ut tempus urna pretium nec.', 'https://www.youtube.com/watch?v=E9kSZKxSSos', '/img/video/1450686_634329106605166_1706356459_n.jpg', 3522, 1963, '2016-12-20 17:43:49'),
(26, 1, 3, 2, 'Etiam eu nisl non mauris varius varius.', 'https://www.youtube.com/watch?v=3iPZPDIzPAs', '/img/video/1450686_634329106605166_1706356459_n.jpg', 1635, 9325, '2016-12-02 04:05:37'),
(27, 1, 26, 4, 'Donec molestie non augue a iaculis.', 'https://www.youtube.com/watch?v=wTwXWwf5oGc', '/img/video/379660_634326683272075_268544450_n1.jpg', 4837, 6841, '2016-12-11 09:07:50'),
(28, 1, 28, 2, 'Mauris nec blandit purus, scelerisque porttitor arcu.', 'https://www.youtube.com/watch?v=MiQKZGfSflo', '/img/video/551352_634331416604935_842741253_n.jpg', 9465, 1459, '2016-11-10 17:50:03'),
(29, 1, 59, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'https://www.youtube.com/watch?v=vGttDX3QUyA', '/img/video/379660_634326683272075_268544450_n1.jpg', 4210, 4078, '2016-12-24 19:32:44'),
(30, 1, 54, 1, 'Sed vitae laoreet nisl.', 'https://www.youtube.com/watch?v=ZL6l4TG-ipU', '/img/video/379660_634326683272075_268544450_n1.jpg', 6686, 4822, '2016-11-17 08:44:27'),
(31, 1, 85, 4, 'Sed at euismod magna.', 'https://www.youtube.com/watch?v=c0PfC8dOHwY', '/img/video/1424259_634325986605478_1373331786_n.jpg', 6418, 6810, '2016-10-29 04:28:52'),
(32, 1, 33, 1, 'Morbi sagittis eros quis purus ornare fringilla.', 'https://www.youtube.com/watch?v=wUl85X4nYBE', '/img/video/1424259_634325986605478_1373331786_n.jpg', 6729, 1110, '2016-12-12 15:48:06'),
(33, 1, 31, 4, 'In nec mi ac mi porttitor mollis at at lorem.', 'https://www.youtube.com/watch?v=Y3pxJejRp7M', '/img/video/1450686_634329106605166_1706356459_n.jpg', 1520, 9764, '2016-12-04 23:47:20'),
(34, 1, 67, 3, 'Vivamus a rutrum enim.', 'https://www.youtube.com/watch?v=iUI5uLysKaE', '/img/video/969211_634326263272117_1748858864_n.jpg', 7471, 5911, '2016-11-11 17:21:03'),
(35, 1, 41, 3, 'Fusce consequat odio congue urna tempor luctus.', 'https://www.youtube.com/watch?v=i4ZppMHYjgA', '/img/video/379660_634326683272075_268544450_n1.jpg', 4144, 3442, '2016-11-25 00:06:32'),
(36, 1, 85, 1, 'Vivamus vitae metus vel est facilisis elementum in quis erat.', 'https://www.youtube.com/watch?v=eAD8xIz7YbQ', '/img/video/969211_634326263272117_1748858864_n.jpg', 105, 5503, '2016-11-27 14:51:47'),
(37, 1, 96, 2, 'Nulla eu justo ullamcorper, condimentum justo quis, sodales odio', 'https://www.youtube.com/watch?v=xKOSco-cKJU', '/img/video/1450686_634329106605166_1706356459_n.jpg', 4928, 8647, '2016-12-13 21:46:59'),
(38, 1, 63, 4, 'Sed tempor cursus ipsum, sed ultricies turpis ultrices vitae.', 'https://www.youtube.com/watch?v=hg1f8RGQ_QU', '/img/video/1424259_634325986605478_1373331786_n.jpg', 6088, 3805, '2016-11-01 04:57:20'),
(39, 1, 16, 1, 'Pellentesque luctus vulputate faucibus.', 'https://www.youtube.com/watch?v=T8JleMDcTxU', '/img/video/1395905_634327293272014_754055284_n.jpg', 8031, 3044, '2016-10-28 04:29:31'),
(40, 1, 86, 3, 'Donec malesuada a nulla nec hendrerit.', 'https://www.youtube.com/watch?v=zxGpmp6URuk', '/img/video/1450686_634329106605166_1706356459_n.jpg', 7776, 991, '2016-11-22 14:19:25'),
(41, 1, 70, 4, 'Aliquam id turpis congue, vehicula sem ac, vehicula risus.', 'https://www.youtube.com/watch?v=vAHuJZwJo0o', '/img/video/551352_634331416604935_842741253_n.jpg', 2601, 7090, '2016-11-19 17:12:15'),
(42, 1, 16, 2, 'Quisque velit ex, efficitur et varius vel, venenatis et libero.', 'https://www.youtube.com/watch?v=J3bCG9ukKfw', '/img/video/551352_634331416604935_842741253_n.jpg', 2380, 1136, '2016-12-04 17:30:46'),
(43, 1, 47, 1, 'Pellentesque sodales magna et arcu malesuada tempor.', 'https://www.youtube.com/watch?v=lTJTwHMIMVU', '/img/video/1395905_634327293272014_754055284_n.jpg', 5620, 2551, '2016-11-13 03:21:56'),
(44, 1, 85, 1, 'Nam volutpat, elit maximus auctor auctor, lectus massa pretium p', 'https://www.youtube.com/watch?v=voZYxYFTEbY', '/img/video/1395905_634327293272014_754055284_n.jpg', 7335, 7758, '2016-12-18 06:14:20'),
(45, 1, 23, 1, 'Nunc eget odio dignissim, malesuada nibh sed, posuere mauris.', 'https://www.youtube.com/watch?v=U1cyU_Zry5M', '/img/video/379660_634326683272075_268544450_n1.jpg', 9864, 7453, '2016-12-05 00:40:02'),
(46, 1, 28, 4, 'Aenean rutrum tortor id sapien lacinia pulvinar.', 'https://www.youtube.com/watch?v=hsYABEjz144', '/img/video/1424259_634325986605478_1373331786_n.jpg', 731, 7676, '2016-12-22 18:19:27'),
(47, 1, 77, 2, 'Morbi vel tincidunt nisl.', 'https://www.youtube.com/watch?v=no44_XRjLzw', '/img/video/969211_634326263272117_1748858864_n.jpg', 6278, 7346, '2016-11-01 05:19:37'),
(48, 1, 69, 1, 'Sed vitae laoreet nisl.', 'https://www.youtube.com/watch?v=hsYABEjz144', '/img/video/1424259_634325986605478_1373331786_n.jpg', 467, 378, '2016-11-05 02:27:09'),
(49, 1, 3, 3, 'Nullam porta, odio id sodales rutrum, leo risus suscipit orci, e', 'https://www.youtube.com/watch?v=0cFm2a5vykc', '/img/video/551352_634331416604935_842741253_n.jpg', 920, 6035, '2016-12-01 06:24:07'),
(50, 1, 33, 4, 'Cras viverra dui dictum mi tristique, sed suscipit nunc pellente', 'https://www.youtube.com/watch?v=dMgh1UAfn7A', '/img/video/1450686_634329106605166_1706356459_n.jpg', 9219, 3658, '2016-12-02 15:47:00'),
(51, 1, 72, 3, 'Donec a nibh nisl.', 'https://www.youtube.com/watch?v=Olea-GhWC-k', '/img/video/379660_634326683272075_268544450_n1.jpg', 7796, 7388, '2016-12-15 17:43:06'),
(52, 1, 74, 2, 'Nullam sed neque posuere nisi hendrerit rutrum.', 'https://www.youtube.com/watch?v=c0PfC8dOHwY', '/img/video/551352_634331416604935_842741253_n.jpg', 8697, 7630, '2016-11-06 13:21:32'),
(53, 1, 86, 3, 'Curabitur nec tortor euismod, faucibus elit at, imperdiet risus.', 'https://www.youtube.com/watch?v=-xh5yp1X7EE', '/img/video/551352_634331416604935_842741253_n.jpg', 4480, 8159, '2016-12-13 01:57:36'),
(54, 1, 6, 2, 'Vivamus venenatis malesuada magna, non eleifend nunc gravida vel', 'https://www.youtube.com/watch?v=ZkAVGUNEfkE', '/img/video/1450686_634329106605166_1706356459_n.jpg', 1029, 7319, '2016-12-14 03:28:48'),
(55, 1, 94, 4, 'Sed vulputate leo non tortor congue congue.', 'https://www.youtube.com/watch?v=aWqVnpBoM9s', '/img/video/969211_634326263272117_1748858864_n.jpg', 8890, 1719, '2016-11-06 18:49:57'),
(56, 1, 58, 3, 'Mauris eget neque tincidunt, faucibus elit at, tempus leo.', 'https://www.youtube.com/watch?v=P1IzK_dk-V8', '/img/video/1395905_634327293272014_754055284_n.jpg', 8438, 4768, '2016-12-18 22:47:21'),
(57, 1, 75, 2, 'Proin vitae aliquam libero, ac consectetur nunc.', 'https://www.youtube.com/watch?v=CjqbdceVPRM', '/img/video/969211_634326263272117_1748858864_n.jpg', 3941, 5605, '2016-11-22 07:09:43'),
(58, 1, 62, 3, 'Etiam euismod purus eros, eget lacinia lectus ullamcorper ut.', 'https://www.youtube.com/watch?v=UD0lYbMGl3M', '/img/video/1450686_634329106605166_1706356459_n.jpg', 9136, 4114, '2016-11-29 05:51:11'),
(59, 1, 16, 3, 'Morbi gravida varius orci.', 'https://www.youtube.com/watch?v=m9e_mrc_oJg', '/img/video/379660_634326683272075_268544450_n1.jpg', 539, 1543, '2016-11-02 21:35:14'),
(60, 1, 43, 4, 'Donec sed lacus nibh.', 'https://www.youtube.com/watch?v=uV_ltRU42dM', '/img/video/1395905_634327293272014_754055284_n.jpg', 3024, 4562, '2016-11-10 18:05:29'),
(61, 1, 5, 1, 'Duis massa orci, ultrices ac facilisis et, fringilla quis dolor.', 'https://www.youtube.com/watch?v=eF9ms9yWdnE', '/img/video/379660_634326683272075_268544450_n1.jpg', 559, 1618, '2016-11-10 21:42:51'),
(62, 1, 52, 2, 'Nunc vitae feugiat ligula.', 'https://www.youtube.com/watch?v=5AaxGsKi43Y', '/img/video/379660_634326683272075_268544450_n1.jpg', 6705, 5118, '2016-12-02 08:40:11'),
(63, 1, 92, 4, 'Phasellus ut felis et est euismod pharetra.', 'https://www.youtube.com/watch?v=x0nuURWNCBU', '/img/video/1424259_634325986605478_1373331786_n.jpg', 291, 2559, '2016-11-11 03:54:35'),
(64, 1, 30, 2, 'Nam ut placerat felis.', 'https://www.youtube.com/watch?v=SXvRItBCtSg', '/img/video/1424259_634325986605478_1373331786_n.jpg', 3251, 2162, '2016-11-28 15:12:47'),
(65, 1, 36, 4, 'Praesent pulvinar ante ac auctor interdum.', 'https://www.youtube.com/watch?v=IPsGHV9HF-g', '/img/video/379660_634326683272075_268544450_n1.jpg', 7364, 7204, '2016-11-29 06:11:24'),
(66, 1, 77, 3, 'Nunc imperdiet molestie odio, vitae sollicitudin urna tincidunt ', 'https://www.youtube.com/watch?v=gqvJHz7WqyM', '/img/video/1424259_634325986605478_1373331786_n.jpg', 2515, 7363, '2016-11-06 22:19:02'),
(67, 1, 98, 4, 'Pellentesque non varius mauris.', 'https://www.youtube.com/watch?v=7r4Ds8Lb538', '/img/video/1395905_634327293272014_754055284_n.jpg', 1201, 1972, '2016-11-05 11:52:17'),
(68, 1, 20, 3, 'Nullam vitae lacinia justo.', 'https://www.youtube.com/watch?v=iQmyUY_QBy4', '/img/video/1424259_634325986605478_1373331786_n.jpg', 1858, 7255, '2016-11-27 14:03:07'),
(69, 1, 80, 3, 'Vivamus orci mauris, ornare tincidunt augue id, cursus hendrerit', 'https://www.youtube.com/watch?v=hPFQeEfi23k', '/img/video/379660_634326683272075_268544450_n1.jpg', 3591, 3102, '2016-11-06 19:26:09'),
(70, 1, 15, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'https://www.youtube.com/watch?v=PRpUKWmyap0', '/img/video/1424259_634325986605478_1373331786_n.jpg', 2464, 8633, '2016-12-25 04:33:16'),
(71, 1, 88, 2, 'Maecenas at eros sed orci tincidunt posuere.', 'https://www.youtube.com/watch?v=IPNzarJE2Ow', '/img/video/551352_634331416604935_842741253_n.jpg', 6770, 1611, '2016-12-07 05:40:17'),
(72, 1, 7, 3, 'Phasellus quam tortor, accumsan eget congue nec, lacinia eu lect', 'https://www.youtube.com/watch?v=dkfJYZuvxSQ', '/img/video/1450686_634329106605166_1706356459_n.jpg', 5146, 8717, '2016-12-05 14:04:10'),
(73, 1, 48, 3, 'Vestibulum elit enim, iaculis a viverra nec, interdum non lorem.', 'https://www.youtube.com/watch?v=3ne1sonRmuo', '/img/video/1450686_634329106605166_1706356459_n.jpg', 6782, 8595, '2016-12-06 05:46:58'),
(74, 1, 55, 3, 'Suspendisse potenti.', 'https://www.youtube.com/watch?v=Z7RTykOCcuI', '/img/video/1450686_634329106605166_1706356459_n.jpg', 7766, 9069, '2016-12-01 09:14:11'),
(75, 1, 60, 2, 'Morbi vel tincidunt nisl.', 'https://www.youtube.com/watch?v=utzsyVMLlsg', '/img/video/969211_634326263272117_1748858864_n.jpg', 2014, 1926, '2016-12-21 06:41:00'),
(76, 1, 58, 4, 'Pellentesque pretium tortor et eros venenatis elementum.', 'https://www.youtube.com/watch?v=v_eZxZFqBhA', '/img/video/1424259_634325986605478_1373331786_n.jpg', 7395, 5117, '2016-12-22 11:20:07'),
(77, 1, 72, 4, 'Mauris rhoncus quam eros, in sollicitudin elit tristique et.', 'https://www.youtube.com/watch?v=hnGYbQV11GA', '/img/video/551352_634331416604935_842741253_n.jpg', 2708, 3064, '2016-11-30 11:36:32'),
(78, 1, 2, 3, 'Sed maximus non mauris ac blandit.', 'https://www.youtube.com/watch?v=8c5XkGbEQiE', '/img/video/1395905_634327293272014_754055284_n.jpg', 7430, 8454, '2016-12-09 03:22:50'),
(79, 1, 47, 1, 'Praesent commodo dolor at nibh rhoncus, sit amet rutrum nibh por', 'https://www.youtube.com/watch?v=lzqlF5hDf8Q', '/img/video/1424259_634325986605478_1373331786_n.jpg', 4288, 366, '2016-11-30 22:16:16'),
(80, 1, 76, 2, 'Etiam vehicula, enim non dictum viverra, elit urna eleifend magn', 'https://www.youtube.com/watch?v=kWGKX4IgUxY', '/img/video/1450686_634329106605166_1706356459_n.jpg', 5366, 2544, '2016-12-19 14:36:25'),
(81, 1, 82, 3, 'Etiam at condimentum tellus.', 'https://www.youtube.com/watch?v=hI1Xe1sAPgY', '/img/video/1450686_634329106605166_1706356459_n.jpg', 9853, 1361, '2016-11-13 12:08:49'),
(82, 1, 67, 4, 'Maecenas feugiat nulla dui.', 'https://www.youtube.com/watch?v=zQKJbmGwRl4', '/img/video/969211_634326263272117_1748858864_n.jpg', 8868, 8610, '2016-11-13 08:12:20'),
(83, 1, 42, 1, 'Cras ultrices quam sed rhoncus malesuada.', 'https://www.youtube.com/watch?v=yCPZJT6pDiU', '/img/video/969211_634326263272117_1748858864_n.jpg', 6455, 2969, '2016-11-30 01:01:00'),
(84, 1, 76, 3, 'Nam in ullamcorper odio, id viverra leo.', 'https://www.youtube.com/watch?v=AlRNA8pmfIk', '/img/video/379660_634326683272075_268544450_n1.jpg', 5154, 3163, '2016-11-30 02:30:32'),
(85, 1, 49, 1, 'Phasellus quam tortor, accumsan eget congue nec, lacinia eu lect', 'https://www.youtube.com/watch?v=8DQrxSNEMq4', '/img/video/1395905_634327293272014_754055284_n.jpg', 9167, 4836, '2016-12-07 05:12:07'),
(86, 1, 6, 3, 'Aenean blandit nec tortor nec tincidunt.', 'https://www.youtube.com/watch?v=5ww4Wnip6tU', '/img/video/379660_634326683272075_268544450_n1.jpg', 6403, 9933, '2016-11-04 21:49:19'),
(87, 1, 54, 4, 'Donec ullamcorper vitae ex ac commodo.', 'https://www.youtube.com/watch?v=JcwUOPLdByo', '/img/video/1450686_634329106605166_1706356459_n.jpg', 3857, 5109, '2016-12-04 01:30:25'),
(88, 1, 60, 2, 'Donec elit orci, accumsan ut augue a, ornare scelerisque ante.', 'https://www.youtube.com/watch?v=WqmMrp-pVp4', '/img/video/551352_634331416604935_842741253_n.jpg', 12, 2794, '2016-12-23 03:21:39'),
(89, 1, 43, 2, 'Etiam eu nisl non mauris varius varius.', 'https://www.youtube.com/watch?v=IPHUnQhn7H4', '/img/video/1450686_634329106605166_1706356459_n.jpg', 1772, 6440, '2016-11-06 02:27:24'),
(90, 1, 100, 4, 'Ut varius suscipit justo eget hendrerit.', 'https://www.youtube.com/watch?v=qMTH10WZomk', '/img/video/969211_634326263272117_1748858864_n.jpg', 2274, 5024, '2016-12-08 05:58:11'),
(91, 1, 51, 4, 'Nunc bibendum mollis mi a ultricies.', 'https://www.youtube.com/watch?v=EoeIn-3jbhI', '/img/video/1395905_634327293272014_754055284_n.jpg', 2457, 4473, '2016-12-08 01:31:45'),
(92, 1, 6, 2, 'Duis at ligula in lectus placerat vehicula.', 'https://www.youtube.com/watch?v=MMAyNk3OPRY', '/img/video/379660_634326683272075_268544450_n1.jpg', 9541, 5706, '2016-12-25 12:10:55'),
(93, 1, 10, 1, 'Integer ut sollicitudin ex.', 'https://www.youtube.com/watch?v=Z7RTykOCcuI', '/img/video/1424259_634325986605478_1373331786_n.jpg', 1645, 7047, '2016-11-08 05:36:39'),
(94, 1, 68, 3, 'Nullam vestibulum, leo non euismod pellentesque, ipsum arcu comm', 'https://www.youtube.com/watch?v=Ldeie7GMj_c', '/img/video/1424259_634325986605478_1373331786_n.jpg', 4021, 3502, '2016-12-12 09:36:11'),
(95, 1, 40, 1, 'Proin vel euismod felis, quis pharetra nisi.', 'https://www.youtube.com/watch?v=vl8JxwXOkNI', '/img/video/1424259_634325986605478_1373331786_n.jpg', 6417, 6462, '2016-12-10 01:03:55'),
(96, 1, 42, 2, 'Nulla lectus dolor, malesuada eget lectus ut, porta rhoncus nisi', 'https://www.youtube.com/watch?v=Ldeie7GMj_c', '/img/video/379660_634326683272075_268544450_n1.jpg', 1343, 3069, '2016-12-07 10:42:49'),
(97, 1, 47, 2, 'Nulla elementum ac massa ac mollis.', 'https://www.youtube.com/watch?v=58zcd6Sx5iY', '/img/video/969211_634326263272117_1748858864_n.jpg', 1169, 8879, '2016-11-10 15:54:38'),
(98, 1, 75, 3, 'Nullam pharetra et eros vel dignissim.', 'https://www.youtube.com/watch?v=GNsz8ed6WNg', '/img/video/1395905_634327293272014_754055284_n.jpg', 4826, 7738, '2016-12-09 11:45:40'),
(99, 1, 85, 3, 'Nunc dignissim arcu in vulputate porta.', 'https://www.youtube.com/watch?v=viOeEYmbo0o', '/img/video/1395905_634327293272014_754055284_n.jpg', 7502, 2355, '2016-11-23 13:42:41'),
(100, 1, 70, 2, 'Ut aliquet risus id maximus volutpat.', 'https://www.youtube.com/watch?v=2DApIuwHQYY', '/img/video/969211_634326263272117_1748858864_n.jpg', 1752, 6055, '2016-12-18 14:00:37'),
(101, 1, 9, 3, 'Maecenas ac interdum orci.', 'https://www.youtube.com/watch?v=xw6utjoyMi4', '/img/video/1424259_634325986605478_1373331786_n.jpg', 5577, 5574, '2016-12-12 22:10:51'),
(102, 1, 51, 4, 'Curabitur accumsan, magna nec vestibulum molestie, sem mi placer', 'https://www.youtube.com/watch?v=btb_OmkrMmA', '/img/video/1424259_634325986605478_1373331786_n.jpg', 3240, 3675, '2016-11-22 10:01:10'),
(103, 1, 98, 4, 'Nulla facilisi.', 'https://www.youtube.com/watch?v=f2Ud9LlUz0M', '/img/video/969211_634326263272117_1748858864_n.jpg', 357, 2202, '2016-11-26 02:43:09'),
(104, 1, 58, 4, 'Morbi velit odio, gravida nec turpis nec, ultricies cursus metus', 'https://www.youtube.com/watch?v=sHpcFRQ_z6s', '/img/video/969211_634326263272117_1748858864_n.jpg', 1361, 1883, '2016-11-26 16:41:49'),
(105, 1, 53, 4, 'Maecenas eleifend velit id quam finibus, ac molestie nulla fring', 'https://www.youtube.com/watch?v=4pf1ps-mi8k', '/img/video/1424259_634325986605478_1373331786_n.jpg', 4557, 5666, '2016-12-07 20:14:38'),
(106, 1, 85, 3, 'Vivamus placerat dolor sed ante blandit hendrerit vitae ac magna', 'https://www.youtube.com/watch?v=YdgmH9Vv2-I', '/img/video/1424259_634325986605478_1373331786_n.jpg', 4729, 8048, '2016-12-23 09:32:23'),
(107, 1, 47, 4, 'In hac habitasse platea dictumst.', 'https://www.youtube.com/watch?v=TQFjYufXPHI', '/img/video/1450686_634329106605166_1706356459_n.jpg', 6372, 6288, '2016-12-13 10:46:18'),
(108, 1, 87, 4, 'Proin id quam ultricies, maximus nisl a, lacinia ex.', 'https://www.youtube.com/watch?v=U4RE2YLGw0U', '/img/video/379660_634326683272075_268544450_n1.jpg', 8110, 1315, '2016-12-24 14:29:35'),
(109, 1, 13, 4, 'Aliquam ac diam vehicula, viverra magna a, feugiat metus.', 'https://www.youtube.com/watch?v=q2v0YuDatpc', '/img/video/969211_634326263272117_1748858864_n.jpg', 6757, 9721, '2016-11-18 01:29:41'),
(110, 1, 95, 2, 'Morbi velit odio, gravida nec turpis nec, ultricies cursus metus', 'https://www.youtube.com/watch?v=r8bfrYFK7P4', '/img/video/1395905_634327293272014_754055284_n.jpg', 2710, 9423, '2016-12-12 23:51:57'),
(111, 1, 11, 1, 'Integer vitae purus massa.', 'https://www.youtube.com/watch?v=7_69P4FhXzY', '/img/video/1450686_634329106605166_1706356459_n.jpg', 9392, 3560, '2016-11-06 10:02:32'),
(112, 1, 45, 2, 'Nam in odio pretium, mattis dui quis, molestie leo.', 'https://www.youtube.com/watch?v=S_Evbn5BdMw', '/img/video/551352_634331416604935_842741253_n.jpg', 926, 2275, '2016-11-09 10:29:05'),
(113, 1, 63, 2, 'Nunc iaculis dignissim sem, eget faucibus tortor gravida eget.', 'https://www.youtube.com/watch?v=3-jwnmJiufQ', '/img/video/1424259_634325986605478_1373331786_n.jpg', 3122, 6638, '2016-12-04 23:27:27'),
(114, 1, 18, 3, 'Proin id tortor convallis, hendrerit nibh non, pharetra elit.', 'https://www.youtube.com/watch?v=-GxtXJ_gakQ', '/img/video/551352_634331416604935_842741253_n.jpg', 7374, 4638, '2016-11-01 19:28:21'),
(115, 1, 6, 4, 'In risus arcu, venenatis at porta ut, faucibus eget odio.', 'https://www.youtube.com/watch?v=XS1jam-NPvA', '/img/video/1424259_634325986605478_1373331786_n.jpg', 4142, 5255, '2016-11-15 18:42:20'),
(116, 1, 97, 1, 'Sed elit nisl, mattis tristique congue ac, bibendum in justo.', 'https://www.youtube.com/watch?v=wRLehllONGI', '/img/video/1450686_634329106605166_1706356459_n.jpg', 4623, 9066, '2016-11-28 20:29:07'),
(117, 1, 70, 4, 'Duis eu quam vitae elit fermentum suscipit non a purus.', 'https://www.youtube.com/watch?v=P7TyvGmFX_U', '/img/video/969211_634326263272117_1748858864_n.jpg', 4368, 2590, '2016-10-28 12:18:32'),
(118, 1, 69, 2, 'Donec pharetra placerat venenatis.', 'https://www.youtube.com/watch?v=aUlqhpU72nE', '/img/video/551352_634331416604935_842741253_n.jpg', 4335, 5806, '2016-12-12 20:20:07'),
(119, 1, 87, 4, 'Ut nisl sapien, sollicitudin rhoncus convallis vitae, ultrices e', 'https://www.youtube.com/watch?v=rS0EfA7LoM8', '/img/video/1395905_634327293272014_754055284_n.jpg', 5237, 9898, '2016-12-14 19:31:14'),
(120, 1, 56, 3, 'Nullam sit amet lacus quis leo faucibus euismod.', 'https://www.youtube.com/watch?v=hUNAX1UYeAE', '/img/video/1395905_634327293272014_754055284_n.jpg', 2630, 1848, '2016-10-28 03:16:36'),
(121, 1, 41, 3, 'Aliquam eu facilisis libero.', 'https://www.youtube.com/watch?v=kfUa5hmG9fE', '/img/video/551352_634331416604935_842741253_n.jpg', 2769, 596, '2016-10-30 14:47:28'),
(122, 1, 26, 3, 'Sed volutpat tempus nibh id sodales.', 'https://www.youtube.com/watch?v=NhDLlURg1Lc', '/img/video/551352_634331416604935_842741253_n.jpg', 8348, 6162, '2016-12-10 16:13:37'),
(123, 1, 42, 3, 'Donec ultrices odio elit, et lacinia dui rutrum facilisis.', 'https://www.youtube.com/watch?v=7xnJOn7JPFQ', '/img/video/969211_634326263272117_1748858864_n.jpg', 6431, 943, '2016-12-18 13:36:42'),
(124, 1, 47, 1, 'Duis lacus nulla, accumsan id turpis ut, viverra auctor mauris.', 'https://www.youtube.com/watch?v=3MhAwmeRElw', '/img/video/969211_634326263272117_1748858864_n.jpg', 4490, 771, '2016-11-16 10:27:33'),
(125, 1, 97, 4, 'Ut iaculis magna et justo finibus, dignissim suscipit lorem fauc', 'https://www.youtube.com/watch?v=QFuORmIK_kk', '/img/video/1424259_634325986605478_1373331786_n.jpg', 8842, 3995, '2016-12-02 02:07:33'),
(126, 1, 66, 4, 'Nullam id sapien ex.', 'https://www.youtube.com/watch?v=a5zsJYGIwGY', '/img/video/551352_634331416604935_842741253_n.jpg', 134, 9622, '2016-12-17 22:40:19'),
(127, 1, 44, 3, 'Integer tempus arcu a lorem pharetra rutrum.', 'https://www.youtube.com/watch?v=fFOQiw9_iUw', '/img/video/551352_634331416604935_842741253_n.jpg', 8888, 6517, '2016-11-01 04:32:44'),
(128, 1, 72, 2, 'Suspendisse eget lectus et velit sollicitudin pharetra.', 'https://www.youtube.com/watch?v=6I9SOFv4gkk', '/img/video/551352_634331416604935_842741253_n.jpg', 3873, 8389, '2016-12-17 22:36:00'),
(129, 1, 90, 2, 'Cras et ipsum in turpis egestas accumsan in sed neque.', 'https://www.youtube.com/watch?v=7TvfG6IzBa0', '/img/video/551352_634331416604935_842741253_n.jpg', 1925, 5672, '2016-11-24 15:27:20'),
(130, 1, 26, 3, 'Etiam ut urna ex.', 'https://www.youtube.com/watch?v=gosYgh8jojg', '/img/video/1395905_634327293272014_754055284_n.jpg', 9967, 2635, '2016-11-02 02:49:45'),
(131, 1, 68, 1, 'Praesent pharetra pharetra nibh, eget semper turpis vestibulum i', 'https://www.youtube.com/watch?v=Ptu-1jAVLOM', '/img/video/969211_634326263272117_1748858864_n.jpg', 9458, 8189, '2016-11-22 00:58:32'),
(132, 1, 93, 4, 'Sed eu turpis justo.', 'https://www.youtube.com/watch?v=FHLsMBLGZYc', '/img/video/551352_634331416604935_842741253_n.jpg', 6138, 4587, '2016-11-05 13:47:04'),
(133, 1, 95, 2, 'Praesent egestas, magna non dictum laoreet, turpis lacus consect', 'https://www.youtube.com/watch?v=2Y5QVa9HpBw', '/img/video/1450686_634329106605166_1706356459_n.jpg', 568, 5527, '2016-12-08 09:02:53'),
(134, 1, 1, 1, 'Cras et ipsum in turpis egestas accumsan in sed neque.', 'https://www.youtube.com/watch?v=6Qg3JZF7Avw', '/img/video/551352_634331416604935_842741253_n.jpg', 4335, 1484, '2016-12-24 18:01:30'),
(135, 1, 1, 2, 'Mauris eget neque tincidunt, faucibus elit at, tempus leo.', 'https://www.youtube.com/watch?v=vgfM2TTqZlE', '/img/video/379660_634326683272075_268544450_n1.jpg', 3672, 9866, '2016-12-08 09:28:08'),
(136, 1, 56, 2, 'Vivamus id lacus eget felis gravida pharetra.', 'https://www.youtube.com/watch?v=YUGuoVy48Z8', '/img/video/1424259_634325986605478_1373331786_n.jpg', 6646, 7852, '2016-12-10 21:14:40'),
(137, 1, 54, 4, 'Integer eget vulputate est, et elementum nibh.', 'https://www.youtube.com/watch?v=HmUHZjxoMiA', '/img/video/1424259_634325986605478_1373331786_n.jpg', 1140, 1746, '2016-10-31 20:33:15'),
(138, 1, 62, 2, 'Proin ullamcorper pellentesque orci sit amet efficitur.', 'https://www.youtube.com/watch?v=fmf9X8cx9u4', '/img/video/551352_634331416604935_842741253_n.jpg', 4085, 9310, '2016-12-10 01:52:48'),
(139, 1, 66, 4, 'Quisque nec quam eget felis tempus sagittis.', 'https://www.youtube.com/watch?v=uSxvUc1B6io', '/img/video/551352_634331416604935_842741253_n.jpg', 2715, 8222, '2016-11-06 23:31:24'),
(140, 1, 77, 2, 'Suspendisse potenti.', 'https://www.youtube.com/watch?v=V2zFP-YKFUE', '/img/video/969211_634326263272117_1748858864_n.jpg', 3022, 6984, '2016-11-27 20:33:00'),
(141, 1, 37, 3, 'Maecenas quis felis libero.', 'https://www.youtube.com/watch?v=low-RpfQ1nE', '/img/video/1395905_634327293272014_754055284_n.jpg', 9002, 8313, '2016-12-10 02:47:43'),
(142, 1, 50, 1, 'Cras nec ornare risus.', 'https://www.youtube.com/watch?v=my_qLGbiikY', '/img/video/1424259_634325986605478_1373331786_n.jpg', 3407, 7564, '2016-10-28 03:03:29'),
(143, 1, 60, 1, 'Donec gravida feugiat consequat.', 'https://www.youtube.com/watch?v=LCPHDr5y8Z0', '/img/video/379660_634326683272075_268544450_n1.jpg', 2145, 1765, '2016-11-22 10:34:46'),
(144, 1, 22, 4, 'Praesent gravida elementum nunc, quis porttitor massa consectetu', 'https://www.youtube.com/watch?v=eDTrWeH8uqQ', '/img/video/1395905_634327293272014_754055284_n.jpg', 2640, 5155, '2016-12-20 21:43:07'),
(145, 1, 63, 1, 'Aliquam sapien ex, tempus quis consequat at, dignissim quis magn', 'https://www.youtube.com/watch?v=xUDNG063ZxA', '/img/video/969211_634326263272117_1748858864_n.jpg', 7170, 3866, '2016-11-09 21:29:42'),
(146, 1, 100, 1, 'Aliquam mattis, massa non auctor imperdiet, nisl metus pretium d', 'https://www.youtube.com/watch?v=i8VcFYJ1GQI', '/img/video/969211_634326263272117_1748858864_n.jpg', 9556, 1203, '2016-12-04 11:08:38'),
(147, 1, 77, 4, 'Pellentesque aliquet, mi vitae egestas tincidunt, nibh massa pul', 'https://www.youtube.com/watch?v=JjaLIjzh4Dw', '/img/video/969211_634326263272117_1748858864_n.jpg', 2511, 2753, '2016-12-08 04:38:16'),
(148, 1, 17, 3, 'Aenean eu pharetra lectus.', 'https://www.youtube.com/watch?v=NKN1rxUX6WM', '/img/video/551352_634331416604935_842741253_n.jpg', 5013, 704, '2016-11-19 11:51:25'),
(149, 1, 29, 3, 'Proin sed nisl a purus dapibus rhoncus ac non purus.', 'https://www.youtube.com/watch?v=EIM4BSHt95g', '/img/video/379660_634326683272075_268544450_n1.jpg', 2128, 7832, '2016-11-16 05:39:12'),
(150, 1, 47, 1, 'Nullam et accumsan turpis.', 'https://www.youtube.com/watch?v=yny0VDxgNwQ', '/img/video/379660_634326683272075_268544450_n1.jpg', 485, 9202, '2016-12-16 17:57:05'),
(151, 1, 71, 2, 'Phasellus et hendrerit ipsum, ac auctor erat.', 'https://www.youtube.com/watch?v=u7_d5AzsyCk', '/img/video/969211_634326263272117_1748858864_n.jpg', 8798, 7928, '2016-12-10 05:05:41'),
(152, 1, 71, 4, 'Donec auctor eu quam ac mollis.', 'https://www.youtube.com/watch?v=BrHR2luwN1k', '/img/video/1395905_634327293272014_754055284_n.jpg', 1673, 5311, '2016-10-30 22:16:35'),
(153, 1, 75, 1, 'Suspendisse sed accumsan purus.', 'https://www.youtube.com/watch?v=_Nudan5x77I', '/img/video/379660_634326683272075_268544450_n1.jpg', 9795, 9616, '2016-11-08 13:23:51'),
(154, 1, 4, 2, 'Nunc vel auctor ex.', 'https://www.youtube.com/watch?v=6PvgJI6cvh8', '/img/video/551352_634331416604935_842741253_n.jpg', 8014, 6451, '2016-11-22 11:53:50'),
(155, 1, 71, 2, 'Donec elit orci, accumsan ut augue a, ornare scelerisque ante.', 'https://www.youtube.com/watch?v=wZl96Bciv80', '/img/video/969211_634326263272117_1748858864_n.jpg', 5756, 7668, '2016-10-31 19:39:32'),
(156, 1, 35, 3, 'Nullam sollicitudin at ipsum at vehicula.', 'https://www.youtube.com/watch?v=UDiij53aCtI', '/img/video/1395905_634327293272014_754055284_n.jpg', 4427, 5965, '2016-11-22 15:59:45'),
(157, 1, 27, 1, 'Integer commodo tempor arcu, eu aliquet sapien gravida in.', 'https://www.youtube.com/watch?v=v0tVHRx-xRw', '/img/video/969211_634326263272117_1748858864_n.jpg', 1991, 1004, '2016-12-22 00:43:52'),
(158, 1, 22, 2, 'Sed nec commodo sapien.', 'https://www.youtube.com/watch?v=3xGZGv_u_DQ', '/img/video/1424259_634325986605478_1373331786_n.jpg', 2918, 9525, '2016-12-07 01:12:53'),
(159, 1, 37, 2, 'Aenean facilisis non erat eu efficitur.', 'https://www.youtube.com/watch?v=MUcw_CkIkT8', '/img/video/969211_634326263272117_1748858864_n.jpg', 64, 8, '2016-11-19 17:47:00'),
(160, 1, 83, 1, 'Nunc quam leo, tincidunt ut diam nec, consectetur volutpat lectu', 'https://www.youtube.com/watch?v=wzRe1I46_rM', '/img/video/551352_634331416604935_842741253_n.jpg', 4843, 6998, '2016-10-31 17:00:08'),
(161, 1, 78, 2, 'Vestibulum ac nunc sem.', 'https://www.youtube.com/watch?v=DeG0pR-ebX8', '/img/video/1424259_634325986605478_1373331786_n.jpg', 6922, 3762, '2016-12-06 11:53:19'),
(162, 1, 48, 2, 'Curabitur ligula tellus, semper sed congue vel, porttitor condim', 'https://www.youtube.com/watch?v=r0hCaNcz25c', '/img/video/1424259_634325986605478_1373331786_n.jpg', 231, 9609, '2016-12-11 01:18:46'),
(163, 1, 46, 1, 'Duis suscipit at diam vitae aliquam.', 'https://www.youtube.com/watch?v=EbWjnMED3Xo', '/img/video/1450686_634329106605166_1706356459_n.jpg', 2183, 5933, '2016-11-13 17:32:28'),
(164, 1, 83, 4, 'Integer massa massa, viverra ac lacus vitae, ultrices fermentum ', 'https://www.youtube.com/watch?v=MIDlAj9uMck', '/img/video/969211_634326263272117_1748858864_n.jpg', 3614, 8750, '2016-12-27 07:54:56'),
(165, 1, 22, 2, 'Nullam eget dui aliquet, vestibulum sem eget, scelerisque sem.', 'https://www.youtube.com/watch?v=BlIbufhGGLU', '/img/video/1450686_634329106605166_1706356459_n.jpg', 2893, 2669, '2016-12-21 03:47:15'),
(166, 1, 70, 4, 'Praesent non est augue.', 'https://www.youtube.com/watch?v=8B5FRsvX0Qw', '/img/video/1395905_634327293272014_754055284_n.jpg', 9421, 1500, '2016-12-24 03:39:25'),
(167, 1, 15, 2, 'Nullam tristique nisi sed ullamcorper faucibus.', 'https://www.youtube.com/watch?v=PhksYWlpj-g', '/img/video/969211_634326263272117_1748858864_n.jpg', 649, 8895, '2016-11-18 15:26:51'),
(168, 1, 91, 1, 'In fermentum lectus non ipsum laoreet, sit amet viverra metus ve', 'https://www.youtube.com/watch?v=_kRCKvN6Kug', '/img/video/1450686_634329106605166_1706356459_n.jpg', 7026, 7744, '2016-11-23 04:22:56'),
(169, 1, 1, 1, 'Donec nec risus orci.', 'https://www.youtube.com/watch?v=LmDoXxbrz6w', '/img/video/551352_634331416604935_842741253_n.jpg', 251, 9445, '2016-11-23 22:05:16'),
(170, 1, 80, 2, 'Ut semper sodales sem, quis sodales ipsum.', 'https://www.youtube.com/watch?v=FUdVsIPMIVY', '/img/video/1450686_634329106605166_1706356459_n.jpg', 4482, 179, '2016-12-15 06:33:32'),
(171, 1, 55, 2, 'Etiam sodales faucibus interdum.', 'https://www.youtube.com/watch?v=0rPZSyTgo-w', '/img/video/551352_634331416604935_842741253_n.jpg', 5558, 2018, '2016-10-29 16:33:11'),
(172, 1, 68, 4, 'Pellentesque ut tincidunt diam, non consectetur nulla.', 'https://www.youtube.com/watch?v=r9bG_gil4-w', '/img/video/551352_634331416604935_842741253_n.jpg', 7646, 1544, '2016-12-16 23:58:37'),
(173, 1, 56, 3, 'Sed accumsan vel lorem sed auctor.', 'https://www.youtube.com/watch?v=vRfPEId9kZU', '/img/video/1450686_634329106605166_1706356459_n.jpg', 6567, 6078, '2016-12-02 05:22:18'),
(174, 1, 21, 4, 'Nullam rutrum, libero non porttitor venenatis, quam neque iaculi', 'https://www.youtube.com/watch?v=_ZyiTjSzY5Y', '/img/video/1450686_634329106605166_1706356459_n.jpg', 9418, 98, '2016-12-04 13:04:02'),
(175, 1, 84, 2, 'Sed facilisis ex nisi, pellentesque egestas lorem iaculis cursus', 'https://www.youtube.com/watch?v=RnOK2OnNQCU', '/img/video/1450686_634329106605166_1706356459_n.jpg', 4691, 9215, '2016-12-01 07:11:28'),
(176, 1, 4, 4, 'Donec in diam feugiat, convallis arcu at, facilisis dolor.', 'https://www.youtube.com/watch?v=mwbax89QTXk', '/img/video/1395905_634327293272014_754055284_n.jpg', 9783, 8330, '2016-12-19 06:12:32'),
(177, 1, 60, 3, 'Integer tincidunt lectus eros, vel ornare nisl hendrerit vitae.', 'https://www.youtube.com/watch?v=R9o4tpwbWH8', '/img/video/1424259_634325986605478_1373331786_n.jpg', 8303, 2272, '2016-11-21 14:20:28'),
(178, 1, 54, 3, 'Suspendisse ante tortor, blandit non dolor eget, tincidunt vehic', 'https://www.youtube.com/watch?v=Llh6z_ghsmE', '/img/video/1450686_634329106605166_1706356459_n.jpg', 4075, 6212, '2016-11-05 22:21:08'),
(179, 1, 77, 3, 'Vivamus sagittis sollicitudin lacinia.', 'https://www.youtube.com/watch?v=bgD0U4lspCw', '/img/video/1424259_634325986605478_1373331786_n.jpg', 9692, 6625, '2016-12-21 11:34:50'),
(180, 1, 62, 4, 'Vivamus id leo maximus, porttitor augue sed, mattis est.', 'https://www.youtube.com/watch?v=JHfR_Sg_Dh0', '/img/video/1395905_634327293272014_754055284_n.jpg', 1904, 2298, '2016-12-13 04:00:26'),
(181, 1, 56, 4, 'Quisque at pharetra magna.', 'https://www.youtube.com/watch?v=uxMr5sEjIJI', '/img/video/551352_634331416604935_842741253_n.jpg', 2522, 4520, '2016-11-18 11:32:07'),
(182, 1, 4, 4, 'Morbi vel tincidunt nisl.', 'https://www.youtube.com/watch?v=OU_QKRgktzI', '/img/video/1424259_634325986605478_1373331786_n.jpg', 6839, 2266, '2016-11-18 03:18:56'),
(183, 1, 90, 3, 'Cras sem dolor, ullamcorper bibendum scelerisque ac, imperdiet s', 'https://www.youtube.com/watch?v=f_qslTmLbO4', '/img/video/1424259_634325986605478_1373331786_n.jpg', 9444, 4579, '2016-11-15 15:35:10'),
(184, 1, 82, 4, 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices', 'https://www.youtube.com/watch?v=75mx9pRJyLg', '/img/video/1424259_634325986605478_1373331786_n.jpg', 9020, 5872, '2016-12-07 16:48:45'),
(185, 1, 70, 3, 'Ut sodales erat eu ultrices feugiat.', 'https://www.youtube.com/watch?v=8BLk6AZ7jhU', '/img/video/1424259_634325986605478_1373331786_n.jpg', 4590, 7798, '2016-12-15 15:49:13'),
(186, 1, 11, 4, 'Cras pharetra, erat ut ultricies condimentum, ipsum eros porttit', 'https://www.youtube.com/watch?v=g85DplCf8iI', '/img/video/379660_634326683272075_268544450_n1.jpg', 8411, 3692, '2016-11-22 11:29:47'),
(187, 1, 78, 3, 'Vivamus nec purus leo.', 'https://www.youtube.com/watch?v=0HDM3eYp4KQ', '/img/video/1424259_634325986605478_1373331786_n.jpg', 8997, 5451, '2016-11-14 05:32:59'),
(188, 1, 8, 2, 'Nam tempor lacus dui, tempor fringilla lectus fermentum nec.', 'https://www.youtube.com/watch?v=1f90nLaHW8U', '/img/video/551352_634331416604935_842741253_n.jpg', 9560, 6366, '2016-12-10 21:51:45'),
(189, 1, 32, 4, 'Maecenas enim diam, auctor vitae odio nec, interdum tristique di', 'https://www.youtube.com/watch?v=4tJcAtnzgQE', '/img/video/551352_634331416604935_842741253_n.jpg', 2852, 7467, '2016-11-01 13:37:41'),
(190, 1, 14, 4, 'Nullam id sapien ex.', 'https://www.youtube.com/watch?v=yEOaopc7XCQ', '/img/video/379660_634326683272075_268544450_n1.jpg', 4764, 8149, '2016-11-14 12:54:33'),
(191, 1, 54, 2, 'Pellentesque iaculis eu quam vestibulum rutrum.', 'https://www.youtube.com/watch?v=PiN0R6iKEmE', '/img/video/1424259_634325986605478_1373331786_n.jpg', 1995, 7315, '2016-11-08 06:37:16'),
(192, 1, 89, 3, 'Quisque congue ultrices est pretium laoreet.', 'https://www.youtube.com/watch?v=FLUC8aINF1c', '/img/video/551352_634331416604935_842741253_n.jpg', 3333, 3715, '2016-12-10 06:43:29'),
(193, 1, 62, 4, 'Sed nec ipsum non nibh commodo tempus et eu ex.', 'https://www.youtube.com/watch?v=J3PDzYl2ydU', '/img/video/551352_634331416604935_842741253_n.jpg', 7467, 8237, '2016-12-02 21:22:24'),
(194, 1, 67, 1, 'Proin eget ipsum vitae velit facilisis rhoncus.', 'https://www.youtube.com/watch?v=qbSkXMgIR78', '/img/video/1450686_634329106605166_1706356459_n.jpg', 8844, 4311, '2016-11-18 18:34:19'),
(195, 1, 59, 2, 'Nullam elit purus, malesuada et libero nec, sollicitudin malesua', 'https://www.youtube.com/watch?v=1KaOrSuWZeM', '/img/video/551352_634331416604935_842741253_n.jpg', 6121, 1049, '2016-12-10 04:27:49'),
(196, 1, 55, 1, 'Nunc neque ante, lacinia eget sodales vel, placerat nec sem.', 'https://www.youtube.com/watch?v=DwziA0sjWC8', '/img/video/379660_634326683272075_268544450_n1.jpg', 5372, 5630, '2016-12-12 04:44:15'),
(197, 1, 79, 1, 'In varius nisl sed odio tristique, et cursus lectus laoreet.', 'https://www.youtube.com/watch?v=4PtMQIZmBGc', '/img/video/969211_634326263272117_1748858864_n.jpg', 7625, 2505, '2016-12-04 13:36:58'),
(198, 1, 96, 1, 'Curabitur et venenatis sem.', 'https://www.youtube.com/watch?v=thds2ylDmQ0', '/img/video/551352_634331416604935_842741253_n.jpg', 3539, 9673, '2016-11-26 21:51:50'),
(199, 1, 65, 4, 'Aenean hendrerit imperdiet blandit.', 'https://www.youtube.com/watch?v=_gBnmKOixDM', '/img/video/379660_634326683272075_268544450_n1.jpg', 4428, 8407, '2016-12-24 01:20:56'),
(200, 1, 83, 4, 'Phasellus cursus feugiat velit, ut suscipit tellus vulputate non', 'https://www.youtube.com/watch?v=5nLXOk33jfQ', '/img/video/551352_634331416604935_842741253_n.jpg', 9523, 7781, '2016-12-19 07:10:50');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `concours`
--
ALTER TABLE `concours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_concours_equipe1_idx` (`equipe_id`);

--
-- Index pour la table `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`cle`);

--
-- Index pour la table `coups_de_coeur`
--
ALTER TABLE `coups_de_coeur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_coups_de_coeur_videos1_idx` (`videos_id`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `equipe_has_membres`
--
ALTER TABLE `equipe_has_membres`
  ADD PRIMARY KEY (`equipe_id`,`membres_id`),
  ADD KEY `fk_equipe_has_membres_membres1_idx` (`membres_id`),
  ADD KEY `fk_equipe_has_membres_equipe1_idx` (`equipe_id`);

--
-- Index pour la table `instruments`
--
ALTER TABLE `instruments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `niveaux`
--
ALTER TABLE `niveaux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `styles_musicaux`
--
ALTER TABLE `styles_musicaux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_pays_idx` (`pays_id`),
  ADD KEY `fk_users_niveaux1_idx` (`niveaux_id`);

--
-- Index pour la table `users_has_instruments`
--
ALTER TABLE `users_has_instruments`
  ADD PRIMARY KEY (`users_id`,`instruments_id`),
  ADD KEY `fk_users_has_instruments_instruments1` (`instruments_id`);

--
-- Index pour la table `users_has_styles_musicaux`
--
ALTER TABLE `users_has_styles_musicaux`
  ADD PRIMARY KEY (`users_id`,`styles_musicaux_id`),
  ADD KEY `fk_users_has_styles_musicaux_styles_musicaux1_idx` (`styles_musicaux_id`);

--
-- Index pour la table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_videos_users1_idx` (`users_id`),
  ADD KEY `fk_videos_concours1_idx` (`concours_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `concours`
--
ALTER TABLE `concours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `coups_de_coeur`
--
ALTER TABLE `coups_de_coeur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `instruments`
--
ALTER TABLE `instruments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `niveaux`
--
ALTER TABLE `niveaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;
--
-- AUTO_INCREMENT pour la table `styles_musicaux`
--
ALTER TABLE `styles_musicaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT pour la table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `concours`
--
ALTER TABLE `concours`
  ADD CONSTRAINT `fk_concours_equipe1` FOREIGN KEY (`equipe_id`) REFERENCES `equipe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `coups_de_coeur`
--
ALTER TABLE `coups_de_coeur`
  ADD CONSTRAINT `fk_coups_de_coeur_videos1` FOREIGN KEY (`videos_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `equipe_has_membres`
--
ALTER TABLE `equipe_has_membres`
  ADD CONSTRAINT `fk_equipe_has_membres_equipe1` FOREIGN KEY (`equipe_id`) REFERENCES `equipe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_equipe_has_membres_membres1` FOREIGN KEY (`membres_id`) REFERENCES `membres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_niveaux1` FOREIGN KEY (`niveaux_id`) REFERENCES `niveaux` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users_pays` FOREIGN KEY (`pays_id`) REFERENCES `pays` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users_has_instruments`
--
ALTER TABLE `users_has_instruments`
  ADD CONSTRAINT `fk_users_has_instruments_instruments1` FOREIGN KEY (`instruments_id`) REFERENCES `instruments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users_has_instruments_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users_has_styles_musicaux`
--
ALTER TABLE `users_has_styles_musicaux`
  ADD CONSTRAINT `fk_users_has_styles_musicaux_styles_musicaux1` FOREIGN KEY (`styles_musicaux_id`) REFERENCES `styles_musicaux` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users_has_styles_musicaux_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `fk_videos_concours1` FOREIGN KEY (`concours_id`) REFERENCES `concours` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_videos_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
