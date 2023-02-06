-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for forum
CREATE DATABASE IF NOT EXISTS `forum` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_swedish_ci */;
USE `forum`;

-- Dumping structure for table forum.category
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `nameCategory` text NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table forum.category: ~2 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id_category`, `nameCategory`) VALUES
	(1, 'CONVERSATION'),
	(2, 'QA'),
	(6, 'del');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table forum.post
CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `text` longtext NOT NULL,
  `datePost` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  PRIMARY KEY (`id_post`),
  KEY `user_id` (`user_id`),
  KEY `topic_id` (`topic_id`),
  CONSTRAINT `topic_id` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id_topic`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

-- Dumping data for table forum.post: ~7 rows (approximately)
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` (`id_post`, `text`, `datePost`, `user_id`, `topic_id`) VALUES
	(1, ' Moi, je suis un fana de sport. Je fais de lanatation, je joue au football, au tennis et au basket-ball et je fais du jogging régulièrement.', '2023-01-23 00:00:00', 2, 1),
	(2, 'Qu’est ce que l’informatique ? C’est formidable. Ça permet de gagner du temps et d’éviter les transports en commun.', '2023-01-22 00:00:00', 2, 2),
	(3, 'J´adore la musique ! J´ai une grande collection de C.D.. J´écoute surtout de la musique rock mais j´aime aussi le rap et la musique «dance». ', '2023-01-24 00:00:00', 2, 1),
	(9, 'Hello les joueurs', '2023-01-27 15:30:37', 1, 3),
	(15, 'aaaa', '2023-02-02 16:37:02', 14, 1),
	(16, 'hmmm', '2023-02-02 16:44:51', 14, 1),
	(17, 'hiiiiii micka', '2023-02-03 09:03:37', 15, 1),
	(35, 'hi there ', '2023-02-06 11:08:36', 14, 12),
	(36, 'test', '2023-02-06 11:16:53', 14, 1),
	(37, 'mon message', '2023-02-06 11:17:19', 14, 13),
	(38, 'aa\r\n', '2023-02-06 11:18:21', 14, 13);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;

-- Dumping structure for table forum.topic
CREATE TABLE IF NOT EXISTS `topic` (
  `id_topic` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `dateTopic` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `locked` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id_topic`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `category_id_fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`),
  CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table forum.topic: ~4 rows (approximately)
/*!40000 ALTER TABLE `topic` DISABLE KEYS */;
INSERT INTO `topic` (`id_topic`, `title`, `dateTopic`, `locked`, `user_id`, `category_id`) VALUES
	(1, 'Loisirs', '2023-01-23 00:00:00', 1, 1, 1),
	(2, 'Informatique', '2023-01-22 00:00:00', 0, 2, 2),
	(3, 'Sport', '2023-02-02 08:54:41', 1, 14, 1),
	(12, 'test mhd ', '2023-02-06 11:08:36', 1, 14, 6),
	(13, 'test topic', '2023-02-06 11:17:19', 1, 14, 1);
/*!40000 ALTER TABLE `topic` ENABLE KEYS */;

-- Dumping structure for table forum.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registrationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1',
  `role` varchar(50) DEFAULT 'ROLE_USER',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Dumping data for table forum.user: ~9 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `pseudo`, `email`, `password`, `registrationDate`, `status`, `role`) VALUES
	(1, 'yabhei', 'abc@gmail.com', '12345', '2023-01-23 00:00:00', 1, 'ROLE_USER'),
	(2, 'fof', 'fof@gmail.com', '54321', '2023-01-23 00:00:00', 1, 'ROLE_USER'),
	(6, 'quentin', 'quentin@exemple.com', '$2y$10$ibGXva/KG7JCoFnlVE10JevEnhg3AO5atiuRwYyy2kI3QRWMqwNH2', '2023-01-27 15:47:44', 1, 'ROLE_USER'),
	(14, 'mhd', 'test@gmail.com', '$2y$10$zrQyj4WWZ9qWEmU.SdOp4e87eDO/L5U1qArrCCz7KnJ6i0vuyNSDe', '2023-01-30 16:26:56', 1, 'ROLE_ADMIN'),
	(15, 'micka', 'micka@exemple.com', '$2y$10$UwLF8NRa6LDJmtdgLnT2NOf5uX7ecCv5UFHVbCAtWdMgzcbnQ2HxK', '2023-02-02 14:48:51', 1, 'ROLE_USER'),
	(16, 'toli', 'toli@gmail.com', '$2y$10$y19JrAS66C21FnzVFUq6ruYQ/4tm9M5eqyMVqkBxdNNIrNl5GiCdG', '2023-02-02 16:41:12', 0, 'ROLE_USER'),
	(17, 'jolla', 'jolla@gmail.com', '$2y$10$f68SC872AuB8Xqhn209Dh.GMr0/.h0p/BLdTtlBPA5tVPYy0oyDCW', '2023-02-03 09:59:39', 1, 'ROLE_USER');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
