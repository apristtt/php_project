<?php

$host = "127.0.0.1";
$user = "root";
$pass = "";
$database = "News_site";

$connect = mysql_connect($host, $user, $pass);
if (! $connect) {
	die(mysql_error());
} else {
	//echo "Success!";
	mysql_select_db($database);
}