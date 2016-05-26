# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.42)
# Database: ASL
# Generation Time: 2016-05-16 02:27:56 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table lists
# ------------------------------------------------------------

DROP TABLE IF EXISTS `lists`;

CREATE TABLE `lists` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `list_name` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `lists` WRITE;
/*!40000 ALTER TABLE `lists` DISABLE KEYS */;

INSERT INTO `lists` (`id`, `list_name`, `user_id`, `create_date`)
VALUES
	(1,'Daily Tasks',1,'2016-05-01 09:11:40'),
	(2,'Weekly Tasks',1,'2016-05-01 09:11:58'),
	(3,'Monthly Tasks',1,'2016-05-01 09:13:29'),
	(6,'Pancakes',3,'2016-05-01 12:56:38');

/*!40000 ALTER TABLE `lists` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table todos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `todos`;

CREATE TABLE `todos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `todo_name` varchar(255) DEFAULT NULL,
  `list_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_completed` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `todos` WRITE;
/*!40000 ALTER TABLE `todos` DISABLE KEYS */;

INSERT INTO `todos` (`id`, `todo_name`, `list_id`, `create_date`, `is_completed`)
VALUES
	(1,'buy banans',1,'2016-05-01 17:35:51',0),
	(2,'buy peaches',2,'2016-05-01 17:36:47',0),
	(3,'buy bread',3,'2016-05-01 17:37:03',0),
	(4,'eat bread',1,'2016-05-01 18:38:11',0),
	(5,'buy socks',2,'2016-05-01 19:01:41',0),
	(6,'buy trees',2,'2016-05-01 19:03:44',0),
	(7,'buy shoes',2,'2016-05-01 19:04:19',0),
	(8,'buy shoes',2,'2016-05-01 19:04:41',0),
	(9,'buy lemons',1,'2016-05-01 19:08:59',0),
	(10,'Eat tacos',2,'2016-05-01 19:09:30',0),
	(11,'Buy a tree',1,'2016-05-01 19:48:58',0),
	(12,'Buy a tree',1,'2016-05-01 19:48:58',0),
	(13,'lick a goat',1,'2016-05-06 20:56:02',0);

/*!40000 ALTER TABLE `todos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(250) CHARACTER SET utf8 DEFAULT '',
  `lastname` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `login` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `password` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `date_added` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `login`, `password`, `email`, `date_added`, `date_modified`)
VALUES
	(1,'Chelsie','Saunders','admin','21232f297a57a5a743894a0e4a801fc3','chelsie_saunders1976@mac.com',NULL,NULL),
	(3,'Chelsie','Saunders','csaunders11','gabrielle11','chelsie_saunders1976@mac.com',NULL,NULL),
	(36,'wilma','mcgee','wilmz13','d2601a2200c397b956d5457b38f7ef38145ac80744a5120c60f321b2166c944e','wilma@flintstones.com',NULL,NULL),
	(37,'Mac','Saunders','mac11','cf61cff9f30f69961375e95afb969a1266b597db2a10482ed5d834e1a3f25d04','stuartmacsaunders@gmail.com',NULL,NULL),
	(38,'William','Riker','number1','2c20738996bb9b5d79eb7de150eb2c7982bb7ac1fd3bb809e5e87a348246587b','commanderriker@enterprise.com',NULL,NULL),
	(39,'Duncan','Saunders','duncan11','39e884da89683c9f76c47050157ca8757b890d0cee9e0bd4deabefd210abeeaf','duncan@duncan.com',NULL,NULL),
	(40,'Bill','Lizard','bill11','0ce513277f5ae7959d683db9fd4a8e60edf1631e29241a154f4d544c8bd40d98','bill@wonderland.com',NULL,NULL),
	(41,'shane','ross','ross11','7632158d6ebba8706538808628b808b4d8e19d31c4aa41eb7a761c4ecf02249c','ross@searle.com',NULL,NULL),
	(42,'Bugs','Bunny','carrots','97846ea54d6a28200178aa070c9edeb5f91f2719203dcb2be15120082d9c627e','bugs@warnerbros.com',NULL,NULL),
	(43,'chill','kitty','kitty','kitty11','kitty@vibes.com',NULL,NULL),
	(44,'Luke','Skywalker','luke11','luke11','luke@starwars.com',NULL,NULL),
	(45,'Han','Solo','han11','2b52514f3741f3379fee3eef9674a203','han_solo@miliumfalcom.com',NULL,NULL),
	(46,'David','Bowie','dancemagic','6c7790f7bde88e63163abd079bd492d2','bowie@bowie.com',NULL,NULL),
	(47,'Jake','Sanke','jake','c391dc0eecd5a0eb769b12005bebd084','jake@sanke.com',NULL,NULL),
	(48,'Wild','Bill','wildbill','48fa4c38043122c03a61b1fb03d378ee','wild@bill.com',NULL,NULL),
	(49,'Porky','Pig','porky','6cb57160998fbb31704e2e13ac31b3e0','porky@warnerbrothers.com',NULL,NULL),
	(50,'asef','dfaef','asdfae','9731e89f01c1fb943cf0baa6772d2875','ASDFA@ASDF.COM',NULL,NULL),
	(51,'pinapple','sicks','gloat','e0deff349b2c61f5f796ccaa344a4930','pinapple@fruit.com',NULL,NULL),
	(52,'bugger','bugger','bugger','df9d96cdfb38922b73821afad42c02e4','bugger@bugger.com',NULL,NULL),
	(53,'liberty','death','giveme','f938c93da3eeabf30a6679828dede59c','usa@usa.com',NULL,NULL),
	(54,'sam','biggs','sammy','4385695633f8c6c8ab52592092cecf04','sam@bigs.com',NULL,NULL),
	(55,'Ted','Cruz','cruz','3c04fc1e6d71a4fd92db5f4256dcd20d','ted@cruz.com',NULL,NULL),
	(56,'Miss','Piggy','piggy','a001f229894dd610886b0efb7bc367a8','piggy@muppets.com',NULL,NULL),
	(57,'Kermit','Frog','froggy','cfa5bbfd64ec0dc787ee984a8c379030','kermit@muppets.com',NULL,NULL),
	(58,'pinapple','hearbreak','pinapple','4eb105b89342b1df752758a9c07292a5','pinapple@heartbreak.com',NULL,NULL),
	(59,'Mr.','Smith','smith','a66e44736e753d4533746ced572ca821','smith@smith.com',NULL,NULL),
	(60,'kitty','kat','kittykat','cd880b726e0a0dbd4237f10d15da46f4','kitty@kat.com',NULL,NULL),
	(61,'princess','pea','princessp','a51a695841500733952c686a3daea210','princess@pea.com',NULL,NULL),
	(62,'Candy','apple','apple','1f3870be274f6c49b3e31a0c6728957f','apple@candy.com',NULL,NULL),
	(63,'bird','dog','birddog','2000b0d7fed00ed0fe44f5550531561c','bird@dog.com','2016-05-06 19:27:25',NULL),
	(64,'Adam','Woolsey','adam','f10338468fffed4864c5f08e0b62e540','adam.woolsey@monkwise.com','2016-05-15 12:56:40',NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
