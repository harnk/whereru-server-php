<?php
echo 'Sending Notification Attempt - ';
// Put your device token here (without spaces):
//$deviceToken = '4b99f1b96ea938313defe4de5fdfca9eadd748fda6d3519bc6da448be05d8027';
//Jacks iOS6.1 phone 15db4d03 fc504882 07167223 c8c6946c d4f859d6 62fc244d 8800d149 af07057d
//Scotts iOS8 4s 231ea452b2a23666f715f53b26b49e8a37cdacfcfa7121ef2835b3d45ee5244b
//6Plus 1eb7528134451a0adaa8de2c65f6321a271907ad0d19183b1a569aa2506193cd
//Eds old phone 5005df6ff5597fb3abd6ee717439f786235285e63f6c078a4ccb99d67567651b
$deviceToken = '231ea452b2a23666f715f53b26b49e8a37cdacfcfa7121ef2835b3d45ee5244b';
// Put your private key's passphrase here:
$passphrase = 'whereru';

// Put your alert message here:
$message = 'Found Ed at Latitude : 41.740772 Longitude: -86.098747 push notification!';

echo ' - deviceToken: '.$deviceToken.' - ';
echo ' - message: '.$message.' - ';
////////////////////////////////////////////////////////////////////////////////

$ctx = stream_context_create();
stream_context_set_option($ctx, 'ssl', 'local_cert', 'ck.pem');
stream_context_set_option($ctx, 'ssl', 'cafile', 'entrust_2048_ca.cer');
stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

// Open a connection to the APNS server
$fp = stream_socket_client(
	'ssl://gateway.sandbox.push.apple.com:2195', $err,
	$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

if (!$fp)
	exit("Failed to connect: $err $errstr" . PHP_EOL);

echo 'Connected to APNS' . PHP_EOL;

// Create the payload body
$body['aps'] = array(
	'alert' => $message,
	'lat' => '41.740772',
	'lon' => '-86.098747',
	'badge' => 'increment',
	'sound' => 'default'
	);

// Encode the payload as JSON
$payload = json_encode($body);

echo ' - payload: '.$payload.' </br>';

// Build the binary notification
$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

// Send it to the server
$result = fwrite($fp, $msg, strlen($msg));

if (!$result)
	echo 'Message not delivered' . PHP_EOL;
else
	echo 'Message successfully delivered' . PHP_EOL;

// Close the connection to the server
fclose($fp);
