-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: sgp
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.25-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2018_09_10_193152_crear_tabla_cliente',1),(4,'2018_09_10_193413_crear_tabla_proveedor',1),(5,'2018_09_10_193545_crear_tabla_unidadmedida',1),(6,'2018_09_10_193819_crear_tabla_tipoproyecto',1),(7,'2018_09_10_194454_crear_tabla_proyecto',1),(8,'2018_09_11_145526_crear_tabla_reajustefamilia',1),(9,'2018_09_11_145744_crear_tabla_reajustecategoria',1),(10,'2018_09_11_145946_crear_tabla_valorizacionc',1),(11,'2018_09_11_150011_crear_tabla_valorizacionr',1),(12,'2018_09_11_150108_crear_tabla_reajuste',1),(13,'2018_09_11_175258_crear_tabla_adelanto',1),(14,'2018_09_11_175330_crear_tabla_ingreso',1),(15,'2018_09_16_204321_crear_tabla_recurso',1),(16,'2018_09_17_204256_crear_tabla_gasto',1),(17,'2018_09_17_204541_crear_tabla_recursounidadmedida',1),(18,'2018_09_18_162416_crear_tabla_persona',1),(19,'2018_09_18_162735_crear_tabla_usuario',1),(20,'2018_09_18_162810_crear_tabla_proyectousuario',1),(21,'2018_09_18_162844_crear_tabla_tarea',1),(22,'2018_09_18_182514_crear_tabla_empleado',1),(23,'2018_09_18_182543_crear_tabla_factura',1),(24,'2018_09_18_182614_crear_tabla_facturadetalle',1),(25,'2018_09_19_151331_crear_tabla_registrotarea',1),(26,'2018_09_19_151414_crear_tabla_archivotarea',1),(27,'2018_09_19_204152_crear_tabla_precio',1),(28,'2018_09_19_204631_crear_tabla_presupuesto',1),(29,'2018_09_19_204700_crear_tabla_partida',1),(30,'2018_09_19_204759_crear_tabla_analisiscostounitario',1),(31,'2018_09_19_204912_crear_tabla_egreso',1),(32,'2018_09_26_233231_crear_tabla_cur',2),(33,'2018_09_26_233351_crear_tabla_curdetalle',2),(34,'2018_09_26_233414_crear_tabla_curdplazo',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `password_resets_email_unique` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_adelanto`
--

DROP TABLE IF EXISTS `t_adelanto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_adelanto` (
  `adel_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adel_mat` decimal(8,2) NOT NULL,
  `adel_cd` decimal(8,2) NOT NULL,
  `adel_est` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`adel_id`),
  UNIQUE KEY `t_adelanto_pro_id_unique` (`pro_id`),
  CONSTRAINT `t_adelanto_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `t_proyecto` (`pro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_adelanto`
--

LOCK TABLES `t_adelanto` WRITE;
/*!40000 ALTER TABLE `t_adelanto` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_adelanto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_analisiscostounitario`
--

