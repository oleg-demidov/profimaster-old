CREATE TABLE `prefix_freelancer_settings` ( 
`id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT , 
`user_id` BIGINT UNSIGNED NOT NULL , 
`type` VARCHAR(30) NOT NULL , 
`value` BOOLEAN NOT NULL , 
PRIMARY KEY (`id`), 
INDEX (`user_id`), 
INDEX (`type`)) 
ENGINE = InnoDB;