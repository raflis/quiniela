-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: quiniela
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game_dynamic_user`
--

DROP TABLE IF EXISTS `game_dynamic_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game_dynamic_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `game_dynamic_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validate` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `game_dynamic_user_game_dynamic_id_foreign` (`game_dynamic_id`),
  KEY `game_dynamic_user_user_id_foreign` (`user_id`),
  CONSTRAINT `game_dynamic_user_game_dynamic_id_foreign` FOREIGN KEY (`game_dynamic_id`) REFERENCES `game_dynamics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `game_dynamic_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game_dynamic_user`
--

LOCK TABLES `game_dynamic_user` WRITE;
/*!40000 ALTER TABLE `game_dynamic_user` DISABLE KEYS */;
INSERT INTO `game_dynamic_user` VALUES (2,2,1,'conf-apache__1668004931.JPG',1,'2022-11-09 14:42:11','2022-11-09 14:42:23');
/*!40000 ALTER TABLE `game_dynamic_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game_dynamics`
--

DROP TABLE IF EXISTS `game_dynamics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game_dynamics` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` int(11) NOT NULL,
  `end_time` datetime NOT NULL,
  `order` int(11) NOT NULL,
  `draft` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game_dynamics`
--

LOCK TABLES `game_dynamics` WRITE;
/*!40000 ALTER TABLE `game_dynamics` DISABLE KEYS */;
INSERT INTO `game_dynamics` VALUES (1,'Prueba de una dinámica test','prueba-de-una-dinamica-test','http://127.0.0.1:8000/storage/photos/1/Dinamicas/dinamica1.png','<p>Seamlessly syndicate cutting-edge architectures rather than collaborative collaboration and idea-sharing. Proactively incubate visionary interfaces whereas premium benefits. Seamlessly negotiate ubiquitous leadership skills rather than parallel ideas. Dramatically visualize superior interfaces for best-of-breed alignments. Synergistically formulate performance based users through customized relationships. Interactively deliver cross-platform ROI via granular systems. Intrinsicly enhance effective initiatives vis-a-vis orthogonal outsourcing. Rapidiously monetize market-driven opportunities with multifunctional users. Collaboratively enhance visionary opportunities through revolutionary schemas. Progressively network just in time customer service without real-time scenarios.<br />\r\n<br />\r\nSynergistically drive e-business leadership with unique synergy. Compellingly seize market positioning ROI and bricks-and-clicks e-markets. Proactively myocardinate timely platforms through distributed ideas. Professionally optimize enabled core competencies for leading-edge sources. Professionally enhance stand-alone leadership with innovative synergy. Rapidiously generate backend experiences vis-a-vis long-term high-impact relationships. Authoritatively supply market-driven mindshare and bricks-and-clicks opportunities. Holisticly create diverse innovation through adaptive communities. Efficiently empower seamless meta-services with impactful opportunities. Distinctively transition virtual outsourcing with focused e-tailers.</p>',50,'2022-11-08 22:48:00',1,0,'2022-11-09 03:49:50','2022-11-09 03:49:50'),(2,'Esta es otra dinámica','esta-es-otra-dinamica','http://127.0.0.1:8000/storage/photos/1/Dinamicas/dinamica2.png','<p>This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>',100,'2022-11-09 22:51:00',2,0,'2022-11-09 03:51:27','2022-11-09 03:51:27');
/*!40000 ALTER TABLE `game_dynamics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `games` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `team1_id` bigint(20) unsigned NOT NULL,
  `team2_id` bigint(20) unsigned NOT NULL,
  `score1` int(11) NOT NULL DEFAULT 0,
  `score2` int(11) NOT NULL DEFAULT 0,
  `match_date` datetime NOT NULL,
  `phase` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `games_team1_id_foreign` (`team1_id`),
  KEY `games_team2_id_foreign` (`team2_id`),
  CONSTRAINT `games_team1_id_foreign` FOREIGN KEY (`team1_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `games_team2_id_foreign` FOREIGN KEY (`team2_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `games`
--

LOCK TABLES `games` WRITE;
/*!40000 ALTER TABLE `games` DISABLE KEYS */;
INSERT INTO `games` VALUES (1,1,2,0,0,'2022-11-20 11:00:00','Fase de grupos','2022-10-15 23:03:14','2022-10-16 00:28:47'),(2,3,4,0,0,'2022-11-21 17:00:00','Fase de grupos','2022-10-15 23:18:00','2022-10-15 23:21:21'),(3,1,3,0,0,'2022-11-25 14:00:00','Fase de grupos','2022-10-15 23:21:49','2022-10-15 23:21:49'),(4,4,2,0,0,'2022-11-25 17:00:00','Fase de grupos','2022-10-15 23:22:17','2022-10-15 23:22:17'),(5,2,3,0,0,'2022-11-29 16:00:00','Fase de grupos','2022-10-15 23:22:40','2022-10-15 23:22:40'),(6,4,1,0,0,'2022-11-29 16:00:00','Fase de grupos','2022-10-15 23:23:01','2022-10-15 23:23:01'),(7,5,6,0,0,'2022-11-21 14:00:00','Fase de grupos','2022-10-15 23:23:32','2022-10-15 23:23:32'),(8,7,8,0,0,'2022-11-21 20:00:00','Fase de grupos','2022-10-15 23:24:04','2022-10-15 23:24:04'),(9,8,6,0,0,'2022-11-25 11:00:00','Fase de grupos','2022-10-15 23:24:38','2022-10-15 23:24:38'),(10,5,7,0,0,'2022-11-25 20:00:00','Fase de grupos','2022-10-15 23:25:58','2022-10-15 23:25:58'),(11,8,5,0,0,'2022-11-29 20:00:00','Fase de grupos','2022-10-15 23:26:24','2022-10-15 23:26:24'),(12,6,7,0,0,'2022-11-29 20:00:00','Fase de grupos','2022-10-15 23:26:44','2022-10-15 23:26:44'),(13,9,10,0,0,'2022-11-22 11:00:00','Fase de grupos','2022-10-15 23:27:56','2022-10-15 23:27:56'),(14,11,12,0,0,'2022-11-22 17:00:00','Fase de grupos','2022-10-15 23:28:26','2022-10-15 23:28:26'),(15,12,10,0,0,'2022-11-26 14:00:00','Fase de grupos','2022-10-15 23:28:52','2022-10-15 23:28:52'),(16,9,11,0,0,'2022-11-26 20:00:00','Fase de grupos','2022-10-15 23:29:14','2022-10-15 23:29:14'),(17,12,9,0,0,'2022-11-30 20:00:00','Fase de grupos','2022-10-15 23:29:36','2022-10-15 23:29:36'),(18,10,11,0,0,'2022-11-30 20:00:00','Fase de grupos','2022-10-15 23:30:07','2022-10-15 23:30:07'),(19,14,15,0,0,'2022-11-22 14:00:00','Fase de grupos','2022-10-15 23:30:38','2022-10-15 23:30:38'),(20,13,16,0,0,'2022-11-22 20:00:00','Fase de grupos','2022-10-15 23:31:02','2022-10-15 23:31:02'),(21,15,16,0,0,'2022-11-26 11:00:00','Fase de grupos','2022-10-15 23:31:23','2022-10-15 23:31:23'),(22,13,14,0,0,'2022-11-26 17:00:00','Fase de grupos','2022-10-15 23:31:42','2022-10-15 23:31:42'),(23,16,14,0,0,'2022-11-30 16:00:00','Fase de grupos','2022-10-15 23:32:08','2022-10-15 23:32:08'),(24,15,13,0,0,'2022-11-30 16:00:00','Fase de grupos','2022-10-15 23:32:25','2022-10-15 23:32:25'),(25,18,19,0,0,'2022-11-23 14:00:00','Fase de grupos','2022-10-15 23:34:11','2022-10-15 23:34:11'),(26,17,20,0,0,'2022-11-23 17:00:00','Fase de grupos','2022-10-15 23:34:31','2022-10-15 23:34:31'),(27,19,20,0,0,'2022-11-27 11:00:00','Fase de grupos','2022-10-15 23:34:49','2022-10-15 23:34:49'),(28,17,18,0,0,'2022-11-27 20:00:00','Fase de grupos','2022-10-15 23:35:06','2022-10-15 23:35:06'),(29,19,17,0,0,'2022-12-01 20:00:00','Fase de grupos','2022-10-15 23:35:29','2022-10-15 23:35:29'),(30,20,18,0,0,'2022-12-01 20:00:00','Fase de grupos','2022-10-15 23:35:50','2022-10-15 23:35:50'),(31,23,24,0,0,'2022-11-23 11:00:00','Fase de grupos','2022-10-15 23:36:10','2022-10-15 23:36:10'),(32,21,22,0,0,'2022-11-23 20:00:00','Fase de grupos','2022-10-15 23:36:30','2022-10-15 23:36:30'),(33,21,23,0,0,'2022-11-27 14:00:00','Fase de grupos','2022-10-15 23:36:47','2022-10-15 23:36:47'),(34,24,22,0,0,'2022-11-27 17:00:00','Fase de grupos','2022-10-15 23:37:06','2022-10-15 23:37:06'),(35,24,21,0,0,'2022-12-01 16:00:00','Fase de grupos','2022-10-15 23:37:25','2022-10-15 23:37:25'),(36,22,23,0,0,'2022-12-01 16:00:00','Fase de grupos','2022-10-15 23:37:43','2022-10-15 23:37:43'),(37,27,28,0,0,'2022-11-24 11:00:00','Fase de grupos','2022-10-15 23:38:00','2022-10-15 23:38:00'),(38,25,26,0,0,'2022-11-24 20:00:00','Fase de grupos','2022-10-15 23:38:15','2022-10-15 23:38:15'),(39,28,26,0,0,'2022-11-28 11:00:00','Fase de grupos','2022-10-15 23:38:34','2022-10-15 23:38:34'),(40,25,27,0,0,'2022-11-28 17:00:00','Fase de grupos','2022-10-15 23:38:51','2022-10-15 23:38:51'),(41,26,27,0,0,'2022-12-02 20:00:00','Fase de grupos','2022-10-15 23:39:16','2022-10-15 23:39:16'),(42,28,25,0,0,'2022-12-02 20:00:00','Fase de grupos','2022-10-15 23:39:37','2022-10-15 23:39:37'),(43,31,32,0,0,'2022-11-24 14:00:00','Fase de grupos','2022-10-15 23:41:11','2022-10-15 23:41:11'),(44,29,30,0,0,'2022-11-24 17:00:00','Fase de grupos','2022-10-15 23:41:34','2022-10-15 23:41:34'),(45,32,30,0,0,'2022-11-28 14:00:00','Fase de grupos','2022-10-15 23:41:56','2022-10-15 23:41:56'),(46,29,31,0,0,'2022-11-28 20:00:00','Fase de grupos','2022-10-15 23:42:23','2022-10-15 23:42:23'),(47,30,31,0,0,'2022-12-02 16:00:00','Fase de grupos','2022-10-15 23:42:43','2022-10-15 23:42:43'),(48,32,29,0,0,'2022-12-02 16:00:00','Fase de grupos','2022-10-15 23:43:22','2022-10-15 23:43:22'),(49,1,33,0,0,'2022-12-03 10:00:00','Octavos de final','2022-11-08 23:48:47','2022-11-09 00:19:12'),(50,33,33,0,0,'2022-12-03 14:00:00','Octavos de final','2022-11-08 23:53:05','2022-11-08 23:53:05'),(51,33,33,0,0,'2022-12-05 10:00:00','Octavos de final','2022-11-08 23:53:41','2022-11-08 23:53:41'),(52,33,33,0,0,'2022-12-05 14:00:00','Octavos de final','2022-11-08 23:53:59','2022-11-08 23:53:59'),(53,33,33,0,0,'2022-12-04 10:00:00','Octavos de final','2022-11-08 23:54:29','2022-11-08 23:54:29'),(54,33,33,0,0,'2022-12-04 14:00:00','Octavos de final','2022-11-08 23:54:48','2022-11-08 23:54:48'),(55,33,33,0,0,'2022-12-06 10:00:00','Octavos de final','2022-11-08 23:55:14','2022-11-08 23:55:14'),(56,33,33,0,0,'2022-12-06 14:00:00','Octavos de final','2022-11-08 23:55:37','2022-11-08 23:55:37'),(57,33,33,0,0,'2022-12-09 10:00:00','Cuartos de final','2022-11-08 23:56:29','2022-11-08 23:56:29'),(58,33,33,0,0,'2022-12-09 14:00:00','Cuartos de final','2022-11-08 23:56:46','2022-11-08 23:56:46'),(59,33,33,0,0,'2022-12-10 10:00:00','Cuartos de final','2022-11-08 23:57:12','2022-11-08 23:57:12'),(60,33,33,0,0,'2022-12-10 14:00:00','Cuartos de final','2022-11-08 23:57:27','2022-11-08 23:57:27'),(61,33,33,0,0,'2022-12-13 14:00:00','Semifinales','2022-11-08 23:58:12','2022-11-08 23:58:12'),(62,33,33,0,0,'2022-12-14 14:00:00','Semifinales','2022-11-08 23:58:36','2022-11-08 23:58:36'),(63,33,33,0,0,'2022-12-18 10:00:00','Final','2022-11-08 23:59:04','2022-11-08 23:59:04');
/*!40000 ALTER TABLE `games` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_10_15_131035_create_teams_table',2),(6,'2022_10_15_132443_create_games_table',2),(7,'2022_10_15_175256_update_match_date_to_games_table',3),(8,'2022_10_15_180233_update_score_to_games_table',4),(9,'2022_10_15_192056_update_score1_score2_to_games_table',5),(10,'2022_10_15_200106_create_results_table',6),(11,'2022_10_16_101944_create_posts_table',7),(12,'2022_10_16_193219_update_abstract_to_posts_table',8),(13,'2022_10_16_202439_update_points_to_users_table',9),(14,'2022_10_16_204331_create_page_fields_table',10),(15,'2022_11_08_145001_update_terms_policy_to_page_fields_table',11),(16,'2022_11_08_145737_update_country_position_to_users_table',12),(17,'2022_11_08_181440_update_phase_to_games_table',13),(18,'2022_11_08_183145_update_end_phase16_end_phase8_to_page_fields_table',14),(19,'2022_11_08_210054_create_sliders_table',15),(20,'2022_11_08_221715_create_game_dynamics_table',16),(21,'2022_11_08_222701_create_game_dynamic_user_table',17),(22,'2022_11_09_082221_update_file_to_game_dynamic_user_table',18),(23,'2022_11_09_092456_update_points_field_to_users_table',19);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_fields`
--

DROP TABLE IF EXISTS `page_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_fields` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `game_points` double(8,2) NOT NULL,
  `terms` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `policy` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_phase16` datetime DEFAULT NULL,
  `end_phase8` datetime DEFAULT NULL,
  `end_phase4` datetime DEFAULT NULL,
  `end_phase2` datetime DEFAULT NULL,
  `end_phase1` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_fields`
--

LOCK TABLES `page_fields` WRITE;
/*!40000 ALTER TABLE `page_fields` DISABLE KEYS */;
INSERT INTO `page_fields` VALUES (1,'http://127.0.0.1:8000/storage/photos/1/logo.png','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labo.',50.00,'<p><strong>&iquest;Qu&eacute; son las cookies?</strong></p>\r\n\r\n<p>&quot;Una cookie es un peque&ntilde;o archivo de texto que nuestros sitios almacenan en su computadora o dispositivo m&oacute;vil cuando visita nuestros sitios web. Nuestros sitios web, aplicaciones y otros servicios (&quot;Sitios&quot;), env&iacute;an estos datos a su navegador cuando solicita una p&aacute;gina web por primera vez y luego almacenan los datos en su computadora u otro dispositivo para que el sitio web o la aplicaci&oacute;n pueda acceder, almacenar o recopilar informaci&oacute;n de su dispositivo cuando solicita una p&aacute;gina web por primera vez. Los navegadores admiten cookies y tecnolog&iacute;as similares (como almacenamiento local y p&iacute;xeles) para que nuestros sitios web puedan recordar informaci&oacute;n sobre su visita y puedan usar la informaci&oacute;n para mejorar su experiencia y crear estad&iacute;sticas an&oacute;nimas agregadas sobre el uso del sitio. En esta Pol&iacute;tica, usamos el t&eacute;rmino &quot;cookie&quot; para referirnos tanto a cookies como a tecnolog&iacute;as similares.<br />\r\n<br />\r\nLas cookies pueden ser establecidas por el sitio que est&aacute; visitando (&quot;cookies de origen&quot;) o por un tercero, como aquellos que brindan servicios de an&aacute;lisis o publicidad o contenido interactivo en el sitio (&quot;&quot;cookies de terceros&quot;&quot;). Adem&aacute;s de usar cookies en nuestros sitios, tambi&eacute;n podemos servir nuestras cookies (espec&iacute;ficamente, nuestro p&iacute;xel publicitario) en sitios de terceros operados por nuestros anunciantes que usan nuestra plataforma publicitaria.&quot;</p>\r\n\r\n<p><strong>C&oacute;mo gestionar preferencias y otorgar o revocar el consentimiento</strong></p>\r\n\r\n<p>Existen varias maneras de gestionar las preferencias relacionadas con los Rastreadores y de otorgar o revocar el consentimiento, cuando corresponda:<br />\r\n<br />\r\nLos Usuarios podr&aacute;n gestionar preferencias relacionadas con los Rastreadores directamente desde la configuraci&oacute;n de sus propios dispositivos, por ejemplo, impidiendo el uso o el almacenamiento de Rastreadores.</p>','<p><strong>&iquest;Qu&eacute; son las cookies?</strong></p>\r\n\r\n<p>&quot;Una cookie es un peque&ntilde;o archivo de texto que nuestros sitios almacenan en su computadora o dispositivo m&oacute;vil cuando visita nuestros sitios web. Nuestros sitios web, aplicaciones y otros servicios (&quot;Sitios&quot;), env&iacute;an estos datos a su navegador cuando solicita una p&aacute;gina web por primera vez y luego almacenan los datos en su computadora u otro dispositivo para que el sitio web o la aplicaci&oacute;n pueda acceder, almacenar o recopilar informaci&oacute;n de su dispositivo cuando solicita una p&aacute;gina web por primera vez. Los navegadores admiten cookies y tecnolog&iacute;as similares (como almacenamiento local y p&iacute;xeles) para que nuestros sitios web puedan recordar informaci&oacute;n sobre su visita y puedan usar la informaci&oacute;n para mejorar su experiencia y crear estad&iacute;sticas an&oacute;nimas agregadas sobre el uso del sitio. En esta Pol&iacute;tica, usamos el t&eacute;rmino &quot;cookie&quot; para referirnos tanto a cookies como a tecnolog&iacute;as similares.<br />\r\n<br />\r\nLas cookies pueden ser establecidas por el sitio que est&aacute; visitando (&quot;cookies de origen&quot;) o por un tercero, como aquellos que brindan servicios de an&aacute;lisis o publicidad o contenido interactivo en el sitio (&quot;&quot;cookies de terceros&quot;&quot;). Adem&aacute;s de usar cookies en nuestros sitios, tambi&eacute;n podemos servir nuestras cookies (espec&iacute;ficamente, nuestro p&iacute;xel publicitario) en sitios de terceros operados por nuestros anunciantes que usan nuestra plataforma publicitaria.&quot;</p>\r\n\r\n<p><strong>C&oacute;mo gestionar preferencias y otorgar o revocar el consentimiento</strong></p>\r\n\r\n<p>Existen varias maneras de gestionar las preferencias relacionadas con los Rastreadores y de otorgar o revocar el consentimiento, cuando corresponda:<br />\r\n<br />\r\nLos Usuarios podr&aacute;n gestionar preferencias relacionadas con los Rastreadores directamente desde la configuraci&oacute;n de sus propios dispositivos, por ejemplo, impidiendo el uso o el almacenamiento de Rastreadores.</p>','2022-11-08 20:41:00','2022-11-08 20:35:00','2022-11-08 20:35:00','2022-11-08 20:35:00','2022-11-08 20:35:00',NULL,'2022-11-09 01:40:51');
/*!40000 ALTER TABLE `page_fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('raflisd@gmail.com','4KmP89vDehFdKsdQHI5kCKzm8vdo0wQIV4gbrp1FKXEi0SElQamk7DLloKJ87KIs','2022-11-08 22:11:52'),('raflisd@gmail.com','lPMsb0UYuEICLYMMrx3Q0u08oYymRtmTXvPezwL45W2fZJlWs7YLHmogEt1LFX4Y','2022-11-08 22:13:15'),('raflisd@gmail.com','MarsCBc0ZKh97WOtK4hzF6VZuwPj6BRzUpxNCrNyxIXpxJXauL6m7NmTj3d7DSLn','2022-11-08 22:14:40'),('raflisd@gmail.com','s70o9vZHdza82epOHV8eNRng2HBHOkez6jP75WUG47T7Nn6E2p0daQt3p1h1r03o','2022-11-08 22:15:17'),('raflisd@gmail.com','iGJpWNIZz6nqHeryLlrXVWMWdc3gJbwvhXAdW5cljSLO4p4uI443mmTrceOut5jO','2022-11-08 22:16:42'),('raflisd@gmail.com','xucMOmG3RV1OgLiZmptYOTkgPBNl1NusZQuITk8fQ4warJMwTqzqR2Sm2mDIvCcX','2022-11-08 22:19:33'),('raflisd@gmail.com','A3mlkxMxtVWMdgTeYPuyrBP4OHBD0GjBY7JiNV0wljhcSEdQZxBQm1a1Z7IGhO6G','2022-11-08 22:20:12');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `abstract` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `draft` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'It is a long established fact that a reader','it-is-a-long-established-fact-that-a-reader','http://127.0.0.1:8000/storage/photos/1/Curiosidades/blog2.png','http://127.0.0.1:8000/storage/photos/1/Curiosidades/post_image.png','<p>&ldquo;La transici&oacute;n desde ETFs de oro a fondos de Bitcoin ha comenzado&rdquo;. Eso plantean los analistas de uno de los grupos econ&oacute;micos m&aacute;s grandes e importantes de todo el mundo: JP Morgan.<br />\r\n<br />\r\nY es que el aumento en la inflaci&oacute;n y su incierto futuro han hecho que inversionistas profesionales e institucionales comiencen a buscar un refugio para su dinero, y el oro no ha podido satisfacer sus necesidades en los &uacute;ltimos meses.<br />\r\n<br />\r\n&iquest;Por qu&eacute; Bitcoin? Porque para eso est&aacute; hecho, as&iacute; naci&oacute;, y ha dado resultado.<br />\r\n<br />\r\n&iquest;Por qu&eacute; se dice que el oro es una reserva de valor?<br />\r\n<br />\r\nPrincipalmente por su caracter&iacute;stica de mantener su poder adquisitivo en el tiempo, especialmente en situaciones adversas. &iquest;Y c&oacute;mo lo ha hecho? Veamos:<br />\r\n<br />\r\nEn los &uacute;ltimos 5 a&ntilde;os, el oro se ha valorizado un 33,2% Entonces, hace 5 a&ntilde;os compramos oro y hoy tenemos un 33,2% m&aacute;s de dinero. Bastante bien.<br />\r\n<br />\r\nPero, &iquest;y si hubi&eacute;semos comprado 1% de ese oro en bitcoin?<br />\r\n<br />\r\nS&iacute;, bitcoin es bastante m&aacute;s vol&aacute;til que el oro, &iquest;pero qu&eacute; pasa si s&oacute;lo hubieses usado 1% de tu dinero en comprar bitcoins, y el resto en oro? El riesgo aqu&iacute;, se reduce casi a 0.<br />\r\n<br />\r\nEn 5 a&ntilde;os, Bitcoin se ha valorizado un 938% Eso quiere decir, que si hubieses usado el 1% de tu portafolio para comprar bitcoins, y el 99% para comprar oro, hoy Bitcoin representar&iacute;a el 7,3% de tu portafolio.</p>','¿Qué selección será victima de la maldición de los mundiales?',1,'0','2022-10-17 00:21:38','2022-10-17 00:39:13'),(2,'Maldición de los mundiales','maldicion-de-los-mundiales','http://127.0.0.1:8000/storage/photos/1/Curiosidades/blog2.png','http://127.0.0.1:8000/storage/photos/1/Curiosidades/post_image.png','<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>','¿Qué selección será victima de la maldición de los mundiales?',2,'0','2022-10-17 00:39:01','2022-10-17 00:39:01');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `results`
--

DROP TABLE IF EXISTS `results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `results` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `game_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `result1` int(11) NOT NULL DEFAULT 0,
  `result2` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `results_game_id_foreign` (`game_id`),
  KEY `results_user_id_foreign` (`user_id`),
  CONSTRAINT `results_game_id_foreign` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `results`
--

LOCK TABLES `results` WRITE;
/*!40000 ALTER TABLE `results` DISABLE KEYS */;
INSERT INTO `results` VALUES (1,1,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(2,2,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(3,3,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(4,4,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(5,6,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(6,5,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(7,7,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(8,8,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(9,9,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(10,10,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(11,11,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(12,12,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(13,13,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(14,14,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(15,15,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(16,16,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(17,17,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(18,18,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(19,19,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(20,20,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(21,21,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(22,22,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(23,24,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(24,23,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(25,25,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(26,26,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(27,27,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(28,28,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(29,29,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(30,30,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(31,31,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(32,32,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(33,33,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(34,34,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(35,35,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(36,36,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(37,37,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(38,38,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(39,39,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(40,40,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(41,42,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(42,41,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(43,43,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(44,44,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(45,45,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(46,46,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(47,48,1,0,0,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(48,47,1,6,5,'2022-11-09 00:54:35','2022-11-09 00:54:35'),(49,63,1,7,1,'2022-11-09 01:28:34','2022-11-09 01:28:34');
/*!40000 ALTER TABLE `results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sliders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `draft` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sliders`
--

LOCK TABLES `sliders` WRITE;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` VALUES (1,'QUINIELA','2022','http://127.0.0.1:8000/storage/photos/1/Sliders/man.png',1,0,'2022-11-09 02:16:16','2022-11-09 02:16:16'),(2,'COPA DEL MUNDO','test test test','http://127.0.0.1:8000/storage/photos/1/Sliders/man.png',2,0,'2022-11-09 02:16:42','2022-11-09 02:34:47');
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teams` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (1,'Qatar','A',1,NULL,NULL),(2,'Ecuador','A',2,NULL,NULL),(3,'Senegal','A',3,NULL,NULL),(4,'Países Bajos','A',4,NULL,NULL),(5,'Inglaterra','B',1,NULL,NULL),(6,'Irán','B',2,NULL,NULL),(7,'Estados Unidos','B',3,NULL,NULL),(8,'Gales','B',4,NULL,NULL),(9,'Argentina','C',1,NULL,NULL),(10,'Arabia Saudí','C',2,NULL,NULL),(11,'México','C',3,NULL,NULL),(12,'Polonia','C',4,NULL,NULL),(13,'Francia','D',1,NULL,NULL),(14,'Dinamarca','D',2,NULL,NULL),(15,'Túnez','D',3,NULL,NULL),(16,'Australia','D',4,NULL,NULL),(17,'España','E',1,NULL,NULL),(18,'Alemania','E',2,NULL,NULL),(19,'Japón','E',3,NULL,NULL),(20,'Costa Rica','E',4,NULL,NULL),(21,'Bélgica','F',1,NULL,NULL),(22,'Canadá','F',2,NULL,NULL),(23,'Marruecos','F',3,NULL,NULL),(24,'Croacia','F',4,NULL,NULL),(25,'Brasil','G',1,NULL,NULL),(26,'Serbia','G',2,NULL,NULL),(27,'Suiza','G',3,NULL,NULL),(28,'Camerún','G',4,NULL,NULL),(29,'Portugal','H',1,NULL,NULL),(30,'Ghana','H',2,NULL,NULL),(31,'Uruguay','H',3,NULL,NULL),(32,'Corea del Sur','H',4,NULL,NULL),(33,'Por definirse','X',1,NULL,NULL);
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role` int(11) NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` datetime NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,0,'Raflis','Dennis','1991-06-06 00:00:00','descarga__1665458904.jpg','admin@admin.com',1000099,NULL,NULL,NULL,'$2y$10$N/eBM8JT7cxF7930at5W6O62u/.2nJPKvqx7P76wZcrbBxv9HIK.m','Z3WLg4x6Jmxy2OQFh8DdoOd6myvgDIy0jC3KvVk0hRDcoXb4G37YmEdIAApE','2022-10-11 00:53:14','2022-11-09 14:42:23'),(2,1,'Dennis','Ormeño','1991-06-06 00:00:00','descarga__1665458904.jpg','raflisd@gmail.com',0,'Perú','Ingeniero',NULL,'$2y$10$.1HuHAUNQAp1abW6HyVUwuPMID10De9TY.qSSP7TTa22byGQos/ZC','snoWZfjCZWmT274pqyXfxx3JIz8IBEjagVaKjVVZYP7cVjRFgVlt4nTOEdtJ','2022-10-16 02:48:58','2022-11-08 22:48:59'),(3,1,'Bart','Simpson','2000-01-01 00:00:00','avatar.png','bart@hotmail.com',0,NULL,NULL,NULL,'$2y$10$RilTamL8B3Tr6rifTJAaDenWJ672yMIXepNkSFL1zyfZu7fu7BhtG','Yr2TQpvZFKj6JYSK6eXPhS4jO80kigs7hO3TzbHnnBv62o1c70kSXSm8CaFp','2022-11-08 21:21:05','2022-11-08 21:21:05'),(4,1,'Nicolas','Perez','1990-01-01 00:00:00','avatar.png','nicolas@gmail.com',0,'Colombia','Arquero',NULL,'$2y$10$QUaTvlK8.26oPGqKpcLBN.b6CtTANZJIu/Z0df2q7LeExo1EUsGwu',NULL,'2022-11-09 02:59:24','2022-11-09 03:05:29');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-09  9:50:01