DROP TABLE IF EXISTS `t_analisiscostounitario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_analisiscostounitario` (
  `acu_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `acu_prec` decimal(8,2) NOT NULL,
  `acu_cant` decimal(8,2) NOT NULL,
  `acu_cuad` decimal(8,2) NOT NULL,
  `part_id` int(10) unsigned NOT NULL,
  `recum_id` int(10) unsigned NOT NULL,
  `acu_idpadre` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`acu_id`),
  KEY `t_analisiscostounitario_part_id_foreign` (`part_id`),
  KEY `t_analisiscostounitario_recum_id_foreign` (`recum_id`),
  CONSTRAINT `t_analisiscostounitario_part_id_foreign` FOREIGN KEY (`part_id`) REFERENCES `t_partida` (`part_id`),
  CONSTRAINT `t_analisiscostounitario_recum_id_foreign` FOREIGN KEY (`recum_id`) REFERENCES `t_recursounidadmedida` (`recum_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_analisiscostounitario`
--

LOCK TABLES `t_analisiscostounitario` WRITE;
/*!40000 ALTER TABLE `t_analisiscostounitario` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_analisiscostounitario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_archivotarea`
--

DROP TABLE IF EXISTS `t_archivotarea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_archivotarea` (
  `archita_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `archita_nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archita_peso` double NOT NULL,
  `archita_tip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archita_dir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regitar_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`archita_id`),
  KEY `t_archivotarea_regitar_id_foreign` (`regitar_id`),
  CONSTRAINT `t_archivotarea_regitar_id_foreign` FOREIGN KEY (`regitar_id`) REFERENCES `t_registrotarea` (`regitar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_archivotarea`
--

LOCK TABLES `t_archivotarea` WRITE;
/*!40000 ALTER TABLE `t_archivotarea` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_archivotarea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_cliente`
--

DROP TABLE IF EXISTS `t_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_cliente` (
  `cli_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cli_nom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cli_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_cliente`
--

LOCK TABLES `t_cliente` WRITE;
/*!40000 ALTER TABLE `t_cliente` DISABLE KEYS */;
INSERT INTO `t_cliente` VALUES (1,'Municipalidad de Arequipa',NULL,NULL),(2,'Municipalidad de Caylloma',NULL,NULL),(3,'Binario Consultores',NULL,NULL);
/*!40000 ALTER TABLE `t_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_cur`
--

DROP TABLE IF EXISTS `t_cur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_cur` (
  `cur_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cur_dir` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cur_id`),
  KEY `t_cur_pro_id_foreign` (`pro_id`),
  CONSTRAINT `t_cur_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `t_proyecto` (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_cur`
--

LOCK TABLES `t_cur` WRITE;
/*!40000 ALTER TABLE `t_cur` DISABLE KEYS */;
INSERT INTO `t_cur` VALUES (1,'defecto',1,NULL,NULL),(75,'curs/7.xlsx',7,'2018-10-04 05:26:39','2018-10-04 05:26:39');
/*!40000 ALTER TABLE `t_cur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_curdetalle`
--

DROP TABLE IF EXISTS `t_curdetalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_curdetalle` (
  `curd_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `curd_cant` decimal(8,2) NOT NULL,
  `curd_prec` decimal(8,2) NOT NULL,
  `curd_idpadre` int(11) unsigned NOT NULL,
  `recum_id` int(10) unsigned NOT NULL,
  `cur_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`curd_id`),
  KEY `t_curdetalle_recum_id_foreign` (`recum_id`),
  KEY `t_curdetalle_cur_id_foreign` (`cur_id`),
  KEY `t_curdetalle_curd_idpadre_foreign_idx` (`curd_idpadre`),
  CONSTRAINT `t_curdetalle_cur_id_foreign` FOREIGN KEY (`cur_id`) REFERENCES `t_cur` (`cur_id`),
  CONSTRAINT `t_curdetalle_curd_idpadre_foreign` FOREIGN KEY (`curd_idpadre`) REFERENCES `t_curdetalle` (`curd_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `t_curdetalle_recum_id_foreign` FOREIGN KEY (`recum_id`) REFERENCES `t_recursounidadmedida` (`recum_id`)
) ENGINE=InnoDB AUTO_INCREMENT=261 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_curdetalle`
--

LOCK TABLES `t_curdetalle` WRITE;
/*!40000 ALTER TABLE `t_curdetalle` DISABLE KEYS */;
INSERT INTO `t_curdetalle` VALUES (1,0.00,0.00,1,1,1,NULL,NULL),(192,0.00,0.00,1,243,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(193,172.53,23.69,192,244,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(194,53.20,23.69,192,245,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(195,538.80,21.01,192,246,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(196,830.08,17.03,192,247,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(197,3760.46,15.33,192,248,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(198,0.00,0.00,1,249,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(199,8.00,50.00,198,250,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(200,218.89,5.08,198,251,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(201,94.59,2.46,198,252,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(202,1.12,46.61,198,253,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(203,452.61,50.85,198,254,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(204,2426.40,42.37,198,255,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(205,9.59,5.00,198,256,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(206,328.04,50.85,198,257,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(207,29.12,55.08,198,258,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(208,0.20,46.61,198,259,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(209,2369.13,10.17,198,260,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(210,15412.29,12.71,198,261,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(211,385.99,17.80,198,262,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(212,20.00,28.70,198,263,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(213,6.00,101.69,198,264,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(214,20.00,6.78,198,265,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(215,20.00,6.00,198,266,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(216,20.00,6.78,198,267,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(217,200.13,4.24,198,268,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(218,19.98,5.08,198,269,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(219,1.00,466.10,198,270,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(220,20.00,76.27,198,271,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(221,6.00,101.69,198,272,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(222,1.00,5000.00,198,273,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(223,20.00,18.64,198,274,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(224,20.00,22.88,198,275,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(225,1.00,3500.00,198,276,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(226,19.99,15.25,198,277,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(227,10.00,38.98,198,278,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(228,58.31,10.17,198,279,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(229,19.99,8.47,198,280,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(230,466.51,10.17,198,281,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(231,0.20,42.37,198,282,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(232,5.00,25.42,198,283,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(233,3.00,600.00,198,284,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(234,4.00,84.75,198,285,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(235,20.00,50.85,198,286,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(236,176.53,4.49,198,287,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(237,10.00,38.14,198,288,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(238,0.00,0.00,1,289,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(239,1.00,25000.00,238,290,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(240,1.00,2661.04,238,291,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(241,59.31,5.00,238,292,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(242,139.00,120.00,238,293,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(243,65.36,120.00,238,294,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(244,114.74,170.00,238,295,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(245,7.48,12.00,238,296,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(246,7.35,7.63,238,297,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(247,16.26,155.00,238,298,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(248,28.02,130.00,238,299,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(249,57.76,170.00,238,300,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(250,53.46,15.25,238,301,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(251,205.22,150.00,238,302,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(252,59.31,225.00,238,303,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(253,109.35,6.78,238,304,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(254,395.37,120.00,238,305,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(255,59.31,130.00,238,306,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(256,147.73,140.00,238,307,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(257,39.35,130.00,238,308,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(258,39.54,120.00,238,309,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(259,51.57,11.50,238,310,75,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(260,80.94,330.00,238,311,75,'2018-10-04 05:26:39','2018-10-04 05:26:39');
/*!40000 ALTER TABLE `t_curdetalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_curdplazo`
--

DROP TABLE IF EXISTS `t_curdplazo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_curdplazo` (
  `curdp_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `curdp_cant` decimal(8,2) NOT NULL,
  `curdp_fechin` date NOT NULL,
  `curdp_fechfin` date NOT NULL,
  `curdp_nro` int(11) NOT NULL,
  `curd_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`curdp_id`),
  KEY `t_curdplazo_curd_id_foreign` (`curd_id`),
  CONSTRAINT `t_curdplazo_curd_id_foreign` FOREIGN KEY (`curd_id`) REFERENCES `t_curdetalle` (`curd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_curdplazo`
--

LOCK TABLES `t_curdplazo` WRITE;
/*!40000 ALTER TABLE `t_curdplazo` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_curdplazo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_egreso`
--

DROP TABLE IF EXISTS `t_egreso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_egreso` (
  `egre_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `egre_monto` decimal(8,2) NOT NULL,
  `pro_id` int(10) unsigned NOT NULL,
  `facd_id` int(10) unsigned NOT NULL,
  `egre_idpadre` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`egre_id`),
  KEY `t_egreso_pro_id_foreign` (`pro_id`),
  KEY `t_egreso_facd_id_foreign` (`facd_id`),
  CONSTRAINT `t_egreso_facd_id_foreign` FOREIGN KEY (`facd_id`) REFERENCES `t_facturadetalle` (`facd_id`),
  CONSTRAINT `t_egreso_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `t_proyecto` (`pro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_egreso`
--

LOCK TABLES `t_egreso` WRITE;
/*!40000 ALTER TABLE `t_egreso` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_egreso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_empleado`
--

DROP TABLE IF EXISTS `t_empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_empleado` (
  `emp_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `per_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `t_empleado_per_id_foreign` (`per_id`),
  CONSTRAINT `t_empleado_per_id_foreign` FOREIGN KEY (`per_id`) REFERENCES `t_persona` (`per_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_empleado`
--

LOCK TABLES `t_empleado` WRITE;
/*!40000 ALTER TABLE `t_empleado` DISABLE KEYS */;
INSERT INTO `t_empleado` VALUES (1,1,NULL,NULL),(2,2,NULL,NULL);
/*!40000 ALTER TABLE `t_empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_factura`
--

DROP TABLE IF EXISTS `t_factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_factura` (
  `fac_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fac_nro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fac_fech` date NOT NULL,
  `fac_tipo` int(11) NOT NULL,
  `fac_est` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fac_obs` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prov_id` int(10) unsigned NOT NULL,
  `emp_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pro_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`fac_id`),
  KEY `t_factura_prov_id_foreign` (`prov_id`),
  KEY `t_factura_emp_id_foreign` (`emp_id`),
  KEY `t_factura_pro_id_fereign_idx` (`pro_id`),
  CONSTRAINT `t_factura_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `t_empleado` (`emp_id`),
  CONSTRAINT `t_factura_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `t_proyecto` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `t_factura_prov_id_foreign` FOREIGN KEY (`prov_id`) REFERENCES `t_proveedor` (`prov_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_factura`
--

LOCK TABLES `t_factura` WRITE;
/*!40000 ALTER TABLE `t_factura` DISABLE KEYS */;
INSERT INTO `t_factura` VALUES (1,'900-01','2018-10-07',1,'realizada','obs personalizada',1,1,'2018-10-07 21:58:21','2018-10-07 21:58:21',2),(2,'234-122','2018-10-19',1,'realizada','fsdfsdfsdfsdfsdf',1,2,'2018-10-08 06:57:32','2018-10-08 06:57:32',2),(3,'123-123','2018-10-20',1,'realizada','observaciones',1,2,'2018-10-08 19:27:23','2018-10-08 19:27:23',2),(4,'900-4','2018-10-25',1,'realizada','Observaciones de la factura',1,1,'2018-10-10 17:55:39','2018-10-10 17:55:39',7),(5,'800-0','2018-10-17',1,'realizada','obs',1,2,'2018-10-10 18:03:10','2018-10-10 18:03:10',7),(6,'0','2018-10-19',1,'realizada','asda',1,1,'2018-10-11 02:02:53','2018-10-11 02:02:53',7),(7,'900-2','2018-10-18',1,'realizada','jhcvj dcjsd cjhsd',1,2,'2018-10-11 09:10:21','2018-10-11 09:10:21',7);
/*!40000 ALTER TABLE `t_factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_facturadetalle`
--

DROP TABLE IF EXISTS `t_facturadetalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_facturadetalle` (
  `facd_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `facd_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `facd_cant` int(11) NOT NULL,
  `facd_punit` decimal(8,2) NOT NULL,
  `fac_id` int(10) unsigned NOT NULL,
  `gas_id` int(10) unsigned NOT NULL,
  `recum_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`facd_id`),
  KEY `t_facturadetalle_fac_id_foreign` (`fac_id`),
  KEY `t_facturadetalle_gas_id_foreign` (`gas_id`),
  KEY `t_facturadetalle_recum_id_foreign` (`recum_id`),
  CONSTRAINT `t_facturadetalle_fac_id_foreign` FOREIGN KEY (`fac_id`) REFERENCES `t_factura` (`fac_id`),
  CONSTRAINT `t_facturadetalle_gas_id_foreign` FOREIGN KEY (`gas_id`) REFERENCES `t_gasto` (`gas_id`),
  CONSTRAINT `t_facturadetalle_recum_id_foreign` FOREIGN KEY (`recum_id`) REFERENCES `t_recursounidadmedida` (`recum_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_facturadetalle`
--

LOCK TABLES `t_facturadetalle` WRITE;
/*!40000 ALTER TABLE `t_facturadetalle` DISABLE KEYS */;
INSERT INTO `t_facturadetalle` VALUES (1,'Gaseosas',1,5.50,4,1,1,'2018-10-10 17:57:25','2018-10-10 17:57:25'),(2,'PLANILLAS al 21-oct',1,9000.00,4,1,244,'2018-10-10 17:58:25','2018-10-10 17:58:25'),(3,'Piedra',79,25.30,5,1,257,'2018-10-10 18:03:38','2018-10-10 18:03:38'),(4,'asascdcadcsd',45,78.90,7,1,1,'2018-10-11 09:11:06','2018-10-11 09:11:06'),(5,',kjhkjb',89,7.80,7,1,245,'2018-10-11 09:18:00','2018-10-11 09:18:00');
/*!40000 ALTER TABLE `t_facturadetalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_gasto`
--

DROP TABLE IF EXISTS `t_gasto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_gasto` (
  `gas_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gas_nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`gas_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_gasto`
--

LOCK TABLES `t_gasto` WRITE;
/*!40000 ALTER TABLE `t_gasto` DISABLE KEYS */;
INSERT INTO `t_gasto` VALUES (1,'Defecto',NULL,NULL),(2,'No Oficial',NULL,NULL);
/*!40000 ALTER TABLE `t_gasto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_ingreso`
--

DROP TABLE IF EXISTS `t_ingreso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_ingreso` (
  `ing_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ing_monto` decimal(8,2) NOT NULL,
  `ing_tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ing_fech` date NOT NULL,
  `valr_id` int(10) unsigned NOT NULL,
  `adel_id` int(10) unsigned NOT NULL,
  `pro_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ing_id`),
  KEY `t_ingreso_valr_id_foreign` (`valr_id`),
  KEY `t_ingreso_adel_id_foreign` (`adel_id`),
  KEY `t_ingreso_pro_id_foreign` (`pro_id`),
  CONSTRAINT `t_ingreso_adel_id_foreign` FOREIGN KEY (`adel_id`) REFERENCES `t_adelanto` (`adel_id`),
  CONSTRAINT `t_ingreso_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `t_proyecto` (`pro_id`),
  CONSTRAINT `t_ingreso_valr_id_foreign` FOREIGN KEY (`valr_id`) REFERENCES `t_valorizacionr` (`valr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_ingreso`
--

LOCK TABLES `t_ingreso` WRITE;
/*!40000 ALTER TABLE `t_ingreso` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_ingreso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_partida`
--

DROP TABLE IF EXISTS `t_partida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_partida` (
  `part_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `part_nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `part_prec` decimal(8,2) NOT NULL,
  `part_met` decimal(8,2) NOT NULL,
  `part_cod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `part_rend` decimal(8,2) NOT NULL,
  `rec_cod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umr1_id` int(10) unsigned NOT NULL,
  `umr2_id` int(10) unsigned NOT NULL,
  `um_id` int(10) unsigned NOT NULL,
  `part_idpadre` int(10) unsigned NOT NULL,
  `pres_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`part_id`),
  KEY `t_partida_umr1_id_foreign` (`umr1_id`),
  KEY `t_partida_umr2_id_foreign` (`umr2_id`),
  KEY `t_partida_um_id_foreign` (`um_id`),
  KEY `t_partida_pres_id_foreign` (`pres_id`),
  CONSTRAINT `t_partida_pres_id_foreign` FOREIGN KEY (`pres_id`) REFERENCES `t_presupuesto` (`pres_id`),
  CONSTRAINT `t_partida_um_id_foreign` FOREIGN KEY (`um_id`) REFERENCES `t_unidadmedida` (`um_id`),
  CONSTRAINT `t_partida_umr1_id_foreign` FOREIGN KEY (`umr1_id`) REFERENCES `t_unidadmedida` (`um_id`),
  CONSTRAINT `t_partida_umr2_id_foreign` FOREIGN KEY (`umr2_id`) REFERENCES `t_unidadmedida` (`um_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_partida`
--

LOCK TABLES `t_partida` WRITE;
/*!40000 ALTER TABLE `t_partida` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_partida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_persona`
--

DROP TABLE IF EXISTS `t_persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_persona` (
  `per_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `per_nom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_ape` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_dni` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_dir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`per_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_persona`
--

LOCK TABLES `t_persona` WRITE;
/*!40000 ALTER TABLE `t_persona` DISABLE KEYS */;
INSERT INTO `t_persona` VALUES (1,'David','Dueñas Bravo','974204853','89746374','Calle Girasoles 450','davidxd@gmail.com',NULL,NULL),(2,'Dani','Quiroz Aldazabal','987672536','91876352','Calle Luna 908','dani@gmail.com',NULL,NULL);
/*!40000 ALTER TABLE `t_persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_precio`
--

DROP TABLE IF EXISTS `t_precio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_precio` (
  `prec_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prec_monto` decimal(8,2) NOT NULL,
  `recum_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`prec_id`),
  KEY `t_precio_recum_id_foreign` (`recum_id`),
  CONSTRAINT `t_precio_recum_id_foreign` FOREIGN KEY (`recum_id`) REFERENCES `t_recursounidadmedida` (`recum_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_precio`
--

LOCK TABLES `t_precio` WRITE;
/*!40000 ALTER TABLE `t_precio` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_precio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_presupuesto`
--

DROP TABLE IF EXISTS `t_presupuesto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_presupuesto` (
  `pres_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pres_dir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`pres_id`),
  KEY `t_presupuesto_pro_id_foreign` (`pro_id`),
  CONSTRAINT `t_presupuesto_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `t_proyecto` (`pro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_presupuesto`
--

LOCK TABLES `t_presupuesto` WRITE;
/*!40000 ALTER TABLE `t_presupuesto` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_presupuesto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_proveedor`
--

DROP TABLE IF EXISTS `t_proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_proveedor` (
  `prov_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prov_nom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prov_ruc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`prov_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_proveedor`
--

LOCK TABLES `t_proveedor` WRITE;
/*!40000 ALTER TABLE `t_proveedor` DISABLE KEYS */;
INSERT INTO `t_proveedor` VALUES (1,'DEFECTO','00000000000',NULL,NULL),(2,'Binario Consultores','20600983939',NULL,NULL);
/*!40000 ALTER TABLE `t_proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_proyecto`
--

DROP TABLE IF EXISTS `t_proyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_proyecto` (
  `pro_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pro_nom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_ubi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_cd` decimal(10,2) NOT NULL,
  `pro_gg` decimal(10,2) NOT NULL,
  `pro_uti` decimal(10,2) NOT NULL,
  `pro_fechin` date NOT NULL,
  `pro_fechfin` date NOT NULL,
  `pro_tipo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cli_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`pro_id`),
  KEY `t_proyecto_cli_id_foreign` (`cli_id`),
  CONSTRAINT `t_proyecto_cli_id_foreign` FOREIGN KEY (`cli_id`) REFERENCES `t_cliente` (`cli_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_proyecto`
--

LOCK TABLES `t_proyecto` WRITE;
/*!40000 ALTER TABLE `t_proyecto` DISABLE KEYS */;
INSERT INTO `t_proyecto` VALUES (1,'Alcantarillado de Socabaya','Arequipa - Socabaya',1200000.90,13.00,19.00,'2018-09-01','2018-11-30','obra',3,'2018-09-22 00:38:34','2018-09-22 00:38:34'),(2,'Alcantarillado de Socabaya','Arequipa - Socabaya',1200000.90,13.00,19.00,'2018-09-01','2018-11-30','expediente',3,'2018-09-22 00:46:11','2018-09-22 00:46:11'),(3,'Alcantarillado de Socabaya','Arequipa - Socabaya',1200000.90,13.00,19.00,'2018-09-01','2018-11-30','supervision',3,'2018-09-22 00:48:08','2018-09-22 00:48:08'),(4,'Pavimentación Av. Parra','asdasd',1200000.90,15.00,20.00,'2018-09-08','2018-09-30','obra',3,'2018-09-22 00:50:55','2018-09-22 00:50:55'),(5,'Nuevo Proyecto','Arequipa',12334566.00,12.00,10.00,'2018-09-28','2018-09-28','supervision',3,'2018-09-27 01:18:20','2018-09-27 01:18:20'),(6,'Pavimentación Av. Dolores','JLByR - Arequipa',500000.00,15.00,20.00,'2018-10-01','2018-12-29','obra',3,'2018-10-01 21:00:30','2018-10-01 21:00:30'),(7,': REFORMULACIÓN, ACTUALIZACION Y MEJORAMIENTO,  DEL SERVICIO  DE TRANSITO VEHICULAR  Y PEATONAL EN EL ANEXOS','URACA - CASTILLA - AREQUIPA',733195.00,10.00,5.00,'2018-10-01','2019-01-26','obra',2,'2018-10-01 21:16:21','2018-10-01 21:16:21'),(8,'Ejemplo de Nombre de Proyecto','Arequipa',2000000.00,10.00,8.00,'2018-12-31','2018-12-31','obra',3,'2018-10-16 03:27:56','2018-10-16 03:27:56');
/*!40000 ALTER TABLE `t_proyecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_proyectousuario`
--

DROP TABLE IF EXISTS `t_proyectousuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_proyectousuario` (
  `prousu_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prousu_cargo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_id` int(10) unsigned NOT NULL,
  `usu_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`prousu_id`),
  KEY `t_proyectousuario_pro_id_foreign` (`pro_id`),
  KEY `t_proyectousuario_usu_id_foreign` (`usu_id`),
  CONSTRAINT `t_proyectousuario_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `t_proyecto` (`pro_id`),
  CONSTRAINT `t_proyectousuario_usu_id_foreign` FOREIGN KEY (`usu_id`) REFERENCES `t_usuario` (`usu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_proyectousuario`
--

LOCK TABLES `t_proyectousuario` WRITE;
/*!40000 ALTER TABLE `t_proyectousuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_proyectousuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_reajuste`
--

DROP TABLE IF EXISTS `t_reajuste`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_reajuste` (
  `rea_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rea_nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rea_monto` decimal(8,2) NOT NULL,
  `rea_oper` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reac_id` int(10) unsigned NOT NULL,
  `valr_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`rea_id`),
  KEY `t_reajuste_reac_id_foreign` (`reac_id`),
  KEY `t_reajuste_valr_id_foreign` (`valr_id`),
  CONSTRAINT `t_reajuste_reac_id_foreign` FOREIGN KEY (`reac_id`) REFERENCES `t_reajustecategoria` (`reac_id`),
  CONSTRAINT `t_reajuste_valr_id_foreign` FOREIGN KEY (`valr_id`) REFERENCES `t_valorizacionr` (`valr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_reajuste`
--

LOCK TABLES `t_reajuste` WRITE;
/*!40000 ALTER TABLE `t_reajuste` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_reajuste` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_reajustecategoria`
--

DROP TABLE IF EXISTS `t_reajustecategoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_reajustecategoria` (
  `reac_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reac_nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reaf_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`reac_id`),
  KEY `t_reajustecategoria_reaf_id_foreign` (`reaf_id`),
  CONSTRAINT `t_reajustecategoria_reaf_id_foreign` FOREIGN KEY (`reaf_id`) REFERENCES `t_reajustefamilia` (`reaf_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_reajustecategoria`
--

LOCK TABLES `t_reajustecategoria` WRITE;
/*!40000 ALTER TABLE `t_reajustecategoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_reajustecategoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_reajustefamilia`
--

DROP TABLE IF EXISTS `t_reajustefamilia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_reajustefamilia` (
  `reaf_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reaf_nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`reaf_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_reajustefamilia`
--

LOCK TABLES `t_reajustefamilia` WRITE;
/*!40000 ALTER TABLE `t_reajustefamilia` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_reajustefamilia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_recurso`
--

DROP TABLE IF EXISTS `t_recurso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_recurso` (
  `rec_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rec_nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rec_cod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`rec_id`)
) ENGINE=InnoDB AUTO_INCREMENT=359 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_recurso`
--

LOCK TABLES `t_recurso` WRITE;
/*!40000 ALTER TABLE `t_recurso` DISABLE KEYS */;
INSERT INTO `t_recurso` VALUES (1,'defecto','0',NULL,NULL),(2,'OTROS','0',NULL,NULL),(290,'MANO DE OBRA','','2018-10-04 05:26:39','2018-10-04 05:26:39'),(291,'CAPATAZ','47 00006','2018-10-04 05:26:39','2018-10-04 05:26:39'),(292,'TOPOGRAFO','47 00086','2018-10-04 05:26:39','2018-10-04 05:26:39'),(293,'OPERARIO','47 00007','2018-10-04 05:26:39','2018-10-04 05:26:39'),(294,'OFICIAL','47 00008','2018-10-04 05:26:39','2018-10-04 05:26:39'),(295,'PEON','47 00009','2018-10-04 05:26:39','2018-10-04 05:26:39'),(296,'MATERIALES','','2018-10-04 05:26:39','2018-10-04 05:26:39'),(297,'LETREROS DE SEGURIDAD','00 07740','2018-10-04 05:26:39','2018-10-04 05:26:39'),(298,'CLAVOS CON CABEZA 2\" A 4\"','02 07734','2018-10-04 05:26:39','2018-10-04 05:26:39'),(299,'ACERO CORRUGADO FY=4200 KG/CM2 GRADO 60','03 06206','2018-10-04 05:26:39','2018-10-04 05:26:39'),(300,'ARENA FINA','04 00033','2018-10-04 05:26:39','2018-10-04 05:26:39'),(301,'ARENA GRUESA','04 00029','2018-10-04 05:26:39','2018-10-04 05:26:39'),(302,'AFIRMADO','05 00337','2018-10-04 05:26:39','2018-10-04 05:26:39'),(303,'AGUA','05 00002','2018-10-04 05:26:39','2018-10-04 05:26:39'),(304,'PIEDRA CHANCADA 1/2\"','05 07029','2018-10-04 05:26:39','2018-10-04 05:26:39'),(305,'PIEDRA CHANCADA DE 1/2\" - 3/4\"','05 06995','2018-10-04 05:26:39','2018-10-04 05:26:39'),(306,'PIEDRA MEDIANA DE 4\"','05 01399','2018-10-04 05:26:39','2018-10-04 05:26:39'),(307,'ASFALTO DILUIDO MC-30','13 07039','2018-10-04 05:26:39','2018-10-04 05:26:39'),(308,'ASFALTO LIQUIDO RC-250','13 00097','2018-10-04 05:26:39','2018-10-04 05:26:39'),(309,'CEMENTO PORTLAND TIPO IP (42.5 KG)','21 06994','2018-10-04 05:26:39','2018-10-04 05:26:39'),(310,'BOTAS DE JEBE','26 07002','2018-10-04 05:26:39','2018-10-04 05:26:39'),(311,'EXTINTOR DE FUEGO DE 6KG PQS-ABC','26 07015','2018-10-04 05:26:39','2018-10-04 05:26:39'),(312,'GUANTES DE CUERO','26 07005','2018-10-04 05:26:39','2018-10-04 05:26:39'),(313,'GUANTES DE JEBE','26 07006','2018-10-04 05:26:39','2018-10-04 05:26:39'),(314,'LENTES DE PROTECCION','26 07007','2018-10-04 05:26:39','2018-10-04 05:26:39'),(315,'MALLA ARPILLERA','26 07017','2018-10-04 05:26:39','2018-10-04 05:26:39'),(316,'PROTECCION DE OIDOS TIPO TAPON','26 07008','2018-10-04 05:26:39','2018-10-04 05:26:39'),(317,'BANNER A COLOR 3.00M X 5.00M','29 07732','2018-10-04 05:26:39','2018-10-04 05:26:39'),(318,'BOTINES DE CUERO CON PUNTA DE ACERO','29 07003','2018-10-04 05:26:39','2018-10-04 05:26:39'),(319,'BOTIQUIN DE PRIMEROS AUXILIOS','29 07014','2018-10-04 05:26:39','2018-10-04 05:26:39'),(320,'CAPACITACIóN: SEGURIDAD Y SALUD EN EL TRABAJO','29 07741','2018-10-04 05:26:39','2018-10-04 05:26:39'),(321,'CASCO CON BARBIQUEJO DE BUENA CALIDAD','29 07004','2018-10-04 05:26:39','2018-10-04 05:26:39'),(322,'CINTA DE SEÑALIZACION COLOR ROJO PARA SEGURIDAD  DE OBRA','29 07056','2018-10-04 05:26:39','2018-10-04 05:26:39'),(323,'ELABORACION, IMPLEMENTACION Y ADMINISTRACION DEL PLAN DE SEG','29 07737','2018-10-04 05:26:39','2018-10-04 05:26:39'),(324,'RESPIRADOR DOBLE VIA CONTRA POLVO','29 07738','2018-10-04 05:26:39','2018-10-04 05:26:39'),(325,'CONO DE SEGURIDAD D=0,31 M Y H=0,67 M FV C/BASE FIERRO','30 06265','2018-10-04 05:26:39','2018-10-04 05:26:39'),(326,'YESO DE 28 KG','30 01352','2018-10-04 05:26:39','2018-10-04 05:26:39'),(327,'CHALECO REFLECTIVO','37 06946','2018-10-04 05:26:39','2018-10-04 05:26:39'),(328,'ESCOBA','37 06828','2018-10-04 05:26:39','2018-10-04 05:26:39'),(329,'HORMIGON (PUESTO EN OBRA)','38 00115','2018-10-04 05:26:39','2018-10-04 05:26:39'),(330,'ROTURA DE PROBETA','38 07743','2018-10-04 05:26:39','2018-10-04 05:26:39'),(331,'ALQUILER DE CASA O ALMACEN','39 06042','2018-10-04 05:26:39','2018-10-04 05:26:39'),(332,'LÁMPARA DE SEGURIDAD INTERMITENTE  P/SEÑAL','39 06263','2018-10-04 05:26:39','2018-10-04 05:26:39'),(333,'UNIFORME DE TRABAJO','39 07739','2018-10-04 05:26:39','2018-10-04 05:26:39'),(334,'MADERA TORNILLO','43 00020','2018-10-04 05:26:39','2018-10-04 05:26:39'),(335,'MALLA FAENA ROLLO 50 YD X 1 M NARANJA','72 07485','2018-10-04 05:26:39','2018-10-04 05:26:39'),(336,'EQUIPO','','2018-10-04 05:26:39','2018-10-04 05:26:39'),(337,'MOVILIZACIÓN Y DESMOVILIZACIÓN DE EQUIPOS PESADO, MATERIALES Y HERRAMIENTAS','32 07733','2018-10-04 05:26:39','2018-10-04 05:26:39'),(338,'HERRAMIENTAS MANUALES','37 00004','2018-10-04 05:26:39','2018-10-04 05:26:39'),(339,'MIRAS Y JALONES','37 00104','2018-10-04 05:26:39','2018-10-04 05:26:39'),(340,'CAMION CISTERNA 4X2 (AGUA) 122 HP 3,500GLN','48 07038','2018-10-04 05:26:39','2018-10-04 05:26:39'),(341,'CAMION VOLQUETE 15 M3.','48 03748','2018-10-04 05:26:39','2018-10-04 05:26:39'),(342,'CAMION VOLQUETE 6X4 330 HP 15 M3','48 06996','2018-10-04 05:26:39','2018-10-04 05:26:39'),(343,'MEZCLADORA DE CONCRETO 9 - 11 P3 (23 HP)','48 06993','2018-10-04 05:26:39','2018-10-04 05:26:39'),(344,'VIBRADOR DE CONCRETO 4 HP 1.25\"','48 06876','2018-10-04 05:26:39','2018-10-04 05:26:39'),(345,'CAMION IMPRIMADOR 6X2 178-210 HP DE 1800 GLS.','49 07040','2018-10-04 05:26:39','2018-10-04 05:26:39'),(346,'CARGADOR S/LLANTAS  110 - 125 HP','49 00385','2018-10-04 05:26:39','2018-10-04 05:26:39'),(347,'CARGADOR S/LLANTAS 125-155 HP 3 YD3.','49 01350','2018-10-04 05:26:39','2018-10-04 05:26:39'),(348,'ESTACION TOTAL COMPUTARIZADA','49 07735','2018-10-04 05:26:39','2018-10-04 05:26:39'),(349,'MOTONIVELADORA DE 125 HP','49 00351','2018-10-04 05:26:39','2018-10-04 05:26:39'),(350,'PAVIMENTADORA SOBRE ORUGAS 65 HP','49 07044','2018-10-04 05:26:39','2018-10-04 05:26:39'),(351,'PRISMAS PARA ESTACION TOTAL','49 07736','2018-10-04 05:26:39','2018-10-04 05:26:39'),(352,'RIPPER (P\' 150 HP)','49 02705','2018-10-04 05:26:39','2018-10-04 05:26:39'),(353,'RODILLO LISO VIBR AUTOP 101-135 HP DE 10-12 TN','49 07742','2018-10-04 05:26:39','2018-10-04 05:26:39'),(354,'RODILLO LISO VIBR AUTOP 70-100 HP 7-9 T.','49 00349','2018-10-04 05:26:39','2018-10-04 05:26:39'),(355,'RODILLO NEUMATICO AUTOP. 135 HP 9-26 TON','49 06832','2018-10-04 05:26:39','2018-10-04 05:26:39'),(356,'RODILLO TANDEM VIB.AUTOP 111-130HP 9-11T','49 05739','2018-10-04 05:26:39','2018-10-04 05:26:39'),(357,'TEODOLITO','49 00105','2018-10-04 05:26:39','2018-10-04 05:26:39'),(358,'TRACTOR DE ORUGAS DE 190-240 HP','49 03178','2018-10-04 05:26:39','2018-10-04 05:26:39');
/*!40000 ALTER TABLE `t_recurso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_recursounidadmedida`
--

DROP TABLE IF EXISTS `t_recursounidadmedida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_recursounidadmedida` (
  `recum_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rec_id` int(10) unsigned NOT NULL,
  `um_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`recum_id`),
  KEY `t_recursounidadmedida_rec_id_foreign` (`rec_id`),
  KEY `t_recursounidadmedida_um_id_foreign` (`um_id`),
  CONSTRAINT `t_recursounidadmedida_rec_id_foreign` FOREIGN KEY (`rec_id`) REFERENCES `t_recurso` (`rec_id`),
  CONSTRAINT `t_recursounidadmedida_um_id_foreign` FOREIGN KEY (`um_id`) REFERENCES `t_unidadmedida` (`um_id`)
) ENGINE=InnoDB AUTO_INCREMENT=312 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_recursounidadmedida`
--

LOCK TABLES `t_recursounidadmedida` WRITE;
/*!40000 ALTER TABLE `t_recursounidadmedida` DISABLE KEYS */;
INSERT INTO `t_recursounidadmedida` VALUES (1,1,1,NULL,NULL),(243,290,1,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(244,291,87,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(245,292,87,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(246,293,87,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(247,294,87,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(248,295,87,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(249,296,1,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(250,297,88,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(251,298,89,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(252,299,89,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(253,300,90,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(254,301,90,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(255,302,90,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(256,303,90,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(257,304,90,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(258,305,90,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(259,306,90,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(260,307,91,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(261,308,91,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(262,309,92,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(263,310,93,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(264,311,94,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(265,312,93,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(266,313,93,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(267,314,94,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(268,315,95,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(269,316,94,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(270,317,94,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(271,318,93,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(272,319,94,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(273,320,96,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(274,321,94,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(275,322,97,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(276,323,94,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(277,324,94,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(278,325,94,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(279,326,98,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(280,327,94,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(281,328,94,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(282,329,90,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(283,330,94,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(284,331,99,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(285,332,94,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(286,333,94,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(287,334,100,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(288,335,97,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(289,336,1,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(290,337,96,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(291,338,101,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(292,339,102,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(293,340,102,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(294,341,102,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(295,342,102,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(296,343,102,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(297,344,102,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(298,345,102,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(299,346,102,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(300,347,102,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(301,348,102,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(302,349,102,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(303,350,102,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(304,351,102,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(305,352,102,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(306,353,102,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(307,354,102,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(308,355,102,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(309,356,102,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(310,357,102,'2018-10-04 05:26:39','2018-10-04 05:26:39'),(311,358,102,'2018-10-04 05:26:39','2018-10-04 05:26:39');
/*!40000 ALTER TABLE `t_recursounidadmedida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_registrotarea`
--

DROP TABLE IF EXISTS `t_registrotarea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_registrotarea` (
  `regitar_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `regitar_por` decimal(8,2) NOT NULL,
  `regitar_tit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regitar_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regitar_tiporeg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regitar_fech` date NOT NULL,
  `tar_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`regitar_id`),
  KEY `t_registrotarea_tar_id_foreign` (`tar_id`),
  CONSTRAINT `t_registrotarea_tar_id_foreign` FOREIGN KEY (`tar_id`) REFERENCES `t_tarea` (`tar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_registrotarea`
--

LOCK TABLES `t_registrotarea` WRITE;
/*!40000 ALTER TABLE `t_registrotarea` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_registrotarea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_tarea`
--

DROP TABLE IF EXISTS `t_tarea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_tarea` (
  `tar_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tar_nom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tar_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tar_fechin` date NOT NULL,
  `tar_fechfin` date NOT NULL,
  `tar_prio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tar_est` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tar_idpadre` int(10) unsigned NOT NULL,
  `pro_id` int(10) unsigned NOT NULL,
  `usu_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tar_id`),
  KEY `t_tarea_pro_id_foreign` (`pro_id`),
  KEY `t_tarea_usu_id_foreign` (`usu_id`),
  CONSTRAINT `t_tarea_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `t_proyecto` (`pro_id`),
  CONSTRAINT `t_tarea_usu_id_foreign` FOREIGN KEY (`usu_id`) REFERENCES `t_usuario` (`usu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_tarea`
--

LOCK TABLES `t_tarea` WRITE;
/*!40000 ALTER TABLE `t_tarea` DISABLE KEYS */;
INSERT INTO `t_tarea` VALUES (1,'tAREA','ASDASDASD','2018-10-11','2018-10-13','ALTA','ACTIVO',1,7,1,'2018-10-11 09:25:33','2018-10-11 09:25:33');
/*!40000 ALTER TABLE `t_tarea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_tipoproyecto`
--

DROP TABLE IF EXISTS `t_tipoproyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_tipoproyecto` (
  `tpro_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tpro_nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tpro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_tipoproyecto`
--

LOCK TABLES `t_tipoproyecto` WRITE;
/*!40000 ALTER TABLE `t_tipoproyecto` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_tipoproyecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_unidadmedida`
--

DROP TABLE IF EXISTS `t_unidadmedida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_unidadmedida` (
  `um_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `um_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `um_abr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`um_id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_unidadmedida`
--

LOCK TABLES `t_unidadmedida` WRITE;
/*!40000 ALTER TABLE `t_unidadmedida` DISABLE KEYS */;
INSERT INTO `t_unidadmedida` VALUES (1,'defecto','defecto',NULL,NULL),(87,'Sin nombre','HH','2018-10-04 05:26:39','2018-10-04 05:26:39'),(88,'Sin nombre','PZA','2018-10-04 05:26:39','2018-10-04 05:26:39'),(89,'Sin nombre','KG','2018-10-04 05:26:39','2018-10-04 05:26:39'),(90,'Sin nombre','M3','2018-10-04 05:26:39','2018-10-04 05:26:39'),(91,'Sin nombre','GLN','2018-10-04 05:26:39','2018-10-04 05:26:39'),(92,'Sin nombre','BLS','2018-10-04 05:26:39','2018-10-04 05:26:39'),(93,'Sin nombre','PAR','2018-10-04 05:26:39','2018-10-04 05:26:39'),(94,'Sin nombre','UND','2018-10-04 05:26:39','2018-10-04 05:26:39'),(95,'Sin nombre','M','2018-10-04 05:26:39','2018-10-04 05:26:39'),(96,'Sin nombre','GLB','2018-10-04 05:26:39','2018-10-04 05:26:39'),(97,'Sin nombre','RLL','2018-10-04 05:26:39','2018-10-04 05:26:39'),(98,'Sin nombre','BOL','2018-10-04 05:26:39','2018-10-04 05:26:39'),(99,'Sin nombre','MES','2018-10-04 05:26:39','2018-10-04 05:26:39'),(100,'Sin nombre','P2','2018-10-04 05:26:39','2018-10-04 05:26:39'),(101,'Sin nombre','%MO','2018-10-04 05:26:39','2018-10-04 05:26:39'),(102,'Sin nombre','HM','2018-10-04 05:26:39','2018-10-04 05:26:39');
/*!40000 ALTER TABLE `t_unidadmedida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_usuario`
--

DROP TABLE IF EXISTS `t_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_usuario` (
  `usu_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usu_nom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `usu_tip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usu_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usu_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`usu_id`),
  KEY `t_usuario_per_id_foreign` (`per_id`),
  CONSTRAINT `t_usuario_per_id_foreign` FOREIGN KEY (`per_id`) REFERENCES `t_persona` (`per_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_usuario`
--

LOCK TABLES `t_usuario` WRITE;
/*!40000 ALTER TABLE `t_usuario` DISABLE KEYS */;
INSERT INTO `t_usuario` VALUES (1,'David','empleado','asd@fmai.com','123',1,NULL,NULL);
/*!40000 ALTER TABLE `t_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_valorizacionc`
--

DROP TABLE IF EXISTS `t_valorizacionc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_valorizacionc` (
  `valc_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `valc_nro` int(11) NOT NULL,
  `valc_cd` decimal(8,2) NOT NULL,
  `valc_fechin` date NOT NULL,
  `valc_fechfin` date NOT NULL,
  `valc_tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valc_gg` decimal(8,2) NOT NULL,
  `valc_uti` decimal(8,2) NOT NULL,
  `valc_por` decimal(8,2) NOT NULL,
  `valc_est` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`valc_id`),
  KEY `t_valorizacionc_pro_id_foreign` (`pro_id`),
  CONSTRAINT `t_valorizacionc_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `t_proyecto` (`pro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_valorizacionc`
--

LOCK TABLES `t_valorizacionc` WRITE;
/*!40000 ALTER TABLE `t_valorizacionc` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_valorizacionc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_valorizacionr`
--

DROP TABLE IF EXISTS `t_valorizacionr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_valorizacionr` (
  `valr_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `valr_nro` int(11) NOT NULL,
  `valr_cd` decimal(8,2) NOT NULL,
  `valr_fechin` date NOT NULL,
  `valr_fechfin` date NOT NULL,
  `valr_tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valr_gg` decimal(8,2) NOT NULL,
  `valr_uti` decimal(8,2) NOT NULL,
  `valr_por` decimal(8,2) NOT NULL,
  `valr_est` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`valr_id`),
  KEY `t_valorizacionr_pro_id_foreign` (`pro_id`),
  CONSTRAINT `t_valorizacionr_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `t_proyecto` (`pro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_valorizacionr`
--

LOCK TABLES `t_valorizacionr` WRITE;
/*!40000 ALTER TABLE `t_valorizacionr` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_valorizacionr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Jorge Luis Garnica Blanco','jorgegarba@gmail.com','$2y$10$CR/fNZP0jJgjvPm.E2P9J.Ax/zt/5e9zrBZb7L7F4u5mf6lcQ.LlS','gerente','luea9Xv7rBLe9j0pqC80xAGONl7fjk7lKIohrIiyl547Oy9F9VdWojH8PDJv','2018-09-21 19:18:20','2018-09-21 19:18:20');
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

-- Dump completed on 2018-10-23 16:14:05
