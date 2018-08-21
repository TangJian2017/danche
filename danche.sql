-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: danche
-- ------------------------------------------------------
-- Server version	5.7.18-log

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
-- Current Database: `danche`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `danche` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `danche`;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `begintime` varchar(50) DEFAULT NULL,
  `desc1` varchar(200) DEFAULT NULL,
  `tname` varchar(10) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3','超级管理员','0',NULL,NULL,NULL,NULL,NULL),(15,'5861','e10adc3949ba59abbe56e057f20f883e','管理员','','女','20180310','','智者','15366986666'),(16,'001','e10adc3949ba59abbe56e057f20f883e','管理员',NULL,'男','20180202','','高馆长','18795907369');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `baoxiu`
--

DROP TABLE IF EXISTS `baoxiu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `baoxiu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carsid` int(11) DEFAULT '0' COMMENT '车辆id',
  `content` varchar(250) DEFAULT NULL COMMENT '详细',
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) DEFAULT '维修中' COMMENT '状态',
  `eacherid` int(11) DEFAULT '0' COMMENT '人员id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `baoxiu`
--

LOCK TABLES `baoxiu` WRITE;
/*!40000 ALTER TABLE `baoxiu` DISABLE KEYS */;
INSERT INTO `baoxiu` VALUES (5,15,'已完成','2018-04-13 01:40:20','完成',4),(4,13,'车座坏了，已完成修复','2018-04-11 02:02:13','完成',4),(6,19,'二维码失效,已完成','2018-04-13 01:41:47','完成',4),(8,23,'已修复','2018-04-15 01:04:41','完成',4),(9,47,'车牌损坏','2018-04-25 06:15:27','维修中',6),(10,45,'已完成','2018-04-26 01:31:00','完成',4),(11,46,'已完成','2018-04-26 01:36:38','完成',4),(12,44,'车座坏了','2018-05-06 14:44:06','维修中',4),(13,48,'车把坏了','2018-05-09 09:24:56','维修中',4);
/*!40000 ALTER TABLE `baoxiu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryid` int(11) DEFAULT '0' COMMENT '品牌',
  `colors` varchar(50) DEFAULT NULL COMMENT '颜色',
  `title` varchar(50) DEFAULT NULL COMMENT '车牌号',
  `img` varchar(50) DEFAULT NULL,
  `ages` varchar(11) DEFAULT NULL COMMENT '车龄',
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `status` varchar(10) DEFAULT NULL COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cars`
--

