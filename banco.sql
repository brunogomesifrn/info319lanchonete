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
-- Table `mydb`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`usuarios` (
  `idusuarios` INT NOT NULL AUTO_INCREMENT,
  `cpf` VARCHAR(11) NOT NULL,
  `senha` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idusuarios`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`vendas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`vendas` (
  `idvenda` INT NOT NULL AUTO_INCREMENT,
  `usuarios_idusuarios` INT NOT NULL,
  `qtd` INT(20) NOT NULL,
  `data` DATETIME(45) NOT NULL,
  PRIMARY KEY (`idvenda`),
  INDEX `fk_vendas_usuarios_idx` (`usuarios_idusuarios` ASC),
  CONSTRAINT `fk_vendas_usuarios`
    FOREIGN KEY (`usuarios_idusuarios`)
    REFERENCES `mydb`.`usuarios` (`idusuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`produtos` (
  `idprodutos` INT NOT NULL AUTO_INCREMENT,
  `nomeProduto` VARCHAR(45) NOT NULL,
  `preco` INT(4) NOT NULL,
  `vendas_idvenda` INT NOT NULL,
  PRIMARY KEY (`idprodutos`),
  INDEX `fk_produtos_vendas1_idx` (`vendas_idvenda` ASC),
  CONSTRAINT `fk_produtos_vendas1`
    FOREIGN KEY (`vendas_idvenda`)
    REFERENCES `mydb`.`vendas` (`idvenda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
