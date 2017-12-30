CREATE TABLE `prefix_freelancer_order` ( 
    `id` BIGINT NOT NULL AUTO_INCREMENT , 
    `title` varchar(200) NOT NULL,
    `text_about` varchar(2000) NOT NULL,
    `user_id` bigint(11) NOT NULL,
    `budjet` smallint(6) NOT NULL,
    `master_id` bigint(20) DEFAULT NULL,
    `status` varchar(20) NOT NULL DEFAULT 'start',
    PRIMARY KEY (`id`)
    )
DEFAULT CHARSET ='utf8';