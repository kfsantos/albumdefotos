-- MySQL Script generated by MySQL Workbench
-- 03/15/17 19:37:40
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`album`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`album` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `data` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`foto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`foto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `endereco` VARCHAR(45) NULL,
  `table1_id` INT NOT NULL,
  PRIMARY KEY (`id`, `table1_id`),
  INDEX `fk_table2_table1_idx` (`table1_id` ASC),
  CONSTRAINT `fk_table2_table1`
    FOREIGN KEY (`table1_id`)
    REFERENCES `mydb`.`album` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
