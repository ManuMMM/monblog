-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 13 juin 2018 à 13:32
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
(1, '2018-05-16 18:09:12', 'A. Nonyme', 'Bravo pour ce début', 1, 0),
(2, '2018-05-16 18:09:12', 'Moi', 'Merci ! Je vais continuer sur ma lancée', 1, 0),
(3, '2018-05-16 18:10:54', 'Sherlock Holmes', 'I\'ll give you a hint ^^', 1, 0),
(4, '2018-05-16 18:19:26', 'Tim', 'Génial !', 1, 0),
(5, '2018-05-16 21:18:50', 'Hector', 'Bon courage :)', 1, 0),
(6, '2018-05-21 14:55:07', 'Test date comment', 'Suspenseeeee ...c\'est ?', 1, 0),
(7, '2018-05-22 02:50:39', 'Roger', 'Quand le 2nd ?', 1, 0),
(8, '2018-05-22 03:17:06', 'Roger', 'Alors ?', 1, 0),
(9, '2018-05-23 09:50:48', 'Paul', 'Test with Autoloader again', 1, 0),
(10, '2018-05-23 09:52:07', 'Tim', 'Toujours', 1, 0),
(12, '2018-05-23 23:29:16', 'Martin', 'La tomate !', 1, 0),
(13, '2018-05-25 00:17:26', 'Martin', 'Autoloader completed', 1, 0),
(14, '2018-05-25 04:11:50', 'Martin', 'Oui !', 2, 0),
(20, '2018-05-28 15:37:19', 'fff', 'fffddd', 2, 0),
(21, '2018-05-28 16:03:14', 'Max', 'Super !', 50, 0),
(22, '2018-05-30 12:06:59', 'bf', 'bf', 2, 0),
(23, '2018-05-30 12:07:03', 'bfff', 'fbbffb', 2, 0),
(24, '2018-05-30 12:07:06', 'ddddddddd', 'dddd', 2, 0),
(25, '2018-05-30 12:07:10', 'tttttttttt', 'ttttttttt', 2, 0),
(26, '2018-06-03 13:19:39', 'Test', 'réussi !', 2, 0),
(27, '2018-06-03 16:09:31', 'Test', 'test', 2, 0),
(28, '2018-06-03 16:09:44', 'Retest', 'retest', 2, 0),
(29, '2018-06-03 17:02:07', 'fff', 'fff', 2, 0),
(30, '2018-06-03 17:03:15', 'fff', 'fff', 2, 0),
(31, '2018-06-03 17:36:02', 'Moi', 'Il marche bien l\'éditeur Tinymce !', 70, 0),
(35, '2018-06-08 23:50:50', 'vvvv', 'vvr\r\n\r\nree', 82, 0),
(36, '2018-06-08 23:55:19', 'Martin', 'ff\r\nff\r\n\r\nrr', 82, 0),
(37, '2018-06-08 23:55:29', 'fff', '\r\n\r\n\r\n\r\n\r\n\r\n\r\nffff', 82, 0),
(38, '2018-06-09 00:02:07', 'Yoooooooooo', '   \r\n\r\nyyy\r\n\r\n\r\n   ', 82, 0),
(39, '2018-06-09 00:21:57', 'popoop', 'p\'rtty et \"etre\" ou juste \' \" \'', 82, 0),
(40, '2018-06-09 00:23:28', 'Martin', 'dadad \' et \" dadada', 82, 0),
(41, '2018-06-09 00:41:16', '2323', '\r\n     nnn   \r\n\r\nppp^^^  \'\'\'   \r\n\r\n\r\n\"\"  ffe  \r\n\r\n\r\n\r\n', 82, 0),
(42, '2018-06-09 00:41:36', '13', 'mmm\r\nmmm\r\nmmm\r\nmmm', 82, 0),
(43, '2018-06-09 00:44:39', 'Martin', '\r\n\r\nzzz\r\n\r\nzzz\r\n\r\nzzz\r\n\r\n', 82, 0),
(44, '2018-06-12 17:33:32', 'O\'brien', 'yup !   \r\n\r\n\r\n\r\n\r\nv', 82, 0),
(45, '2018-06-12 17:34:13', 'Tab \" yup', '\r\n\r\n\r\n\r\n\r\n\r\nccc    Ok   \r\n\r\n\r\n\r\nc\r\n\r\n\r\n', 82, 0);

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
(1, '2018-05-16 18:09:12', 'Premier billet', 'Bonjour monde ! Ceci est le premier post sur mon blog.'),
(2, '2018-05-16 18:09:12', 'Au travail', 'Il faut enrichir ce blog dès maintenant.'),
(48, '2018-05-28 15:43:10', 'Maison', 'la première brique verte'),
(49, '2018-05-28 15:51:35', 'La deuxième brique de la maison', 'Mortier et ferraille'),
(50, '2018-05-28 15:52:22', 'Fête de la musique', 'Cette année, elle aura lieu sur la place de la mairie'),
(51, '2018-05-28 15:53:32', 'Rénovation de chaussée', 'La rue Berlioz sera fermée à la circulation pour cause de rénovation de voirie, et ce, pour quatre semaines.'),
(70, '2018-06-03 17:32:35', 'Maiiiiiiis bien sûr', '<h1 style=\"text-align: center;\">La for&ecirc;t</h1>\r\n<p style=\"text-align: center;\"><em>Au</em> temps<strong> pour</strong> moi</p>\r\n<blockquote>\r\n<p style=\"text-align: center;\">Une citation</p>\r\n</blockquote>\r\n<p style=\"text-align: left;\"><span style=\"text-decoration: line-through;\">Poison</span></p>\r\n<p style=\"text-align: left;\"><code>&lt;div&gt;&lt;p&gt;Test&lt;/p&gt;&lt;/div&gt;</code></p>'),
(71, '2018-06-03 17:57:46', 'Image test', '<p><img src=\"https://steamcdn-a.akamaihd.net/steam/apps/367570/header.jpg\" alt=\"\" width=\"460\" height=\"215\" /></p>'),
(76, '2018-06-03 18:53:51', 'Lmo', '<figure class=\"image\" style=\"text-align: center;\"><img style=\"width: 71px; height: 124px;\" src=\"http://www.babaloons.com/nocalcharacters/images/lmo.JPG\" alt=\"Lmo\" width=\"185\" height=\"323\" />\r\n<figcaption>Weird</figcaption>\r\n</figure>\r\n<p style=\"text-align: left;\">&nbsp;</p>'),
(77, '2018-06-03 19:13:16', 'Test video', '<p><iframe src=\"//www.youtube.com/embed/ArCqlpGVcIs\" width=\"560\" height=\"314\" allowfullscreen=\"allowfullscreen\"></iframe></p>'),
(78, '2018-06-03 21:12:46', 'Test', '<p><span style=\"font-size: 72pt;\">non</span></p>'),
(82, '2018-06-04 00:04:36', 'Test code php', '<p>Bonjour,</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<pre class=\"language-php\"><code>&lt;?php $this-&gt;title = \'Jean Forteroche\'; ?&gt;\r\n\r\n&lt;p&gt;An error has occurred : &lt;?= $msgError ?&gt;&lt;/p&gt;</code></pre>');

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
(1, 'superadmin', '$2y$10$EnIlhDhNyJDc9kfCThED5Owht79dCE5szUQE64r6Ey5Ov2nHLjbdi', 'serve.emmanuel@gmail.com', '2018-06-13', '$2y$10$OQixWI3cAQ6CU8kXocoXkOhTlkRlOBbi/mzxfWZk.j.NDvoUx0d5C', 7);

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
  MODIFY `COM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `t_permissions`
--
ALTER TABLE `t_permissions`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `t_post`
--
ALTER TABLE `t_post`
  MODIFY `BIL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT pour la table `t_users`
--
ALTER TABLE `t_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
