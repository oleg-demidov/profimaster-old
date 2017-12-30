CREATE TABLE `prefix_ydirect_geo_target` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `geo_id` int(10) UNSIGNED NOT NULL,
  `target_id` bigint(20) UNSIGNED NOT NULL,
  `target_type` varchar(15) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `geo_id` (`geo_id`),
    KEY `target_id` (`target_id`),
    KEY `target_type` (`target_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;