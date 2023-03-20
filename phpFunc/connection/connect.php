<?php 

	$dbhost = 'localhost:3306';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'crmv3'; 

	$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    // Checking the connection
	if ($connection->connect_error) {
		die('Database connection failed ' . $connection->connect_error);
	}else{
        // echo "Database connection success"   ;
	}

?>