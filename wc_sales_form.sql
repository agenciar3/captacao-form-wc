# ************************************************************
# Sequel Pro SQL dump
# Versão 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.19-MariaDB)
# Base de Dados: agenciar3_novo
# Tempo de Geração: 2017-12-29 23:39:01 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump da tabela ws_sales_form
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ws_sales_form`;

CREATE TABLE `ws_sales_form` (
  `sales_form_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sales_form_title` varchar(255) DEFAULT NULL,
  `sales_form_content` text,
  `sales_form_name` varchar(255) DEFAULT NULL,
  `sales_form_email` varchar(255) DEFAULT NULL,
  `sales_form_fone` varchar(255) DEFAULT NULL,
  `sales_form_date` timestamp NULL DEFAULT NULL,
  `sales_form_type` int(11) DEFAULT NULL,
  `sales_form_status` tinyint(1) DEFAULT NULL,
  `sales_form_refer_first` varchar(255) NOT NULL DEFAULT '',
  `sales_form_refer_first_date` date NOT NULL,
  `sales_form_refer_last` varchar(255) NOT NULL DEFAULT '',
  `sales_form_campaign_first` varchar(255) DEFAULT NULL,
  `sales_form_campaign_first_date` date DEFAULT NULL,
  `sales_form_campaign_last` varchar(255) DEFAULT NULL,
  `sales_form_campaign_keyword` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sales_form_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
