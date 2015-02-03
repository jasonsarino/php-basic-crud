<?php

define("host", 		"localhost");
define("username", 	"root");
define("password", 	"");
define("dbname", 	"dbtutorial");


$db = mysql_connect(host,username,password);
mysql_select_db(dbname,$db) or die("ERROR: ".mysql_error());
?>