-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 20 juin 2018 à 10:57
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
(45, '2018-06-12 17:34:13', 'Tab \" yup', '\r\n\r\n\r\n\r\n\r\n\r\nccc    Ok   \r\n\r\n\r\n\r\nc\r\n\r\n\r\n', 82, 0),
(46, '2018-06-17 03:32:13', 'uu', 'uu', 82, 0),
(47, '2018-06-17 03:32:48', 'uu', 'uu', 78, 0);

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
(1, 'superadmin', '$2y$10$EnIlhDhNyJDc9kfCThED5Owht79dCE5szUQE64r6Ey5Ov2nHLjbdi', 'serve.emmanuel@gmail.com', '2018-06-13', '$2y$10$ADRq/Vq9DI.fZn0U06CP2ex0otTRMEUkF/LaQzfJ.8XwM9nOZAr.6', 1),
(2, 'Testemail background 11', '$2y$10$GdA0L9cgeE4K9bz6j6sqY..JPobrNJgFNPUIcSmCPMLW1zPkOX2ti', 'serve.emmanuel@gmail.com', '2018-06-19', '', 7),
(3, 'Testemail background 12', '$2y$10$GOSVCWikY0910.CAqDstSeCmp2FCfFIhLf2s4/3XrOjV1H/0g.mKq', 'serve.emmanuel@gmail.com', '2018-06-20', '', 7),
(4, 'Testemail background 13', '$2y$10$pF2gk74rdCrb85hVaHTOs.96l6l04MsL3Osu6PYjS9Sk24bBmx0RW', 'serve.emmanuel@gmail.com', '2018-06-20', '', 7),
(5, 'Testemail background 14', '$2y$10$N/DO06JQy0WmsrI1GH3rGuowLZR987LkK.9fZwSBenxas8vQPP2Zm', 'serve.emmanuel@gmail.com', '2018-06-20', '', 7),
(6, 'Testemail background 15', '$2y$10$acnk5jDC2Vi3PQMbrVcIf.V/rmVMdf1uF9hNLDw96zbDnRQwfi5Ve', 'serve.emmanuel@gmail.com', '2018-06-20', '', 7),
(7, 'Testemail background 16', '$2y$10$fBKp1lntjNY8nPNyNa5pm.eVrrGouifN.HesRJ7.HckgdTiVpuyKy', 'serve.emmanuel@gmail.com', '2018-06-20', '', 7),
(8, 'Testemail background 17', '$2y$10$1YyyRdgpS.kt8DGNST6vYewx6Slfl1lvAwNfglcyJF7EQcLw6mtYS', 'serve.emmanuel@gmail.com', '2018-06-20', '', 7);

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
-- Déchargement des données de la table `t_users_temporary`
--

