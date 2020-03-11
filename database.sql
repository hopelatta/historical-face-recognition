
CREATE DATABASE `Users`;

USE `Users`;


CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) 

INSERT INTO `users`(`username`, `password`) values('Acadia','Jodrey');

/* Photos: name to go with photo must be the name of the photo*/
/* Image: stores in base 64 value */

CREATE TABLE `images` (
  `pid` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `Name` varchar(200) NOT NULL,
  `image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

