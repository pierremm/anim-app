SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `personnes`;
DROP TABLE IF EXISTS `qualites`;
DROP TABLE IF EXISTS `lieux`;
DROP TABLE IF EXISTS `etablissements`;
DROP TABLE IF EXISTS `partenaires`;
DROP TABLE IF EXISTS `projets`;
DROP TABLE IF EXISTS `themes`;
DROP TABLE IF EXISTS `publics`;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE `personnes` (
    `id` INTEGER NOT NULL,
    `nom` VARCHAR(50) NOT NULL,
    `prenom` VARCHAR(50),
    `tel` VARCHAR(20),
    `email` VARCHAR(50),
    `qualite` INTEGER,
    PRIMARY KEY (`id`),
    UNIQUE (`id`)
);

CREATE TABLE `qualites` (
    `id` INTEGER NOT NULL,
    `nom` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE (`id`)
);

CREATE TABLE `lieux` (
    `id` INTEGER NOT NULL,
    `nom` VARCHAR(50) NOT NULL,
    `adresse` VARCHAR(255),
    `cp` INTEGER(10),
    `ville` VARCHAR(50),
    `contact` INTEGER,
    PRIMARY KEY (`id`),
    UNIQUE (`id`)
);

CREATE TABLE `etablissements` (
    `id` INTEGER NOT NULL,
    `nom` VARCHAR(255) NOT NULL,
    `tel` VARCHAR(20),
    `email` VARCHAR(50),
    `contact` INTEGER,
    PRIMARY KEY (`id`),
    UNIQUE (`id`)
);

CREATE TABLE `partenaires` (
    `id` INTEGER NOT NULL,
    `nom` VARCHAR(50) NOT NULL,
    `tel` VARCHAR(20),
    `email` VARCHAR(50),
    `contact` INTEGER(3),
    PRIMARY KEY (`id`),
    UNIQUE (`id`)
);

CREATE TABLE `projets` (
    `id` INTEGER NOT NULL,
    `nom` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE (`id`)
);

CREATE TABLE `themes` (
    `id` INTEGER NOT NULL,
    `nom` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE (`id`)
);

CREATE TABLE `publics` (
    `id` INTEGER NOT NULL,
    `nom` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE (`id`)
);
