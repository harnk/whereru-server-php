USE pushchat;

SET NAMES utf8;

DROP TABLE IF EXISTS `push_queue`;

CREATE TABLE `push_queue` (
  `message_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `device_token` varchar(255) NOT NULL,
  `payload` varchar(256) NOT NULL,
  `time_queued` datetime NOT NULL,
  `time_sent` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;