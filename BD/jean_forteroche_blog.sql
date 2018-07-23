-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 23 juil. 2018 à 03:44
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jean_forteroche_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_accreditation`
--

CREATE TABLE `t_accreditation` (
  `accreditation_id` int(11) NOT NULL,
  `accreditation_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_accreditation`
--

INSERT INTO `t_accreditation` (`accreditation_id`, `accreditation_level`) VALUES
(1, 'Admin'),
(2, 'Editor'),
(3, 'Author'),
(4, 'Moderator'),
(5, 'Contributor'),
(6, 'Member'),
(7, 'Guest');

-- --------------------------------------------------------

--
-- Structure de la table `t_accreditation_permissions`
--

CREATE TABLE `t_accreditation_permissions` (
  `id` int(11) NOT NULL,
  `accreditation_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_accreditation_permissions`
--

INSERT INTO `t_accreditation_permissions` (`id`, `accreditation_id`, `permission_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 14),
(15, 1, 15),
(16, 1, 16),
(17, 1, 17),
(18, 1, 18),
(19, 1, 19),
(20, 1, 20),
(21, 7, 1),
(22, 7, 2),
(23, 7, 3),
(24, 7, 5),
(25, 7, 8),
(26, 7, 14),
(27, 7, 15),
(28, 7, 17),
(29, 7, 19);

-- --------------------------------------------------------

--
-- Structure de la table `t_comment`
--

CREATE TABLE `t_comment` (
  `COM_ID` int(11) NOT NULL,
  `COM_DATE` datetime NOT NULL,
  `COM_AUTHOR` varchar(100) NOT NULL,
  `COM_CONTENT` varchar(200) NOT NULL,
  `BIL_ID` int(11) NOT NULL,
  `COM_FLAG` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_comment`
--

INSERT INTO `t_comment` (`COM_ID`, `COM_DATE`, `COM_AUTHOR`, `COM_CONTENT`, `BIL_ID`, `COM_FLAG`) VALUES
(34, '2018-07-23 03:33:16', 'Martin', 'Super musique !', 167, 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_permissions`
--

CREATE TABLE `t_permissions` (
  `permission_id` int(11) NOT NULL,
  `permission_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_permissions`
--

INSERT INTO `t_permissions` (`permission_id`, `permission_name`) VALUES
(1, 'Create Own Comment'),
(2, 'Read Any Comment'),
(3, 'Update Own Comment'),
(4, 'Update Any Comment'),
(5, 'Delete Own Comment'),
(6, 'Delete Any Comment'),
(7, 'Create Own Post'),
(8, 'Read Any Post'),
(9, 'Update Own Post'),
(10, 'Update Specific Post'),
(11, 'Update Any Post'),
(12, 'Delete Own Post'),
(13, 'Delete Any Post'),
(14, 'Create Own User'),
(15, 'Read Own User'),
(16, 'Read Any User'),
(17, 'Update Own User'),
(18, 'Update Any User'),
(19, 'Delete Own User'),
(20, 'Delete Any User');

-- --------------------------------------------------------

--
-- Structure de la table `t_post`
--

CREATE TABLE `t_post` (
  `BIL_ID` int(11) NOT NULL,
  `BIL_DATE` datetime NOT NULL,
  `BIL_TITLE` varchar(100) NOT NULL,
  `BIL_CONTENT` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_post`
--

INSERT INTO `t_post` (`BIL_ID`, `BIL_DATE`, `BIL_TITLE`, `BIL_CONTENT`) VALUES
(167, '2018-07-11 10:31:38', 'Un matin en Alaska', '<p style=\"text-align: center;\">Une musique d\'ambiance pour profiter des aurores bor&eacute;ales.</p>\n<p style=\"text-align: center;\"><iframe src=\"//www.youtube.com/embed/T75IKSXVXlc\" width=\"560\" height=\"314\" allowfullscreen=\"allowfullscreen\"></iframe></p>');

-- --------------------------------------------------------

--
-- Structure de la table `t_users`
--

CREATE TABLE `t_users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `inscription_date` date NOT NULL,
  `token_session` varchar(255) NOT NULL,
  `accreditation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_users`
--

INSERT INTO `t_users` (`id`, `username`, `password_hash`, `email`, `inscription_date`, `token_session`, `accreditation_id`) VALUES
(1, 'superadmin', '$2y$10$EnIlhDhNyJDc9kfCThED5Owht79dCE5szUQE64r6Ey5Ov2nHLjbdi', 'serve.emmanuel@gmail.com', '2018-06-13', '$2y$10$sjAEf/2uLkE4xu35tOHuh.3xMTAXM1KrgFJ.VACVP56CVAybdv8ou', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_users_temporary`
--

CREATE TABLE `t_users_temporary` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `inscription_date` date NOT NULL,
  `token_session` varchar(255) NOT NULL,
  `accreditation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_accreditation`
--
ALTER TABLE `t_accreditation`
  ADD PRIMARY KEY (`accreditation_id`);

--
-- Index pour la table `t_accreditation_permissions`
--
ALTER TABLE `t_accreditation_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_comment`
--
ALTER TABLE `t_comment`
  ADD PRIMARY KEY (`COM_ID`),
  ADD KEY `fk_com_bil` (`BIL_ID`);

--
-- Index pour la table `t_permissions`
--
ALTER TABLE `t_permissions`
  ADD PRIMARY KEY (`permission_id`);

--
-- Index pour la table `t_post`
--
ALTER TABLE `t_post`
  ADD PRIMARY KEY (`BIL_ID`);

--
-- Index pour la table `t_users`
--
ALTER TABLE `t_users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_users_temporary`
--
ALTER TABLE `t_users_temporary`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_accreditation`
--
ALTER TABLE `t_accreditation`
  MODIFY `accreditation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `t_accreditation_permissions`
--
ALTER TABLE `t_accreditation_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `t_comment`
--
ALTER TABLE `t_comment`
  MODIFY `COM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `t_permissions`
--
ALTER TABLE `t_permissions`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `t_post`
--
ALTER TABLE `t_post`
  MODIFY `BIL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT pour la table `t_users`
--
ALTER TABLE `t_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `t_users_temporary`
--
ALTER TABLE `t_users_temporary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_comment`
--
ALTER TABLE `t_comment`
  ADD CONSTRAINT `fk_com_bil` FOREIGN KEY (`BIL_ID`) REFERENCES `t_post` (`BIL_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
