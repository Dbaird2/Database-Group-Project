-- MySQL dump 10.19  Distrib 10.3.38-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: bams
-- ------------------------------------------------------
-- Server version	10.3.38-MariaDB-0+deb10u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Temporary table structure for view `ActiveBankAccounts`
--

DROP TABLE IF EXISTS `ActiveBankAccounts`;
/*!50001 DROP VIEW IF EXISTS `ActiveBankAccounts`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `ActiveBankAccounts` AS SELECT
 1 AS `email`,
  1 AS `uid`,
  1 AS `pwd`,
  1 AS `unhash_pwd`,
  1 AS `admin`,
  1 AS `status` */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `ActiveBankAccountsAdmin`
--

DROP TABLE IF EXISTS `ActiveBankAccountsAdmin`;
/*!50001 DROP VIEW IF EXISTS `ActiveBankAccountsAdmin`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `ActiveBankAccountsAdmin` AS SELECT
 1 AS `first_name`,
  1 AS `last_name`,
  1 AS `email`,
  1 AS `uid`,
  1 AS `dob`,
  1 AS `address`,
  1 AS `phone`,
  1 AS `admin`,
  1 AS `status` */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `ActiveBankAccountsUser`
--

DROP TABLE IF EXISTS `ActiveBankAccountsUser`;
/*!50001 DROP VIEW IF EXISTS `ActiveBankAccountsUser`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `ActiveBankAccountsUser` AS SELECT
 1 AS `uid`,
  1 AS `type`,
  1 AS `balance`,
  1 AS `accnum`,
  1 AS `accname`,
  1 AS `status` */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `CustomerPlacement`
--

DROP TABLE IF EXISTS `CustomerPlacement`;
/*!50001 DROP VIEW IF EXISTS `CustomerPlacement`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `CustomerPlacement` AS SELECT
 1 AS `uid`,
  1 AS `Total`,
  1 AS `Placement` */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `TotalTransactionAmt`
--

