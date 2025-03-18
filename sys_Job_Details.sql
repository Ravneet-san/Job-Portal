CREATE DATABASE  IF NOT EXISTS `sys` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sys`;
-- MySQL dump 10.13  Distrib 8.0.41, for macos15 (x86_64)
--
-- Host: localhost    Database: sys
-- ------------------------------------------------------
-- Server version	9.2.0

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
-- Table structure for table `Job_Details`
--

DROP TABLE IF EXISTS `Job_Details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Job_Details` (
  `Req_ID` int NOT NULL DEFAULT '1000',
  `State_Job_ID` int NOT NULL,
  `Agency` varchar(45) DEFAULT NULL,
  `Job_Title` varchar(255) NOT NULL,
  `Region_Name` varchar(45) DEFAULT NULL,
  `Creation_Date` date DEFAULT NULL,
  `Last_Date` date NOT NULL,
  `Job_Description` varchar(255) NOT NULL,
  `Additional_Job_Description1` varchar(255) DEFAULT NULL,
  `Additional_Job_Desciption2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Req_ID`),
  UNIQUE KEY `Req_ID_UNIQUE` (`Req_ID`),
  UNIQUE KEY `State_Job_ID_UNIQUE` (`State_Job_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Job_Details`
--

LOCK TABLES `Job_Details` WRITE;
/*!40000 ALTER TABLE `Job_Details` DISABLE KEYS */;
INSERT INTO `Job_Details` VALUES (1000,758975,'MCD','Technical Specialist 4/ TS 4','State of Ohio',NULL,'2025-03-10','The Technical Specialist will be responsible for migrating the current data, framework and programs from the ODM EDW IOP Big data environment to the ODM EDW Snowflake environment. Technical Specialist will also involve in Medicaid Enterprise Data.','Warehouse design, development, implementation, migration, maintenance and operation activities. Works closely with Data Governance and Analytics team. Will be one of the key technical resources for ingesting the data to ODM EDW Snowflake environment and','to build new or support existing Data warehouses and DataMart’s for data analytics and exchange with State and Medicaid partners. This position is a member of Medicaid ITS and works closely with the Business Intelligence & Data Analytics team.'),(1001,758175,'AGRI','AGRI-Programmer 4 / PR4 ','State of Ohio',NULL,'2025-02-26','Consultant with expertise in experience in web development using ASP.NET Core, MVC, C#, SQL Server, and Microsoft .NET technologies. ','• Can work independently and as part of a team, the ability to manage time and resources to meet assigned deadlines.\r\n• Have strong understanding of prioritization stemming from the elicitation of system and/or user requirements.','• Must be knowledgeable in the English language/speak clearly and understandably use the English language.\r\nExtensive client side Javascript Frameworks experience NOT desired.'),(1002,755255,'BWC','Technical Specialist 3','State of Ohio',NULL,'2025-01-15','Technical Specialist is a senior level resource with specialized knowledge and experience in a specific technology such as SharePoint development or an SAP specialist. ','The Technical Specialist has an overall knowledge and understanding of application development and architecture that serves as a strong base for technical expertise in a specific product or program.','');
/*!40000 ALTER TABLE `Job_Details` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-15 17:49:49
