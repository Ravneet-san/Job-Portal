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
-- Table structure for table `Job_Responsibilities`
--

DROP TABLE IF EXISTS `Job_Responsibilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Job_Responsibilities` (
  `State_Job_ID` int NOT NULL,
  `Responsibilities` varchar(255) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  KEY `State_Job_ID_idx` (`State_Job_ID`),
  CONSTRAINT `State_Job_ID` FOREIGN KEY (`State_Job_ID`) REFERENCES `Job_Details` (`Req_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Job_Responsibilities`
--

LOCK TABLES `Job_Responsibilities` WRITE;
/*!40000 ALTER TABLE `Job_Responsibilities` DISABLE KEYS */;
INSERT INTO `Job_Responsibilities` VALUES (1000,'Provide Snowflake database technical support in developing reliable, efficient, and scalable solutions for various projects on Snowflake.'),(1000,'Participate in Team activities, Design discussions, Stand up meetings and planning Review with team.'),(1000,'Ingest the existing data, framework and programs from ODM EDW IOP Big data environment to the ODM EDW Snowflake environment using the best practices.'),(1000,'Design and develop Snowpark features in Python, understand the requirements and iterate.'),(1000,'Create, monitor, and maintain role-based access controls, Virtual warehouses, Tasks, Snow pipe, Streams on Snowflake databases to support different use cases.'),(1000,'Performance tuning of Snowflake queries and procedures. Recommending and documenting the best practices of Snowflake.'),(1000,'Explore the new capabilities of Snowflake, perform POC and implement them based on business requirements.'),(1000,'Responsible for creating and maintaining the Snowflake technical documentation, ensuring compliance with data governance and security policies.'),(1000,'Implement Snowflake user /query log analysis, History capture, and user email alert configuration.'),(1000,'Enable data governance in Snowflake, including row/column-level data security using secure views and dynamic data masking features.'),(1000,'Perform data analysis, data profiling, data quality and data ingestion in various layers using big data/Hadoop/Hive/Impala queries, PySpark programs and UNIX shell scripts.'),(1000,'Follow the organization coding standard document, Create mappings, sessions and workflows as per the mapping specification document.'),(1000,'Perform Gap and impact analysis of ETL and IOP jobs for the new requirement and enhancements.'),(1000,'Create mockup data, perform Unit testing and capture the result sets against the jobs developed in lower environment.'),(1000,'Updating the production support Run book, Control M schedule document as per the production release.'),(1000,'Create and update design documents, provide detail description about workflows after every production release.'),(1000,'Continuously monitor the production data loads, fix the issues, update the tracker document with the issues, Identify the performance issues.'),(1000,'Performance tuning long running ETL/ELT jobs by creating partitions, enabling full load and other standard approaches.'),(1000,'Perform Quality assurance check, Reconciliation post data loads and communicate to vendor for receiving fixed data.'),(1000,'Participate in ETL/ELT code review and design re-usable frameworks.'),(1000,'Create Change requests, workplan, Test results, BCAB checklist documents for the code deployment to production environment and perform the code validation post deployment.'),(1000,'Work with Snowflake Admin, Hadoop Admin, ETL and SAS admin teams for code deployments and health checks.'),(1000,'Create re-usable framework for Audit Balance Control to capture Reconciliation, mapping parameters and variables, serves as single point of reference for workflows.'),(1000,'Create Snowpark and PySpark programs to ingest historical and incremental data.'),(1000,'Create SQOOP scripts to ingest historical data from EDW oracle database to Hadoop IOP, created HIVE tables and Impala views creation scripts for Dimension tables.'),(1000,'Participate in meetings to continuously upgrade the Functional and technical expertise.');
/*!40000 ALTER TABLE `Job_Responsibilities` ENABLE KEYS */;
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