LOCK TABLES `cars` WRITE;
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
INSERT INTO `cars` VALUES (18,8,'红','234611','','1','','','正常'),(17,5,'橙色','234610','','1','118.709289','32.198085','正常'),(16,6,'黄色','234609','','1','118.709515','32.203569','正常'),(15,7,'白','234608','','1','118.707793','32.199597','正常'),(14,8,'红','234607','','1','118.705352','32.20213','正常'),(13,8,'红色','234604',NULL,'1','118.708431','32.203546','维修'),(12,5,'橙色','234603','','1','118.705888','32.202938','正常'),(11,6,'黄色','234602','','1 ','','','正常'),(10,7,'蓝白','234601','','1','118.707798','32.205462','正常'),(19,7,'白','234612','','1','118.708887','32.199052','正常'),(20,6,'黄色','234613','','1','118.713715','32.202725','正常'),(21,5,'橙色','234614','','1','118.711714','32.202874','正常'),(22,8,'红','234615','','1','118.712943','32.200923','正常'),(23,7,'白','234616','','1','118.726708','32.202452','正常'),(24,6,'黄色','234617','','1','118.708839','32.197886','正常'),(25,5,'橙色','234618','','1','118.714096','32.206202','正常'),(26,8,'红','234619',NULL,'1','118.711913','32.202911','正常'),(27,7,'白 ','234620',NULL,'1','118.707964','32.202271','正常'),(28,6,'黄色','234621',NULL,'1','118.708023','32.203129','正常'),(29,5,'橙色','234622',NULL,'1','118.70819','32.203533','正常'),(30,8,'红','234623',NULL,'1','118.718666','32.204704','正常'),(31,7,'白','234624',NULL,'1','118.716478','32.202598','正常'),(32,6,'黄色','234625',NULL,'1','118.714032','32.204676','正常'),(33,5,'橙色','234626',NULL,'1','118.724905','32.205598','正常'),(34,8,'红','234627',NULL,'1','118.723548','32.206719','正常'),(35,7,'白','234628',NULL,'1','118.713415','32.199261','正常'),(36,6,'黄色','234629',NULL,'1','118.716698','32.204758','正常'),(37,5,'橙色','234630',NULL,'1','118.719498','32.205139','正常'),(38,8,'红','234631',NULL,'1','118.726933','32.203092','正常'),(39,7,'白','234632',NULL,'1','118.708061','32.199243','正常'),(40,6,'黄色','234633',NULL,'1','118.719434','32.201785','正常'),(41,5,'橙色','234634',NULL,'1','118.727528','32.205375','正常'),(42,8,'红','234635',NULL,'1','118.72409','32.207563','正常'),(43,7,'白','234636',NULL,'1','118.706119','32.204436','正常'),(44,6,'黄色','234637',NULL,'1','118.714257','32.200723','维修'),(45,5,'橙色','234638',NULL,'1','118.712229','32.205584','正常'),(46,8,'红','234639',NULL,'1','118.7115','32.200369','正常'),(47,7,'白','234640','','1','118.721794','32.203605','维修'),(48,9,'蓝','234650',NULL,'1','118.707921','32.204749','维修'),(49,8,'红','234651',NULL,'1','118.70922','32.199829','正常'),(50,7,'蓝白','234652',NULL,'1','118.707809','32.200977','正常'),(51,6,'黄色','234653',NULL,'1','118.709064','32.200024','正常'),(52,5,'橙色','234654',NULL,'1','118.71129','32.201463','正常');
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'id自然编号',
  `title` varchar(60) NOT NULL COMMENT '名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (8,'出行'),(7,'hellobike'),(6,'ofo'),(5,'mobike'),(9,'小蓝');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eacher`
--

