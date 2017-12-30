CREATE TABLE `prefix_ydirect_ydirect_ads` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `adgroup_id` bigint(20) UNSIGNED NOT NULL,
    `yadgroup_id` bigint(20) DEFAULT NULL,
    `yads_id` int(11) DEFAULT NULL,
    `title` varchar(33) NOT NULL,
    `text` varchar(75) NOT NULL,
    `type` varchar(20) NOT NULL DEFAULT 'TextAd',
    `href` varchar(500) NOT NULL,
    `active` tinyint(1) DEFAULT NULL,
    `status` varchar(20) NOT NULL DEFAULT 'new',
    `state` VARCHAR(20) NULL DEFAULT 'off' , 

    `date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    KEY `state` (`state`),
    KEY `status` (`status`),
    PRIMARY KEY (`id`),
    UNIQUE KEY `ads_id` (`yads_id`),
    KEY `adgroup_id` (`adgroup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;