CREATE TABLE `prefix_ydirect_ydirect_token` (
    `access_token` VARCHAR(100) NOT NULL , 
    `token_type` VARCHAR(50) NULL , 
    `expires_in` BIGINT NULL , 
    `refresh_token` VARCHAR(150) NULL , 
    `date_create` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`access_token`)) ENGINE = InnoDB;