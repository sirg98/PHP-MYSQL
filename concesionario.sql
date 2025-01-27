-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: concesionario
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
-- Table structure for table `alquileres`
--

DROP TABLE IF EXISTS `alquileres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alquileres` (
  `id_alquiler` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` int(10) unsigned DEFAULT NULL,
  `id_coche` int(10) unsigned DEFAULT NULL,
  `prestado` datetime DEFAULT NULL,
  `devuelto` datetime DEFAULT NULL,
  PRIMARY KEY (`id_alquiler`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alquileres`
--

LOCK TABLES `alquileres` WRITE;
/*!40000 ALTER TABLE `alquileres` DISABLE KEYS */;
INSERT INTO `alquileres` VALUES (1,5,7,'2024-01-05 10:30:00','2024-01-15 15:45:00'),(2,1,3,'2024-02-10 09:15:00','2024-02-20 14:00:00'),(3,4,6,'2024-03-01 11:20:00','2024-03-10 16:30:00'),(4,8,2,'2024-03-15 08:50:00','2024-03-25 13:25:00'),(5,11,9,'2024-04-01 14:10:00','2024-04-12 18:40:00'),(6,3,4,'2024-04-20 10:45:00','2024-05-01 17:15:00'),(7,2,1,'2024-05-10 09:30:00','2024-05-20 14:55:00'),(8,6,8,'2024-06-05 13:00:00','2024-06-15 19:20:00'),(9,8,10,'2024-06-25 08:15:00','2024-07-05 12:35:00'),(10,9,5,'2024-07-10 11:50:00','2024-07-20 16:45:00');
/*!40000 ALTER TABLE `alquileres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coches`
--

DROP TABLE IF EXISTS `coches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coches` (
  `id_coche` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `modelo` varchar(50) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `alquilado` tinyint(1) DEFAULT NULL,
  `foto` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id_coche`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coches`
--

LOCK TABLES `coches` WRITE;
/*!40000 ALTER TABLE `coches` DISABLE KEYS */;
INSERT INTO `coches` VALUES (1,'Corolla','Toyota','Blanco',20000,1,'corolla.jpg'),(2,'Civic','Honda','Negro',22500,0,'civic.jpg'),(3,'Mustang','Ford','Rojo',36000,1,'mustang.jpg'),(4,'Camaro','Chevrolet','Azul',38000,1,'camaro.jpg'),(5,'Serie 3','BMW','Gris metalico',42000,0,'serie3.jpg'),(6,'A4','Audi','Blanco perlado',41500,0,'a4.jpg'),(7,'Clase C','Mercedes-Benz','Negro brillante',45000,0,NULL),(8,'Elantra','Huyndai','Plata',18500,0,'elantra.jpg'),(9,'Spostage','Kia','Rojo orcuro',25000,1,'sportage.jpg'),(10,'Model 3','Tesla','Blanco',40000,1,'model3.jpg'),(11,'Altima','Nissan','Negro',24500,1,'altima.jpg');
/*!40000 ALTER TABLE `coches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(100) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `dni` varchar(9) DEFAULT NULL,
  `saldo` float DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'pass1234','Carlos','García López','12345678A',1250.5),(2,'mysecurepwd','Ana','Martínez Pérez','87654321B',2300),(3,'qwerty2024','Laura','Gómez Rodríguez','11223344C',540),(4,'abcDEF321','Miguel','Fernández Ruiz','33445566D',3200.75),(5,'sunshine987','Marta','López Sánchez','44556677E',980.2),(6,'password2023','Luis','Romero Torres','55667788F',1800),(7,'rocksolid45','Julia','Navarro Gómez','66778899G',750.3),(8,'flowerpower01','Sara','Domínguez Morales','77889900H',1120.5),(9,'hunterXhunter','David','Vargas Ruiz','88990011J',5000),(10,'secureme987','Elena','Ortiz Herrera','99001122K',600);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-17 16:58:30
