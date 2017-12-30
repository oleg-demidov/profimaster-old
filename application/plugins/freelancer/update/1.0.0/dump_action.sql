CREATE TABLE `prefix_freelancer_market_action` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `title` VARCHAR(20) NOT NULL,
    `desc` VARCHAR(2000) NULL , 
    `role_id` INT NOT NULL , 
    `state` BOOLEAN NOT NULL , 
    `period` INT NULL , 
    `date_start` DATETIME NULL ,
    `date_end` DATETIME NULL , 
PRIMARY KEY (`id`)) 
ENGINE = InnoDB;