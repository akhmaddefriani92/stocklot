<?php 

	// this will avoid mysql_connect() deprecation error.
	
	// but I strongly suggest you to use PDO or MySQLi.
		 
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', 'mcojaya');
	define('DBNAME', 'dbcommerce');
		 
	$conn = mysql_connect(DBHOST,DBUSER,DBPASS) or die (mysql_error());
	$dbcon = mysql_select_db(DBNAME, $conn);
		 
	if ( !$conn ) {
		die("Connection failed : " . mysql_error());
	}
		 
	if ( !$dbcon ) {
		die("Database Connection failed : " . mysql_error());
	}

?>
