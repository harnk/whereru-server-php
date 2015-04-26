<?php
$link = mysql_connect('localhost', 'altcoinf_pushw', 'd]682\#%yI1nb3');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
mysql_close($link);
?>