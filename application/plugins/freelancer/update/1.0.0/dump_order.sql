CREATE TABLE `prefix_freelancer_order` ( 
    `id` BIGINT NOT NULL AUTO_INCREMENT , 
    `title` varchar(200) NOT NULL,
    `text_about` varchar(2000) NOT NULL,
    `user_id` bigint(11) NOT NULL,
    `budjet` FLOAT NULL DEFAULT NULL,
    `master_id` bigint(20) DEFAULT NULL,
    `status` VARCHAR(20)  NOT NULL DEFAULT 'new',
    `fire` BOOLEAN NOT NULL DEFAULT FALSE, 
    `view_count` MEDIUMINT NULL DEFAULT '0',
    `date_create` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    KEY (`fire`),
    PRIMARY KEY (`id`)
    )
DEFAULT CHARSET ='utf8';