-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 11 juil. 2018 à 10:35
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
(32, '2018-07-10 18:09:49', 'ccccc', 'cccc', 160, 1),
(33, '2018-07-10 18:17:13', 'Martin', 'Yoooo', 160, 1);

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
(85, '2018-06-27 02:53:04', 'Prélude', '<p style=\"color: #5e5737; font-size: 10px; margin: 10px;\"><span style=\"color: #5e5737;\"><span style=\"font-size: 10px;\">La route commen&ccedil;a &agrave; s&rsquo;enfoncer. On ne voyait plus les grillages sur les cot&eacute;s, mais juste des rochers. Et soudain, les voitures s&rsquo;arr&ecirc;t&egrave;rent devant une &eacute;norme porte en m&eacute;tal entour&eacute;e de b&eacute;ton. D&rsquo;&eacute;normes blocs de b&eacute;ton. David avait visit&eacute; d&rsquo;anciennes fortifications de la ligne Maginot, mais rien de semblable. M&ecirc;me le Simserhof, situ&eacute; &agrave; proximit&eacute; de Bitche, semblait petit &agrave; c&ocirc;t&eacute; de cette porte. Mais David n&rsquo;&eacute;tait pas au bout de sa surprise.</span></span></p>\r\n<p style=\"color: #5e5737; font-size: 10px; margin: 10px;\"><span style=\"color: #5e5737;\"><span style=\"font-size: 10px;\">&nbsp;</span></span></p>\r\n<p style=\"color: #5e5737; font-size: 10px; margin: 10px;\"><span style=\"color: #5e5737;\"><span style=\"font-size: 10px;\">David n&rsquo;a pas fait grand chose, il a juste cr&eacute;&eacute; un embryon de programme. Mais ce programme s&rsquo;est d&eacute;velopp&eacute; lui-m&ecirc;me. Comme l&rsquo;ordinateur de David n&rsquo;&eacute;tait pas suffisant, il a utilis&eacute; le r&eacute;seau pour s&rsquo;installer sur les autres ordinateurs. Il a grandi alors de mani&egrave;re exponentielle et le voil&agrave; : Pr&eacute;lude. Connect&eacute; &agrave; tous les ordinateurs et capable de leur donner les ordres qu&rsquo;il veut.</span></span></p>\r\n<p style=\"color: #5e5737; font-size: 10px; margin: 10px;\"><span style=\"color: #5e5737;\"><span style=\"font-size: 10px;\">&nbsp;</span></span></p>\r\n<p style=\"color: #5e5737; font-size: 10px; margin: 10px;\"><span style=\"color: #5e5737;\"><span style=\"font-size: 10px;\">De tout temps, l\'homme a tent&eacute; de comprendre puis de reproduire l\'extraordinaire machine qu\'est l\'&ecirc;tre humain. Les premiers automates nous font sourire aujourd\'hui. Les premiers ordinateurs &eacute;galement, mais un peu moins. Et lorsqu\'un certain McCullogn, aid&eacute; de Pitts, invente en 1943 le premier neurone formel, on ne rigole plus. L\'ordinateur est devenu capable de reproduire des neurones artificiels. Le \"complexe de Frankenstein\" va alors freiner les recherches. On commence &agrave; entendre parler du concept d\'Intelligence Artificielle, plus connu sous les termes d\'IA. Cela fait peur.</span></span></p>\r\n<p style=\"color: #5e5737; font-size: 10px; margin: 10px;\"><span style=\"color: #5e5737;\"><span style=\"font-size: 10px;\">&nbsp;</span></span></p>\r\n<p style=\"color: #5e5737; font-size: 10px; margin: 10px;\"><span style=\"color: #5e5737;\"><span style=\"font-size: 10px;\">David avait d&ucirc; s&rsquo;asseoir lorsqu&rsquo;il avait entendu le pr&eacute;nom Florence. Il &eacute;tait devenu blanc un instant. Il allait peut-&ecirc;tre perdre Florence avant m&ecirc;me de lui avoir avou&eacute; son amour. Il devait emp&ecirc;cher Pr&eacute;lude de continuer dans son d&eacute;lire. Mais comment pouvait-il stopper ce parasite cr&eacute;&eacute; par lui quelques ann&eacute;es auparavant ? Ce n&rsquo;&eacute;tait pas un adversaire ordinaire. David avait d&eacute;j&agrave; d&eacute;truit plus d&rsquo;un virus, mais il s&rsquo;agissait de virus install&eacute;s sur des machines isol&eacute;es. Aujourd&rsquo;hui, c&rsquo;est une sorte de virus qui a pris place sur tous les ordinateurs de la plan&egrave;te. Et en plus, ce virus, nomm&eacute; Pr&eacute;lude, avait un soup&ccedil;on, non n&eacute;gligeable, d&rsquo;intelligence.</span></span></p>\r\n<p style=\"color: #5e5737; font-size: 10px; margin: 10px;\"><span style=\"color: #5e5737;\"><span style=\"font-size: 10px;\">&nbsp;</span></span></p>\r\n<p style=\"color: #5e5737; font-size: 10px; margin: 10px;\"><span style=\"color: #5e5737;\"><span style=\"font-size: 10px;\">&Ccedil;a ne servira &agrave; rien, repris Pr&eacute;lude. J&rsquo;ai en effet coup&eacute; toutes les communications vers l&rsquo;ext&eacute;rieur. Les portes sont bloqu&eacute;es. Ce blocaus est compl&egrave;tement herm&eacute;tique. Et je le suis autant, pas la peine de gaspiller vos salives. Pensez plut&ocirc;t &agrave; vous installer confortablement, vous &ecirc;tes ici pour un bon moment.</span></span></p>\r\n<p style=\"color: #5e5737; font-size: 10px; margin: 10px;\"><span style=\"color: #5e5737;\"><span style=\"font-size: 10px;\">&nbsp;</span></span></p>\r\n<p style=\"color: #5e5737; font-size: 10px; margin: 10px;\"><span style=\"color: #5e5737;\"><span style=\"font-size: 10px;\">https://www.youtube.com/watch?v=wygy721nzRc</span></span></p>'),
(90, '2018-06-27 03:31:00', 'aaa', 'aaa'),
(97, '2018-06-27 03:59:28', 'ddd', 'ddd'),
(100, '2018-06-27 03:59:37', 'fff', 'fff'),
(101, '2018-06-27 07:01:26', 'ttt', '<p><strong>ttt</strong>ttt</p>'),
(105, '2018-06-27 23:58:27', 'Rénovation de chaussée', '<p>tty</p>'),
(106, '2018-06-28 01:02:05', 'Rénovation de porte', '<h1>xxx</h1>\n<p>xxxx</p>'),
(107, '2018-06-28 01:04:19', 'Rénovation de toit', '<p>pppfuifj</p>'),
(108, '2018-06-28 01:26:39', 'Rénovation de chaussée de rue', '<p>Tout va bien !</p>'),
(109, '2018-06-28 01:56:11', 'Rénovation de chaussée aux moines', '<p>La timballe</p>'),
(110, '2018-06-28 01:57:23', 'Rénovation de chaussée aux moines de l\'abbaye', '<p>666</p>'),
(111, '2018-06-28 01:58:03', 'Rénovation de chaussée', '<p>Rat&eacute;</p>'),
(112, '2018-06-28 02:03:49', 'Rénovation de chaussée', '<p>again</p>'),
(113, '2018-06-28 02:16:16', 'Rénovation de chaussée', '<p>Bonjour tout le monde, voici le test le plus long pour voir si tout fonctionne correctement</p>'),
(114, '2018-06-28 02:17:26', 'Rénovation de chaussée', '<p>Bonjour tout le monde, voici le test le plus long pour voir si tout fonctionne correctement</p>'),
(115, '2018-06-28 02:35:40', 'Rénovation de chaussée', '<p>bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn</p>'),
(116, '2018-06-29 20:44:06', 'ddd', '<p><strong>Tout va bien !</strong></p>'),
(117, '2018-06-29 20:45:21', 'Rénovation de chaussée', '<p>Tout <strong>va</strong> bien !</p>'),
(118, '2018-06-29 20:46:45', 'fff', '<p>tout va a peu pres</p>'),
(119, '2018-06-29 20:47:19', 'Rénovation de chaussée', '<p>Une nouvelle route $</p>'),
(120, '2018-06-30 19:57:01', 'Test', '<p>Eur&ecirc;ka !!</p>'),
(121, '2018-06-30 19:57:31', 'Test', '<p>Youhoooou !</p>'),
(122, '2018-06-30 19:58:39', 'Rénovation de chaussée', '<p>Pheeeeeeeeeew</p>'),
(123, '2018-06-30 20:01:39', 'ccc', '<p>vvv</p>'),
(124, '2018-06-30 20:06:27', 'vvv', '<p>ccc</p>'),
(125, '2018-06-30 20:08:19', 'Rénovation de chaussée', '<p>vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvccccccccccccccccccccccccccxxxxxxxxxxxxxxxxx</p>'),
(126, '2018-06-30 20:09:30', 'xxxxxxxxxxxxxxxxxxxx', '<p>xxxxxxxxxxxxxxxxxxxxx</p>'),
(127, '2018-06-30 20:11:55', 'nnnnnnnnnnnnnn', '<p>nnnnnnnnnggggg</p>'),
(128, '2018-06-30 20:13:18', 'uyuyuyu', '<p>toooooooooool</p>'),
(129, '2018-06-30 20:14:41', 'zzz', '<p>atol</p>'),
(130, '2018-06-30 20:16:54', 'Ttutututut', '<p>Voiture banane</p>'),
(131, '2018-06-30 20:26:53', 'Toutouyoutooooo', '<p>Bonjour</p>'),
(132, '2018-06-30 20:34:17', '1321321', '<p>213124fffffffffffffffff</p>'),
(133, '2018-06-30 20:37:58', 'rat', '<p>tatatatata</p>'),
(134, '2018-06-30 20:40:45', 'Rate', '<p>foooooooooooouuu</p>'),
(135, '2018-06-30 20:41:28', 'Yoooooo', '<p>&ccedil;a devrait march&eacute; mtn ^^</p>'),
(136, '2018-06-30 20:42:07', 'vvv', '<p>vvv</p>'),
(137, '2018-06-30 20:43:30', 'Maison secondaire', '<p>C\'est la tabooooooou&egrave;re !</p>'),
(138, '2018-06-30 20:44:22', 'Rénovation de chaussée', '<p>2xxxxxxxxxxxxxxxxxxxxxxx</p>'),
(139, '2018-06-30 20:46:39', 'Final', '<p>Count<strong>down !</strong></p>'),
(140, '2018-06-30 21:00:52', 'Rénovation de chaussée', '<p>....aux&nbsp;<strong>moiiiiiiiiiiiiines !!</strong></p>'),
(141, '2018-06-30 21:01:55', 'Homer', '<p>Simpson</p>'),
(142, '2018-06-30 21:02:34', 'Dark', '<p>Vador</p>'),
(154, '2018-07-04 08:31:09', 'Re-re-re-test for update', '<p>Still good ! ...so far !</p>'),
(155, '2018-07-04 08:37:29', 'Voiture', '<p>Rouge</p>'),
(157, '2018-07-10 17:38:04', 'Test', '<p>rrr</p>'),
(158, '2018-07-10 17:38:13', 'Test edit', '<p>rrrttt</p>'),
(160, '2018-07-10 17:38:34', 'Test edit', '<p>rrrttt<strong>vvvcc</strong></p>'),
(161, '2018-07-11 09:32:06', 'vvv', '<p>vvv</p>'),
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
(1, 'superadmin', '$2y$10$EnIlhDhNyJDc9kfCThED5Owht79dCE5szUQE64r6Ey5Ov2nHLjbdi', 'serve.emmanuel@gmail.com', '2018-06-13', '$2y$10$vkJFbZ1yP1DZfOEW8qqO.uKp2cDEegJJ5cYBr4t6KFIiL/a3XQpuC', 1);

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
(52, 'ccc', '$2y$10$yQ9wRYRL99Wn2z.7hYwhi.lQd8QSO8UDZ1kvxKLLCG6RMEWWdmxl.', 'serve.emmanuel@gmail.com', '2018-06-24', '$2y$10$BxXygiS7oVD1h4K8Xw2oGOOqFx9Lc6KM94GEYaD7bDRA7XM9QrXcO', 7),
(53, 'ccc', '$2y$10$8n4CLyMRzuoyK.XqjkVSVeZduG6uS9JSnY3JdFjcrgzYXQ6R6XksW', 'serve.emmanuel@gmail.com', '2018-06-24', '$2y$10$x2tOCt4oQa1bdbwY4DQrmerWun44WHYyiK9ywVxsMBp/OX0Hg9vkC', 7),
(54, 'ccc', '$2y$10$lYr.T1AkMPF64103QnCmOeYGVTogoiNt.qjIk8u5HJu6eXw88gWZS', 'serve.emmanuel@gmail.com', '2018-06-24', '$2y$10$Bs52Kzi4c1EFGjM50hgIX.yOqfIO.8KjZW0IjwU.OHcs6B6E7l8Eu', 7),
(55, 'ccc', '$2y$10$NHyQ5IbWc5Dha5sITBRxTu75tLzi9PGmUCM8briQI93ZTq027d.7O', 'serve.emmanuel@gmail.com', '2018-06-24', '$2y$10$13SIFOoJ9a4iO.TMEjKFV.2lCKcH72AvZpIgk0Z7D5LU1S5tQJeny', 7),
(56, 'ccc', '$2y$10$D/mzMupgf7z586QbQA0MhOcVvUPT8.jl/pOwlqa5Imnq/xDxXKxRC', 'serve.emmanuel@gmail.com', '2018-06-24', '$2y$10$no39B2CC07vm.IDtv/ztTui1KiEuNCRT0U69dg8D5GDrVMmSNvGDG', 7),
(57, 'ccc', '$2y$10$H6hLs75EP9S4xyp7iRbIQ.GqkxT8xkFTPYlgF3vnE0cxMqbgQe7WK', 'serve.emmanuel@gmail.com', '2018-06-24', '$2y$10$PLHy3QNOMJA6m1mKfgXh7Ow4NKUGeYtVWzC56jCaQUXvXT6uVIytK', 7),
(58, 'ccc', '$2y$10$iMGUJuko9JA0AH2Y28F9NeArxCFJM8qzyhZPcG0YfCdN9h1fmU.Am', 'serve.emmanuel@gmail.com', '2018-06-24', '$2y$10$9u/555bnGC2jxbIWwwlZbupN00GSjpDWg4fMmPVeVsP0J/LTAgm9O', 7),
(59, 'fff', '$2y$10$6cpoX/l12p3Pn7G68PPWp.mp4PV3SNa57FMmwEuqPENG41mu4TjtS', 'serve.emmanuel@gmail.com', '2018-06-24', '$2y$10$3Qp2twZTyqr9q5Z5ob59dOrE0gUxevpE5GwYo.cSFoFUQl3Ekgc3S', 7),
(60, 'ggg', '$2y$10$wcRqmob79OQA9zdNgdql9ufG83pF7vp.M//sMTWubIEu0.adY8LZi', 'serve.emmanuel@gmail.com', '2018-06-24', '$2y$10$Et.1BHf27UTMip37xJ2CV.wkLLP2ZRTrWrxGfUIUY4Q/WJLxkdgtq', 7),
(61, 'sss', '$2y$10$ouz0BEJWkpOZDrNf0x8ZDugHWYfBSU/aURZaIY5tWwOYkmQOjG0JG', 'serve.emmanuel@gmail.com', '2018-06-24', '$2y$10$GBDkjx8BaYO1XnPwmOJq/.q2vRkkCXDKNoqByTFh9uYIYkWpmtjYC', 7),
(62, 'ccgg', '$2y$10$DJ8miXbEpTony6YZx59gb.OimPkvEkvNJ1A/ca4gJYQCGpZQ8roOm', 'serve.emmanuel@gmail.com', '2018-06-27', '$2y$10$JgP6yaWlNHDU0k3z/86L7.jiHxQ0vp09kdlibsdX5Get/5nrxxgKu', 7);

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
  MODIFY `COM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
