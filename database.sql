CREATE DATABASE `WW2FaceRec`;
USE `WW2FaceRec`;

create user 'WW2App'@'localhost' identified by 'faceRecApp';
grant all privileges on WW2FaceRec.* to 'WW2App'@'localhost' with grant option;
flush privileges;

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
);

INSERT INTO `users`(`username`, `password`) values('Acadia','Jodrey');

CREATE TABLE IF NOT EXISTS `personphoto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(500) DEFAULT NULL,
  `personname` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `encodings` varchar(5000) DEFAULT NULL,
  `filecontent` longblob,
  PRIMARY KEY (`id`)
);	