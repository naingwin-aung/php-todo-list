CREATE TABLE `todo` (
     `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
     `title` TEXT,
     `description` MEDIUMTEXT,
     `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);