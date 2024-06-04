-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 04, 2024 at 11:47 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ofestival`
--

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `id` int NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spotify` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `snapchat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiktok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id`, `name`, `description`, `picture`, `video`, `website`, `facebook`, `twitter`, `instagram`, `spotify`, `snapchat`, `tiktok`, `created_at`, `updated_at`) VALUES
(21, 'Drake', 'Officia quo molestias dolor illum. Sed occaecati dolor impedit. Libero eaque eveniet non soluta praesentium. Exercitationem voluptas perferendis aliquid ut impedit.', 'https://images.pexels.com/photos/258732/pexels-photo-258732.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-02 11:45:59', NULL),
(22, 'Dua Lipa', 'Similique ipsam sint possimus non. Consequuntur eos laborum illo suscipit. Et omnis consectetur natus consequatur sint magni illum tempora. Id consequatur harum culpa architecto enim qui repellat et.', 'https://images.pexels.com/photos/3807278/pexels-photo-3807278.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-02 11:45:59', NULL),
(23, 'Ariana Grande', 'Quis enim sed ea qui et. Molestiae nostrum qui eius facere. Earum similique earum officiis nesciunt ex ipsum possimus consectetur. Molestiae aliquid maxime quia quisquam perferendis quidem sint.', 'https://images.pexels.com/photos/1150837/pexels-photo-1150837.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-02 11:45:59', NULL),
(24, 'David Bowie', 'Praesentium fuga ipsa quia quibusdam nemo. Mollitia unde quo omnis possimus id accusantium. Ex soluta magnam odio id tenetur eius assumenda. Aliquid voluptates eos cupiditate eos quis quidem.', 'https://images.pexels.com/photos/6270140/pexels-photo-6270140.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-02 11:45:59', NULL),
(25, 'Elton John', 'Ipsam ea non saepe pariatur. Reiciendis quibusdam at rem. Quo deserunt eius aliquam rerum.', 'https://images.pexels.com/photos/3775132/pexels-photo-3775132.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-02 11:45:59', NULL),
(26, 'Angèle', 'Amet maiores consequatur adipisci quis quo rerum voluptas. Perspiciatis ullam consequatur maiores dolores. Nihil fuga quasi velit dolores.', 'https://images.pexels.com/photos/7090876/pexels-photo-7090876.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-02 11:45:59', NULL),
(27, 'Benjamin Biolay', 'Excepturi voluptatem et facere. Sed id quia quasi adipisci. Molestiae voluptatem quia quas quasi sit. Aut eos eligendi sint. Necessitatibus sed ea velit ea voluptatem architecto sequi.', 'https://images.pexels.com/photos/2345342/pexels-photo-2345342.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-02 11:45:59', NULL),
(28, 'Travis Scott', 'Est voluptas laudantium illo molestiae ut sequi. Voluptatem enim atque officia ducimus aut quasi. Debitis similique quis omnis aut earum voluptates dignissimos.', 'https://images.pexels.com/photos/6270136/pexels-photo-6270136.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-02 11:45:59', NULL),
(29, 'Machine Gun Kelly', 'Enim sed mollitia in aut dolores perspiciatis. Ut voluptas assumenda ex ut praesentium repellat aut.', 'https://images.pexels.com/photos/4722551/pexels-photo-4722551.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-02 11:45:59', NULL),
(30, 'Sliman', 'Et eius inventore rerum. Ullam voluptatem praesentium est veniam praesentium. Ipsa repudiandae aut voluptas non.', 'https://images.pexels.com/photos/6173807/pexels-photo-6173807.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-02 11:45:59', NULL),
(31, 'Kendrick Lamar', 'Ut error et error eaque magnam accusantium dicta praesentium. Ipsum voluptates accusantium voluptate repellat. Ea odio ut magnam nesciunt et reiciendis atque.', 'https://images.pexels.com/photos/6173832/pexels-photo-6173832.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-02 11:45:59', NULL),
(32, 'Lompale', 'Accusamus necessitatibus et incidunt quo doloribus dolore. Est velit voluptatem molestiae.', 'https://images.pexels.com/photos/1550469/pexels-photo-1550469.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-02 11:45:59', NULL),
(33, 'Adele', 'Quia totam et quo ipsam. Nihil quam vel voluptatem maxime sint. Rem beatae hic assumenda rerum sed at. Delectus libero commodi harum. Corporis optio magnam quas.', 'https://images.pexels.com/photos/5648438/pexels-photo-5648438.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-02 11:45:59', NULL),
(34, 'Clara Luciani', 'Ut nulla sunt modi voluptas. Voluptatem in natus occaecati. Delectus odit est voluptatibus enim atque placeat sed necessitatibus.', 'https://images.pexels.com/photos/442540/pexels-photo-442540.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-02 11:45:59', NULL),
(35, 'Lady Gaga', 'Saepe eum ut debitis aut deleniti. Id debitis dolores corporis et sed. In quam cum atque similique officia.', 'https://images.pexels.com/photos/3388899/pexels-photo-3388899.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-02 11:45:59', NULL),
(36, 'Stevie Wonder', 'Quam dicta enim placeat autem nihil. Quibusdam rerum et sint qui modi veniam rerum. Ut soluta qui saepe sit.', 'https://images.pexels.com/photos/1309240/pexels-photo-1309240.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-02 11:45:59', NULL),
(37, 'Aretha Franklin', 'Dolores sit non maiores sit occaecati temporibus consectetur. Voluptatibus et pariatur omnis sit. Voluptatibus quia sit nam doloribus. Quis non qui quis veniam aliquid tenetur.', 'https://images.pexels.com/photos/122635/pexels-photo-122635.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-02 11:45:59', NULL),
(38, 'Lil Nas X', 'Soluta consequatur accusantium quisquam dignissimos maxime repudiandae earum. Et nemo dolor quidem. Ut eius ex molestiae. Error optio modi sed quidem consectetur.', 'https://images.pexels.com/photos/814049/pexels-photo-814049.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-02 11:45:59', NULL),
(39, 'Elvis Presley', 'Natus qui voluptate error quis nisi ipsam. Rerum quidem at voluptas nisi voluptate quisquam. Quasi sed voluptas aliquam est placeat dolor. Corrupti neque expedita hic nihil tempore odit.', 'https://images.pexels.com/photos/2531728/pexels-photo-2531728.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-02 11:45:59', NULL),
(40, 'Michael Jackson', 'Possimus voluptatum possimus molestias est. Sed odit exercitationem veritatis adipisci voluptas. Voluptatem soluta aliquid qui inventore.', 'https://images.pexels.com/photos/1083855/pexels-photo-1083855.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-02 11:45:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `treatment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `content`, `created_at`, `updated_at`, `treatment`) VALUES
(1, 'Maia Harvey', 'marcos.marjorie@hotmail.fr', 'Bonjour,\r\nJe voudrais avoir les vrais horaires ? \r\nMerci', NULL, NULL, 'Traité');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int NOT NULL,
  `firstname` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` int NOT NULL,
  `town` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `firstname`, `lastname`, `birthdate`, `email`, `phone_number`, `postcode`, `town`, `created_at`, `updated_at`, `adress`) VALUES
(51, 'Jeanne', 'Chauvin', '2007-09-18', 'thierry.bailly@dupuis.fr', '0608013850', 97403, 'Berger-la-Forêt', '2024-06-02 11:45:59', NULL, '44, avenue Gilbert\n42265 Le Gallboeuf'),
(52, 'Guillaume', 'Girard', '2007-06-19', 'qrey@tele2.fr', '+33 (0)6 62 32 78 01', 52163, 'Perrin', '2024-06-02 11:45:59', NULL, '31, rue Didier\n81784 Guichard'),
(53, 'Stéphanie', 'Parent', '1992-05-06', 'regnier.chantal@laposte.net', '+33 (0)7 88 73 84 34', 70907, 'Lemonnierdan', '2024-06-02 11:45:59', NULL, '15, rue Guerin\n49908 Leveque'),
(54, 'Denise', 'Lucas', '1984-07-08', 'penelope03@noos.fr', '+33 (0)7 80 44 57 19', 20587, 'Lacroixdan', '2024-06-02 11:45:59', NULL, '19, chemin de Simon\n35848 Weber-la-Forêt'),
(55, 'Guy', 'Faivre', '1997-05-30', 'roger.berger@noos.fr', '0778474662', 31593, 'Boutin', '2024-06-02 11:45:59', NULL, '54, boulevard Adélaïde Huet\n71629 Etienne'),
(56, 'Alice', 'Duhamel', '2020-02-28', 'louise.bailly@sfr.fr', '+33 (0)6 99 86 00 07', 20169, 'LucasVille', '2024-06-02 11:45:59', NULL, '819, rue Verdier\n93302 Tessierdan'),
(57, 'Frédéric', 'Pires', '1972-08-16', 'npoulain@cordier.fr', '+33 (0)6 96 77 54 71', 50482, 'Bruneau', '2024-06-02 11:45:59', NULL, '3, rue Marchal\n18519 Jacquet-sur-Mer'),
(58, 'Caroline', 'Morin', '1980-05-18', 'alice.maillet@dbmail.com', '+33 (0)6 30 38 73 14', 90535, 'Poulain-la-Forêt', '2024-06-02 11:45:59', NULL, '717, chemin Marine Hoarau\n09620 Cousin-la-Forêt'),
(59, 'Richard', 'Reynaud', '1998-03-15', 'etienne.vaillant@pasquier.org', '0757293655', 8731, 'Mendes', '2024-06-02 11:45:59', NULL, '528, avenue de Navarro\n40492 Bigot'),
(60, 'Maurice', 'Delahaye', '2009-02-15', 'eleblanc@leconte.com', '+33 (0)6 45 23 90 10', 55090, 'Chartier', '2024-06-02 11:45:59', NULL, '65, place de Brun\n05025 DumontVille'),
(61, 'Susanne', 'Morin', '1979-10-12', 'gerard77@jourdan.com', '07 58 29 06 32', 59984, 'Moreau', '2024-06-02 11:45:59', NULL, '73, rue de Peltier\n87459 Deschamps'),
(62, 'Pierre', 'Brunet', '1982-12-22', 'bgregoire@yahoo.fr', '+33 (0)6 58 90 87 11', 99718, 'Nguyen', '2024-06-02 11:45:59', NULL, '271, chemin Élise Jean\n99029 Prevost'),
(63, 'Christiane', 'Didier', '2003-06-05', 'mathilde.navarro@yahoo.fr', '+33 6 76 43 66 72', 76286, 'Morin', '2024-06-02 11:45:59', NULL, '894, boulevard de Payet\n57156 Garnier-la-Forêt'),
(64, 'Marcel', 'Caron', '1972-08-10', 'blondel.aime@dbmail.com', '0740047678', 57951, 'Vincent', '2024-06-02 11:45:59', NULL, '20, place Margot Giraud\n69352 CoulonBourg'),
(65, 'Christelle', 'Berger', '1992-06-08', 'laurence.cousin@clerc.fr', '+33 6 85 35 59 66', 99554, 'WeberBourg', '2024-06-02 11:45:59', NULL, '76, rue de Fischer\n43683 Pottiernec'),
(66, 'Édith', 'Boulay', '2022-10-09', 'alexandrie26@dbmail.com', '+33 6 88 99 94 00', 71525, 'Didier-sur-Bailly', '2024-06-02 11:45:59', NULL, '94, rue Marguerite Michel\n90772 Michel'),
(67, 'Charlotte', 'Labbe', '2023-02-26', 'wallain@tele2.fr', '+33 6 33 91 49 53', 43637, 'Leger', '2024-06-02 11:45:59', NULL, '39, chemin de Paul\n45369 Regnier'),
(68, 'Frédérique', 'Joly', '2000-01-01', 'qclerc@gillet.org', '07 93 06 94 08', 49982, 'Langlois', '2024-06-02 11:45:59', NULL, '5, chemin Mathilde Cousin\n93068 Marechal'),
(69, 'Roland', 'Maurice', '1972-07-18', 'sbaudry@dbmail.com', '+33 7 81 48 99 33', 20193, 'Lainenec', '2024-06-02 11:45:59', NULL, '589, rue de Neveu\n13905 Legrand'),
(70, 'Maurice', 'Lemaitre', '1979-06-13', 'josette27@yahoo.fr', '0746120488', 86767, 'Picard', '2024-06-02 11:45:59', NULL, 'avenue Lacroix\n65412 Poulain-sur-Peltier'),
(71, 'Josette', 'Duval', '2023-01-17', 'susan40@orange.fr', '+33 (0)7 30 16 43 48', 8954, 'Massonnec', '2024-06-02 11:45:59', NULL, '874, avenue Coulon\n48366 Mary'),
(72, 'Jérôme', 'Lemaire', '2018-02-27', 'traore.therese@benard.fr', '0775966461', 32377, 'Duval', '2024-06-02 11:45:59', NULL, '3, rue Xavier Lefort\n93410 Monnier'),
(73, 'Camille', 'Renault', '1975-03-27', 'coste.arthur@live.com', '0742994921', 47284, 'Chretien', '2024-06-02 11:45:59', NULL, '40, place Élise Fabre\n38336 Delmas'),
(74, 'Henri', 'Ledoux', '2003-07-07', 'julien.xavier@breton.org', '0648004660', 44911, 'Vasseurboeuf', '2024-06-02 11:45:59', NULL, '93, impasse Lucy Pons\n25103 Blanchard-sur-Guyon'),
(75, 'Roland', 'Goncalves', '2001-11-02', 'lebrun.honore@olivier.net', '07 64 52 55 69', 81247, 'Renaud', '2024-06-02 11:45:59', NULL, '66, impasse de Martin\n19247 Renardnec'),
(76, 'Julie', 'Pruvost', '2007-06-09', 'xgarnier@club-internet.fr', '+33 (0)6 02 96 28 96', 43324, 'Dupredan', '2024-06-02 11:45:59', NULL, '4, impasse Poulain\n79853 Maillot-sur-Dupuis'),
(77, 'Christiane', 'Lecoq', '2000-09-29', 'hgrenier@didier.fr', '+33 6 21 79 74 91', 97751, 'Delmas-sur-Olivier', '2024-06-02 11:45:59', NULL, 'impasse de Grondin\n43592 Barbier'),
(78, 'Tristan', 'Bouvier', '1979-04-04', 'luc70@lacroix.fr', '+33 (0)7 88 76 88 50', 77766, 'Fischer', '2024-06-02 11:45:59', NULL, '6, avenue de Maury\n53063 Joseph'),
(79, 'Laurence', 'Guyon', '1976-08-07', 'qchretien@yahoo.fr', '+33 7 39 93 96 54', 19051, 'Camus', '2024-06-02 11:45:59', NULL, '32, place de Normand\n53329 Gilbertnec'),
(80, 'Marine', 'Aubert', '1981-10-27', 'ctecher@hotmail.fr', '06 28 15 56 52', 2613, 'LejeuneVille', '2024-06-02 11:45:59', NULL, 'boulevard de Riviere\n97102 Launayboeuf'),
(81, 'Patricia', 'Albert', '2008-01-26', 'shenry@live.com', '+33 7 61 04 47 40', 64920, 'Berthelot', '2024-06-02 11:45:59', NULL, '8, boulevard de Gimenez\n76072 BodinVille'),
(82, 'Antoine', 'Delmas', '2003-05-19', 'bourgeois.denis@hoarau.fr', '+33 7 49 00 70 55', 76880, 'Lucas-sur-Mallet', '2024-06-02 11:45:59', NULL, '35, rue de Francois\n74566 Evrard'),
(83, 'Hugues', 'Rey', '2005-12-09', 'legoff.astrid@hotmail.fr', '+33 (0)6 45 41 88 93', 42441, 'Techer-sur-Girard', '2024-06-02 11:45:59', NULL, 'rue Cécile Boyer\n93262 Giraud'),
(84, 'Marianne', 'Ledoux', '1975-04-15', 'thibault.timothee@sfr.fr', '+33 (0)7 57 04 45 69', 93722, 'Carlier-sur-Louis', '2024-06-02 11:45:59', NULL, 'avenue de Jacquet\n82396 Dijouxdan'),
(85, 'Jules', 'Dupont', '2006-03-19', 'aurelie.charrier@rossi.com', '+33 7 91 04 46 29', 61566, 'MorelVille', '2024-06-02 11:45:59', NULL, '65, boulevard Duval\n58039 Robert'),
(86, 'Jean', 'Denis', '2013-05-12', 'masse.michele@free.fr', '07 85 35 26 79', 6832, 'Costadan', '2024-06-02 11:45:59', NULL, '79, chemin de Guillon\n51473 Guyonnec'),
(87, 'Antoinette', 'Herve', '1983-02-01', 'diane.gregoire@live.com', '+33 7 62 34 88 47', 46718, 'Boutin', '2024-06-02 11:45:59', NULL, 'rue de Bouchet\n79734 Meyer'),
(88, 'Suzanne', 'Blot', '1985-08-30', 'etienne06@sfr.fr', '0697854163', 94746, 'Leclercq', '2024-06-02 11:45:59', NULL, '53, rue Aubert\n80051 Gonzalez'),
(89, 'Alex', 'Didier', '2020-07-02', 'collin.roger@rossi.com', '0748574000', 76752, 'Bouvet-les-Bains', '2024-06-02 11:45:59', NULL, '486, avenue André Seguin\n68422 LenoirVille'),
(90, 'Augustin', 'Baron', '1989-04-15', 'olivie.marques@dbmail.com', '07 98 61 41 92', 95847, 'Gomez-les-Bains', '2024-06-02 11:45:59', NULL, '69, impasse de Barre\n15376 Marchal'),
(91, 'Alix', 'Lebrun', '1989-11-27', 'antoine.reynaud@orange.fr', '06 94 37 15 60', 21544, 'Roussel', '2024-06-02 11:45:59', NULL, '14, impasse Paris\n40620 Pascal'),
(92, 'Eugène', 'Peltier', '2007-12-25', 'alphonse39@dijoux.com', '+33 7 42 35 86 70', 87440, 'Fabre', '2024-06-02 11:45:59', NULL, '82, rue Diaz\n09378 DuvalBourg'),
(93, 'Thierry', 'Maillard', '1979-03-29', 'zgrondin@duval.fr', '0757926486', 3595, 'Delmas', '2024-06-02 11:45:59', NULL, '23, rue Constance Martinez\n54266 Legrand'),
(94, 'Georges', 'Hoareau', '2007-01-06', 'laroche.claire@samson.com', '06 38 71 86 73', 44393, 'Gosselin', '2024-06-02 11:45:59', NULL, '56, avenue Guichard\n72029 Faivre-sur-Mendes'),
(95, 'Manon', 'Lagarde', '1981-03-31', 'salmon.isaac@yahoo.fr', '06 65 66 26 51', 75214, 'Huetnec', '2024-06-02 11:45:59', NULL, '1, chemin Faure\n41676 Reynaud'),
(96, 'Anastasie', 'Blanc', '1987-06-25', 'ebouvier@wanadoo.fr', '0662101751', 67770, 'Leconte-sur-Duval', '2024-06-02 11:45:59', NULL, 'chemin de Lejeune\n50501 Fleury-les-Bains'),
(97, 'Théophile', 'Gregoire', '1991-08-02', 'vmallet@maury.com', '0766747317', 91752, 'Texiernec', '2024-06-02 11:45:59', NULL, 'rue Julien De Oliveira\n07976 Hamon'),
(98, 'Antoinette', 'Humbert', '1971-12-03', 'bernard.baudry@delannoy.fr', '07 98 84 61 24', 15116, 'BergerVille', '2024-06-02 11:45:59', NULL, '50, rue Diallo\n82020 Normanddan'),
(99, 'Dominique', 'Levy', '1972-01-05', 'gregoire.maurice@renaud.fr', '06 02 23 45 90', 53364, 'Martel', '2024-06-02 11:45:59', NULL, '91, avenue Nguyen\n00707 Martins'),
(100, 'Paul', 'Blondel', '1975-01-20', 'noel.berger@huet.com', '0635513440', 5141, 'Rossi-la-Forêt', '2024-06-02 11:45:59', NULL, '6, impasse de Bertin\n49410 Jacquot');

-- --------------------------------------------------------

--
-- Table structure for table `customer_ticket`
--

CREATE TABLE `customer_ticket` (
  `customer_id` int NOT NULL,
  `ticket_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240531083304', '2024-05-31 12:20:32', 35),
('DoctrineMigrations\\Version20240531122253', '2024-05-31 12:23:04', 225),
('DoctrineMigrations\\Version20240602091025', '2024-06-02 09:41:24', 62),
('DoctrineMigrations\\Version20240602091032', '2024-06-02 09:41:24', 9),
('DoctrineMigrations\\Version20240602094101', '2024-06-02 09:41:24', 13);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `name`, `created_at`, `updated_at`) VALUES
(16, 'Salsa', '2024-06-02 11:45:59', NULL),
(17, 'Jazz', '2024-06-02 11:45:59', NULL),
(18, 'Soul', '2024-06-02 11:45:59', NULL),
(19, 'Électronique', '2024-06-02 11:45:59', NULL),
(20, 'Classique', '2024-06-02 11:45:59', NULL),
(21, 'Rap', '2024-06-02 11:45:59', NULL),
(22, 'Reggae', '2024-06-02 11:45:59', NULL),
(23, 'Lo-fi Indie', '2024-06-02 11:45:59', NULL),
(24, 'Pop', '2024-06-02 11:45:59', NULL),
(25, 'Techno', '2024-06-02 11:45:59', NULL),
(26, 'Dream Pop', '2024-06-02 11:45:59', NULL),
(27, 'Punk', '2024-06-02 11:45:59', NULL),
(28, 'Country', '2024-06-02 11:45:59', NULL),
(29, 'Experimental Rock', '2024-06-02 11:45:59', NULL),
(30, 'Hip-hop', '2024-06-02 11:45:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `genre_artist`
--

CREATE TABLE `genre_artist` (
  `genre_id` int NOT NULL,
  `artist_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genre_artist`
--

INSERT INTO `genre_artist` (`genre_id`, `artist_id`) VALUES
(17, 22),
(17, 27),
(17, 32),
(17, 34),
(17, 37),
(17, 40),
(18, 29),
(18, 36),
(18, 39),
(21, 21),
(21, 23),
(21, 25),
(21, 26),
(21, 28),
(21, 34),
(21, 37),
(21, 38),
(23, 26),
(23, 30),
(23, 31),
(23, 33),
(23, 35),
(29, 24),
(29, 40);

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `id` int NOT NULL,
  `artist_id` int NOT NULL,
  `stage_id` int DEFAULT NULL,
  `date` date DEFAULT NULL,
  `hour` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`id`, `artist_id`, `stage_id`, `date`, `hour`, `created_at`, `updated_at`, `day`) VALUES
(13, 21, 7, '2024-08-23', '16:00-18:00', '2024-06-02 11:45:59', NULL, 'J1'),
(14, 22, 5, '2024-08-23', '18:00-20:00', '2024-06-02 11:45:59', NULL, 'J1'),
(15, 23, 5, '2024-08-23', '20:00-22:00', '2024-06-02 11:45:59', NULL, 'J1'),
(16, 24, 5, '2024-08-23', '22:00-00:00', '2024-06-02 11:45:59', NULL, 'J1'),
(17, 25, 7, '2024-08-24', '16:00-18:00', '2024-06-02 11:45:59', NULL, 'J2'),
(18, 26, 5, '2024-08-24', '18:00-20:00', '2024-06-02 11:45:59', NULL, 'J2'),
(19, 27, 6, '2024-08-24', '20:00-22:00', '2024-06-02 11:45:59', NULL, 'J2'),
(20, 28, 8, '2024-08-24', '22:00-00:00', '2024-06-02 11:45:59', NULL, 'J2'),
(21, 29, 6, '2024-08-25', '16:00-18:00', '2024-06-02 11:45:59', NULL, 'J3'),
(22, 30, 5, '2024-08-25', '18:00-20:00', '2024-06-02 11:45:59', NULL, 'J3'),
(23, 31, 5, '2024-08-25', '20:00-22:00', '2024-06-02 11:45:59', NULL, 'J3'),
(24, 32, 5, '2024-08-25', '22:00-00:00', '2024-06-02 11:45:59', NULL, 'J3');

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE `sponsor` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`id`, `name`, `icon`) VALUES
(2, 'Dentaga', 'https://cdn.pixabay.com/photo/2016/09/14/20/50/tooth-1670434_1280.png'),
(3, 'RacconCity', 'https://cdn.pixabay.com/photo/2017/01/31/23/42/animal-2028258_1280.png'),
(4, 'Meto', 'https://cdn.pixabay.com/photo/2017/02/18/19/20/logo-2078018_1280.png'),
(5, 'Ivangers', 'https://cdn.pixabay.com/photo/2021/08/11/18/06/paladin-6539115_1280.png');

