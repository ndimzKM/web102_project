CREATE DATABASE bantaba;

use bantaba;

CREATE TABLE `users` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `password` varchar(255) NOT NULL,
    `username` varchar(100) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `questions` (
   
    `id` INT NOT NULL AUTO_INCREMENT,
    `userID` INT NOT NULL,
    `question` TEXT NOT NULL,
    `createdAt` TIMESTAMP NOT NULL,
    FOREIGN KEY (`userID`) REFERENCES users(`id`),
     PRIMARY KEY (`id`)
);

CREATE TABLE `answers` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `questionID` INT NOT NULL,
    `userID` INT NOT NULL,
    `createdAt` TIMESTAMP NOT NULL,
    FOREIGN KEY (`userID`) REFERENCES users(`id`),
    FOREIGN KEY (`questionID`) REFERENCES questions(`id`),
    PRIMARY KEY (`id`)
);
