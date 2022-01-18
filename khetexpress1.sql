-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2018 at 07:52 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khetexpress`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogdata`
--

CREATE TABLE `blogdata`(
  `blogId` INT(10) NOT NULL,
  `blogUser` VARCHAR(256) NOT NULL,
  `blogTitle` VARCHAR(256) NOT NULL,
  `blogContent` LONGTEXT NOT NULL,
  `blogTime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `likes` INT(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`blogId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE TABLE `blogfeedback` (
  `blogId` INT(10) NOT NULL,
  `comment` VARCHAR(256) NOT NULL,
  `commentUser` VARCHAR(256) NOT NULL,
  `commentPic` VARCHAR(256) NOT NULL DEFAULT 'profile0.png',
  `commentTime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT `blogId`
    FOREIGN KEY (`blogId`)
    REFERENCES `mydb`.`blogdata` (`blogId`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE TABLE `farmer` (
  `fid` INT(255) NOT NULL,
  `fname` VARCHAR(255) NOT NULL,
  `fusername` VARCHAR(255) NOT NULL,
  `fpassword` VARCHAR(255) NOT NULL,
  `fhash` VARCHAR(255) NOT NULL,
  `femail` VARCHAR(255) NOT NULL,
  `fmobile` VARCHAR(255) NOT NULL,
  `faddress` TEXT NOT NULL,
  `factive` INT(255) NOT NULL DEFAULT '0',
  `frating` INT(11) NOT NULL DEFAULT '0',
  `picExt` VARCHAR(255) NOT NULL DEFAULT 'png',
  `picStatus` INT(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fid`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE TABLE `buyer` (
  `bid` INT(100) NOT NULL,
  `bname` VARCHAR(100) NOT NULL,
  `busername` VARCHAR(100) NOT NULL,
  `bpassword` VARCHAR(100) NOT NULL,
  `bhash` VARCHAR(100) NOT NULL,
  `bemail` VARCHAR(100) NOT NULL,
  `bmobile` VARCHAR(100) NOT NULL,
  `baddress` TEXT NOT NULL,
  `bactive` INT(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`bid`),
  CONSTRAINT `buyer_ibfk_1`
    FOREIGN KEY (`bid`)
    REFERENCES `mydb`.`farmer` (`fid`)
    ON DELETE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE TABLE `fproduct` (
  `fid` INT(255) NOT NULL,
  `pid` INT(255) NOT NULL,
  `product` VARCHAR(255) NOT NULL,
  `pcat` VARCHAR(255) NOT NULL,
  `pinfo` VARCHAR(255) NOT NULL,
  `price` FLOAT NOT NULL,
  `pimage` BLOB NOT NULL,
  `picStatus` INT(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pid`),
  CONSTRAINT `fid`
    FOREIGN KEY (`fid`)
    REFERENCES `mydb`.`farmer` (`fid`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE TABLE `likedata` (
  `blogId` INT(10) NOT NULL,
  `blogUserId` INT(10) NOT NULL,
  CONSTRAINT `likedata_ibfk_1`
    FOREIGN KEY (`blogId`)
    REFERENCES `mydb`.`blogdata` (`blogId`)
    ON DELETE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE TABLE `mycart` (
  `bid` INT(10) NOT NULL,
  `pid` INT(10) NOT NULL,
  `fproduct_pid` INT(255) NOT NULL,
  PRIMARY KEY (`fproduct_pid`),
  CONSTRAINT `bid`
    FOREIGN KEY (`bid`)
    REFERENCES `mydb`.`buyer` (`bid`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `pid`
    FOREIGN KEY (`pid`)
    REFERENCES `mydb`.`fproduct` (`pid`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE TABLE `review` (
  `pid` INT(10) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `rating` INT(10) NOT NULL,
  `comment` TEXT NOT NULL,
  CONSTRAINT `pid`
    FOREIGN KEY (`pid`)
    REFERENCES `mydb`.`fproduct` (`pid`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE TABLE `transaction` (
  `tid` INT(10) NOT NULL,
  `bid` INT(10) NOT NULL,
  `pid` INT(10) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `city` VARCHAR(255) NOT NULL,
  `mobile` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `pincode` VARCHAR(255) NOT NULL,
  `addr` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`tid`),
  CONSTRAINT `bid`
    FOREIGN KEY (`bid`)
    REFERENCES `mydb`.`buyer` (`bid`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `pid`
    FOREIGN KEY (`pid`)
    REFERENCES `mydb`.`fproduct` (`pid`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;