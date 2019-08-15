SET FOREIGN_KEY_CHECKS=0;

DROP DATABASE IF EXISTS db_classe_auth;

CREATE DATABASE db_classe_auth CHARACTER SET utf8mb4;

USE db_classe_auth;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `passwords` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;