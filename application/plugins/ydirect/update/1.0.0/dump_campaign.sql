CREATE TABLE `prefix_ydirect_ydirect_campaign` (
   `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `ycampaign_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `negative_keywords` varchar(5000) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '0',
    PRIMARY KEY (`id`),
    UNIQUE `category_id` (`category_id`),
    KEY `ycampaign_id` (`ycampaign_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;