CREATE DATABASE  IF NOT EXISTS `toytopia` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `toytopia`;
-- MySQL dump 10.13  Distrib 8.0.31, for macos12 (x86_64)
--
-- Host: localhost    Database: toytopia
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `AgeRange`
--

DROP TABLE IF EXISTS `AgeRange`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `AgeRange` (
  `AgeRangeID` int NOT NULL AUTO_INCREMENT,
  `AgeRangeName` varchar(50) NOT NULL,
  PRIMARY KEY (`AgeRangeID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AgeRange`
--

LOCK TABLES `AgeRange` WRITE;
/*!40000 ALTER TABLE `AgeRange` DISABLE KEYS */;
INSERT INTO `AgeRange` VALUES (1,'0-2 Years'),(2,'3-5 Years'),(3,'6-8 Years'),(4,'9-12 Years'),(5,'13+ Years');
/*!40000 ALTER TABLE `AgeRange` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Category`
--

DROP TABLE IF EXISTS `Category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Category` (
  `CategoryID` int NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(50) NOT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Category`
--

LOCK TABLES `Category` WRITE;
/*!40000 ALTER TABLE `Category` DISABLE KEYS */;
INSERT INTO `Category` VALUES (1,'Action Figures'),(2,'Dolls'),(3,'Board Games'),(4,'Building Sets'),(5,'Arts and Crafts'),(6,'Puzzles'),(7,'Remote Control'),(8,'Stuffed Animals');
/*!40000 ALTER TABLE `Category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Toy`
--

DROP TABLE IF EXISTS `Toy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Toy` (
  `ToyID` int NOT NULL AUTO_INCREMENT,
  `ToyName` varchar(50) NOT NULL,
  `ToyImage` longblob,
  `CategoryID` int NOT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `AgeRangeID` int NOT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `DateAddedToCollection` date DEFAULT NULL,
  `ToyConditionID` int NOT NULL,
  `ToyBrandID` int NOT NULL,
  `CreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ToyID`),
  KEY `AgeRangeID` (`AgeRangeID`),
  KEY `IDX_Toy_ToyBrandID` (`ToyBrandID`),
  KEY `IDX_Toy_CategoryID` (`CategoryID`),
  KEY `IDX_Toy_Email` (`Email`),
  KEY `IDX_Toy_ToyName` (`ToyName`),
  KEY `IDX_Toy_ToyConditionID` (`ToyConditionID`),
  CONSTRAINT `toy_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `Category` (`CategoryID`),
  CONSTRAINT `toy_ibfk_2` FOREIGN KEY (`Email`) REFERENCES `User` (`Email`),
  CONSTRAINT `toy_ibfk_3` FOREIGN KEY (`AgeRangeID`) REFERENCES `AgeRange` (`AgeRangeID`),
  CONSTRAINT `toy_ibfk_4` FOREIGN KEY (`ToyConditionID`) REFERENCES `ToyCondition` (`ToyConditionID`),
  CONSTRAINT `toy_ibfk_5` FOREIGN KEY (`ToyBrandID`) REFERENCES `ToyBrand` (`ToyBrandID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Toy`
--

LOCK TABLES `Toy` WRITE;
/*!40000 ALTER TABLE `Toy` DISABLE KEYS */;
INSERT INTO `Toy` VALUES (1,'Stuffed Bear',NULL,1,'Soft and cuddly stuffed bear','john.doe@example.com',2,'Available','2022-01-01',1,2,'2023-04-16 19:12:48','2023-04-16 19:12:48'),(2,'Legos',NULL,2,'Lego bricks set for building various structures','jane.doe@example.com',3,'Available','2022-02-01',2,1,'2023-04-16 19:12:48','2023-04-16 19:12:48'),(3,'Barbie Doll',NULL,1,'Fashion doll with various accessories','john.doe@example.com',1,'Unavailable','2022-03-01',1,3,'2023-04-16 19:12:48','2023-04-16 19:12:48'),(4,'Remote Control Car',NULL,3,'Toy car operated by remote control','bob@example.com',3,'Available','2022-04-01',2,4,'2023-04-16 19:12:48','2023-04-16 19:12:48'),(5,'Puzzle',NULL,2,'Jigsaw puzzle with 100 pieces','jane.doe@example.com',2,'Available','2022-05-01',1,5,'2023-04-16 19:12:48','2023-04-16 19:12:48'),(6,'Action Figure',NULL,1,'Plastic action figure with movable joints','john.doe@example.com',3,'Unavailable','2022-06-01',2,3,'2023-04-16 19:12:48','2023-04-16 19:12:48');
/*!40000 ALTER TABLE `Toy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ToyBrand`
--

DROP TABLE IF EXISTS `ToyBrand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ToyBrand` (
  `ToyBrandID` int NOT NULL AUTO_INCREMENT,
  `ToyBrandName` varchar(50) NOT NULL,
  PRIMARY KEY (`ToyBrandID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ToyBrand`
--

LOCK TABLES `ToyBrand` WRITE;
/*!40000 ALTER TABLE `ToyBrand` DISABLE KEYS */;
INSERT INTO `ToyBrand` VALUES (1,'LEGO'),(2,'Barbie'),(3,'Hasbro'),(4,'Fisher-Price'),(5,'Melissa & Doug');
/*!40000 ALTER TABLE `ToyBrand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ToyCondition`
--

DROP TABLE IF EXISTS `ToyCondition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ToyCondition` (
  `ToyConditionID` int NOT NULL AUTO_INCREMENT,
  `ToyConditionName` varchar(50) NOT NULL,
  PRIMARY KEY (`ToyConditionID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ToyCondition`
--

LOCK TABLES `ToyCondition` WRITE;
/*!40000 ALTER TABLE `ToyCondition` DISABLE KEYS */;
INSERT INTO `ToyCondition` VALUES (1,'New'),(2,'Like New'),(3,'Good'),(4,'Fair'),(5,'Poor');
/*!40000 ALTER TABLE `ToyCondition` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `User` (
  `Email` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `HouseNumberOrName` varchar(50) DEFAULT NULL,
  `StreetName` varchar(50) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `MobileNumber` varchar(15) NOT NULL,
  `PasswordHash` varchar(100) NOT NULL,
  `Salt` varchar(100) NOT NULL,
  `Status` varchar(50) DEFAULT 'active',
  `CreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Email`),
  UNIQUE KEY `IDX_User_Email` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES ('bob@example.com','Bob','Smith','1985-07-08','789 Elm St','Othertown','USA','United States','555-5678','a0a45af5dbd87df831f251e99eb97d6f9e56c8ee8145c5e5d9636dce0d624a08','c2b3241f','inactive','2023-04-16 19:12:13','2023-04-16 19:12:13'),('jane.doe@example.com','Jane','Doe','1985-01-01','456 Elm St','Othertown','USA','United States','555-5678','a0a45af5dbd87df831f251e99eb97d6f9e56c8ee8145c5e5d9636dce0d624a08','a3b69e83','active','2023-04-16 19:12:13','2023-04-16 19:12:13'),('john.doe@example.com','John','Doe','1980-01-01','123 Main St','Anytown','USA','United States','555-1234','4ec32c0e04d96d7e95a8e1f0ca1a0d2c9ed8f139dc41b3547f1a962dbd16540b','bd083b19','active','2023-04-16 19:12:13','2023-04-16 19:12:13');
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-16 21:17:32
