USE pushchat;

SET NAMES utf8;

DROP TABLE IF EXISTS blocked_users;

CREATE TABLE `blocked_users` (
  `blocker_user_id` varchar(40) NOT NULL,
  `blocked_user_id` varchar(40) NOT NULL,
  `blocked_nickname` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`blocker_user_id`, `blocked_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
