ALTER TABLE `prefix_user` DROP INDEX `user_mail`, ADD INDEX `user_mail` (`user_mail`) USING BTREE;
ALTER TABLE `prefix_user` ADD `date_last_auth` DATETIME NULL AFTER `user_settings_timezone`;