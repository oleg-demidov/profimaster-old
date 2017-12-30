CREATE TABLE `prefix_freelancer_order_bid` ( 
    `id` BIGINT NOT NULL AUTO_INCREMENT , 
    `order_id` BIGINT NOT NULL,
    `user_id` bigint(11) NOT NULL,
    `text` varchar(2000) NOT NULL,
    `price` smallint(6) NOT NULL,
    `master_id` bigint(20) DEFAULT NULL,
    `status` varchar(20) NOT NULL DEFAULT 'new',
    `view_count` MEDIUMINT NULL DEFAULT '0',
    `date_create` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
    )
DEFAULT CHARSET ='utf8';