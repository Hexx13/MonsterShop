-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               8.0.21 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for monstershop
CREATE DATABASE IF NOT EXISTS `monstershop` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `monstershop`;

-- Dumping structure for table monstershop.account
CREATE TABLE IF NOT EXISTS `account` (
  `accountId` int NOT NULL,
  `accountPassword` varchar(45) NOT NULL,
  `accountUsername` varchar(45) NOT NULL,
  `accountEmail` varchar(45) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  PRIMARY KEY (`accountId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table monstershop.account: ~1 rows (approximately)
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` (`accountId`, `accountPassword`, `accountUsername`, `accountEmail`, `firstName`, `lastName`) VALUES
	(5, 'bass', 'Bongo', 'pogger@pog.pog', 'John', 'Doe');
/*!40000 ALTER TABLE `account` ENABLE KEYS */;

-- Dumping structure for table monstershop.product
CREATE TABLE IF NOT EXISTS `product` (
  `productId` int NOT NULL,
  `productName` varchar(45) NOT NULL,
  `productPrice` varchar(45) NOT NULL,
  `productImgPath` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table monstershop.product: ~4 rows (approximately)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`productId`, `productName`, `productPrice`, `productImgPath`) VALUES
	(1, 'Monster Ultra Blue', '2', 'img/blue.jpg'),
	(2, 'Monster Ultra Violet', '2', 'img/violet.jpg'),
	(3, 'Monster Ultra Paradise', '2', 'img/paradise.jpg'),
	(4, 'Monster Ultra Fiesta', '2', 'img/fiesta.jpg');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
