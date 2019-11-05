create database Chat;
use Chat;
CREATE TABLE `Usuarios` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`nome` varchar(255) NOT NULL,
	`email` varchar(255) NOT NULL,
	`senha` varchar(64) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `Sala` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`nome` varchar(255) NOT NULL,
	`dono` INT(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `Mensagens` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`remetente` INT NOT NULL,
	`mensagem` varchar(255) NOT NULL,
	`sala` INT(255) NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `Sala` ADD CONSTRAINT `Sala_fk0` FOREIGN KEY (`dono`) REFERENCES `Usuarios`(`id`);

ALTER TABLE `Mensagens` ADD CONSTRAINT `Mensagens_fk0` FOREIGN KEY (`remetente`) REFERENCES `Usuarios`(`id`);

ALTER TABLE `Mensagens` ADD CONSTRAINT `Mensagens_fk1` FOREIGN KEY (`sala`) REFERENCES `Sala`(`id`);