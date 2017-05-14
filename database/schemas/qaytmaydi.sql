SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS  `backend_remember_tokens`;
CREATE TABLE `backend_remember_tokens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(10) unsigned NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `create_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`users_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='后台用户登陆，使用记住我功能，保存到数据库里的tokens';

DROP TABLE IF EXISTS  `backend_success_logins`;
CREATE TABLE `backend_success_logins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(10) unsigned NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='后台成功登陆的日志';

insert into `backend_success_logins`(`id`,`users_id`,`ip_address`,`user_agent`,`created_at`) values
('1','1','202.101.1.10','Mozilla/5.0 (Windows NT 10.0; WOW64; rv:52.0) Gecko/20100101 Firefox/52.0','2017-03-13 16:04:14'),
('2','1','116.234.36.143','Mozilla/5.0 (Windows NT 10.0; WOW64; rv:51.0) Gecko/20100101 Firefox/51.0','2017-03-13 20:15:54'),
('3','1','116.234.36.143','Mozilla/5.0 (Windows NT 10.0; WOW64; rv:51.0) Gecko/20100101 Firefox/51.0','2017-03-13 20:15:59'),
('4','1','116.234.36.143','Mozilla/5.0 (Windows NT 10.0; WOW64; rv:51.0) Gecko/20100101 Firefox/51.0','2017-03-13 20:35:26'),
('5','1','202.101.1.10','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.98 Safari/537.36','2017-03-14 15:38:40');
DROP TABLE IF EXISTS  `backend_user_groups`;
CREATE TABLE `backend_user_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `is_new_user_default` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_activated` tinyint(1) unsigned DEFAULT '0' COMMENT '用户组是否有效',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_unique` (`name`),
  KEY `code_index` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

insert into `backend_user_groups`(`id`,`name`,`permissions`,`created_at`,`updated_at`,`code`,`description`,`is_new_user_default`,`is_activated`) values
('1','Owner',null,'2017-02-23 15:12:18','2017-02-23 15:12:41','Owner','Default group for website owners.','0','1'),
('3','超级管理员',null,'2017-03-09 18:30:03','2017-03-09 18:30:03','code',null,'1','0');
DROP TABLE IF EXISTS  `backend_users`;
CREATE TABLE `backend_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_name` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '登陆名',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `is_activated` tinyint(1) NOT NULL DEFAULT '0',
  `activated_at` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_superuser` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login_unique` (`login_name`),
  UNIQUE KEY `email_unique` (`email`),
  KEY `act_code_index` (`activation_code`),
  KEY `reset_code_index` (`reset_password_code`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

insert into `backend_users`(`id`,`first_name`,`last_name`,`login_name`,`email`,`password`,`activation_code`,`persist_code`,`reset_password_code`,`permissions`,`is_activated`,`activated_at`,`last_login`,`created_at`,`updated_at`,`is_superuser`) values
('1','斌','袁','admin','528803867@qq.com','$2y$08$TG1nNHlxKzZEcnFtQmRWMO.m0MX7FDiu5a8rLZDHlnOdO9RkvQPsu',null,null,null,null,'0',null,null,'2017-03-13 17:17:19','2017-03-13 17:17:19','1'),
('14','frank','yuan','test01','01@qq.com','$2y$08$TG1nNHlxKzZEcnFtQmRWMO.m0MX7FDiu5a8rLZDHlnOdO9RkvQPsu',null,null,null,null,'0',null,null,'2017-03-13 16:43:35','2017-03-13 16:43:35','1'),
('15','frank','yuan','test02','02@qq.com','$2y$08$cnVrU3B0YS9LOENaL2c2VOG2RRf8FQWjMDeUOX7opxewNDybzojTu',null,null,null,null,'0',null,null,'2017-03-13 20:54:45','2017-03-13 20:54:45','1'),
('16','frank','yuan','test03','03@qq.com','a123456789',null,null,null,null,'0',null,null,'2017-03-13 21:34:00','2017-03-13 21:34:00','1'),
('18','frank','yuan','test04','04@qq.com','$2y$08$aEhDM1YrQW4wYVplMVhPQOmVUWsF5YbZCDyEzHDqS2fncdmfBOQl2',null,null,null,null,'0',null,null,'2017-03-13 22:18:46','2017-03-13 22:18:46','1');
DROP TABLE IF EXISTS  `backend_users_groups`;
CREATE TABLE `backend_users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `user_group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`user_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS  `content_tags`;
CREATE TABLE `content_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(72) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(32) DEFAULT NULL,
  `numberPosts` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `numberPosts` (`numberPosts`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS  `content_types`;
CREATE TABLE `content_types` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(72) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS  `system_event_logs`;
CREATE TABLE `system_event_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `level` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `details` mediumtext COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `system_event_logs_level_index` (`level`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS  `system_settings`;
CREATE TABLE `system_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `value` varchar(1000) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_setting_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS  `user_contents_tags`;
CREATE TABLE `user_contents_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asks_id` int(11) NOT NULL,
  `tags_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS  `user_groups`;
CREATE TABLE `user_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `user_group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`user_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS  `user_remember_tokens`;
CREATE TABLE `user_remember_tokens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(10) unsigned NOT NULL,
  `token` char(32) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL,
  PRIMARY KEY (`id`,`users_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='后台用户登陆，使用记住我功能，保存到数据库里的tokens';

DROP TABLE IF EXISTS  `user_success_logins`;
CREATE TABLE `user_success_logins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(10) unsigned NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='后台成功登陆的日志';

DROP TABLE IF EXISTS  `user_users`;
CREATE TABLE `user_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_name` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '登陆名',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `is_activated` tinyint(1) unsigned DEFAULT NULL,
  `activated_at` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_vip` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login_unique` (`login_name`),
  UNIQUE KEY `email_unique` (`email`),
  KEY `act_code_index` (`activation_code`),
  KEY `reset_code_index` (`reset_password_code`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

insert into `user_users`(`id`,`first_name`,`last_name`,`login_name`,`email`,`password`,`activation_code`,`persist_code`,`reset_password_code`,`permissions`,`is_activated`,`activated_at`,`last_login`,`created_at`,`updated_at`,`is_vip`) values
('37','frank','yuan','test01','01@qq.com','$2y$08$QmJaNEVLeWxkZ1phQ1ZWVOYSXIjVR/6jDfPy3qaB2TLLsqhzFZICm',null,null,null,null,null,null,null,'2017-03-14 15:34:30','2017-03-14 15:34:30',null),
('45','frank','yuan','test02','02@qq.com','$2y$08$WHBicndpeCtVd2piYWh1TuV8p9bjMSPvyHEJSntB8zLqx3zCVuSjC',null,null,null,null,null,null,null,'2017-03-14 16:13:03','2017-03-14 16:13:03',null),
('46','frank','yuan','test03','03@qq.com','$2y$08$djJSdm5VZGhhWDFKamxmbuedxE1VaHwIy2V04HeZ0p5AaZA0lOgJC',null,null,null,null,'1',null,null,'2017-03-14 16:30:11','2017-03-14 16:33:13','1');
SET FOREIGN_KEY_CHECKS = 1;

