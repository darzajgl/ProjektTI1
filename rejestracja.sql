-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: rejestracja
-- ------------------------------------------------------
-- Server version	10.4.27-MariaDB

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imie` varchar(50) NOT NULL,
  `nazwisko` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `haslo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adres` varchar(255) NOT NULL,
  `wyksztalcenie` enum('podstawowe','srednie','wyzsze') NOT NULL,
  `zainteresowania` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Anna','Nowak','anowak','$2y$10$abcdefghijklmnopqrstuvwxyz0123456789','anowak@example.com','ul. Kwiatowa 2, 00-000 Warszawa','wyzsze','programowanie, sport'),(2,'Piotr','Kowalski','pkowalski','$2y$10$abcdefghijklmnopqrstuvwxyz0123456789','pkowalski@example.com','ul. Kwiatowa 3, 00-000 Warszawa','podstawowe','czytanie, gotowanie'),(3,'Katarzyna','Wiśniewska','kwiśniewska','$2y$10$abcdefghijklmnopqrstuvwxyz0123456789','kwiśniewska@example.com','ul. Kwiatowa 4, 00-000 Warszawa','srednie','podróże, ogrodnictwo'),(4,'Jan','Majewski','jmajewski','$2y$10$abcdefghijklmnopqrstuvwxyz0123456789','jmajewski@example.com','ul. Kwiatowa 5, 00-000 Warszawa','wyzsze','fotografia, języki obce'),(5,'Agata','Francuska','afrancuska','$2y$10$abcdefghijklmnopqrstuvwxyz0123456789','adąbrowska@example.com','ul. Kwiatowa 6, 00-000 Warszawa','srednie','muzyka, sztuka'),(6,'Marian','Mostowiak','mostek','$2y$10$ov/Z/jNXT5/a0UobN9Ff/OpDi8a4L.9Z0s2wNZwKmiwxklljYKAlq','marian@example.com','ul. Dolnaa 5, 00-000 Warszawa','wyzsze','sport, podróże'),(7,'Adam','Adamski','adamski','$2y$10$Zg.k.BTKz5V7QvN6GuIjA.ZFohNAGdxwJq.D/XrCSljcGRDOqx5E6','adamski@adamski.com','WWa 00-001','srednie','podroze,on'),(8,'Kamil','Kamski','kamski','$2y$10$1y6z14HFw57/vFP1jhC6l./yA7w/sgIDR0w6TSG0hPTWaO8Zdw1Pa','kamski@kamil.com','WWa 00-002','wyzsze','sport,kultura,podroze,on,on'),(9,'Konrad','Liptowski','liptow','$2y$10$27tw8iyq.kd1DzuElRZbzO4.wF5rprxOrrXB0pjXHtFDIMoGYe/Ly','litpow@konrad.com','Waraszawa ul. Łąkowa 11/14','wyzsze','sport,kultura,podroze,on,on'),(10,'Andrzej','Paprocki','paprocki','$2y$10$H3ZAFny34M1/Mu5vnjYU4e.TJaDSHgD4FRswxJ0S85RpLwECAckF2','paprocki@example.com','Przejazdów 125','podstawowe','kultura,podroze,on'),(11,'Grzegorz','Abramski','abramski','$2y$10$56aTvgkybC3bMpqv16Steu.S9xCzDsdQ677n/bXVRehwXQth9BcVW','abramski@example.com','Abramowice 18/22 00-003, ','podstawowe','podroze,on'),(12,'Jakub','Kaczmarski','kaczorek','$2y$10$fyWAObSwJ.NaKk6IfYIViObhMxQqNLDdRoUzUVHPWMHe4gFFtzp6u','kaczor@abc.com','Gniezno','srednie','sport,kultura,podroze,kino,muzyka'),(13,'Janina','Pawelczyk','pawelczyk','$2y$10$zCMCf2Mp1TYaOtdbn5igy.cDSlFJAMIhYm48grGNgQmEjLVylC6ZO','pawelczyk@hobby.com','Szczecin 00-222','wyzsze','kino,muzyka'),(14,'Arkadiusz','Cholewka','cholewka','$2y$10$3yQKlLVmWI9W85z0SUGRD.CAt6R0eNN1qeewjwp4UmF95ET4jBsY.','cholewka@cholewka.com','Abramowice 18/22 00-003,','srednie','podroze'),(15,'Zygmunt','Krasiński','zygi','$2y$10$.RV5ItD8Y.Tly9kvBseOY.7EYZi//pMJpaTUIezpnKux37WHtd6LS','zygi@example.com','1512/21 Fabryczna','','kultura,podroze'),(16,'Antoni','Antoni','Antoni','$2y$10$UPR.uHsfWnGjAXSaLUkjHeehOEuf.edloYgJZ7DuM9LE9N6su6dcO','antoni@antoni.com','Antoniówka 54 00-222 ','','podroze,kino');
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

-- Dump completed on 2023-01-08 18:51:01