-- --------------------------------------------------------

--
-- Table structure for table `stage`
--

CREATE TABLE `stage` (
  `id` int NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stage`
--

INSERT INTO `stage` (`id`, `name`, `created_at`, `updated_at`) VALUES
(5, 'Scène1', '2024-06-02 11:45:59', NULL),
(6, 'Scène2', '2024-06-02 11:45:59', NULL),
(7, 'Scène3', '2024-06-02 11:45:59', NULL),
(8, 'Scène4', '2024-06-02 11:45:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `start_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `end_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `quantity` int DEFAULT NULL,
  `fee` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` int DEFAULT NULL,
  `type` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `title`, `price`, `created_at`, `updated_at`, `start_at`, `end_at`, `quantity`, `fee`, `duration`, `type`) VALUES
(104, 'Pass 1 JOUR Plein Tarif le 23/08/2024', 100, '2024-06-03 12:04:33', NULL, '2024-08-23 00:00:00', '2024-08-23 00:00:00', 1, 'Plein Tarif', 24, 'Pass 1 JOUR'),
(106, 'Pass 2 JOURS Tarif Enfant (-12 ans) du 24/08/2024 au 25/08/2024', 0, '2024-06-03 12:10:19', NULL, '2024-08-24 00:00:00', '2024-08-25 00:00:00', 1, 'Tarif Enfant (-12 ans)', 48, 'Pass 2 JOURS'),
(107, 'Pass 3 JOURS Plein Tarif du 23/08/2024 au 25/08/2024', 250, '2024-06-03 12:29:49', NULL, '2024-08-23 00:00:00', '2024-08-25 00:00:00', 1, 'Plein Tarif', 72, 'Pass 3 JOURS'),
(108, 'Pass 1 JOUR Tarif Étudiant le 23/08/2024', 80, '2024-06-03 12:59:28', NULL, '2024-08-23 00:00:00', '2024-08-23 00:00:00', 1, 'Tarif Étudiant', 24, 'Pass 1 JOUR'),
(109, 'Pass 1 JOUR Tarif Enfant (-12 ans) le 23/08/2024', 0, '2024-06-03 12:59:49', NULL, '2024-08-23 00:00:00', '2024-08-23 00:00:00', 1, 'Tarif Enfant (-12 ans)', 24, 'Pass 1 JOUR'),
(110, 'Pass 1 JOUR Plein Tarif le 24/08/2024', 100, '2024-06-03 13:00:12', NULL, '2024-08-24 00:00:00', '2024-08-24 00:00:00', 1, 'Plein Tarif', 24, 'Pass 1 JOUR'),
(111, 'Pass 1 JOUR Tarif Étudiant le 24/08/2024', 80, '2024-06-03 13:02:30', NULL, '2024-08-24 00:00:00', '2024-08-24 00:00:00', 1, 'Tarif Étudiant', 24, 'Pass 1 JOUR'),
(112, 'Pass 1 JOUR Tarif Enfant (-12 ans) le 24/08/2024', 0, '2024-06-03 13:02:56', NULL, '2024-08-24 00:00:00', '2024-08-24 00:00:00', 1, 'Tarif Enfant (-12 ans)', 24, 'Pass 1 JOUR'),
(113, 'Pass 1 JOUR Plein Tarif le 25/08/2024', 100, '2024-06-03 13:04:15', NULL, '2024-08-25 00:00:00', '2024-08-25 00:00:00', 1, 'Plein Tarif', 24, 'Pass 1 JOUR'),
(114, 'Pass 1 JOUR Tarif Étudiant le 25/08/2024', 80, '2024-06-03 13:04:35', NULL, '2024-08-25 00:00:00', '2024-08-25 00:00:00', 1, 'Tarif Étudiant', 24, 'Pass 1 JOUR'),
(115, 'Pass 1 JOUR Tarif Enfant (-12 ans) le 25/08/2024', 0, '2024-06-03 13:04:54', NULL, '2024-08-25 00:00:00', '2024-08-25 00:00:00', 1, 'Tarif Enfant (-12 ans)', 24, 'Pass 1 JOUR'),
(116, 'Pass 2 JOURS Plein Tarif du 24/08/2024 au 25/08/2024', 200, '2024-06-03 13:05:53', NULL, '2024-08-24 00:00:00', '2024-08-25 00:00:00', 1, 'Plein Tarif', 48, 'Pass 2 JOURS'),
(117, 'Pass 2 JOURS Tarif Étudiant du 24/08/2024 au 25/08/2024', 150, '2024-06-03 13:06:44', NULL, '2024-08-24 00:00:00', '2024-08-25 00:00:00', 1, 'Tarif Étudiant', 48, 'Pass 2 JOURS'),
(118, 'Pass 3 JOURS Tarif Étudiant du 23/08/2024 au 25/08/2024', 200, '2024-06-03 13:08:29', NULL, '2024-08-23 00:00:00', '2024-08-25 00:00:00', 1, 'Tarif Étudiant', 72, 'Pass 3 JOURS'),
(119, 'Pass 3 JOURS Tarif Enfant (-12 ans) du 23/08/2024 au 25/08/2024', 0, '2024-06-03 13:09:04', NULL, '2024-08-23 00:00:00', '2024-08-25 00:00:00', 1, 'Tarif Enfant (-12 ans)', 72, 'Pass 3 JOURS');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `firstname`, `lastname`, `created_at`, `updated_at`) VALUES
(5, 'talya@ofestival.fr', '[\"ROLE_ADMIN\"]', '$2y$13$dtEoqptHglRxkDAhwPSvi.RXyEI5Y0xhRA569ujGRJln4A7xi/DxO', 'Talya', 'LALAOUI', '2024-06-02 11:45:59', NULL),
(6, 'badri@ofestival.fr', '[\"ROLE_ADMIN\"]', '$2y$13$dtEoqptHglRxkDAhwPSvi.RXyEI5Y0xhRA569ujGRJln4A7xi/DxO', 'Badri', 'CHOULAK', '2024-06-02 11:45:59', NULL),
(7, 'nicolas@ofestival.fr', '[\"ROLE_ADMIN\"]', '$2y$13$dtEoqptHglRxkDAhwPSvi.RXyEI5Y0xhRA569ujGRJln4A7xi/DxO', 'Nicolas', 'JOUBERT', '2024-06-02 11:45:59', NULL),
(8, 'marjorie@ofestival.fr', '[\"ROLE_ADMIN\"]', '$2y$13$dtEoqptHglRxkDAhwPSvi.RXyEI5Y0xhRA569ujGRJln4A7xi/DxO', 'Marjorie', 'MARCOS', '2024-06-02 11:45:59', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_ticket`
--
ALTER TABLE `customer_ticket`
  ADD PRIMARY KEY (`customer_id`,`ticket_id`),
  ADD KEY `IDX_266571F29395C3F3` (`customer_id`),
  ADD KEY `IDX_266571F2700047D2` (`ticket_id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genre_artist`
--
ALTER TABLE `genre_artist`
  ADD PRIMARY KEY (`genre_id`,`artist_id`),
  ADD KEY `IDX_EAEAA6A74296D31F` (`genre_id`),
  ADD KEY `IDX_EAEAA6A7B7970CF8` (`artist_id`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_AC0E2067B7970CF8` (`artist_id`),
  ADD KEY `IDX_AC0E20672298D193` (`stage_id`);

--
-- Indexes for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `slot`
--
ALTER TABLE `slot`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stage`
--
ALTER TABLE `stage`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_ticket`
--
ALTER TABLE `customer_ticket`
  ADD CONSTRAINT `FK_266571F2700047D2` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_266571F29395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `genre_artist`
--
ALTER TABLE `genre_artist`
  ADD CONSTRAINT `FK_EAEAA6A74296D31F` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_EAEAA6A7B7970CF8` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `slot`
--
ALTER TABLE `slot`
  ADD CONSTRAINT `FK_AC0E20672298D193` FOREIGN KEY (`stage_id`) REFERENCES `stage` (`id`),
  ADD CONSTRAINT `FK_AC0E2067B7970CF8` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
