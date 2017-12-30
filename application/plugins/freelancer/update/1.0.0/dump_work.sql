CREATE TABLE `prefix_freelancer_portfolio_work` ( 
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT , 
    `user_id` BIGINT UNSIGNED NULL , 
    `order_id` BIGINT UNSIGNED NULL , 
    `title` VARCHAR(300) NULL , 
    `text` VARCHAR(5000) NULL , 
    `date_create` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`), 
    INDEX (`user_id`), 
    INDEX (`order_id`))  
ENGINE = InnoDB;