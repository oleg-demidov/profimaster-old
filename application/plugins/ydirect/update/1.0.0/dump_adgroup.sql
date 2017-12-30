CREATE TABLE `prefix_ydirect_ydirect_ad_group` (
    `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `yadgroup_id` int(11) DEFAULT NULL,
    `campaign_id` bigint(20) UNSIGNED NOT NULL,
    `user_id` bigint(20) UNSIGNED DEFAULT NULL,
    `name` varchar(200) DEFAULT NULL,
    `negative_keywords` varchar(5000) DEFAULT NULL,
    `region_ids` varchar(500) DEFAULT NULL,
    `active` tinyint(1) DEFAULT '0',
    `status` VARCHAR(20) NULL DEFAULT 'new',
    `date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `date_suspend` DATETIME NULL,
    `state` VARCHAR(20) NOT NULL DEFAULT 'new',

    PRIMARY KEY (`id`),
    KEY (`status`),
    KEY `user_id` (`user_id`),
    KEY `adgroup_id` (`yadgroup_id`),
    KEY `campaign_id` (`campaign_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;