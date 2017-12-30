CREATE TABLE `prefix_ydirect_ydirect_keyword` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT
  `campaign_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ykeyword_id` bigint(20) UNSIGNED DEFAULT NULL,
  `adgroup_id` int(11) UNSIGNED DEFAULT NULL,
  `bid` int(11) DEFAULT '1',
  `value` varchar(50) NOT NULL,
  `active` tinyint(1) DEFAULT '0',
    `status` VARCHAR(20) NOT NULL DEFAULT 'new',
    `state` VARCHAR(20) NOT NULL DEFAULT 'off',
  `date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `category_id` (`campaign_id`),
    KEY `adgroup_id` (`adgroup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;