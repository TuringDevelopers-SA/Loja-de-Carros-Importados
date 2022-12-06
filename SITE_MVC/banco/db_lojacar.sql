create database db_lojacar;

use db_lojacar;

CREATE TABLE `db_lojacar`.`tbl_carros` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `placa` CHAR(7) NOT NULL,
  `marca` VARCHAR(60) NOT NULL,
  `modelo` VARCHAR(45) NOT NULL,
  `ano` CHAR(14) NOT NULL,
  `valor` DOUBLE,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `db_lojacar`.`tbl_func` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `senha` VARCHAR(40) NOT NULL,
  `cpf` CHAR(14) NOT NULL,
  `data_nasc` DATE NOT NULL,
  `telefone` CHAR(15) NOT NULL,
  `cep` CHAR(9) NOT NULL,
  `numero` VARCHAR(5) NOT NULL,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `db_lojacar`.`tbl_vendas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `cpf` CHAR(14) NOT NULL,
  `cep` VARCHAR(60) NOT NULL,
  `telefone` CHAR(15) NOT NULL,
  `placa` CHAR(7) NOT NULL,
  `marca` VARCHAR(45) NOT NULL,
  `modelo` VARCHAR(45) NOT NULL,
  `ano` CHAR(4) NOT NULL,
  `valor` DOUBLE,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `db_lojacar`.`tbl_clientes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(60) NOT NULL,
  `cpf` CHAR(14) NOT NULL,
  `email` VARCHAR(40) NOT NULL,
  `telefone` CHAR(15) NOT NULL,
  `data_nasc` DATE NOT NULL,
  `cep` CHAR(9) NOT NULL,
  `numero` VARCHAR(5) NOT NULL,
  PRIMARY KEY (`id`));
  

select * from tbl_carros;

select * from tbl_clientes;