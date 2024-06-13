<?php 
require_once('config.php');
class Model {
	var $db;	
	function __construct(){		
		$db= new mysqli(DBHOST,DBUSER,DBPASS, DBNAME);
		$db->set_charset("utf8");
	}

	static function execQuery($query){
		$db= new mysqli(DBHOST,DBUSER,DBPASS, DBNAME);
		$db->set_charset("utf8");
		return $result=$db->query($query);
	}

}
 ?>