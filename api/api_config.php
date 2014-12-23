<?php

// Configuration file for api.php
// local testing at  http://pushchat.local:44447/test/database.php
// bluehost testing at http://www.altcoinfolio.com/whereru/api/test/database.php
$config = array(
	// These are the settings for development mode
	'development' => array(
		'db' => array(
			'host'     => 'localhost',
			'dbname'   => 'pushchat',
			'username' => 'pushchat',
			'password' => 'd]682\#%yI1nb3',
			),
		),

	// These are the settings for production mode
	'production' => array(
		'db' => array(
			'host'     => 'localhost',
			'dbname'   => 'altcoinf_pushwhereru',
			'username' => 'altcoinf_pushwru',
			'password' => 'd]682\#%yI1nb3',
			),
		),
	);
