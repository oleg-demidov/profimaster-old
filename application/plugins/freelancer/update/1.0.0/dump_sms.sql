CREATE TABLE `prefix_freelancer_sms` ( 
`id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT , 
`sms_id` BIGINT UNSIGNED NULL,
`number` VARCHAR(20) NOT NULL , 
`mess` VARCHAR(500) NULL , 
`type` ENUM('mess','reg','auth') NULL DEFAULT 'mess',
`price` FLOAT UNSIGNED NULL , 
`status` ENUM('ok','error') NULL DEFAULT NULL,
`date_send` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
PRIMARY KEY (`id`), 
INDEX( `type`),
INDEX( `status`),
INDEX (`sms_id`),
INDEX (`number`)) 
ENGINE = InnoDB 
CHARSET=utf8 
COLLATE utf8_bin;