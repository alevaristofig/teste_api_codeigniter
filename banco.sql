CREATE DATABASE `api_usuarios` /*!40100 COLLATE 'utf8mb4_general_ci' */

CREATE TABLE `usuarios` (
	`id` BIGINT(20) NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`email` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`senha` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`status` VARCHAR(1) NOT NULL COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`id`) USING BTREE,
	UNIQUE INDEX `email` (`email`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
;


CREATE USER 'apiuser'@'localhost' IDENTIFIED VIA mysql_native_password USING PASSWORD('apiusuarios');

GRANT ALL PRIVILEGES ON apiusuarios.* TO 'apiuser'@'localhost';
FLUSH PRIVILEGES;