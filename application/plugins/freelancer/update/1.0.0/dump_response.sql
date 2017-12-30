CREATE TABLE `prefix_freelancer_freelancer_response` ( 
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT , 
    `user_id` BIGINT UNSIGNED NULL DEFAULT NULL,
    `target_id` BIGINT UNSIGNED NOT NULL , 
    `order_id` BIGINT UNSIGNED NULL DEFAULT NULL , 
    `text` VARCHAR(3000) NULL DEFAULT NULL , 
    `date_create` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `raiting` TINYINT NULL DEFAULT NULL,
    PRIMARY KEY (`id`), 
    INDEX `target_id` (`target_id`), 
    INDEX `orer_id` (`order_id`)) 
ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_bin; 

