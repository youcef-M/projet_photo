-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Mer 11 Février 2015 à 10:01
-- Version du serveur: 5.5.40-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `c9`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comments_posts1_idx` (`post_id`),
  KEY `fk_comments_users1_idx` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `follow`
--

CREATE TABLE IF NOT EXISTS `follow` (
  `id_follower` int(11) NOT NULL,
  `id_followed` int(11) NOT NULL,
  PRIMARY KEY (`id_follower`,`id_followed`),
  KEY `fk_follow_users1_idx` (`id_followed`),
  KEY `fk_follow_users2_idx` (`id_follower`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `id_demandeur` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_demandeur`,`id_user`),
  KEY `fk_friends_users1_idx` (`id_demandeur`),
  KEY `fk_friends_users2_idx` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `created` varchar(45) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_groups_users1_idx` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id_group` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `active` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_group`,`id_user`),
  KEY `fk_member_users1_idx` (`id_user`),
  KEY `fk_member_groups1_idx` (`id_group`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT NULL,
  `description` longtext,
  `chemin` varchar(255) DEFAULT NULL,
  `privacy` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `note_totale` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_posts_users1_idx` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `restrict_group`
--

CREATE TABLE IF NOT EXISTS `restrict_group` (
  `post_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`,`group_id`),
  KEY `fk_restrict_group_groups1_idx` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `restrict_user`
--

CREATE TABLE IF NOT EXISTS `restrict_user` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`,`user_id`),
  KEY `fk_restrict_user_users1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `active`, `token`, `created_at`, `updated_at`) VALUES
(1, 'youcef', '$2y$10$ZziYx8ch83Jq20uEs3FOnutn/F/S8nOKAM/QFpXJOhiSRUqIVp5Fq', 'youcef@c9.io', 1, '', NULL, NULL),
(2, 'mathieu', '$2y$10$yP321WDw5uKbdMgY/X2VtejVWlhy9OfBWDCpwg/Av3ItGLWizV7TW', 'mathieu@c9.io', 1, '', NULL, NULL),
(3, 'benjamin', '$2y$10$.d8dWhbDbMa0j53Kp0.xhO37wGG0L194Rq1DcjvtPQmWYqLp6I79O', 'benjamin@c9.io', 1, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE IF NOT EXISTS `vote` (
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `note` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`post_id`),
  KEY `fk_notes_users1_idx` (`user_id`),
  KEY `fk_notes_posts1_idx` (`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
