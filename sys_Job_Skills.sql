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
-- Table structure for table `Job_Skills`
--

DROP TABLE IF EXISTS `Job_Skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Job_Skills` (
  `Req_ID` int NOT NULL,
  `Skills` varchar(255) NOT NULL,
  `Required` varchar(45) DEFAULT NULL,
  `Amount` int DEFAULT NULL,
  `Of_Experience` varchar(45) DEFAULT NULL,
  KEY `Req_ID_idx` (`Req_ID`),
  CONSTRAINT `Req_ID` FOREIGN KEY (`Req_ID`) REFERENCES `Job_Details` (`Req_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Job_Skills`
--

LOCK TABLES `Job_Skills` WRITE;
/*!40000 ALTER TABLE `Job_Skills` DISABLE KEYS */;
INSERT INTO `Job_Skills` VALUES (1000,'Strong Experience in the implementation, execution, and maintenance of Data Integration technology solutions.','Required',NULL,''),(1000,'Minimum (4-6) years of hands-on experience with Cloud databases. ','Required',NULL,''),(1001,'8+ years of Verifiable experience of .NET web development including stand-alone and N-tier architecture environments.','Required',NULL,''),(1001,'8+ years of experience full stack development in Microsoft stack or MS.NET technologies, C#, Visual Studio.','Required',NULL,''),(1001,'2+ years with Visual Studio 2019.','Required',NULL,''),(1001,'1+ year experience with Visual Studio 2022.','Required',NULL,''),(1001,'5+ years of verifiable experience as a Senior .Net Web Developer using Microsoft .NET technologies.','Required',NULL,''),(1001,'Strong 3-5+ years of experience with ASP.NET core 6.0 and above.','Required',NULL,''),(1001,'Strong 6-8+ years of experience in ASP.NET MVC UI designing including bootstrap, and applications development.','Required',NULL,''),(1001,'6-8+ years of experience on jQuery, implementing Asynchronous JavaScript, Ajax, and other scripting languages.','Required',NULL,''),(1001,'8+ years of .NET experience developing with the C-Sharp (C#) language.','Required',NULL,''),(1001,'6-8+ years of experience with SQL Server Database Design and development including data conversion, optimization of queries, creating tables, views.','Required',NULL,''),(1001,'64-6+ years of experience developing reports in SQL Server Reporting Services (SSRS)/Telerik Reporting and making them accessible within an MVC web app.','Required',4,'Years'),(1001,'Experience or a demonstrable understanding of code repository strategies, code promotion strategies and recovery using Team Foundation Server TFS.','Required',5,'Years'),(1001,'5 years of experience developing a project or Phases within the AGILE methodology.','Required',5,'Years'),(1001,'Must have a college degree in computers science or similar field and having a master’s degree is an added advantage.','Required',NULL,''),(1001,'Must be local to OHIO and can come to AGR main campus to allow for conducting work on-site.','Required',NULL,''),(1001,'Good to have experience ASP.NET core/MVC UI experience with Telerik or other third-party controls.','Highly Desired',NULL,''),(1001,'Good to have an experience Microsoft Sync and replication or distributed systems.','Highly Desired',NULL,''),(1001,'Good to have an experience with Offline/Stand-alone web application development approach using ASP. NET core MVC, C# and SQL Server.','Highly Desired',NULL,''),(1001,'Good to have experience with pair programming, code reviews, impact analysis, documentation and TFS dashboard, product backlog or task board.','Highly Desired',NULL,''),(1001,'Good to have an IT experience within another State agency or department is an added advantage.','Highly Desired',NULL,''),(1001,'Subject Matter Expertise in SQL Server Administration…including the latest versions, up to and including MSSQL 2022','Required',10,'Years'),(1002,'Certification as a Microsoft Technology Specialist','Required',NULL,''),(1002,'Experience as a MS SQL SERVER Database Administrator in Design, Development, Administration and Management using version of SQL Server including 2022','Required',NULL,''),(1002,'Support of 24x7 large scale WINDOWS SQL Server production environment (including 2-node/3-node Clusters, active/active and active/passive).','Required',NULL,''),(1002,'Expertise in MSSQL Storage and Security Architectures for databases','Required',NULL,''),(1002,'Experience migrating SQL databases from On-Prem to Azure Cloud Platform','Required',NULL,''),(1002,'Design ETL applications to rearchitect legacy DB2 data structures and remapping of data to SQL and/or Oracle.','Required',NULL,''),(1002,'Implement and monitor High Availability Solutions and Disaster Recovery systems ','Required',NULL,''),(1002,'Experience in Clustering, Always On, Snapshot Replication, Log Shipping, Database Mirroring','Required',NULL,''),(1002,'Project Support including data migrations requiring Data Transformation Services (DTS) and SSIS','Required',NULL,''),(1002,'Ability to design and mentor DBA staff in creating, deploying, and maintaining SSIS Packages integrating systems such as DB2, Oracle, and MSSQL ','Required',NULL,'');
/*!40000 ALTER TABLE `Job_Skills` ENABLE KEYS */;
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
\