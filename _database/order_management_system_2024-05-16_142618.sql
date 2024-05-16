-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: order_management_system
-- ------------------------------------------------------
-- Server version	8.3.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients` (
  `client_id` int NOT NULL AUTO_INCREMENT,
  `client_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'Avanti Manufacturing','','2024-04-03 07:03:22','2024-04-03 07:03:22','administrator'),(3,'Lancer Orthodontics ','Calle Saturno #20  Parque PIMSA 1, CP 21000, Mexicali B.C.','2024-04-03 08:46:23','2024-04-03 18:33:23','administrator'),(5,'SKYWORKS','bloop bloop @3442 street','2024-04-25 20:29:32','2024-04-25 20:29:32','administrator'),(6,'ERIBERTINO BORINIBIRI!','calle huatemolocotongo #22222222','2024-04-30 18:45:25','2024-04-30 18:45:48','administrator'),(7,'Alex GC','bloop bloop @3442 street','2024-04-30 18:49:05','2024-04-30 18:49:29','administrator'),(8,'ERIBERTINO BORINIBIRI jr','bloop bloop @3442 street','2024-04-30 18:49:59','2024-04-30 18:49:59','administrator'),(9,'cliente demostracion','calle demostracio #2','2024-05-01 19:53:03','2024-05-01 19:53:03','administrator');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;

--
-- Table structure for table `custom_filled`
--

