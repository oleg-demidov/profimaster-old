CREATE TABLE `prefix_freelancer_balance_transaction` ( 
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT , 
    `user_id` BIGINT UNSIGNED NOT NULL , 
    `type` ENUM('profit','loss') NULL DEFAULT NULL , 
    `desc` VARCHAR(200) NULL DEFAULT NULL , 
    `summ` FLOAT NULL DEFAULT NULL , 
    `date_create` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`id`)) 
    ENGINE = InnoDB 
    CHARSET=utf8 
    COLLATE utf8_bin;