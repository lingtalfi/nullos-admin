-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema oui
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `oui` ;

-- -----------------------------------------------------
-- Schema oui
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `oui` DEFAULT CHARACTER SET utf8 ;
USE `oui` ;

-- -----------------------------------------------------
-- Table `oui`.`pays`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oui`.`pays` ;

CREATE TABLE IF NOT EXISTS `oui`.`pays` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `oui`.`niveaux`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oui`.`niveaux` ;

CREATE TABLE IF NOT EXISTS `oui`.`niveaux` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `oui`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oui`.`users` ;

CREATE TABLE IF NOT EXISTS `oui`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `active` TINYINT NOT NULL,
  `email` VARCHAR(64) NOT NULL,
  `pseudo` VARCHAR(64) NOT NULL,
  `password` VARCHAR(64) NOT NULL,
  `url_photo` VARCHAR(128) NOT NULL,
  `nom` VARCHAR(64) NOT NULL,
  `prenom` VARCHAR(64) NOT NULL,
  `sexe` CHAR(1) NOT NULL,
  `date_naissance` DATE NULL,
  `code_postal` VARCHAR(16) NOT NULL,
  `ville` VARCHAR(64) NOT NULL,
  `pays_id` INT NULL,
  `niveaux_id` INT NULL,
  `biographie` TEXT NOT NULL,
  `influences` TEXT NOT NULL,
  `prochains_concerts` TEXT NOT NULL,
  `sites_internet` TEXT NOT NULL,
  `newsletter` ENUM('y', 'n') NOT NULL,
  `show_sexe` ENUM('y', 'n') NOT NULL,
  `show_date_naissance` ENUM('y', 'n') NOT NULL,
  `show_niveau` ENUM('y', 'n') NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_users_pays_idx` (`pays_id` ASC),
  INDEX `fk_users_niveaux1_idx` (`niveaux_id` ASC),
  CONSTRAINT `fk_users_pays`
    FOREIGN KEY (`pays_id`)
    REFERENCES `oui`.`pays` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_users_niveaux1`
    FOREIGN KEY (`niveaux_id`)
    REFERENCES `oui`.`niveaux` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `oui`.`instruments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oui`.`instruments` ;

CREATE TABLE IF NOT EXISTS `oui`.`instruments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `oui`.`styles_musicaux`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oui`.`styles_musicaux` ;

CREATE TABLE IF NOT EXISTS `oui`.`styles_musicaux` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `oui`.`users_has_styles_musicaux`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oui`.`users_has_styles_musicaux` ;

CREATE TABLE IF NOT EXISTS `oui`.`users_has_styles_musicaux` (
  `users_id` INT NOT NULL,
  `styles_musicaux_id` INT NOT NULL,
  PRIMARY KEY (`users_id`, `styles_musicaux_id`),
  INDEX `fk_users_has_styles_musicaux_styles_musicaux1_idx` (`styles_musicaux_id` ASC),
  CONSTRAINT `fk_users_has_styles_musicaux_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `oui`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_users_has_styles_musicaux_styles_musicaux1`
    FOREIGN KEY (`styles_musicaux_id`)
    REFERENCES `oui`.`styles_musicaux` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `oui`.`users_has_instruments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oui`.`users_has_instruments` ;

CREATE TABLE IF NOT EXISTS `oui`.`users_has_instruments` (
  `users_id` INT NOT NULL,
  `instruments_id` INT NOT NULL,
  PRIMARY KEY (`users_id`, `instruments_id`),
  CONSTRAINT `fk_users_has_instruments_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `oui`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_users_has_instruments_instruments1`
    FOREIGN KEY (`instruments_id`)
    REFERENCES `oui`.`instruments` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `oui`.`configuration`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oui`.`configuration` ;

CREATE TABLE IF NOT EXISTS `oui`.`configuration` (
  `cle` VARCHAR(64) NOT NULL,
  `valeur` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`cle`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `oui`.`equipe`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oui`.`equipe` ;

CREATE TABLE IF NOT EXISTS `oui`.`equipe` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `oui`.`membres`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oui`.`membres` ;

CREATE TABLE IF NOT EXISTS `oui`.`membres` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `pseudo` VARCHAR(64) NOT NULL,
  `email` VARCHAR(64) NOT NULL,
  `url_photo` VARCHAR(128) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `oui`.`equipe_has_membres`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oui`.`equipe_has_membres` ;

CREATE TABLE IF NOT EXISTS `oui`.`equipe_has_membres` (
  `equipe_id` INT NOT NULL,
  `membres_id` INT NOT NULL,
  PRIMARY KEY (`equipe_id`, `membres_id`),
  INDEX `fk_equipe_has_membres_membres1_idx` (`membres_id` ASC),
  INDEX `fk_equipe_has_membres_equipe1_idx` (`equipe_id` ASC),
  CONSTRAINT `fk_equipe_has_membres_equipe1`
    FOREIGN KEY (`equipe_id`)
    REFERENCES `oui`.`equipe` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_equipe_has_membres_membres1`
    FOREIGN KEY (`membres_id`)
    REFERENCES `oui`.`membres` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `oui`.`concours`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oui`.`concours` ;

CREATE TABLE IF NOT EXISTS `oui`.`concours` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `equipe_id` INT NOT NULL,
  `titre` VARCHAR(64) NOT NULL,
  `url_photo` VARCHAR(128) NOT NULL,
  `url_video` VARCHAR(128) NOT NULL,
  `date_debut` DATETIME NOT NULL,
  `date_fin` DATETIME NOT NULL,
  `lots` TEXT NOT NULL,
  `reglement` TEXT NOT NULL,
  `description` TEXT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_concours_equipe1_idx` (`equipe_id` ASC),
  CONSTRAINT `fk_concours_equipe1`
    FOREIGN KEY (`equipe_id`)
    REFERENCES `oui`.`equipe` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `oui`.`videos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oui`.`videos` ;

CREATE TABLE IF NOT EXISTS `oui`.`videos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `active` TINYINT NOT NULL,
  `users_id` INT NOT NULL,
  `concours_id` INT NOT NULL,
  `titre` VARCHAR(64) NOT NULL,
  `url` VARCHAR(128) NOT NULL,
  `url_photo` VARCHAR(128) NOT NULL,
  `nb_likes` INT NOT NULL,
  `nb_vues` INT NOT NULL,
  `date_creation` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_videos_users1_idx` (`users_id` ASC),
  INDEX `fk_videos_concours1_idx` (`concours_id` ASC),
  CONSTRAINT `fk_videos_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `oui`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_videos_concours1`
    FOREIGN KEY (`concours_id`)
    REFERENCES `oui`.`concours` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `oui`.`messages`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oui`.`messages` ;

CREATE TABLE IF NOT EXISTS `oui`.`messages` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `objet` VARCHAR(64) NOT NULL,
  `message` TEXT NOT NULL,
  `email` VARCHAR(64) NOT NULL,
  `date_creation` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `oui`.`coups_de_coeur`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oui`.`coups_de_coeur` ;

CREATE TABLE IF NOT EXISTS `oui`.`coups_de_coeur` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `videos_id` INT NOT NULL,
  `position` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_coups_de_coeur_videos1_idx` (`videos_id` ASC),
  CONSTRAINT `fk_coups_de_coeur_videos1`
    FOREIGN KEY (`videos_id`)
    REFERENCES `oui`.`videos` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
