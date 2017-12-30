CREATE TABLE `prefix_freelancer_notify` ( 
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT , 
    `user_id` BIGINT UNSIGNED NOT NULL , 
    `type` VARCHAR(20) NULL DEFAULT 'info',
    `title` VARCHAR(200) NULL DEFAULT NULL , 
    `text` VARCHAR(500) NULL DEFAULT NULL , 
    `status` VARCHAR(10) NOT NULL DEFAULT 'new' , 
    `date_create` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`id`), 
    INDEX (`user_id`), 
    INDEX (`status`)) 
ENGINE = InnoDB;