DROP TABLE IF EXISTS `custom_filled`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `custom_filled` (
  `cf_id` int NOT NULL AUTO_INCREMENT,
  `cf_project_id` int NOT NULL,
  `cf_operation_id` int NOT NULL,
  `cf_custom_field` int NOT NULL,
  `cf_data` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`cf_id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `custom_filled`
--

/*!40000 ALTER TABLE `custom_filled` DISABLE KEYS */;
INSERT INTO `custom_filled` VALUES (25,1,1,1,'descripcion corte 2'),(26,1,1,2,'material'),(27,1,1,3,'2'),(28,1,1,4,'100'),(29,1,1,5,'on'),(30,1,2,6,'on'),(31,1,2,8,'on'),(32,1,2,9,'descrip cnc'),(33,1,2,10,'mat'),(34,1,2,11,'2'),(35,1,2,12,'2'),(39,4,6,15,'descripcion'),(40,4,6,16,'1'),(41,4,6,17,'2'),(42,7,7,18,'on'),(43,12,8,19,'good thank you '),(44,12,8,20,'439'),(45,12,8,21,'2024-04-15'),(46,14,1,1,'buen corte'),(47,14,1,2,'aluminio'),(48,14,1,3,'50'),(49,14,1,4,'200'),(50,14,2,6,'on'),(51,14,2,9,''),(52,14,2,10,''),(53,14,2,11,''),(54,14,2,12,''),(75,18,1,1,''),(76,18,1,2,''),(77,18,1,3,''),(78,18,1,4,''),(79,18,5,13,''),(80,18,5,14,''),(81,18,2,6,'on'),(82,18,2,9,''),(83,18,2,10,''),(84,18,2,11,''),(85,18,2,12,'');
/*!40000 ALTER TABLE `custom_filled` ENABLE KEYS */;

--
-- Table structure for table `operation_custom_field`
--

DROP TABLE IF EXISTS `operation_custom_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `operation_custom_field` (
  `customfield_id` int NOT NULL AUTO_INCREMENT,
  `customfield_operation_id` int NOT NULL,
  `customfield_label` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `customfield_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `customfield_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `customfield_user` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`customfield_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operation_custom_field`
--

/*!40000 ALTER TABLE `operation_custom_field` DISABLE KEYS */;
INSERT INTO `operation_custom_field` VALUES (1,1,'Descripción del corte','descripcindelcorte','textarea','2024-04-05 22:37:00','2024-04-05 22:37:00','administrator'),(2,1,'Material','material','text','2024-04-05 22:40:12','2024-04-05 22:40:12','administrator'),(3,1,'Calibre','calibre','number','2024-04-05 22:40:34','2024-04-05 22:40:34','administrator'),(4,1,'Cantidad','cantidad','number','2024-04-05 22:40:43','2024-04-05 22:40:43','administrator'),(5,1,'Complejidad Alta','complejidadalta','checkbox','2024-04-05 22:41:42','2024-04-05 22:41:42','administrator'),(6,2,'Soldadura MIG','soldaduramig','checkbox','2024-04-09 07:10:33','2024-04-09 07:10:33','administrator'),(7,2,'Soldadura TIG','soldaduratig','checkbox','2024-04-09 07:10:53','2024-04-09 07:10:53','administrator'),(8,2,'Soldadura Electrodo','soldaduraelectrodo','checkbox','2024-04-09 07:11:06','2024-04-09 07:11:06','administrator'),(9,2,'Descripcion','descripcion','text','2024-04-09 07:11:27','2024-04-09 07:11:27','administrator'),(10,2,'Material','material','text','2024-04-09 07:11:42','2024-04-09 07:11:42','administrator'),(11,2,'Calibre','calibre','number','2024-04-09 07:11:49','2024-04-09 07:11:49','administrator'),(12,2,'Cantidad','cantidad','number','2024-04-09 07:11:56','2024-04-09 07:11:56','administrator'),(13,5,'Descripción','descripcin','text','2024-04-10 07:55:42','2024-04-10 07:55:42','administrator'),(14,5,'Tipo de perfil','tipodeperfil','text','2024-04-10 07:55:55','2024-04-10 07:55:55','administrator'),(15,6,'Tipo de corte','tipodecorte','text','2024-04-10 21:36:36','2024-04-10 21:36:36','administrator'),(16,6,'calibre','calibre','number','2024-04-10 21:36:44','2024-04-10 21:36:44','administrator'),(17,6,'peso','peso','number','2024-04-10 21:36:59','2024-04-10 21:36:59','administrator'),(18,7,'Estaba buena? ','estababuena','checkbox','2024-04-25 20:24:10','2024-04-25 20:24:10','administrator'),(19,8,'how are you?','howareyou','text','2024-04-25 20:48:45','2024-04-25 20:48:45','administrator'),(20,8,'ACCESS PARK SECURITY GRID','accessparksecuritygrid','number','2024-04-25 20:49:11','2024-04-25 20:49:11','administrator'),(21,8,'VISITOR CENTER DOOR LOCKS','visitorcenterdoorlocks','date','2024-04-25 20:49:39','2024-04-25 20:49:39','administrator'),(22,10,'esta sirviendo?','estasirviendo','text','2024-05-01 19:53:56','2024-05-01 19:53:56','administrator'),(23,10,'fecha de instalacion inicial','fechadeinstalacioninicial','date','2024-05-01 19:54:15','2024-05-01 19:54:15','administrator');
/*!40000 ALTER TABLE `operation_custom_field` ENABLE KEYS */;

--
-- Table structure for table `operation_shared_fields`
--

DROP TABLE IF EXISTS `operation_shared_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `operation_shared_fields` (
  `shared_id` int NOT NULL AUTO_INCREMENT,
  `shared_project_id` int NOT NULL,
  `shared_operation_id` int NOT NULL,
  `hora_inicio` datetime DEFAULT NULL,
  `hora_termino` datetime DEFAULT NULL,
  `realizo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `reviso` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `entrego` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `recibio` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hora_salida` datetime DEFAULT NULL,
  `hora_recibido` datetime DEFAULT NULL,
  `observaciones` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`shared_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operation_shared_fields`
--

/*!40000 ALTER TABLE `operation_shared_fields` DISABLE KEYS */;
INSERT INTO `operation_shared_fields` VALUES (1,1,1,'2024-04-09 14:08:00','2024-04-09 17:09:00','Realizo 2','Reviso',NULL,'entrego','recibio','2024-04-09 14:09:00','2024-04-10 14:09:00','observaciones'),(2,1,2,'2024-04-10 15:20:00','2024-04-10 15:20:00','jgomezrealizocnc','jgomezrevisocnc',NULL,'entregojgomezcnc','','2024-04-10 15:20:00','2024-04-10 15:20:00','cnc observaciones'),(3,4,6,'2024-04-10 14:43:00','2024-04-10 14:44:00','Realizo','Reviso',NULL,'entrego otra persona','recibio','2024-04-10 14:42:00','2024-04-10 17:43:00','observaciones'),(4,7,7,'2024-04-24 13:26:00','2024-04-25 13:26:00','ERIBERTO','PANCHO',NULL,'Alex','Alex','2024-04-24 13:26:00','2024-04-25 13:26:00','Las hamburguesas estaban buenas pero las papas no la vdd :( '),(5,12,8,'0000-00-00 00:00:00','0000-00-00 00:00:00','','',NULL,'','','0000-00-00 00:00:00','0000-00-00 00:00:00',''),(6,14,9,'0000-00-00 00:00:00','0000-00-00 00:00:00','','',NULL,'','','0000-00-00 00:00:00','0000-00-00 00:00:00',''),(7,14,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','','',NULL,'','','0000-00-00 00:00:00','0000-00-00 00:00:00',''),(8,14,2,'0000-00-00 00:00:00','0000-00-00 00:00:00','','',NULL,'','','0000-00-00 00:00:00','0000-00-00 00:00:00',''),(9,4,4,'2024-05-01 13:38:00','2024-05-01 13:36:00','','',NULL,'','','0000-00-00 00:00:00','0000-00-00 00:00:00',''),(10,2,4,'0000-00-00 00:00:00','2024-05-01 14:28:00','','',NULL,'','','0000-00-00 00:00:00','0000-00-00 00:00:00',''),(11,1,4,'0000-00-00 00:00:00','2024-05-01 15:09:00','','',NULL,'','','0000-00-00 00:00:00','0000-00-00 00:00:00',''),(12,18,5,'2024-05-09 15:45:00','2024-05-10 12:40:00','administrator','administrator',NULL,'administrator','administrator','2024-05-16 18:27:00','2024-05-16 22:27:00',''),(13,18,2,'2024-05-09 15:51:00','0000-00-00 00:00:00','administrator','',NULL,'','','0000-00-00 00:00:00','0000-00-00 00:00:00',''),(14,18,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','administrator','',NULL,'','','0000-00-00 00:00:00','0000-00-00 00:00:00','');
/*!40000 ALTER TABLE `operation_shared_fields` ENABLE KEYS */;

--
-- Table structure for table `operations`
--

DROP TABLE IF EXISTS `operations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `operations` (
  `operation_id` int NOT NULL AUTO_INCREMENT,
  `operation_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `operation_user` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`operation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operations`
--

/*!40000 ALTER TABLE `operations` DISABLE KEYS */;
INSERT INTO `operations` VALUES (1,'Corte Laser CNC','administrator','2024-04-03 21:20:59','2024-04-03 21:31:10'),(2,'Dobles CNC','administrator','2024-04-03 21:33:20','2024-04-03 22:03:17'),(4,'Soldadura','administrator','2024-04-05 00:03:43','2024-04-05 00:03:43'),(5,'Rolado','administrator','2024-04-10 07:55:01','2024-04-10 07:55:01'),(6,'Corte especial','administrator','2024-04-10 21:36:14','2024-04-10 21:36:14'),(7,'Cocinar hamburguesa','administrator','2024-04-25 20:23:25','2024-04-25 20:23:25'),(8,'ACCESS PARK SECURITY','administrator','2024-04-25 20:48:31','2024-04-25 20:48:31'),(9,'ACCESS MAIN SECURITY GRID','administrator','2024-04-25 20:51:34','2024-04-25 20:51:34'),(10,'operacion de prueba cnc','administrator','2024-05-01 19:53:42','2024-05-01 19:53:42');
/*!40000 ALTER TABLE `operations` ENABLE KEYS */;

--
-- Table structure for table `project_operation`
--

DROP TABLE IF EXISTS `project_operation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `project_operation` (
  `po_id` int NOT NULL AUTO_INCREMENT,
  `po_project_id` int NOT NULL,
  `po_operation_id` int NOT NULL,
  `po_order` int NOT NULL DEFAULT '0',
  `po_user` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`po_id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_operation`
--

/*!40000 ALTER TABLE `project_operation` DISABLE KEYS */;
INSERT INTO `project_operation` VALUES (1,1,1,0,'administrator'),(2,1,2,1,'administrator'),(3,1,4,2,'administrator'),(4,2,2,1,'administrator'),(5,2,4,0,'administrator'),(6,3,1,1,'administrator'),(7,3,2,0,'administrator'),(8,3,4,3,'administrator'),(9,3,5,2,'administrator'),(10,3,2,4,'administrator'),(11,2,5,2,'administrator'),(12,2,1,3,'administrator'),(13,1,5,3,'administrator'),(14,4,4,1,'administrator'),(15,4,6,2,'administrator'),(16,5,4,1,'administrator'),(17,5,4,2,'administrator'),(18,5,4,3,'administrator'),(19,5,4,4,'administrator'),(20,6,2,1,'administrator'),(26,6,5,2,'administrator'),(27,6,6,3,'administrator'),(28,6,1,4,'administrator'),(29,7,7,1,'administrator'),(30,9,1,1,'administrator'),(31,9,2,2,'administrator'),(32,9,4,3,'administrator'),(33,9,5,4,'administrator'),(34,9,6,5,'administrator'),(35,9,7,6,'administrator'),(36,10,1,1,'administrator'),(38,12,8,1,'administrator'),(39,14,1,1,'administrator'),(40,14,2,2,'administrator'),(41,14,9,3,'administrator'),(42,15,8,1,'administrator'),(43,15,5,2,'administrator'),(44,15,1,3,'administrator'),(45,16,8,1,'administrator'),(46,16,9,2,'administrator'),(47,16,5,3,'administrator'),(48,16,2,4,'administrator'),(49,16,4,5,'administrator'),(50,16,7,6,'administrator'),(51,16,1,7,'administrator'),(52,17,1,1,'administrator'),(53,17,2,2,'administrator'),(54,17,5,0,'administrator'),(55,18,1,2,'administrator'),(56,18,2,1,'administrator'),(57,18,5,0,'administrator');
/*!40000 ALTER TABLE `project_operation` ENABLE KEYS */;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `projects` (
  `project_id` int NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user` varchar(58) COLLATE utf8mb4_general_ci NOT NULL,
  `installation_required` varchar(3) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `area` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `qty` float NOT NULL,
  `date` date NOT NULL,
  `work_units` float NOT NULL,
  `approved_by` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `main_image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `project_status` varchar(25) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Registrado' COMMENT 'Registrado;\r\nEn Espera;\r\nEn Proceso;\r\nTerminado;\r\nCancelado;',
  `project_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 't' COMMENT 't=taller; m=mantenimiento',
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,1,'Proyecto 1','jgomez','1','area editada',100,'2024-11-22',100,'supervisor','administrator','8577c647231c0cabc7586987bbe03d56.png','2024-04-04 04:46:24','2024-04-30 20:18:50','Terminado','t'),(2,3,'Proyecto 2','jgomez','1','area',200,'2024-05-07',100,'supervisor','administrator','project_1712212658.png','2024-04-04 06:37:38','2024-04-04 06:37:38','Registrado','t'),(3,3,'Proyecto 3','jgomez','0','area editada',100,'2024-04-03',20,'supervisor','administrator','project_1712770579.jpg','2024-04-10 17:36:19','2024-04-10 17:36:19','Registrado','t'),(4,3,'Proyecto de prueba','jgomezcecena','1','Area ',100,'2024-04-30',100,'Supervisor','administrator','project_1712785180.png','2024-04-10 21:39:40','2024-04-10 21:39:40','Registrado','t'),(5,1,'proyecto prueba','alex','1','mantenimiento',111,'2024-04-26',40,'YO','administrator','project_1714076112.png','2024-04-25 20:15:12','2024-04-25 20:15:12','Registrado','t'),(6,1,'proyecto alexxxx 11111112222333@@@#$$','alex','1','mantenimiento',111,'2024-04-26',40,'YO','administrator','project_1714076285.png','2024-04-25 20:18:05','2024-04-25 20:18:05','Registrado','m'),(7,3,'proyecto prueba hamburguesada','alex!!!','1','mantenimiento',111,'2024-04-26',40,'YO','administrator','project_1714076710.png','2024-04-25 20:25:10','2024-04-25 20:25:10','Registrado','m'),(8,5,'proyecto prueba hamburguesada 2','alex','1','mantenimiento',111,'2024-04-26',40,'YO','administrator','project_1714077116.png','2024-04-25 20:31:56','2024-04-25 20:31:56','Registrado','t'),(9,5,'proyecto prueba cosas industriales','alex','1','mantenimiento',111,'2024-04-25',40,'YO','administrator','project_1714077398.png','2024-04-25 20:36:38','2024-04-25 20:36:38','Registrado','t'),(10,1,'proyecto prueba 12345','alex','1','mantenimiento',111,'2024-04-25',40,'YO','administrator','project_1714077462.png','2024-04-25 20:37:42','2024-04-25 20:37:42','Registrado','m'),(11,5,'jurassic park security grid','alex','1','mantenimiento',111,'2024-04-23',40,'YO','administrator','project_1714078044.png','2024-04-25 20:47:24','2024-04-25 20:47:24','Registrado','t'),(12,5,'REBOOT CONNECTED MACHINE INTERFACE','alex','1','mantenimiento',111,'2024-04-26',40,'YO','administrator','project_1714078237.png','2024-04-25 20:50:37','2024-04-25 20:50:37','Registrado','m'),(13,3,'DATE TEST','alex','1','mantenimiento',111,'2019-03-14',40,'YO','administrator','project_1714078399.png','2024-04-25 20:53:19','2024-04-25 20:53:19','Registrado','t'),(14,5,'proyecto prueba 11','alex','0','mantenimiento',111,'2024-04-23',40,'YO','administrator','project_1714502003.png','2024-04-30 18:33:24','2024-04-30 18:33:24','Registrado','m'),(15,6,'Alex','alex','1','mantenimiento',111,'2024-04-30',40,'YO','administrator','project_1714510002.png','2024-04-30 20:46:42','2024-05-01 17:29:00','En Proceso','t'),(16,7,'triceratops enclosure','alex','1','zoologia y veterinaria ',1,'2024-05-02',1,'YO','administrator','project_1714587513.png','2024-05-01 18:18:34','2024-05-01 18:18:34','Registrado','t'),(17,3,'proyecto demostracion 2','joseluis','1','cnc',22,'2024-05-03',50,'joseluis','administrator','project_1714592609.png','2024-05-01 19:43:30','2024-05-01 19:43:30','Registrado','t'),(18,3,'mantenimiento cnc','joseluis','0','cnc',0,'2024-05-03',5,'joseluis','administrator','project_1714593038.png','2024-05-01 19:50:38','2024-05-01 20:41:47','Registrado','m');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;

--
-- Table structure for table `shared_filled`
--

DROP TABLE IF EXISTS `shared_filled`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shared_filled` (
  `sf_id` int NOT NULL AUTO_INCREMENT,
  `sf_shared_id` int NOT NULL,
  `sf_data` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`sf_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shared_filled`
--

/*!40000 ALTER TABLE `shared_filled` DISABLE KEYS */;
/*!40000 ALTER TABLE `shared_filled` ENABLE KEYS */;

--
-- Table structure for table `upload_project`
--

DROP TABLE IF EXISTS `upload_project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `upload_project` (
  `upload_id` int NOT NULL AUTO_INCREMENT,
  `file_project_id` int NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `file_user` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`upload_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upload_project`
--

/*!40000 ALTER TABLE `upload_project` DISABLE KEYS */;
INSERT INTO `upload_project` VALUES (1,3,'printing_template.pdf','C:/xampp/htdocs/order-manager/uploads/project_uploads/printing_template.pdf','administrator','2024-04-10 19:00:13','2024-04-10 19:00:13'),(2,3,'lbl1.pdf','C:/xampp/htdocs/order-manager/uploads/project_uploads/lbl1.pdf','administrator','2024-04-10 19:12:36','2024-04-10 19:12:36'),(3,1,'Proyectos_y_Ahorros_IT.docx','C:/xampp/htdocs/order-manager/uploads/project_uploads/Proyectos_y_Ahorros_IT.docx','administrator','2024-04-10 20:17:26','2024-04-10 20:17:26'),(4,1,'lbl2.pdf','C:/xampp/htdocs/order-manager/uploads/project_uploads/lbl2.pdf','administrator','2024-04-10 21:35:17','2024-04-10 21:35:17'),(5,14,'Generador_De_Reportes__(1).pdf','C:/xampp/htdocs/order-manager/uploads/project_uploads/Generador_De_Reportes__(1).pdf','administrator','2024-04-30 18:34:42','2024-04-30 18:34:42'),(6,14,'Generador_De_Reportes__(1)1.pdf','C:/xampp/htdocs/order-manager/uploads/project_uploads/Generador_De_Reportes__(1)1.pdf','administrator','2024-04-30 18:35:06','2024-04-30 18:35:06'),(7,15,'Generador_De_Reportes__(2).pdf','C:/xampp/htdocs/order-manager/uploads/project_uploads/Generador_De_Reportes__(2).pdf','administrator','2024-04-30 20:47:05','2024-04-30 20:47:05'),(8,18,'rox-1.jpg','C:/xampp/htdocs/order-manager/uploads/project_uploads/rox-1.jpg','administrator','2024-05-08 21:16:15','2024-05-08 21:16:15'),(9,18,'rox-8.jpg','C:/xampp/htdocs/order-manager/uploads/project_uploads/rox-8.jpg','administrator','2024-05-08 21:48:09','2024-05-08 21:48:09');
/*!40000 ALTER TABLE `upload_project` ENABLE KEYS */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `is_admin` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `signature` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `uniq` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'joseluis','jose.gomez@avantimanufacturing.com','$2y$10$dXl1UWCbvdHYpbLo8TXbo.yHz5clXixmxfjNe/e1DpVqmrmbdraW.',0,'2024-04-05 04:39:23','2024-04-05 04:39:23',NULL),(2,'administrator','admin@admin.com','$2y$10$07kqsEdai95dj.OZE5deouhrvLNwCnphVpREWoJf.llndHzeHNLaa',1,'2024-04-05 04:39:23','2024-05-09 20:30:01','uploads/signatures/280901861.png'),(3,'german','german.torres@avantimanufacturing.com','$2y$10$e7bIctHNHhfH5UHEBkQnHOJb71QRfEH1zl/rvPnjQKfInHFkmRdGm',0,'2024-04-05 06:32:04','2024-04-05 06:32:04',NULL),(7,'alex','alex@alex.com','$2y$10$ut1ONJ.xn76HFZxYg8jo2.2xnMrUot7vdwFohZtwoCnPVsKFR.3M2',0,'2024-04-30 19:52:03','2024-04-30 19:52:03',NULL),(8,'empleado 22','empleado22@empleado.com','$2y$10$YjpGMo42IZTHr0lcRg6UIuqjEX5YY9q1tDSkn0gsfzs2pf8Feks6y',0,'2024-05-01 19:54:55','2024-05-08 20:23:49','uploads/signatures/81310303872.png');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

--
-- Dumping routines for database 'order_management_system'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-16 14:26:26
