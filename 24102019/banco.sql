-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`usuario` (
  `idusuarios` INT NOT NULL AUTO_INCREMENT,
  `cpf` VARCHAR(11) NOT NULL,
  `senha` VARCHAR(20) NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `cargo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idusuarios`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Empresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Empresa` (
  `idEmpresa` INT NOT NULL,
  `nomeEmpresa` VARCHAR(45) NOT NULL,
  `cnpj` INT(14) NOT NULL,
  `Empresacol` VARCHAR(45) NOT NULL,
  `usuario_idusuarios` INT NOT NULL,
  PRIMARY KEY (`idEmpresa`),
  INDEX `fk_Empresa_usuario1_idx` (`usuario_idusuarios` ASC) VISIBLE,
  CONSTRAINT `fk_Empresa_usuario1`
    FOREIGN KEY (`usuario_idusuarios`)
    REFERENCES `mydb`.`usuario` (`idusuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`vendas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`vendas` (
  `idvenda` INT NOT NULL AUTO_INCREMENT,
  `data` DATETIME NOT NULL,
  `Empresa_idEmpresa` INT NOT NULL,
  `usuario_idusuarios` INT NOT NULL,
  PRIMARY KEY (`idvenda`),
  INDEX `fk_vendas_Empresa1_idx` (`Empresa_idEmpresa` ASC) VISIBLE,
  INDEX `fk_vendas_usuario1_idx` (`usuario_idusuarios` ASC) VISIBLE,
  CONSTRAINT `fk_vendas_Empresa1`
    FOREIGN KEY (`Empresa_idEmpresa`)
    REFERENCES `mydb`.`Empresa` (`idEmpresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_vendas_usuario1`
    FOREIGN KEY (`usuario_idusuarios`)
    REFERENCES `mydb`.`usuario` (`idusuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`produtos` (
  `idprodutos` INT NOT NULL AUTO_INCREMENT,
  `nomeProduto` VARCHAR(45) NOT NULL,
  `valorProduto` INT(4) NOT NULL,
  `categoriaProduto` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idprodutos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`itemVenda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`itemVenda` (
  `iditemVenda` INT NOT NULL,
  `qtd` VARCHAR(30) NOT NULL,
  `valorItem` VARCHAR(45) NOT NULL,
  `vendas_idvenda` INT NOT NULL,
  `produtos_idprodutos` INT NOT NULL,
  PRIMARY KEY (`iditemVenda`, `vendas_idvenda`, `produtos_idprodutos`),
  INDEX `fk_itemVenda_vendas1_idx` (`vendas_idvenda` ASC) VISIBLE,
  INDEX `fk_itemVenda_produtos1_idx` (`produtos_idprodutos` ASC) VISIBLE,
  CONSTRAINT `fk_itemVenda_vendas1`
    FOREIGN KEY (`vendas_idvenda`)
    REFERENCES `mydb`.`vendas` (`idvenda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_itemVenda_produtos1`
    FOREIGN KEY (`produtos_idprodutos`)
    REFERENCES `mydb`.`produtos` (`idprodutos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
