
CREATE DATABASE `Users`;

USE `Users`;


CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) 

INSERT INTO `users`(`username`, `password`) values('Acadia','Jodrey');