DROP TABLE IF EXISTS `TotalTransactionAmt`;
/*!50001 DROP VIEW IF EXISTS `TotalTransactionAmt`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `TotalTransactionAmt` AS SELECT
 1 AS `uid`,
  1 AS `trans_id`,
  1 AS `other_accnum`,
  1 AS `trans_type`,
  1 AS `acc_type`,
  1 AS `amt`,
  1 AS `timeStamp`,
  1 AS `pending`,
  1 AS `accnum` */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account` (
  `uid` varchar(50) DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  `balance` decimal(20,2) NOT NULL,
  `accnum` int(20) NOT NULL,
  `accname` varchar(40) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`accnum`),
  KEY `uid` (`uid`),
  CONSTRAINT `account_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `bank_user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci `ENCRYPTION_KEY_ID`=100;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES ('Scooby55','Checkings',981.00,102385947,'Scooby Checkings',1),('Velma15','Checkings',11760.00,102685347,'Velma Checkings',1),('Shaggy17','Savings',240.00,110372936,'Shaggy Savings',1),('Scooby55','Savings',20.00,110382936,'Scooby Savings',1),('Velma15','Savings',105192.00,111482936,'Velma Savings',1),('Shaggy17','Checkings',830.00,112385947,'Shaggy Checkings',1),('Fred17','Checkings',10160.00,112438508,'Fred Checkings',1),('Daphne16','Savings',2087.00,113372925,'Daphne Savings',1),('Fred17','Savings',70182.00,121393037,'Fred Savings',1),('john17','Checkings',2241.00,130575934,'Checking',1),('DLrizz','Savings',0.00,138562839,'Savings',1),('Daphne16','Checkings',872.00,162386948,'Daphne Checkings',1),('pepapig','Checkings',2300.00,239575934,'Checking',1),('mortj','Checkings',300.00,239575945,'Checking',1),('gwill','Checkings',675.00,240075934,'Checking',1),('Dtrump','Checkings',500296.00,240575934,'Checking',1),('bob','Checkings',2318.00,242575934,'Checking',1),('proctologist','Savings',9412.00,310859037,'dad',1),('theball','Checkings',5711.00,320948372,'riz',1),('MiGente','Savings',51.00,364783746,'Savings',1),('MiGente','Checkings',1.00,374275975,'Checking',1),('LL34','Savings',40000000.00,374619473,'Savings',1),('LL34','Checkings',20000000.00,382057420,'Checking',1),('elvenoracle','Checkings',3850.00,409729487,'adaine',1),('superrobert9','Checkings',7323.00,418279471,'super',1),('theball','Savings',5990.00,455129035,'goblinmode',1),('JD001','Savings',134.00,461837583,'Savings',1),('goofygoober','Checkings',1333.00,471289873,'goofy',1),('heisenbergnm','Checkings',4752.00,472979892,'blue',1),('DLrizz','Checkings',200.00,485738400,'Checking',1),('heisenbergnm','Savings',4619.00,517834099,'cat',1),('elvenoracle','Savings',8115.00,537210919,'boggy',1),('superrobert9','Savings',7501.00,572108443,'dog',1),('tinflower','Checkings',5672.00,576102012,'gorgug',1),('anitasmith11','Savings',3814.00,581092808,'mom',1),('archdevil667','Checkings',4553.00,613012846,'fig',1),('tinflower','Savings',9822.00,632601778,'irage',1),('toxicmasculinityisdead','Checkings',9038.00,681102352,'fabian',1),('toxicmasculinityisdead','Savings',109239.00,703400416,'idancenow',1),('archdevil667','Savings',102141.00,709872341,'chaosdevil',1),('goofygoober','Savings',1169.00,709874180,'gg',1),('proctologist','Checkings',9422.00,741869840,'proctologist',1),('JD001','Checkings',34.00,892347686,'Checking',1),('anitasmith11','Checkings',4306.00,901849072,'amazon',1),('bob','Savings',54189.00,928672920,'Savings',1),('gwill','Savings',2950.00,940072920,'Savings',1),('john17','Savings',5410.00,945682920,'Savings',1),('mortj','Savings',1770.00,948372919,'Savings',1),('pepapig','Savings',54000.00,948372920,'Savings',1),('Dtrump','Savings',5000003030.00,948374020,'Savings',1);
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`bams`@`localhost`*/ /*!50003 TRIGGER IF NOT EXISTS updateTransaction 
AFTER INSERT ON account
FOR EACH ROW
IF NEW.uid = NEW.uid THEN
    INSERT INTO transactions(uid, other_accnum, trans_type, acc_type, 
        amt, timeStamp, pending, accnum) values (NEW.uid, NEW.accnum, 'Deposit',
        NEW.type, NEW.balance, NOW(), 'Pending', NEW.accnum);

END IF */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`bams`@`localhost`*/ /*!50003 TRIGGER IF NOT EXISTS accountDeletion
BEFORE DELETE ON account
FOR EACH ROW
IF OLD.balance >= 0 THEN
    INSERT INTO inactiveTransactions(uid, trans_id, other_accnum, trans_type, acc_type, 
        amt, timeStamp, pending, accnum) SELECT uid, trans_id, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum FROM transactions WHERE accnum = OLD.accnum;
    DELETE FROM transactions WHERE accnum = OLD.accnum;

END IF */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `bank_info`
--

DROP TABLE IF EXISTS `bank_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bank_info` (
  `bankID` varchar(10) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `zip` int(10) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `routing` int(10) NOT NULL,
  `bank_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`bankID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci `ENCRYPTION_KEY_ID`=100;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bank_info`
--

