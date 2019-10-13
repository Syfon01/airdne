<?php
session_start();

// Define database
define('dbhost', 'localhost');
/*define('dbuser', 'id11033850_root');
define('dbpass', '1111111111');
define('dbname', 'id11033850_localhost');*/
define('dbuser', 'root');
define('dbpass', '6yt5^YT%');
define('dbname', 'classroom');

// Connecting database
try {
	$connect = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo $e->getMessage();
}

?>
