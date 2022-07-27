CREATE DATABASE bantaba;

use bantaba;

CREATE TABLE `users` (
    PRIMARY KEY (`id`)
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `password` varchar(255) NOT NULL,
    `username` varchar(100) NOT NULL,
);

CREATE TABLE `questions` (
    PRIMARY KEY (`id`),
    `id` INT NOT NULL AUTO_INCREMENT,
    `userID` INT NOT NULL,
    `question` TEXT NOT NULL,
    `createdAt` TIMESTAMP NOT NULL,
    FOREIGN KEY (`userID`) REFERENCES users(`id`)
);

CREATE TABLE `answers` (
    PRIMARY KEY (`id`),
    `id` INT NOT NULL AUTO_INCREMENT,
    `questionID` INT NOT NULL,
    `userID` INT NOT NULL,
    `createdAt` TIMESTAMP NOT NULL,
    FOREIGN KEY ('questionID') REFERENCES questions(`id`),
    FOREIGN KEY (`userID`) REFERENCES users(`id`)
);
