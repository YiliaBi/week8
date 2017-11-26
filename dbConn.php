<?php


class dbConn{

	 protected static $db;

	 private function __construct() {

try {
	$servername = "sql.njit.edu";
	$username = "yb83";
	$password = "qwer1234";
	self::$db = new PDO("mysql:host=$servername;dbname=yb83",$username, $password);
	self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//cho "Connected successfully\n\n";
	echo '</br>';
	}
catch(PDOException $e)
	{
	echo "Connection failed: " . $e->getMessage();
        echo '</br>';
	}

}

 public static function getConnection() {

 	if (!self::$db) {

 		new dbConn();
        
        }

return self::$db;

    }
}


?>