INSERT INTO `t_users_temporary` (`id`, `username`, `password_hash`, `email`, `inscription_date`, `token_session`, `accreditation_id`) VALUES
(1, 'cc', '$2y$10$Rm0WdvntgU.TPkK5HPrbv.oXo34lpIIsJkQUSGttLhuJVljJPDEs2', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$xnp73Fi9rlm7RKA26mmiiuXcU5XyKeO1c6ZgSMHKap/QVcLAKzEtW', 7),
(2, 'cc', '$2y$10$xhR4UsjylpjXfwrVHC82lOh4tyevVEnw.BkzplAKqaeOAvZfaGvfK', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$fS356TbPAejZy7Q1XUC5NeyrwBbSrUAaACV0k4iaq0UEZ0bKSXDlu', 7),
(3, 'JF', '$2y$10$cxRcS3ZLcFexgn/Zn3aYYOsjgwPFuD7a.4PCEgceBcFu1TLq8lA0u', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$qg9sHZApgba9Jcn4sPn1oeSyfxXTiQj.4QWn5c0iy/bi50eOM8d2W', 7),
(4, 'JF', '$2y$10$Mbf4iLqysFH/bycjQ.N8h.2QMzo6reY9HpbhVkaRFqOpnkbNk6206', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$QXPXkhob/l2Pin5Ka58HduOwSvzb630pzI5EBGhmfs3oz3s50WQyi', 7),
(5, 'cc', '$2y$10$P4TylnS1Ln0kPMw4HQNRGOTBrPNxN9JCMZap88F1IZNdYHPvPNnnq', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$3sF9qAuFGCWm02.o9ch3pu3PGXoGzLZZIZZ5.6EEgejKnB9RSu5ri', 7),
(6, 'xx', '$2y$10$j67n9YOc/qotZoudaiOScuJkcqVT5l6EQvCkaxzMkSMhER1d9vTZG', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$BWpOFNThXl8sRAzROvvvaOzjNqz.sp6qiDF/QW3gpnKzpu8bjespy', 7),
(7, 'cc', '$2y$10$R.2VsVUIScS55C5Iihmyp.N2pbyvEpo3rwG5Ky641hsT61d05/HzG', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$jkp9457tr8mr62IcGz8DW.wpoJjT3RZKmSBunp0yhnfxW8AvV0W.C', 7),
(8, 'cc', '$2y$10$LIMa8jDK6lmmjBKQjLLCieHcFrxlvJhnn./OiltEbf0kqgcpl2TJ.', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$Eo5mH6Hr6ANET.m6eTVOc.rcgaxszQwx9.7VLADIPmbjJ9lIJBrpO', 7),
(9, '     ', '$2y$10$M3TKMo8qZa2xFudqLGd6ROowSo61nX3PNLKIlwlw74G1nLAetJQQy', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$hdjzIIC6W22rzHPpID1ce.9LCIBUkk3zLEianMqi.iTKj7IQfwvcG', 7),
(10, '  cc', '$2y$10$lSL8Xtyc01NuEpsI.TF2ceZVonIJDu8sLb2H7lQvDzKQxuanPnfwq', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$S6DDSm6phIOIf9KX6qhJ/e1iwFiVQeGeL3hj9sdiXTMYJ18inhb6q', 7),
(11, 'xx', '$2y$10$PxiBs0/t.g7VsaNMsYPUgefdRHFhPS1xlyPXH8WTXdsilby/dJ5Gu', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$MpL6hUWQuiK5lvsijY.hxeSb8BD92pYsVFfAK88rSJOBk83H7QAWm', 7),
(12, 'vv', '$2y$10$3gu5CYCCXLmp5UfTvbP9zuSpDZUb/OIu7l6opVS1xdOesoRNX/Jdi', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$WPYCmRPPEIkbiJcFXDMYUuWyokP/HhJekcazukgvN8Bm5NORJOlZ.', 7),
(13, 'cc', '$2y$10$IIHoMa7e1rUBz6Lzc8X16eMV1RiqCnnmqjTCxCxwwfvY1kSpqiSAS', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$pcGpRWZMyrMkATBY3crRne2vSc6jIqZDiQw04W8ZPc5BW9vYJewcm', 7),
(14, 'cc', '$2y$10$F0XEN0wBV4GuvOStjJrEmO/H4PzX3FvtNOTfXEyyIfuvD4dDrv.tG', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$5VtKB7kGSMUHsxvrZmBZaejwxCmEfRC5s9J3D1S82UydTs53kbeA.', 7),
(15, 'cc', '$2y$10$y.BYNFRL1X0q0jRpe.Ni0uDkEsv6jqVVCbx7oobD4BDOgQWoyImgC', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$A7SXICu5Uyl5x.ggIWTQauVopWdAZI67pJFbZdynksu16Ff9igaIa', 7),
(16, 'cc', '$2y$10$LGzUYROIIWp2Z6po1TTPHeeXfXo8riqDJ6d4EN9/.uvVuxKfPk5B2', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$b9hPJ3aHEmPaBOo86lMn0OYbUxLtX/RDLqCWLDHSLCbtO/myd3EFi', 7),
(17, 'cc', '$2y$10$gPSXP7WVPbxSkJFoTh0Ck.oRza8HzQ788T1ZECbtrY7rEUvYZebyK', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$6akml6HvoK9FXaeSQOd3Dulx5zETrIvy.qBub8YnTJJG9GUNZX1Fu', 7),
(18, 'Testemail', '$2y$10$Iw1qo1Bd8dmF3qoVSp/BIeyQSMgSSvSxaDx9YwUbc6e7fgkrCL2Bm', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$RASLefBjYSr8BZPUB6WM4OQwgZ6bAenEeQX5jRz/mbTO7Ds3YTPjm', 7),
(19, 'cc', '$2y$10$Zto8eLaKSoYeOudjnTyLRO.aJQZXDJDi5CjgXt5pyqA67Hb6RSAx.', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$2TqYKwyNCjjaw0fmdKhT.eVMPgp6rBU//VRd3LytECLphEYNbOSq.', 7),
(20, 'cc', '$2y$10$1a3zET27LJ6MvL3Sp/jRj.vVbeIjfvd.uIMuukpbJn.wNUjUUH3lq', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$XifkvGJbWvtffu.nZEnRVuC4NuD7uk1P4P9Iji.GXx0OI2mw9bRui', 7),
(21, 'cc', '$2y$10$ppc4gxobRJxYXgHbHz39Aebmd5axrnHbiZzdyfLx.5E53DIv3D4le', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$G1hPbgtG7XUvJG1DmF.JU.O5afPK11hW77sTIcC34EmNZI7Nf6oXy', 7),
(22, 'cc', '$2y$10$Z37YTVKact5AKorP./UdR.No/IKoXzWyjZmFLS8Fn9msZLTKPYoPW', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$r8zYbmtsSaazju6hvvm2AuAnhAXTvHSrpWplXwhX6TdTJf1utvqR6', 7),
(23, 'ff', '$2y$10$g3GKd9OUTqymhTtyRhtwReZo8ZihQcIbKFxve75QUC9LdRjr3vCMG', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$UWaWaPTCDh/L1fGfE2YJ6ODTfeQvX3mXuVjy8qiY0zixqSO6C5RKO', 7),
(24, 'xx', '$2y$10$hZihKFDeL8tVK8tq5/NVu.32bY8OjCkjWtADtZIL64RcnBV4.zySu', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$u5Y1MFiTtrO2/5Z2LkbeT.0IcdoZ84r56y/p/OGAsIbQINSotUvkC', 7),
(25, 'cc', '$2y$10$owPHc.eE2pO7P3Vj/m9Jouc.xvKwsRW.092Yk3hy/qv7c.2nRv4KW', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$lchtYH8sv5l6GFGQEwz2VeCQRPhTJFNRaJ2DXmlo05BqzgCI0Gmqq', 7),
(26, 'cc', '$2y$10$2vjfOr.ruRvOihIdWfsiRe5S91/vPZcSn7K793405kCwN8n3v6oo.', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$WBoBVPM8k3lGa2vjjK6ACOssXPr8SNqwVCDSOqseQyNdIiYDoGdnK', 7),
(27, 'cc', '$2y$10$FxpS5Z1mf08g0xIDaRQs0OLlbXrHs5M45ZcxvBYTXQVnZpjpHUkZ.', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$I6ff9eL02ehY.nKlbooLaOVOJKX45iJecet6zOXDckKLzlYMdlUFm', 7),
(28, 'cc', '$2y$10$AUzEUTzWxUwN74uniulXKO1dwrBYHPiVXocSuFwdexalbJpGOSLXS', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$YxyLQ4XAVgdi6Ast7xAaeeapX/AwUXVsn3tuclotiNi4PMhJCC5l6', 7),
(29, 'ss', '$2y$10$wukecNfTCkGULEo36KDa9emU4bemoMI6Uy85no18pCprX2kcKF9fm', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$o24hZNSaSa8EetpQkxiSB.N4yjN2uHHOWuolH3apI9DUw4zpkInEu', 7),
(30, 'Testemail', '$2y$10$6faeI3/8VknxWDNyLMIzDea0QIn9zjh5dipf2n/N/uA01vY43HB1y', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$2.Q8WuZdAbq7Y0t8gfS6FunKzSY6dxtmznhNLI5GtaFVbKXtlNMyu', 7),
(31, 'Testemail background', '$2y$10$1jUplxmArlewBflRR9Uw5e3f9QFJD4UyOCwCgTPMVdf03WmZo8FMu', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$Nm0bSGokzNDPxuzt/2iWr.OgHSzq3W7q/F7nRFbR/QJ7tMzZQBZqS', 7),
(32, 'Testemail background 2', '$2y$10$QitXrmzdbt6EhYXgfApq/OY0Ha5MYcBJaqrRRJxIfXxsLOExYuMXG', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$ZprbV8w9Vltq6oBo9BOODeFpVMD37OnXYGCzLrdeg2f8HQ6oPPKV6', 7),
(33, 'ddte', '$2y$10$AxVhG2wEIN0KxNuJtcpjJeSo45atw.TQKbfWnQnNFNf0lC7mJMLC.', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$YP8F3u1kY69SWezjH0KjleZ1YWKCztLJYhSOKDX1wucI7Ch7eSxJe', 7),
(34, 'dd', '$2y$10$tSybOg.KYO/6OBnyUJnhM.PF99exi9K8k12X1Awg9T39anlMnVDZ.', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$vlYDMlbUTHsdIF4ZVBmkB.AOgQfUAYgUcTpFy.ENWWes5vw3BuJfi', 7),
(35, 'xx', '$2y$10$scHvGiGdP62H9Vqg5CqpL.9na1F/lgsjkVc7o.WOAZHsBrtr60bLe', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$95.OKU9mt/iABS0t890xQ.8frTRR9WR1qKEmc1Z8dAtXyiEP9Q4gy', 7),
(36, 'JF', '$2y$10$CmRXNrzZpPuzhokqsr0.7uLGWcAcntOF.rNE1gTn29crHUP6hVibi', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$SfqH9vMU6HvEWjstg4Jyo.KT5eYWU81f/AFXpFmJYgmVXoaidNh/i', 7),
(37, 'xx', '$2y$10$PaEHcxVIoIEPAXlHGZZnlOll47giXeGxYEscM9WsM2BHC6GsLjubi', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$sIhfs9icYEjwZDMGIXA5Uu5D7uNImvfUUc6sC7UXtQ9JhTd/.uO1u', 7),
(38, 'cc', '$2y$10$SO5IjdaWJEBNqf1NvAXjve.jt78vzEWp7gB6esg2RQtfVrdXAgQM6', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$jcUqrPuyHwoQ4n2JZCNgxebVOLn5LK4SFnf5ftn3.NntbLbR/fAFe', 7),
(39, 'ff', '$2y$10$o0J0SFJXDRTo5ElKvjmpS.XSDKbWSdY/8Ra./O4TlgTTr8yVEMhbG', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$jr/6vaKmaA8w5Abl57whtOhHPkRrjFn4RGOy6qRZEGBuLNe8zNoku', 7),
(40, 'cc', '$2y$10$fF2e1/6c4tsGY1k7ngoceueQfAho0k4d.EzRhA0bBVNF/UEbSRT9y', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$AptiH7/Q0aTBKHkw9Y2rUOg0Vt/WAJztpRqRXocnpvaVNdFq7Vqc2', 7),
(41, 'Testemail background 3', '$2y$10$NWwwSCwxfuCQWHVqv5XHSei5BgJcckHIWuIHUQqsGYlZ7wARfPms6', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$suPovgYbKOmIl..QI1yFo.Y6ok.OIXwskBznqRf.hctXr7U0oQIJK', 7),
(42, 'Testemail background 4', '$2y$10$vTi0PLIHbv3HHSTHlTAHNOk8beKHevzhzZ2tX6DdIDkizl6sA0Wm6', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$FMjw/alfBvJRJV2LiWrwI.vdid7GzR/fUZOzwt6dqfF.E4AH9zIr.', 7),
(43, 'Testemail background 5', '$2y$10$iy/igAPPtbjoGFuV1ySsjed.tM03zpYaYlJa857hIEE5XhVPuKOB2', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$pAvpwD14AwAik6Z/dIwYnO8yIAxCViz.ioIz.SpiX4wDIqPBw.Hpi', 7),
(44, 'Testemail background 6', '$2y$10$J/Ih6FNKzmhtFsORfhmqG.pTdYyiKUPQpyFtddci6owjstfmYIY4q', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$xwxmB.VFOkeeEi.AIDYK5OTQldR5dbhOzVH4oa1K20IUe9puOkYK.', 7),
(45, 'Testemail background 7', '$2y$10$sy/6l06UGZP2uN9FTGeXOewfPqUPVj983pEr8OWvInTdkN6T.AwXy', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$Z5LQ.Y5ZuMZD/L8eVXD8I.w0ccLxqXFghDVXvI826zexrbwBxAb5W', 7),
(46, 'Testemail background 8', '$2y$10$cEDq6QEndu9H0Sd2dosCs.oG0d6bLJ0ocLjvK/V6ahJYNQLhN6XdG', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$3LEvOnydzjHurFU.CDGTS.LKZkTqXXI/WE6Htaez7Q3TPyYZCJm0y', 7),
(47, 'Testemail background 9', '$2y$10$.cZ2aTFJDpmFqHLfCbMRPe.hgQfZnxiq3tVMWxoZ5jRvmgixV3tCW', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$6UzZqi20ftm1sa2tyPXoiOcN4o8mv2opx7R25RZOf0HA2JSmaPjfm', 7),
(48, 'Testemail background 10', '$2y$10$gcLx1uQm727gp0g2WhOwwevPooZhThpsxCGp1NyS9W79mQW1XDxOa', 'serve.emmanuel@gmail.com', '2018-06-19', '$2y$10$rIXEBAyXkdjKDI.Hzjfk9eR/wA/ZAv3DZcz3V34lUT/JCA42o3NGy', 7);

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
  MODIFY `COM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `t_users_temporary`
--
ALTER TABLE `t_users_temporary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

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
