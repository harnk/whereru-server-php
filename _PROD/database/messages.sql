CREATE TABLE `messages` (
  `message_id` int NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `message` varchar(2048) NOT NULL,
  `location` varchar(30) NOT NULL,
  `secret_code` varchar(255) NOT NULL,
  `time_posted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `auto_messages` (
  `message_id` int NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `message` varchar(2048) NOT NULL,
  `location` varchar(24) NOT NULL,
  `secret_code` varchar(255) NOT NULL,
  `time_posted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