DROP TABLE IF EXISTS `eacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eacher` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `begintime` varchar(50) DEFAULT NULL,
  `desc1` varchar(200) DEFAULT NULL,
  `tname` varchar(10) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eacher`
--

LOCK TABLES `eacher` WRITE;
/*!40000 ALTER TABLE `eacher` DISABLE KEYS */;
INSERT INTO `eacher` VALUES (4,'test01','e10adc3949ba59abbe56e057f20f883e','','男','19800102','','李师傅','157626767676'),(6,'binjiang02','e10adc3949ba59abbe56e057f20f883e',NULL,'男','1985-04-17','','张师傅','15623693212'),(7,'binjiang03','e10adc3949ba59abbe56e057f20f883e',NULL,'男','1986-04-17','','庄师傅','15745697896');
/*!40000 ALTER TABLE `eacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` varchar(50) DEFAULT '0' COMMENT '学生id',
  `carsid` int(11) DEFAULT '0' COMMENT '车辆id',
  `price` decimal(11,0) DEFAULT '0' COMMENT '预计价格',
  `begintime` date DEFAULT NULL COMMENT '开始时间',
  `endtime` date DEFAULT NULL COMMENT '结束时间',
  `addtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '添加时间',
  `status` varchar(50) DEFAULT NULL,
  `carstitle` varchar(50) DEFAULT NULL COMMENT '车牌号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (4,'20142346085',10,30,'2018-04-13','2018-04-19','2018-04-11 02:00:24','已归还','234601'),(3,'20142346085',13,12,'2018-04-11','2018-04-13','2018-04-11 01:56:37','已归还','234604'),(5,'20142346084',25,5,'2018-04-15','2018-04-15','2018-04-15 00:58:08','已归还','234618'),(6,'20142346085',23,5,'2018-04-15','2018-04-15','2018-04-15 01:04:18','已归还','234616'),(7,'20142346085',47,30,'2018-04-19','2018-04-25','2018-04-19 13:19:59','已归还','234640'),(8,'20142346085',47,5,'2018-04-25','2018-04-25','2018-04-25 05:31:41','已归还','234640'),(9,'20142346085',47,1,'2018-04-25','2018-04-25','2018-04-25 05:56:38','已归还','234640'),(10,'20142346085',40,14,'2018-04-11','2018-04-25','2018-04-25 05:57:23','已归还','234633'),(11,'20142346085',42,1,'2018-04-25','2018-04-25','2018-04-25 06:00:32','已归还','234635'),(12,'20142346085',47,1,'2018-04-25','2018-04-25','2018-04-25 06:02:56','已归还','234640'),(13,'20142346001',46,1,'2018-04-25','2018-04-25','2018-04-25 12:16:29','已归还','234639'),(14,'20142346001',46,1,'2018-04-25','2018-04-25','2018-04-25 12:22:13','已归还','234639'),(15,'20142346001',46,1,'2018-04-26','2018-04-26','2018-04-26 00:58:26','已归还','234639'),(16,'20142346001',45,1,'2018-04-26','2018-04-26','2018-04-26 01:00:40','已归还','234638'),(17,'20142346001',45,5,'2018-04-26','2018-04-26','2018-04-26 01:30:01','已归还','234638'),(18,'20142346001',46,1,'2018-04-26','2018-04-26','2018-04-26 01:36:07','已归还','234639'),(19,'20142346085',44,1,'2018-05-06','2018-05-06','2018-05-06 14:29:18','已归还','234637'),(20,'20142346001',48,1,'2018-05-09','2018-05-09','2018-05-09 09:24:29','已归还','2346050');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `studentid` varchar(64) NOT NULL COMMENT '学号',
  `stuname` varchar(50) NOT NULL COMMENT '姓名',
  `password` char(32) NOT NULL COMMENT '密码',
  `banji` varchar(50) DEFAULT NULL COMMENT '班级',
  `addtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '注册时间',
  `img` varchar(255) DEFAULT NULL COMMENT '头像',
  `sex` varchar(255) DEFAULT NULL COMMENT '性别',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `tel` varchar(50) DEFAULT NULL COMMENT '电话',
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`studentid`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (3,'20142346085','tangjian','e10adc3949ba59abbe56e057f20f883e','网络工程2班','2018-03-10 10:14:21','','男',0,'17751756937'),(4,'20142346074','liuxinyan','e10adc3949ba59abbe56e057f20f883e','网络工程2班','2018-03-10 13:26:25','','男',0,'18136571910'),(5,'20142346061','gaoyang','e10adc3949ba59abbe56e057f20f883e','网络工程2班','2018-03-10 13:27:04','','男',0,'18795907369'),(6,'20142346100','zhugay','e10adc3949ba59abbe56e057f20f883e','网络工程2班','2018-03-12 02:18:43',NULL,'男',0,'17751756951'),(9,'20142346086','tangles','e10adc3949ba59abbe56e057f20f883e','网络工程2班','2018-04-15 07:27:14',NULL,'女',0,'15478964563'),(8,'20142346084','sugay','e10adc3949ba59abbe56e057f20f883e','网络工程2班','2018-04-15 00:57:21',NULL,'男',0,'15345671234'),(13,'','','d41d8cd98f00b204e9800998ecf8427e',NULL,'2018-04-25 07:50:07',NULL,NULL,0,''),(14,'123','111','202cb962ac59075b964b07152d234b70',NULL,'2018-04-25 07:58:56',NULL,NULL,0,'000'),(12,'20142346001','bibishuo','e10adc3949ba59abbe56e057f20f883e','网络工程2班','2018-04-17 01:21:34',NULL,'男',0,'15634566789');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yajin`
--

DROP TABLE IF EXISTS `yajin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yajin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT '0' COMMENT '学生id',
  `price` decimal(11,0) NOT NULL DEFAULT '0' COMMENT '金额',
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '时间',
  `studentid` varchar(50) DEFAULT NULL COMMENT '学号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yajin`
--

LOCK TABLES `yajin` WRITE;
/*!40000 ALTER TABLE `yajin` DISABLE KEYS */;
INSERT INTO `yajin` VALUES (3,3,500,'2018-03-10 10:14:52','20142346085'),(4,8,295,'2018-04-15 00:57:49','20142346084'),(5,12,349,'2018-04-25 12:15:56','20142346001');
/*!40000 ALTER TABLE `yajin` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-20  9:48:26
