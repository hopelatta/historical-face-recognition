
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

CREATE TABLE IF NOT EXISTS `personphoto` (
  `id` int(11) NOT NULL,
  `filename` varchar(500) DEFAULT NULL,
    
    /* File content is the photo */
  `filecontent` longblob,
  `defaultphoto` int(11) NOT NULL DEFAULT '0'
)