LOCK TABLES `bank_info` WRITE;
/*!40000 ALTER TABLE `bank_info` DISABLE KEYS */;
INSERT INTO `bank_info` VALUES ('A25501B4','904 E. California Street','Ontario',91761,'950-173-8500',867825559,'Student Credit Union');
/*!40000 ALTER TABLE `bank_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bank_user`
--

DROP TABLE IF EXISTS `bank_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bank_user` (
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `pwd` varchar(60) DEFAULT NULL,
  `unhash_pwd` varchar(60) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `admin` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci `ENCRYPTION_KEY_ID`=100;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bank_user`
--

LOCK TABLES `bank_user` WRITE;
/*!40000 ALTER TABLE `bank_user` DISABLE KEYS */;
INSERT INTO `bank_user` VALUES ('Anita','Smith','smith7@example.com','anitasmith11','1977-01-28','673 Morning Drive, Sacramento','499-836-8350','$2y$10$4jGKEXMWUfEMv9Ax2j2yTOgDJbOcCGom1PhoygRjO.6ECpdwXXWta','b6f2a3d1e9c5a8e7',1,0),('Figueroth','Faeth','fig667@gmail.com','archdevil667','1998-12-25','233 Trubshaw Avenue, Elmville','851-442-9081','$2y$10$AxZmVG/oiEy2Kt5FwRChzOcmFXZKsGZF8U65fBXhkVRSFlCzwlfB.','d6a4e8f3b9c1e7a2',1,0),('Bob','Ross','bobross@gmail.com','bob','2003-02-01','810 Somewhere ST','123-456-7890','$2y$10$27cky.jddZw3NiKLBHOJC.KNnHvmq5Sakd4x/l71ooSd9hHg/6.pS','e7c8d4b5f1a2e9a3',1,0),('Daphne','Blake','DaphneBlake@gmail.com','Daphne16','1970-09-13','Blake Mansion, Crystal Cove','941-952-5243','$2y$10$QKhNj3GqY.ZyZ5n7XghiDOl3gi1f4HdUlAP.1PLVG5204wNdgGROK','a3e7b5f2d9c8e1a4',1,0),('Dason','Baird','dason@gmail.com','dbaird','2000-01-01','220 Grump St','661-700-9835',NULL,'12345',1,1),('Dominic','Lake','dl@gmail.com','DLrizz','2004-10-31','3400Wetherley Dr, Bakersfield CA','661-980-3450','$2y$10$PqNbV7uIyVzfmBDdXwvn2Od1tfGuIbjsb0ga0AZZ99WEYPSQWVePy','d4e9c5b1f2a7e8a3',1,0),('Donald','Trump','Dtrump@gmail.com','Dtrump','1950-12-20','10 Broke St','124-446-1830','$2y$10$SQtW5t3vsnFzlY1WIJhILuaS2fN6hGSqNhT5IhYx.PyJl6usIKNne','d7a1e2f3b4c8d5f1',1,0),('Adaine','Abernant','adaine@gmail.com','elvenoracle','1998-10-15','390 Wizard Street, Elmville','851-588-9122','$2y$10$HVbXq5rl3uuuHi2kNDV9P.fXHf3Skx7BWwSx7oF.rYL3QQD08nFsi','e3f1a7d8b4c6e9a5',1,0),('Fred','Jones','FredJones@gmail.com','Fred17','1969-09-13','5219 Cimarron St in Bakersfield, CA','941-038-8951','$2y$10$V6H9Smtc87CW/VPI7Y9cKO8DNMm.az7Do3tn1PCHJfj.5ElFHCAUK','b4d6f1a9e2c3e8f7',1,0),('Bob','LEponge','bobleponge420@example.com','goofygoober','1986-07-14','124 Conch Street, Bikini Bottom','601-555-9196','$2y$10$BhSjeVfH62Zp1pKWjniHKuVPNGqxJdHGRiGaQG2LNq1QamldcR/f.','b5c3e7a9f4d2e1f8',1,0),('Guy','Williams','gwill@gmail.com','gwill','1979-12-11','10300 Monkey Ave','661-550-7890','$2y$10$bn7wi6tMBgbqTk2mLkKsgelb5/JclpikJgCIzXc5nAqRoYPfye3WK','c5b7e6a1f2d9e8a4',1,0),('Walter','White','heisenberg@example.com','heisenbergnm','1958-09-07','3828 Piermont Drive, Alburquerque','505-193-0809','$2y$10$HDkAdA3fHL27WJuMemiU0uz7PdBWvxmVs2aReoIsDl5l27CiYMsN.','d7e8c4b1f3a9e6a2',1,0),('Joe','Douglas','jd@gmail.com','JD001','1970-01-01','201 Taco st, Scottsdale AZ','480-786-9082','$2y$10$SMTo0azTF5CpZWQ4yOcak.mJ3GY7U14BTs.H5UE4cotuHUN4QacpO','e1c5d7a3f8b4a2f9',1,0),('John','Doe','john17@gmail.com','john17','2000-04-18','100 Trent Dr','456-293-0923','$2y$10$bYFYbZNfI8dn2KAFRgbNTOrMm.y/.i3COHFG9murnJW5xmVG.SWNC','f3a9e1d2c6b8e4a7',1,0),('Lucy','Liu','ll@gmail.com','LL34','1968-12-02','201 Celebrity Dr, Beverly Hills','310-436-1493','$2y$10$/0z/V.jImbZ/temcRshjt.c.QcGV2NCK0NkhFMnSqturEB0Zk/JoC','f2b8e6a4c9d3f7e1',1,0),('Mic','Dapito','mic@gmail.com','mic','2000-01-01','219 Grump St','661-700-9834',NULL,'12345',1,1),('Don','Pepe','DP@gmail.com','MiGente','1973-02-11','349 Los Angeles St, LA CA','458-908-7456','$2y$10$U5ZxeMDnVy1w0e/m6BtTGeRz8w/CJyd.K4Amidq/sW10Geeie92Wm','a9e1d8b4c6f2f7a5',1,0),('Mort','Jenkins','mortjenkins@gmail.com','mortj','2010-04-13','100 Industry rd','123-456-7890','$2y$10$LpZuCtj8NeDAg7sWHxT..emBtTHdeDe/cjTsSIL0RsVDLGuTcv20.','d8e4b3a5f7c9e2f1',1,0),('Caroline','Contreras','toughtaco4life@gmail.com','pepapig','2003-07-18','100 Secret St, Bakersfield CA','123-456-7890','$2y$10$M9YGoeD1MgJMXouUTKZIpugvv3RmgU0C8AS9O3rhqee3gE237iP6O','c8f3a1d7b6e2f9e4',1,0),('Cosmo','Kramer','yellow89@example.com','proctologist','1949-07-24','129 West 81st Street, New York','555-667-8383','$2y$10$ZQbCuudiKyiDTL9aVoH.xezbiqkJ.T/oVd2IMrgPTA42d/qkM4zC2','a4b9f1e2d3c7e8f5',1,0),('Scooby','Doo','scoobydoo@gmail.com','Scooby55','1969-09-13','224 Maple Street, Coolsville','941-330-5202','$2y$10$LDch7jaWEaJxq2uQLmTK4el0zDJVnPAfX7vQbru//jj3jDHm/LIym','e6d2f8b1c5a4b7e9',1,0),('Shaggy','Rogers','ShaggyRogers@gmail.com','Shaggy17','1969-09-13','224 Maple Street, Coolsville','941-330-5202','$2y$10$4rZEpFzxTGp2R4PU7ugI0OlKwcZlB37NXKOj028PunTUwkR6/UixS','f9b7c6a3e1d4a8f2',1,0),('Caroline','Contrares','silly@gmail.com','sillywilly','2000-01-01','218 Grump St','661-700-9833',NULL,'12345',1,1),('Rober','Johnson','robert.johnson9@example.com','superrobert9','1979-03-04','145 Pine Ave, New York','689-531-8034','$2y$10$rPgHAm/AUF0YIvZt0do7NOA4dnGE/644tJd2xCwZJuBLZBUp7Fjhu','e2d1b6a5c8f9e7a4',1,0),('Carlos','Morenos','taco@gmail.com','tacomuncher2000','1900-01-01','217 Grump St','661-700-9832',NULL,'12345',1,1),('Riz','Gukgak','riz@gmail.com','theball','1998-10-18','335 Strong Tower Street, Elmville','851-707-4913','$2y$10$lpT.Tvie4KP0lpYnRa0q3O1bZtBn1IeCiNZChFOkSPXDTc5//Zjt.','c2b5e9d4a8f1e7a3',1,0),('Gorgug','Thistlespring','gorgug@gmail.com','tinflower','1998-04-09','110 Thistletree Lane, Elmville','851-198-3359','$2y$10$hK1mbbFNboo1OV.kckVlAO05ordeKHuZUEbOrPy5MDpNcQ6JXiFYG','b8e9c5a2f7d6e3a1',1,0),('Nick','Toothman','NickToothman@gmail.com','toothman','2000-01-01','2820 Hidden St','834-930-8932',NULL,'Nickspassword',1,1),('Fabian','Seacaster','fabianseacaster@gmail.com','toxicmasculinityisdead','1998-07-22','219 Sea Boulevard, Elmville','851-200-6321','$2y$10$1gMBTX9y0zxVjKaO9NcguecxCcTRL/dPTDSoXrrHoQJHwXaluapCe','a1d4f9e2b3c8e7f5',1,0),('Velma','Dinkley','VelmaDinkley@gmail.com','Velma15','1971-09-13','Dinkley House, Crystal Cove','941-210-5381','$2y$10$McZEXNNS8m5tWTU3fZa02O5uhkOlbk45D.x1moehnyRxBp4ThnhXu','c9f4e2a1d6b3e8a5',1,0);
/*!40000 ALTER TABLE `bank_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`bams`@`localhost`*/ /*!50003 TRIGGER IF NOT EXISTS BankUserStatusChange 
AFTER UPDATE ON bank_user
FOR EACH ROW
IF NEW.status = FALSE THEN
    INSERT INTO inactiveTransactions(uid, trans_id, other_accnum, trans_type, acc_type, 
        amt, timeStamp, pending, accnum) SELECT uid, trans_id, other_accnum, trans_type, acc_type, amt, timeStamp, pending, accnum FROM transactions WHERE uid = NEW.uid;
    DELETE FROM transactions WHERE uid = NEW.uid;
END IF */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `inactiveTransactions`
--

