-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 21 mai 2025 à 17:50
-- Version du serveur : 8.3.0
-- Version de PHP : 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hrtelecoms`
--

-- --------------------------------------------------------

--
-- Structure de la table `abouts`
--

DROP TABLE IF EXISTS `abouts`;
CREATE TABLE IF NOT EXISTS `abouts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `texte1` longtext COLLATE utf8mb4_unicode_ci,
  `texte2` longtext COLLATE utf8mb4_unicode_ci,
  `button` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageUrl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `abouts`
--

INSERT INTO `abouts` (`id`, `title1`, `title2`, `texte1`, `texte2`, `button`, `imageUrl`, `created_at`, `updated_at`) VALUES
(1, 'À propos de nous', 'Une expertise à votre service', 'HrTélécoms est un fournisseur de solutions de téléphonie VoIP sur mesure pour les entreprises. Avec plus de 10 ans d\'expérience dans le domaine, nous accompagnons nos clients dans leur transformation numérique en proposant des solutions performantes, flexibles et économiques.', 'Notre équipe d\'experts techniques met tout en œuvre pour vous offrir un service de qualité et un support réactif. Nous croyons en une approche personnalisée qui s\'adapte aux besoins spécifiques de chaque entreprise.', 'Contactez-nous', 'images/68178503d3672_guide4.jpg', '2025-05-04 13:17:23', '2025-05-04 13:17:23');

-- --------------------------------------------------------

--
-- Structure de la table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment_date` datetime NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `google_event_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `appointments`
--

