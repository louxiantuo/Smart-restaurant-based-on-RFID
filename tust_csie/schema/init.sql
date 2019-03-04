--
-- Current Database: `tust_csie`
--

CREATE DATABASE /*!32312 IF NOT EXISTS */ `tust_csie` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `tust_csie`;

--
-- Table structure for table `communitys`
--

DROP TABLE IF EXISTS `communitys`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `communitys` (
  `id`           INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`         CHAR(20)         NOT NULL,
  `description`  VARCHAR(210)     NOT NULL,
  `information1` CHAR(80)         NOT NULL,
  `information2` CHAR(80)         NOT NULL,
  `information3` CHAR(20)                  DEFAULT NULL,
  `information4` CHAR(20)                  DEFAULT NULL,
  `is_take_in`   TINYINT(1)       NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `communitys`
--

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departments` (
  `id`              INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `department_name` CHAR(30)         NOT NULL,
  `description`     VARCHAR(200)              DEFAULT NULL,
  `community_id`    INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

--
-- Table structure for table `register_informations`
--

DROP TABLE IF EXISTS `register_informations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `register_informations` (
  `user_id`          INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id`       CHAR(10)         NOT NULL,
  `student_name`     VARCHAR(20)      NOT NULL,
  `phone_num`        CHAR(15)         NOT NULL,
  `qq`               VARCHAR(20)      NOT NULL,
  `email`            VARCHAR(100)              DEFAULT NULL,
  `sex`              CHAR(2)          NOT NULL,
  `nation`           CHAR(20)         NOT NULL,
  `political_status` CHAR(20)         NOT NULL,
  `birth_date`       DATE             NOT NULL,
  `is_adjust`        TINYINT(4)       NOT NULL DEFAULT '0',
  `description1`     CHAR(255)        NOT NULL,
  `description2`     CHAR(255)        NOT NULL,
  `description3`     CHAR(255)                 DEFAULT NULL,
  `description4`     CHAR(255)                 DEFAULT NULL,
  `department_id`    INT(10) UNSIGNED NOT NULL,
  `register_time`    DATETIME         NOT NULL,
  `status`           INT(1)           NOT NULL DEFAULT '0',
  `token`            CHAR(50)         NOT NULL,
  PRIMARY KEY (`user_id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id`         INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` CHAR(10)         NOT NULL,
  `name`       VARCHAR(20)      NOT NULL,
  `phone_num`  VARCHAR(12)      NOT NULL,
  `email`      VARCHAR(100)     NOT NULL,
  `password`   VARCHAR(50)      NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classroom_applications`
--

DROP TABLE IF EXISTS `classroom_applications`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classroom_applications` (
  `id`          INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `create_time` DATETIME         NOT NULL,
  `finish_time` DATETIME         NULL,
  `delete_time` DATETIME         NULL,
  `is_worry`    TINYINT(1)       NOT NULL,
  `name`        VARCHAR(20)      NOT NULL,
  `email`       VARCHAR(210)     NOT NULL,
  `phone_num`   VARCHAR(15)      NOT NULL,
  `purpose`     VARCHAR(10)      NOT NULL,
  `description` VARCHAR(20)      NOT NULL,
  `time`        VARCHAR(50)      NOT NULL,
  `location`    VARCHAR(40)      NOT NULL,
  `token`       CHAR(50)         NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `privilege`
--

DROP TABLE IF EXISTS `privilege`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `privilege` (
  `user_id`       CHAR(48) DEFAULT '' NOT NULL,
  `role_id`       CHAR(30) DEFAULT '' NOT NULL,
  `department_id` INT(10)             NULL,
  `defunct`       CHAR DEFAULT 'N'    NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id`        INT(10) UNSIGNED    NOT NULL AUTO_INCREMENT,
  `role_name` CHAR(30) DEFAULT '' NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
