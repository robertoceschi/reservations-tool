-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 11. Januar 2013 um 11:08
-- Server Version: 5.5.9
-- PHP-Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Datenbank: `ci_reservations_tool`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `category`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `court`
--

CREATE TABLE `court` (
  `court_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`court_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `court`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `duration`
--

CREATE TABLE `duration` (
  `duration_id` int(11) NOT NULL AUTO_INCREMENT,
  `start_time1` time NOT NULL,
  `end_time1` time NOT NULL,
  `start_time2` time NOT NULL,
  `end_time2` time NOT NULL,
  `weekday` enum('mon','tue','wed','thu','fri','sat','sun') DEFAULT NULL,
  `saison_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`duration_id`),
  UNIQUE KEY `main_event_id_UNIQUE` (`duration_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `duration`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `groups`
--

INSERT INTO `groups` VALUES(1, 'admin', 'Administrator');
INSERT INTO `groups` VALUES(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `login_attempts`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `saison_id` int(11) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`reservation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `reservation`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `saison`
--

CREATE TABLE `saison` (
  `saison_id` int(11) NOT NULL AUTO_INCREMENT,
  `year` date NOT NULL,
  `court_id` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`saison_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `saison`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `group` enum('admin','members') CHARACTER SET utf8 NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=90 ;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` VALUES(1, '\0\0', 'administrator', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'admin@admin.com', 'admin', NULL, NULL, NULL, NULL, 1268889823, 1357897094, 1, 'Admin', 'istrator', '234 AG', '--');
INSERT INTO `users` VALUES(25, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'kurt wallander', '8128fb47b9c84f071fedafd457b83934b74cff01', NULL, 'kurt@wallander.de', 'members', NULL, NULL, NULL, NULL, 1357115113, 1357115113, 1, 'Kurt', 'Wallander', 'Mankell Ag', '--');
INSERT INTO `users` VALUES(26, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'james bond', '7453bb68dfffa6dc24c156ab84881268f05022ac', NULL, 'james@bond.gb', 'members', 'cbc3351e06956db8370ab97154a820b1dc0c0489', NULL, NULL, NULL, 1357115382, 1357115382, 0, 'James', 'Bond', 'Mi6', '--');
INSERT INTO `users` VALUES(27, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'karin müller', 'bcb54d5581d6dca4cc09069f09a9e19254bfda63', NULL, 'karin@mueller.ch', 'admin', '3d3ee839a305e7ee3a6097fde095c61523352296', NULL, NULL, NULL, 1357115659, 1357115659, 0, 'Karin', 'Müller', 'Zuri', '--');
INSERT INTO `users` VALUES(30, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'diego maradona', '28aac5287c39abb48b9fba98a36732eee60aa6f8', NULL, 'diego@maradon.arg', 'members', NULL, NULL, NULL, NULL, 1357125289, 1357125289, 1, 'Diego', 'Maradona', 'Napoli SSC', '--');
INSERT INTO `users` VALUES(31, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'roger federer', '0badb490d693991eae9f6382ed14267e4632b095', NULL, 'roger@federer.com', 'admin', NULL, NULL, NULL, NULL, 1357125368, 1357125368, 1, 'Roger', 'Federer', 'Fedex Inc.', '--');
INSERT INTO `users` VALUES(32, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'novak djokovic', '7f45efd2e26c1efc321abfaed396571fe89cc9b9', NULL, 'nole@nole.srb', 'members', '020ce1de14ec5d2134d8de671708bf74ac7cf218', NULL, NULL, NULL, 1357125637, 1357125637, 0, 'Novak', 'Djokovic', 'Nole Inc.', '--');
INSERT INTO `users` VALUES(33, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'raffa nadal', 'f19e5cea209c8802b9986803ae20bae7bed6280b', NULL, 'raffa@nadal.com', 'admin', 'a3b550aa6cf2c3cc2a98c648bdf28babd1814a82', NULL, NULL, NULL, 1357125912, 1357125912, 0, 'Raffa', 'Nadal', 'Nadal', '--');
INSERT INTO `users` VALUES(34, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'steffi grf', '8b77c6ebc159ed54d5a97ffffc404845deaab136', NULL, 'steffi@graf.de', 'members', 'e45f5fff405237d63cdd287ac4a54036033a3701', NULL, NULL, NULL, 1357126008, 1357126008, 0, 'Steffi', 'Grf', 'Steffi iNc', '--');
INSERT INTO `users` VALUES(35, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'alex gustafson', 'e30d59463065a631e4c0030336e193265d4d0fc1', NULL, 'alexg@gus.com', 'members', '340e4be72f5520dff4e9be58870d35f9703d0d80', NULL, NULL, NULL, 1357132050, 1357132050, 1, 'Alexander', 'Gustafson', 'Alex', '1234567890');
INSERT INTO `users` VALUES(36, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'gabi sabi', '6b26dcb042ee1562a3465206f6f22136cd3425c1', NULL, 'gabi@sabi.arg', 'admin', 'fcd02ef2904c230e02ce58f5dc5cf7e7fd3bca34', NULL, NULL, NULL, 1357198912, 1357198912, 0, 'Gabi', 'Sabi', 'Saba', '--');
INSERT INTO `users` VALUES(40, '\0\0', 'santorini santo', '789133d2ce98a22e7ff538218865fc4acaa4d406', NULL, 'sali@sali.ch', 'admin', '879df91f77185a87e1c3ee06ad48bd84e395c8e0', NULL, NULL, NULL, 1357202430, 1357202430, 1, 'Santorini', 'Santo', 'sali', '--');
INSERT INTO `users` VALUES(41, '\0\0', 'samuel holgerson', '4fb4c797b0c0fe51e96e82a49d42ef673c574e90', NULL, 'sami@sami.de', 'admin', 'e10d74267e23b99510f2dd4f697c463864fd86e7', NULL, NULL, NULL, 1357204559, 1357204559, 0, 'Samuel', 'Holgerson', 'Sami', '--');
INSERT INTO `users` VALUES(42, '\0\0', 'gandalf gandu', 'dd41ebacc3e931a84f6fee2ed6a1b3e6b5053fa6', NULL, 'gandu@gandu.com', 'admin', '27eb8cc5eb80995df44fae7884c63c167ed3246b', NULL, NULL, NULL, 1357205008, 1357205008, 0, 'Gandalf', 'Gandu', 'Gandu', '--');
INSERT INTO `users` VALUES(43, '\0\0', 'bilbo baggins', '89064e336469fef2e392f00dc48aea6b64547ff7', NULL, 'bilbo@baggins.com', 'admin', '562fe4515916f0451d6844cd13f3477f244d2c01', NULL, NULL, NULL, 1357205215, 1357205215, 0, 'Bilbo', 'Baggins', 'Hobbit Inc', '--');
INSERT INTO `users` VALUES(44, '\0\0', 'toni fox', '3c3e506545f2f83f470ec263dc4902adbaf6c44f', NULL, 'toni@fox.com', 'admin', '076bc4244c260b9dc120efd37789e0427c4c4ed4', NULL, NULL, NULL, 1357205361, 1357205361, 0, 'Toni', 'Fox', 'Fox TV', '--');
INSERT INTO `users` VALUES(45, '\0\0', 'toni montana', 'c702e634ab079c336c4b7dd9fecfdf0ad2db9e99', NULL, 'toni@montana.ch', 'admin', NULL, NULL, NULL, NULL, 1357205525, 1357205525, 1, 'Toni', 'Montana', 'Montana', '--');
INSERT INTO `users` VALUES(46, '\0\0', 'thomas berdych', 'df7252c2862a037dfbff1721624e981c717f9fbf', NULL, 't@berdych.ch', 'members', NULL, NULL, NULL, NULL, 1357205636, 1357205636, 1, 'Thomas', 'Berdych', 'Thoma', '--');
INSERT INTO `users` VALUES(47, '\0\0', 'heinz hermann', '8788889ba92de285a177a1c4ff6a4ba55db9aa22', NULL, 'heinz@hermann.ch', 'admin', NULL, NULL, NULL, NULL, 1357206216, 1357206216, 1, 'Heinz', 'Hermann', 'GCZ', '--');
INSERT INTO `users` VALUES(48, '\0\0', 'vreni schneider', '26e0c7fdeb3beb9965e2b1c33acb3559a9c6510d', NULL, 'vreni@schneider.com', 'admin', NULL, NULL, NULL, NULL, 1357206638, 1357206638, 1, 'vreni', 'Schneider', 'Schneider', '--');
INSERT INTO `users` VALUES(49, '\0\0', 'diego benaglio', 'f1fa051fb6dbf159eea272bbe422c20de97b9db3', NULL, 'diego@benaglio.sg', 'members', NULL, NULL, NULL, NULL, 1357206760, 1357206760, 1, 'Diego', 'Benaglio', 'Wolfsburg', '0987896578');
INSERT INTO `users` VALUES(50, '\0\0', 'christiano ronaldo', '8016900f813138e9b0356b8179534cad6779d9d9', NULL, 'christiano@ronaldo.com', 'members', NULL, NULL, NULL, NULL, 1357207551, 1357207551, 1, 'Christiano', 'Ronaldo', 'Real Madrid', '--');
INSERT INTO `users` VALUES(51, '\0\0', 'claudio sulser', '705e64eb8060e8699f82087c05e2fb76e47e87f8', NULL, 'clausio@sulser.ti', 'members', '1decfe72807909044d857cd8c882b278ab175067', NULL, NULL, NULL, 1357211470, 1357211470, 0, 'Claudio', 'Sulser', 'GCZ', '--');
INSERT INTO `users` VALUES(52, '\0\0', 'diedier cuche', '449460cb80d8b6de0d8beb8965cb420adbe8e5f4', NULL, 'didier@cuche.ch', 'members', NULL, NULL, NULL, NULL, 1357212050, 1357212050, 0, 'Diedier', 'Cuche', 'Sali', '1234567890');
INSERT INTO `users` VALUES(53, '\0\0', 'anna seidel', 'c20609733bf2920954acee4b0459632c3ff67d89', NULL, 'anna@seidel.com', 'members', NULL, NULL, NULL, NULL, 1357212549, 1357212549, 1, 'Anna', 'Seidel', 'Anna', '--');
INSERT INTO `users` VALUES(54, '\0\0', 'schorsch gaggo', '16a6acb6a2bf7434894fe6e380f0e71236feb8fc', NULL, 'schorsch@gaggo.com', 'admin', NULL, NULL, NULL, NULL, 1357212631, 1357212631, 1, 'Schorsch', 'Gaggo', 'Gaggo', '--');
INSERT INTO `users` VALUES(55, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'sepp meier', '75a619878bec7c0d0daf00e664524ee5886c17f1', NULL, 'sepp@meier.ch', 'members', NULL, NULL, NULL, NULL, 1357551473, 1357551473, 1, 'Sepp', 'Meier', 'PTT', '1234567890');
INSERT INTO `users` VALUES(56, '\0\0', 'karla späni', '2d9104e2e00c3dda4e458a94a16a8e8758854fb0', NULL, 'karla@spaeni.ch', 'admin', NULL, NULL, NULL, NULL, 1357553180, 1357553180, 1, 'Karla', 'Späni', 'Bund', '--');
INSERT INTO `users` VALUES(59, '\0\0', 'sarah todesco', 'a58d34224b12d28578b2f4f3d0aebed53194b73f', NULL, 'sarah@todesco.ch', 'admin', NULL, NULL, NULL, NULL, 1357558306, 1357558351, 1, 'Sarah', 'Todesco', 'Sarah', '--');
INSERT INTO `users` VALUES(60, '\0\0', 'frank zappa', 'a8a4ed55f90e78d08501e27f61279c3e5c15062c', NULL, 'frank@zappa.com', 'members', NULL, NULL, NULL, NULL, 1357558928, 1357558941, 1, 'Frank', 'Zappa', 'Zappa Inc', '--');
INSERT INTO `users` VALUES(61, '\0\0', 'roger berbig', 'e148780f76af70a5332a75af313f032289075ff9', NULL, 'roger@berbig.com', 'members', NULL, NULL, NULL, NULL, 1357561992, 1357561992, 1, 'roger', 'berbig', 'gcz', '--');
INSERT INTO `users` VALUES(62, '\0\0', 'andy murray', 'bf7db645e200881c47b629984bf7142b67ee3b07', NULL, 'andy@murray.gb', 'admin', NULL, NULL, NULL, NULL, 1357563845, 1357563845, 1, 'Andy', 'Murray', 'Andy Murray', '1234567890');
INSERT INTO `users` VALUES(63, '\0\0', 'kurt felix', '4a25f1ac3e85d46616cf809c46ad7f7560953a3a', NULL, 'kurt@felix.com', 'members', NULL, NULL, NULL, NULL, 1357564222, 1357564222, 1, 'Kurt', 'Felix', 'Teleboy', '--');
INSERT INTO `users` VALUES(75, '\0\0', 'gabi sabi1', '08c74bcb3c85117a6d4ff95e3571fb395b1f4728', NULL, 'gabi@sabi.com', 'members', '4f532287141993e664cd7d0127d3a43194b0aade', NULL, NULL, NULL, 1357569946, 1357569946, 0, 'Gabi', 'Sabi', 'Gabi AG', '--');
INSERT INTO `users` VALUES(76, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'robi ginepry', '33572285fb8fb2938cad836d84b1c1eb99d98420', NULL, 'robertoceschi@parobri.ch', 'members', NULL, NULL, NULL, NULL, 1357635935, 1357636020, 1, 'Robi', 'Ginepry', 'Gino', '--');
INSERT INTO `users` VALUES(77, '\0\0', 'toni montana1', '7060da49a1681fcb7cfcc8236488d524e7f06111', NULL, 'toni@montana.com', 'members', 'b3e25ab8d8b1331de980874b92a03c29fd9ff62f', NULL, NULL, NULL, 1357640304, 1357640304, 0, 'Toni', 'Montana', 'Montana Inc', '0762453478');
INSERT INTO `users` VALUES(78, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'christian  khedira', 'd113c1dba0a3d819466b7774b244e50513fc04c4', NULL, 'chr@khedira.it', 'members', NULL, NULL, NULL, NULL, 1357641359, 1357641359, 1, 'Christian ', 'Khedira', 'Real Madrid', '1234567890');
INSERT INTO `users` VALUES(79, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'mesut oezil', 'a45df1c40167b08a8f410a2ecab9663c092e5302', NULL, 'mesut@real.de', 'members', NULL, NULL, NULL, NULL, 1357641453, 1357641453, 1, 'Mesut', 'Oezil', 'Real Madrid', '2123456789');
INSERT INTO `users` VALUES(80, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'zinedine zidan', '6198135d3a59dbb41fbf0734867b30bd3ddfa2af', NULL, 'zizou@zidan.fr', 'members', 'd8cf9a8169df0e0d03bff5f70e848b50d543120c', NULL, NULL, NULL, 1357641766, 1357641766, 0, 'Zinedine', 'Zidan', 'Zizou', '1234567890');
INSERT INTO `users` VALUES(82, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'sandy riviera', 'c98e0e2db396ba90029183aac43d5698c95b35ed', NULL, 'sandy@riviera.com', 'members', NULL, NULL, NULL, NULL, 1357655513, 1357655513, 1, 'Sandy', 'Riviera', 'Sandy', '1234567890');
INSERT INTO `users` VALUES(83, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'nils holgerson', '0a1809e3488d56d9d12c9cf6fa81899849bf70da', NULL, 'nils@holgerson.com', 'members', NULL, NULL, NULL, NULL, 1357655817, 1357655817, 1, 'Nils', 'Holgerson', 'Nils Inc', '1234567890');
INSERT INTO `users` VALUES(84, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'roberto ceschi', 'eae87fcd549d584cd0bc548c1c05ce6551404e3c', NULL, 'robertoceschi@gmail.com', 'members', NULL, NULL, NULL, NULL, 1357656084, 1357897059, 1, 'roberto', 'Ceschi', 'Santo', '1234567890');
INSERT INTO `users` VALUES(85, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'rosi meier', '48ceee816263babde608a4d9f5a051476f2b296d', NULL, 'rosi@meier.com', 'admin', '22d4f221a237e86f00f2547ae5fb4308c1ddc222', NULL, NULL, NULL, 1357841493, 1357841493, 0, 'Rosi', 'Meier', 'Rosi', '1234567890');
INSERT INTO `users` VALUES(86, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'hugo lörtscher', 'c7c41815acd17f5d3c331bc317eecee7a57b5e1f', NULL, 'hugo@loets.ch', 'members', '30af9cf8c9d4a2663a935f4b53a6c4e699e1ae89', NULL, NULL, NULL, 1357841603, 1357841603, 0, 'Hugo', 'Lörtscher', 'Hugo', '1234567890');
INSERT INTO `users` VALUES(87, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'charlotte susa', '2f03a1d37ddb627cac15e7205f2e919b8a34919f', NULL, 'char@susa.com', 'admin', 'dc070cb19cdeec129208cfb648df28b9de22daa0', NULL, NULL, NULL, 1357841874, 1357841874, 0, 'Charlotte', 'Susa', 'Susa', '1234567890');
INSERT INTO `users` VALUES(88, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'gianna nannini', 'b87e0c1c3e50cb1c386b2106600219425d92cc30', NULL, 'gianna@nannini.it', 'admin', NULL, NULL, NULL, NULL, 1357844995, 1357844995, 1, 'Gianna', 'Nannini', 'Gianna', '1234567890');
INSERT INTO `users` VALUES(89, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'john travolta', '13cba0efcc43755745ca4ab1b145a94683df7117', NULL, 'john@travolta.com', 'admin', '223410c6abc79bf884d47617fd8a4938630be30f', NULL, NULL, NULL, 1357888030, 1357888030, 0, 'John', 'Travolta', 'Travolta', '1234567890');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users_groups`
--

CREATE TABLE `users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

--
-- Daten für Tabelle `users_groups`
--

INSERT INTO `users_groups` VALUES(1, 1, 1);
INSERT INTO `users_groups` VALUES(2, 1, 2);
INSERT INTO `users_groups` VALUES(26, 25, 2);
INSERT INTO `users_groups` VALUES(27, 26, 2);
INSERT INTO `users_groups` VALUES(28, 27, 2);
INSERT INTO `users_groups` VALUES(31, 30, 2);
INSERT INTO `users_groups` VALUES(32, 31, 2);
INSERT INTO `users_groups` VALUES(33, 32, 2);
INSERT INTO `users_groups` VALUES(34, 33, 2);
INSERT INTO `users_groups` VALUES(35, 34, 2);
INSERT INTO `users_groups` VALUES(36, 35, 2);
INSERT INTO `users_groups` VALUES(37, 36, 2);
INSERT INTO `users_groups` VALUES(41, 40, 2);
INSERT INTO `users_groups` VALUES(42, 41, 2);
INSERT INTO `users_groups` VALUES(43, 42, 2);
INSERT INTO `users_groups` VALUES(44, 43, 2);
INSERT INTO `users_groups` VALUES(45, 44, 2);
INSERT INTO `users_groups` VALUES(46, 45, 2);
INSERT INTO `users_groups` VALUES(47, 46, 2);
INSERT INTO `users_groups` VALUES(48, 47, 2);
INSERT INTO `users_groups` VALUES(49, 48, 2);
INSERT INTO `users_groups` VALUES(50, 49, 2);
INSERT INTO `users_groups` VALUES(51, 50, 2);
INSERT INTO `users_groups` VALUES(52, 51, 2);
INSERT INTO `users_groups` VALUES(53, 52, 2);
INSERT INTO `users_groups` VALUES(54, 53, 2);
INSERT INTO `users_groups` VALUES(55, 54, 2);
INSERT INTO `users_groups` VALUES(56, 55, 2);
INSERT INTO `users_groups` VALUES(57, 56, 2);
INSERT INTO `users_groups` VALUES(60, 59, 2);
INSERT INTO `users_groups` VALUES(61, 60, 2);
INSERT INTO `users_groups` VALUES(62, 61, 2);
INSERT INTO `users_groups` VALUES(63, 62, 2);
INSERT INTO `users_groups` VALUES(64, 63, 2);
INSERT INTO `users_groups` VALUES(76, 75, 2);
INSERT INTO `users_groups` VALUES(77, 76, 2);
INSERT INTO `users_groups` VALUES(78, 77, 2);
INSERT INTO `users_groups` VALUES(79, 78, 2);
INSERT INTO `users_groups` VALUES(80, 79, 2);
INSERT INTO `users_groups` VALUES(81, 80, 2);
INSERT INTO `users_groups` VALUES(83, 82, 2);
INSERT INTO `users_groups` VALUES(84, 83, 2);
INSERT INTO `users_groups` VALUES(85, 84, 2);
INSERT INTO `users_groups` VALUES(86, 85, 2);
INSERT INTO `users_groups` VALUES(87, 86, 2);
INSERT INTO `users_groups` VALUES(88, 87, 2);
INSERT INTO `users_groups` VALUES(89, 88, 2);
INSERT INTO `users_groups` VALUES(90, 89, 2);