DROP TABLE IF EXISTS `inactiveTransactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inactiveTransactions` (
  `uid` varchar(50) DEFAULT NULL,
  `trans_id` int(6) NOT NULL,
  `other_accnum` varchar(15) DEFAULT NULL,
  `trans_type` varchar(15) NOT NULL,
  `acc_type` varchar(15) NOT NULL,
  `amt` decimal(20,2) NOT NULL,
  `timeStamp` date NOT NULL,
  `pending` varchar(20) DEFAULT NULL,
  `accnum` int(20) DEFAULT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci `ENCRYPTION_KEY_ID`=100;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inactiveTransactions`
--

LOCK TABLES `inactiveTransactions` WRITE;
/*!40000 ALTER TABLE `inactiveTransactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `inactiveTransactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `uid` varchar(50) DEFAULT NULL,
  `trans_id` int(6) NOT NULL AUTO_INCREMENT,
  `other_accnum` varchar(15) DEFAULT NULL,
  `trans_type` varchar(15) NOT NULL,
  `acc_type` varchar(15) NOT NULL,
  `amt` decimal(20,2) NOT NULL,
  `timeStamp` date DEFAULT current_timestamp(),
  `pending` varchar(20) DEFAULT 'Pending',
  `accnum` int(20) DEFAULT NULL,
  PRIMARY KEY (`trans_id`),
  KEY `accnum` (`accnum`),
  KEY `uid` (`uid`),
  CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`accnum`) REFERENCES `account` (`accnum`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `bank_user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci `ENCRYPTION_KEY_ID`=100;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES ('Dtrump',1,'240575934','Deposit','Checkings',500000.00,'2024-12-11','Pending',240575934),('Dtrump',2,'948374020','Deposit','Savings',5000000000.00,'2024-12-11','Pending',948374020),('Shaggy17',3,'112385947','Deposit','Checkings',1000.00,'2024-12-11','Pending',112385947),('Shaggy17',4,'110372936','Deposit','Savings',210.00,'2024-12-11','Pending',110372936),('Scooby55',5,'110382936','Deposit','Savings',15.00,'2024-12-11','Pending',110382936),('Scooby55',6,'102385947','Deposit','Checkings',1000.00,'2024-12-11','Pending',102385947),('Velma15',7,'102685347','Deposit','Checkings',12000.00,'2024-12-11','Pending',102685347),('Velma15',8,'111482936','Deposit','Savings',105000.00,'2024-12-11','Pending',111482936),('Daphne16',9,'162386948','Deposit','Checkings',1234.00,'2024-12-11','Pending',162386948),('Daphne16',10,'113372925','Deposit','Savings',1500.00,'2024-12-11','Pending',113372925),('Fred17',11,'112438508','Deposit','Checkings',10204.00,'2024-12-11','Pending',112438508),('Fred17',12,'121393037','Deposit','Savings',70151.00,'2024-12-11','Pending',121393037),('JD001',13,'892347686','Deposit','Checkings',34.00,'2024-12-11','Pending',892347686),('JD001',14,'461837583','Deposit','Savings',34.00,'2024-12-11','Pending',461837583),('LL34',15,'382057420','Deposit','Checkings',20000000.00,'2024-12-11','Pending',382057420),('LL34',16,'374619473','Deposit','Savings',40000000.00,'2024-12-11','Pending',374619473),('DLrizz',17,'485738400','Deposit','Checkings',200.00,'2024-12-11','Pending',485738400),('DLrizz',18,'138562839','Deposit','Savings',0.00,'2024-12-11','Pending',138562839),('pepapig',19,'239575934','Deposit','Checkings',2300.00,'2024-12-11','Pending',239575934),('pepapig',20,'948372920','Deposit','Savings',54000.00,'2024-12-11','Pending',948372920),('MiGente',21,'374275975','Deposit','Checkings',1.00,'2024-12-11','Pending',374275975),('MiGente',22,'364783746','Deposit','Savings',2.00,'2024-12-11','Pending',364783746),('goofygoober',23,'471289873','Deposit','Checkings',1279.00,'2024-12-11','Pending',471289873),('superrobert9',24,'418279471','Deposit','Checkings',7419.00,'2024-12-11','Pending',418279471),('heisenbergnm',25,'472979892','Deposit','Checkings',4812.00,'2024-12-11','Pending',472979892),('proctologist',26,'741869840','Deposit','Checkings',9490.00,'2024-12-11','Pending',741869840),('anitasmith11',27,'901849072','Deposit','Checkings',4089.00,'2024-12-11','Pending',901849072),('goofygoober',28,'709874180','Deposit','Savings',1279.00,'2024-12-11','Pending',709874180),('superrobert9',29,'572108443','Deposit','Savings',7419.00,'2024-12-11','Pending',572108443),('heisenbergnm',30,'517834099','Deposit','Savings',4812.00,'2024-12-11','Pending',517834099),('proctologist',31,'310859037','Deposit','Savings',9490.00,'2024-12-11','Pending',310859037),('anitasmith11',32,'581092808','Deposit','Savings',4089.00,'2024-12-11','Pending',581092808),('bob',33,'242575934','Deposit','Checkings',2300.00,'2024-12-11','Pending',242575934),('bob',34,'928672920','Deposit','Savings',54000.00,'2024-12-11','Pending',928672920),('john17',35,'130575934','Deposit','Checkings',2300.00,'2024-12-11','Pending',130575934),('john17',36,'945682920','Deposit','Savings',5410.00,'2024-12-11','Pending',945682920),('mortj',37,'239575945','Deposit','Checkings',3321.00,'2024-12-11','Pending',239575945),('mortj',38,'948372919','Deposit','Savings',540.00,'2024-12-11','Pending',948372919),('gwill',39,'240075934','Deposit','Checkings',1000.00,'2024-12-11','Pending',240075934),('gwill',40,'940072920','Deposit','Savings',3000.00,'2024-12-11','Pending',940072920),('toxicmasculinityisdead',41,'681102352','Deposit','Checkings',9038.00,'2024-12-11','Pending',681102352),('toxicmasculinityisdead',42,'703400416','Deposit','Savings',109422.00,'2024-12-11','Pending',703400416),('tinflower',43,'576102012','Deposit','Checkings',5199.00,'2024-12-11','Pending',576102012),('tinflower',44,'632601778','Deposit','Savings',9244.00,'2024-12-11','Pending',632601778),('elvenoracle',45,'409729487','Deposit','Checkings',3790.00,'2024-12-11','Pending',409729487),('elvenoracle',46,'537210919','Deposit','Savings',8265.00,'2024-12-11','Pending',537210919),('archdevil667',47,'613012846','Deposit','Checkings',4488.00,'2024-12-11','Pending',613012846),('archdevil667',48,'709872341','Deposit','Savings',102011.00,'2024-12-11','Pending',709872341),('theball',49,'320948372','Deposit','Checkings',5711.00,'2024-12-11','Pending',320948372),('theball',50,'455129035','Deposit','Savings',6185.00,'2024-12-11','Pending',455129035),('Scooby55',51,'113372925','Withdrawal','Checkings',14.00,'2023-01-15','Completed',102385947),('Shaggy17',52,'162386948','Withdrawal','Checkings',140.00,'2023-01-15','Completed',112385947),('Velma15',53,'162386948','Withdrawal','Checkings',140.00,'2023-01-15','Completed',102685347),('Daphne16',54,'111482936','Withdrawal','Checkings',92.00,'2023-02-10','Completed',162386948),('Fred17',55,'113372925','Withdrawal','Checkings',23.00,'2015-01-15','Completed',112438508),('Fred17',56,'121393037','Deposit','Savings',10.00,'2022-09-02','Completed',121393037),('JD001',57,'892347686','Deposit','Checkings',32.00,'2021-07-04','Completed',892347686),('JD001',58,'892347686','Deposit','Checkings',1.00,'2021-07-04','Completed',892347686),('JD001',59,'461837583','Deposit','Savings',100.00,'2021-07-05','Completed',461837583),('LL34',60,'382057420','Deposit','Checkings',2000.00,'2021-07-04','Completed',382057420),('LL34',61,'382057420','Deposit','Checkings',10.00,'2021-07-04','Completed',382057420),('LL34',62,'374619473','Deposit','Savings',1000.00,'2021-07-05','Completed',374619473),('DLrizz',63,'485738400','Deposit','Checkings',90.00,'2021-07-04','Completed',485738400),('DLrizz',64,'485738400','Deposit','Checkings',7.00,'2021-07-04','Completed',485738400),('DLrizz',65,'138562839','Deposit','Savings',1000.00,'2021-07-05','Completed',138562839),('pepapig',66,'239575934','Deposit','Checkings',30.00,'2021-07-04','Completed',239575934),('pepapig',67,'239575934','Deposit','Checkings',300.00,'2021-07-04','Completed',239575934),('pepapig',68,'948372920','Deposit','Savings',100.00,'2021-07-05','Completed',948372920),('MiGente',69,'374275975','Deposit','Checkings',1.00,'2021-07-04','Completed',374275975),('MiGente',70,'374275975','Deposit','Checkings',300.00,'2021-07-04','Completed',374275975),('MiGente',71,'364783746','Deposit','Savings',100.00,'2021-07-05','Completed',364783746),('goofygoober',72,'242575934','Withdrawal','Savings',13.00,'2024-03-28','Completed',709874180),('goofygoober',73,'709874180','Deposit','Checkings',54.00,'2023-01-20','Completed',471289873),('goofygoober',74,'928672920','Withdrawal','Savings',43.00,'2023-03-29','Completed',709874180),('superrobert9',75,'572108443','Withdrawal','Checkings',41.00,'2022-08-09','Completed',418279471),('superrobert9',76,'364783746','Withdrawal','Savings',49.00,'2023-01-23','Completed',572108443),('superrobert9',77,'242575934','Withdrawal','Checkings',99.00,'2023-09-09','Completed',418279471),('heisenbergnm',78,'130575934','Withdrawal','Savings',193.00,'2020-01-08','Completed',517834099),('heisenbergnm',79,'242575934','Withdrawal','Checkings',94.00,'2021-09-10','Completed',472979892),('heisenbergnm',80,'418279471','Withdrawal','Checkings',44.00,'2023-05-12','Completed',472979892),('proctologist',81,'472979892','Withdrawal','Savings',78.00,'2021-10-18','Completed',310859037),('proctologist',82,'572108443','Withdrawal','Checkings',90.00,'2023-05-09','Completed',741869840),('proctologist',83,'130575934','Withdrawal','Checkings',78.00,'2023-09-19','Completed',741869840),('anitasmith11',84,'242575934','Withdrawal','Savings',142.00,'2022-02-02','Completed',581092808),('anitasmith11',85,'928672920','Withdrawal','Checkings',83.00,'2023-12-21','Completed',901849072),('anitasmith11',86,'928672920','Withdrawal','Savings',133.00,'2023-12-30','Completed',581092808),('bob',87,'901849072','Withdrawal','Checkings',300.00,'2021-07-04','Completed',242575934),('bob',88,'741869840','Withdrawal','Savings',100.00,'2021-07-05','Completed',928672920),('john17',89,'948372919','Withdrawal','Checkings',30.00,'2021-07-04','Completed',130575934),('john17',90,'239575945','Withdrawal','Checkings',300.00,'2021-07-04','Completed',130575934),('john17',91,'945682920','Deposit','Savings',100.00,'2021-07-05','Completed',945682920),('mortj',92,'240575934','Withdrawal','Checkings',301.00,'2021-07-04','Completed',239575945),('mortj',93,'948374020','Withdrawal','Checkings',3020.00,'2021-07-04','Completed',239575945),('mortj',94,'948372919','Deposit','Savings',1200.00,'2021-07-05','Completed',948372919),('Dtrump',95,'240075934','Withdrawal','Checkings',2.00,'2024-12-01','Completed',240575934),('Dtrump',96,'240075934','Withdrawal','Checkings',3.00,'2021-07-04','Completed',240575934),('Dtrump',97,'948374020','Deposit','Savings',10.00,'2021-07-05','Completed',948374020),('gwill',98,'613012846','Withdrawal','Checkings',30.00,'2021-07-04','Completed',240075934),('gwill',99,'632601778','Withdrawal','Checkings',300.00,'2021-07-04','Completed',240075934),('gwill',100,'703400416','Withdrawal','Savings',100.00,'2021-07-05','Completed',940072920),('toxicmasculinityisdead',101,'940072920','Withdrawal','Savings',50.00,'2024-04-17','Completed',703400416),('toxicmasculinityisdead',102,'948374020','Withdrawal','Savings',100.00,'2024-04-25','Completed',703400416),('toxicmasculinityisdead',103,'632601778','Withdrawal','Savings',250.00,'2024-05-08','Completed',703400416),('tinflower',104,'703400416','Withdrawal','Checkings',25.00,'2024-08-10','Completed',576102012),('tinflower',105,'709872341','Withdrawal','Savings',70.00,'2024-08-18','Completed',632601778),('tinflower',106,'703400416','Withdrawal','Checkings',42.00,'2024-08-29','Completed',576102012),('elvenoracle',107,'613012846','Withdrawal','Checkings',15.00,'2024-06-02','Completed',409729487),('elvenoracle',108,'632601778','Withdrawal','Savings',100.00,'2024-07-09','Completed',537210919),('elvenoracle',109,'703400416','Withdrawal','Savings',50.00,'2024-07-12','Completed',537210919),('archdevil667',110,'576102012','Withdrawal','Savings',500.00,'2024-06-27','Completed',709872341),('archdevil667',111,'455129035','Withdrawal','Checkings',80.00,'2024-07-10','Completed',613012846),('archdevil667',112,'576102012','Withdrawal','Savings',40.00,'2024-07-11','Completed',709872341),('theball',113,'709872341','Withdrawal','Savings',100.00,'2024-09-25','Completed',455129035),('theball',114,'613012846','Withdrawal','Savings',100.00,'2024-10-25','Completed',455129035),('theball',115,'409729487','Withdrawal','Savings',75.00,'2024-10-31','Completed',455129035),('Scooby55',116,'110382936','Transfer','Checkings',15.00,'2024-10-31','Completed',102385947),('Scooby55',117,'102385947','Transfer','Savings',10.00,'2024-10-31','Completed',110382936),('Shaggy17',118,'110372936','Transfer','Checkings',40.00,'2021-03-18','Completed',112385947),('Shaggy17',119,'112385947','Transfer','Savings',10.00,'2021-03-18','Completed',110372936),('Velma15',120,'111482936','Transfer','Checkings',1000.00,'2018-10-12','Completed',102685347),('Velma15',121,'102685347','Transfer','Savings',900.00,'2018-10-12','Completed',111482936),('Daphne16',122,'113372925','Transfer','Checkings',601.00,'2016-05-25','Completed',162386948),('Daphne16',123,'162386948','Transfer','Savings',51.00,'2016-05-25','Completed',113372925),('Fred17',124,'121393037','Transfer','Checkings',71.00,'2022-09-02','Completed',112438508),('Fred17',125,'112438508','Transfer','Savings',50.00,'2022-09-02','Completed',121393037),('bob',126,'928672920','Transfer','Checkings',30.00,'2021-07-04','Completed',242575934),('Dtrump',127,'948374020','Withdrawal','Account',100.00,'2024-12-11','Pending',948374020),('tinflower',128,'632601778','Withdrawal','Account',1.00,'2024-12-11','Pending',632601778),('tinflower',129,'632601778','Withdrawal','Account',1.00,'2024-12-11','Pending',632601778);
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`bams`@`localhost`*/ /*!50003 TRIGGER IF NOT EXISTS updateBalance
AFTER INSERT ON transactions
FOR EACH ROW

IF NEW.trans_type = 'Withdrawal' AND NEW.other_accnum = NEW.accnum THEN
    UPDATE account
    SET balance = balance - NEW.amt
    WHERE accnum = NEW.accnum;
ELSEIF NEW.trans_type = 'Withdrawal' OR NEW.trans_type = 'Transfer' THEN
    UPDATE account
    SET balance = balance - NEW.amt
    WHERE accnum = NEW.accnum;
    UPDATE account 
    SET balance = balance + NEW.amt
    WHERE accnum = NEW.other_accnum;
ELSEIF NEW.trans_type = 'Deposit' AND NEW.other_accnum != NEW.accnum THEN
    UPDATE account
    SET balance = balance + NEW.amt
    WHERE accnum = NEW.accnum;
    UPDATE account 
    SET balance = balance - NEW.amt
    WHERE accnum = NEW.other_accnum;


END IF */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `ActiveBankAccounts`
--

/*!50001 DROP VIEW IF EXISTS `ActiveBankAccounts`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`bams`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `ActiveBankAccounts` AS select `bank_user`.`email` AS `email`,`bank_user`.`uid` AS `uid`,`bank_user`.`pwd` AS `pwd`,`bank_user`.`unhash_pwd` AS `unhash_pwd`,`bank_user`.`admin` AS `admin`,`bank_user`.`status` AS `status` from `bank_user` where `bank_user`.`status` = 1 */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ActiveBankAccountsAdmin`
--

/*!50001 DROP VIEW IF EXISTS `ActiveBankAccountsAdmin`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`bams`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `ActiveBankAccountsAdmin` AS select `bank_user`.`first_name` AS `first_name`,`bank_user`.`last_name` AS `last_name`,`bank_user`.`email` AS `email`,`bank_user`.`uid` AS `uid`,`bank_user`.`dob` AS `dob`,`bank_user`.`address` AS `address`,`bank_user`.`phone` AS `phone`,`bank_user`.`admin` AS `admin`,`bank_user`.`status` AS `status` from `bank_user` where `bank_user`.`status` = 1 */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ActiveBankAccountsUser`
--

/*!50001 DROP VIEW IF EXISTS `ActiveBankAccountsUser`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`bams`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `ActiveBankAccountsUser` AS select `account`.`uid` AS `uid`,`account`.`type` AS `type`,`account`.`balance` AS `balance`,`account`.`accnum` AS `accnum`,`account`.`accname` AS `accname`,`account`.`status` AS `status` from `account` where `account`.`status` = 1 */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `CustomerPlacement`
--

/*!50001 DROP VIEW IF EXISTS `CustomerPlacement`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`bams`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `CustomerPlacement` AS select `account`.`uid` AS `uid`,sum(`account`.`balance`) AS `Total`,row_number() over ( order by sum(`account`.`balance`) desc) AS `Placement` from `account` group by `account`.`uid` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `TotalTransactionAmt`
--

/*!50001 DROP VIEW IF EXISTS `TotalTransactionAmt`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`bams`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `TotalTransactionAmt` AS select `transactions`.`uid` AS `uid`,`transactions`.`trans_id` AS `trans_id`,`transactions`.`other_accnum` AS `other_accnum`,`transactions`.`trans_type` AS `trans_type`,`transactions`.`acc_type` AS `acc_type`,`transactions`.`amt` AS `amt`,`transactions`.`timeStamp` AS `timeStamp`,`transactions`.`pending` AS `pending`,`transactions`.`accnum` AS `accnum` from `transactions` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-11 13:41:14