INSERT INTO `appointments` (`id`, `name`, `company`, `email`, `phone`, `appointment_date`, `message`, `is_confirmed`, `google_event_id`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test', 'david.grougi@gmail.com', '0616602898', '2025-05-14 12:00:00', 'gùldsmfgldmfg', 0, NULL, '2025-05-10 17:41:00', '2025-05-10 17:41:00');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `imageUrl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `category_realization`
--

DROP TABLE IF EXISTS `category_realization`;
CREATE TABLE IF NOT EXISTS `category_realization` (
  `realization_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`realization_id`,`category_id`),
  KEY `category_realization_category_id_foreign` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contactsujets`
--

DROP TABLE IF EXISTS `contactsujets`;
CREATE TABLE IF NOT EXISTS `contactsujets` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `sujet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contactsujets`
--

INSERT INTO `contactsujets` (`id`, `sujet`, `created_at`, `updated_at`) VALUES
(1, 'Demonstration', '2025-05-05 16:23:19', '2025-05-05 16:23:19'),
(2, 'Informations', '2025-05-05 16:23:33', '2025-05-05 16:23:33'),
(3, 'Support technique', '2025-05-05 16:23:43', '2025-05-05 16:23:43'),
(4, 'Autre', '2025-05-05 16:23:52', '2025-05-05 16:23:52');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` text COLLATE utf8mb4_unicode_ci,
  `response` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `response`, `created_at`, `updated_at`) VALUES
(1, 'Qu\'est-ce que la VoIP ?', 'La VoIP (Voice over Internet Protocol) est une technologie qui permet de passer des appels téléphoniques via Internet plutôt que par une ligne téléphonique traditionnelle. Cette technologie convertit la voix en données numériques qui sont transmises via Internet, puis reconverties en signaux vocaux à l\'arrivée.', '2025-05-04 14:54:05', '2025-05-04 14:54:05'),
(2, 'Quelle est la différence entre Centrex et IPBX ?', 'La principale différence réside dans l\'emplacement du système. Un IPBX est installé dans vos locaux et vous en êtes propriétaire, tandis qu\'une solution Centrex est hébergée dans le cloud par le fournisseur de services. Le Centrex ne nécessite pas d\'investissement matériel                             initial important et fonctionne sur un modèle d\'abonnement mensuel, alors que l\'IPBX représente un investissement initial plus conséquent mais peut être plus économique sur le long terme.', '2025-05-04 14:54:49', '2025-05-04 14:54:49'),
(3, 'La qualité des appels est-elle aussi bonne qu\'avec une ligne traditionnelle ?', 'Avec une connexion Internet stable et suffisamment de bande passante, la qualité des appels VoIP est excellente et souvent supérieure à celle des lignes téléphoniques traditionnelles. Nos solutions intègrent des technologies de qualité de service (QoS) qui donnent la priorité au trafic vocal sur votre réseau pour garantir une qualité optimale, même pendant les périodes de forte utilisation.', '2025-05-04 14:55:35', '2025-05-04 14:55:35'),
(4, 'Est-il possible de conserver mes numéros de téléphone actuels ?', 'Oui, la portabilité des numéros est tout à fait possible. Nous nous occupons de toutes les démarches administratives pour transférer vos numéros existants vers notre système, sans interruption de service.', '2025-05-04 14:56:06', '2025-05-04 14:56:06'),
(5, 'Comment fonctionne l\'application mobile ?', 'Notre application mobile vous permet d\'utiliser votre smartphone comme une extension de votre système téléphonique professionnel. Vous pouvez passer et recevoir des appels professionnels avec votre numéro de bureau, accéder à votre annuaire d\'entreprise, gérer vos messages vocaux et participer à des conférences téléphoniques, le tout depuis votre téléphone portable, où que vous soyez. L\'application fonctionne sur iOS et Android et utilise soit votre connexion Wi-Fi, soit les données mobiles.', '2025-05-04 14:56:55', '2025-05-04 14:56:55');

-- --------------------------------------------------------

--
-- Structure de la table `herosliders`
--

DROP TABLE IF EXISTS `herosliders`;
CREATE TABLE IF NOT EXISTS `herosliders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `imageUrl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `button` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `herosliders`
--

INSERT INTO `herosliders` (`id`, `imageUrl`, `title`, `description`, `button`, `created_at`, `updated_at`) VALUES
(1, 'images/682e04abf30e6_1.jpg', '\"Votre téléphonie, partout avec vous.\"', 'Grâce à notre solution 100% cloud, restez connecté à vos clients où que vous soyez, sans matériel complexe ni contrainte.', 'Découvrir la liberté', '2025-05-21 14:51:56', '2025-05-21 14:51:56'),
(2, 'images/682e04dd76ff7_guide5.jpg', '\"Un standard sans câbles, sans limites.\"', 'Transformez votre entreprise avec une téléphonie fluide et évolutive, sans installation physique. Facilité et agilité au quotidien.', 'En savoir plus', '2025-05-21 14:52:45', '2025-05-21 14:52:45'),
(3, 'images/682e0506d0ab0_solution3.jpg', '\"Ne manquez plus aucun appel.\"', 'Vos clients peuvent toujours vous joindre, que vous soyez au bureau, en télétravail ou en déplacement. Fini les appels perdus !', 'Voir nos solutions', '2025-05-21 14:53:26', '2025-05-21 14:53:26'),
(4, 'images/682e052405a44_about-2.jpg', '\"Installation rapide, usage immédiat.\"', 'Notre équipe installe votre standard cloud en un temps record. Vous êtes opérationnel en quelques heures, sans coupure.', 'Planifier une démo', '2025-05-21 14:53:56', '2025-05-21 14:53:56'),
(5, 'images/682e058fdd21a_about-1.jpg', '\"Économies et performance assurées.\"', 'Réduisez vos coûts de téléphonie tout en augmentant votre efficacité. Investissez dans l\'avenir sans investir dans du matériel.', 'Calculez vos économies', '2025-05-21 14:55:43', '2025-05-21 14:55:43'),
(6, 'images/682e05c182b37_solution2.jpg', '\"Un accompagnement humain et réactif.\"', 'Un problème, une question ? Nos experts sont disponibles pour vous accompagner à chaque étape de votre projet.', 'Nous contacter', '2025-05-21 14:56:33', '2025-05-21 14:56:33');

-- --------------------------------------------------------

--
-- Structure de la table `infos`
--

DROP TABLE IF EXISTS `infos`;
CREATE TABLE IF NOT EXISTS `infos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codepostal` int DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pays` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lundi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mardi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mercredi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jeudi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendredi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `samedi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dimanche` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `infos`
--

INSERT INTO `infos` (`id`, `adresse`, `codepostal`, `ville`, `pays`, `telephone`, `email`, `lundi`, `mardi`, `mercredi`, `jeudi`, `vendredi`, `samedi`, `dimanche`, `created_at`, `updated_at`) VALUES
(1, '16 rue de la cavée, Impasse Banville', 14320, 'Laize-Clinchamps', 'France', '+33 2 31 43 50 11', 'contact@HrTélécoms.fr', '9h00 - 18h00', '9h00 - 18h00', '9h00 - 18h00', '9h00 - 18h00', '9h00 - 18h00', 'Fermé', 'Fermé', '2025-05-05 16:19:09', '2025-05-05 16:19:09');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_03_31_121311_create_categories_table', 1),
(6, '2025_03_31_123003_create_realizations_table', 1),
(7, '2025_05_04_131832_create_abouts_table', 1),
(8, '2025_05_04_144252_create_titles_table', 1),
(9, '2025_05_04_150239_create_services_table', 1),
(10, '2025_05_04_164125_create_testimonials_table', 2),
(11, '2025_05_04_165114_create_faqs_table', 3),
(12, '2025_05_04_170146_create_solutions_table', 4),
(13, '2025_05_04_171640_create_solutions_table', 5),
(14, '2025_05_05_111253_create_infos_table', 6),
(15, '2025_05_05_112632_create_contactsujets_table', 6),
(16, '2025_05_09_192127_create_phonesliders_table', 7),
(17, '2025_05_10_192329_create_appointments_table', 8),
(18, '2025_05_12_111943_create_herosliders_table', 9);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `phonesliders`
--

DROP TABLE IF EXISTS `phonesliders`;
CREATE TABLE IF NOT EXISTS `phonesliders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `imageUrl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `phonesliders`
--

INSERT INTO `phonesliders` (`id`, `imageUrl`, `alt`, `created_at`, `updated_at`) VALUES
(1, 'images/681e56b546632_wh64-removebg-preview.webp', 'Casque de model WH64 de chez Yealink', '2025-05-09 17:25:41', '2025-05-09 17:25:41'),
(2, 'images/681e56f9e92c2_t54w-removebg-preview.webp', 'Telephone SIP T54W de chez Yealink', '2025-05-09 17:26:49', '2025-05-09 17:26:49'),
(3, 'images/681e570fd2225_T54W-EXP50_-removebg-preview.webp', 'Telephone SIP T54W et pad EXP5 de chez Yealink', '2025-05-09 17:27:11', '2025-05-09 17:27:11'),
(4, 'images/681e57238592f_w70b-removebg-preview.webp', 'DECT W70 de chez Yealink', '2025-05-09 17:27:31', '2025-05-09 17:27:31'),
(5, 'images/681e576191947_w79p-removebg-preview.webp', 'Telephone SIP W79P avec sa base DECT de chez Yealink', '2025-05-09 17:28:33', '2025-05-09 17:28:33');

-- --------------------------------------------------------

--
-- Structure de la table `realizations`
--

DROP TABLE IF EXISTS `realizations`;
CREATE TABLE IF NOT EXISTS `realizations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `moreDescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `additionalInfos` longtext COLLATE utf8mb4_unicode_ci,
  `imageUrls` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `incontext` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `incontext`, `title`, `text`, `created_at`, `updated_at`) VALUES
(1, 'fa-phone-alt', 'Téléphonie IP', 'Solutions de téléphonie professionnelle basées sur le protocole IP, pour une communication fluide et économique.', '2025-05-04 13:05:14', '2025-05-04 13:05:14'),
(2, 'fa-mobile-alt', 'Application mobile', 'Restez connecté à votre système téléphonique professionnel où que vous soyez grâce à notre application mobile intuitive.', '2025-05-04 13:05:39', '2025-05-04 13:05:39'),
(3, 'fa-headset', 'Centre d\'appels', 'Gérez efficacement vos appels entrants et sortants avec nos solutions de centre d\'appels avancées.', '2025-05-04 13:06:06', '2025-05-04 13:06:06'),
(4, 'fa-cogs', 'Installation & Maintenance', 'Bénéficiez d\'une installation professionnelle et d\'un service de maintenance réactif pour assurer la continuité de vos communications.', '2025-05-04 13:06:34', '2025-05-04 13:06:34'),
(5, 'fa-cloud', 'Services cloud', 'Profitez de la flexibilité et de la sécurité du cloud pour vos communications professionnelles.', '2025-05-04 13:06:53', '2025-05-04 13:06:53');

-- --------------------------------------------------------

--
-- Structure de la table `solutions`
--

DROP TABLE IF EXISTS `solutions`;
CREATE TABLE IF NOT EXISTS `solutions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `button1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `liste1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `liste2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `liste3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `liste4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `liste5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imageUrl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `solutions`
--

INSERT INTO `solutions` (`id`, `button1`, `button2`, `title`, `description`, `liste1`, `liste2`, `liste3`, `liste4`, `liste5`, `imageUrl`, `created_at`, `updated_at`) VALUES
(1, 'Centrex', 'En savoir plus', 'Solution Centrex', 'Notre solution Centrex est un service de téléphonie hébergé dans le cloud qui vous permet de bénéficier de tous les avantages d\'un standard téléphonique avancé sans investissement matériel lourd.', 'Aucun investissement matériel initial', 'Mise à jour automatique du système', 'Mobilité avancée avec application smartphone', 'Évolutivité sans limites', 'Facturation mensuelle prévisible', 'images/6817a32d28ebf_centreximg.png', '2025-05-04 15:26:05', '2025-05-04 15:26:05');

-- --------------------------------------------------------

--
-- Structure de la table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `compagny` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `testimonials`
--

INSERT INTO `testimonials` (`id`, `compagny`, `name`, `text`, `created_at`, `updated_at`) VALUES
(1, 'BOURDON & LECELLIER', 'Avocats associés', '5 étoiles : pour la gérance et la proposition commerciale (les conseils avisés de Monsieur Horst), le service administratif (l\'accompagnement de Juline et Merry) et une mention particulière au service                     technique (l\'expertise et la bonne humeur Clément et Thavuth). Tous sont disponibles, réactifs, compétents dans leurs domaines respectifs, une entreprise et des professionnels à recommander !', '2025-05-04 14:47:19', '2025-05-04 14:47:19'),
(2, 'SARL GRIZCKLES', '(SARL GRIZCKLES)', 'Avouons que les contacts avec l\'ensemble de l\'équipe commerciale ont été plus que positif. Tout comme avec Clément, technicien. Offre très concurrentielle, avec des services en plus par rapport à notre précédent fournisseur, pour un prix moindre.', '2025-05-04 14:48:36', '2025-05-04 14:48:36'),
(3, 'SAS Prestagri', 'SAS Prestagri', 'Nous travaillons avec HR Télécoms depuis 3 ans. C\'est une entreprise pro à l\'écoute des demandes. Une équipe sérieuse, efficace et surtout rapide. Top', '2025-05-04 14:49:00', '2025-05-04 14:49:00');

-- --------------------------------------------------------

--
-- Structure de la table `titles`
--

DROP TABLE IF EXISTS `titles`;
CREATE TABLE IF NOT EXISTS `titles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title7` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title8` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title9` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title10` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `titles`
--

INSERT INTO `titles` (`id`, `title1`, `title2`, `title3`, `title4`, `title5`, `title6`, `title7`, `title8`, `title9`, `title10`, `created_at`, `updated_at`) VALUES
(1, 'À propos de nous', 'Nos services', 'Nos solutions', 'Ce que nos clients disent', 'Questions fréquentes', 'Contactez-nous', 'Title7', 'Title8', 'Title9', 'Title10', '2025-05-04 13:18:30', '2025-05-04 13:18:30');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'doko972', 'doko972@gmail.com', NULL, '$2y$10$4DLkETUIP97wlwULf9KAGOdEiwnGUgpPkna5vMTmWZVz85m7wkMu.', NULL, '2025-05-04 13:24:55', '2025-05-04 13:24:55');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `category_realization`
--
ALTER TABLE `category_realization`
  ADD CONSTRAINT `category_realization_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_realization_realization_id_foreign` FOREIGN KEY (`realization_id`) REFERENCES `realizations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
