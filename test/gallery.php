<?php 
	$host = "127.0.0.1";
	$user = "root";
	$pass = "";
	$database = "test";

	$connect = mysql_connect($host, $user, $pass);
	if (! $connect) {
		die(mysql_error());
	} else {
		mysql_select_db($database);
	}

	$result = mysql_query("SELECT * FROM gallery");
	while($query = mysql_fetch_array($result)){
		echo "<b>ID : $query[imgID]</b><br>Title : $query[imgTitle]<br><img src=$query[imgURL]><br>";
	}
 ?>