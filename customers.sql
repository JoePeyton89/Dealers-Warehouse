CREATE DATABASE  IF NOT EXISTS `customer_manager`
USE `customer_manager`;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;

-- Create the 'customers' table
CREATE TABLE `customers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `business_type` varchar(50) NOT NULL,
  `preferred_days` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `idx_customer_name` (`customer_name`),
  KEY `idx_created_at` (`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;

INSERT INTO `customers` VALUES (11,'Joe Peyton','3425 Miller Creek Rd.','','Knoxville','Tennessee','37931','9312485485','joe.peyton89@gmail.com','LLC','M,T,W,R,F','2024-01-31 23:05:18'),(12,'Erik Johnson','10 Reindeer Road','','Knoxville','Tennessee','37923','888-888-7777','ejohnson@dwc-k.com','Corporation','F','2024-01-31 23:07:17'),(13,'James Willhoite','40 Mad Dog Rd.','','Knoxville','Tennessee','37920','123-456-7890','jwillhoite@dwc-k.com','Sole Proprietor','T,W','2024-01-31 23:08:58'),(14,'Mr. Dealer','7580 Thunder Ln','','Knoxville','Tennessee','37849','800-362-9880','info@dwc-k.com','Corporation','M,T,W,R,F','2024-01-31 23:14:14');

UNLOCK TABLES;
