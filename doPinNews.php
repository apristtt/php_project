<?php 
	include("conf.php");

	if($_REQUEST['NewsID'] != "") {
		$NewsID = $_REQUEST['NewsID'];
		$result = mysql_query("SELECT * FROM News WHERE NewsID = '$NewsID'") or die(mysql_error());
		$query = mysql_fetch_array($result);
	}

	$doPinNews = mysql_query("UPDATE News SET NewsPinned = 1 WHERE NewsID = '$NewsID'") or die(mysql_error());
	echo '<script type="text/javascript">'.
	"alert('News Pinned!!'); document.location = 'home.php'</script>";
 ?>