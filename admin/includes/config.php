<?php
if (!defined("_dbhost"))
define ("_dbhost", "localhost");

if (!defined("_dbuser"))
define("_dbuser", "root");

if (!defined("_dbpass"))
define("_dbpass", "");

if (!defined("_dbname"))	
define("_dbname", "lg"); 

$db = new mysqli(_dbhost,_dbuser,_dbpass,_dbname);
?>