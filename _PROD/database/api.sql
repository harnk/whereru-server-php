USE pushchat;

SET NAMES utf8;

DROP TABLE IF EXISTS active_users;

CREATE TABLE `active_users` (
  `user_id` varchar(40) NOT NULL,
  `device_token` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `secret_code` varchar(255) NOT NULL,
  `location` varchar(30) NOT NULL,
  `loc_time` datetime NOT NULL,
  `ip_address` varchar(32) NOT NULL,
  `looking` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;