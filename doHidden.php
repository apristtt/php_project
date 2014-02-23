<?php 
	require("conf.php");
	if(empty($_REQUEST['NewsID'])) {
			echo '<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css">';
            echo '<div class="container alert alert-danger">Incorrect access</div>';
	} else {
		if($_REQUEST['NewsID'] != "") {
			$NewsID = $_REQUEST['NewsID'];
			$result = mysql_query("SELECT * FROM News WHERE NewsID = '$NewsID'") or die(mysql_error());
			$query = mysql_fetch_array($result);
		}

		$doPinNews = mysql_query("UPDATE News SET NewsHidden = 1 WHERE NewsID = '$NewsID'") or die(mysql_error());
		echo '<script type="text/javascript">'.
		"alert('News Hided!!'); document.location = 'home.php'</script>";
	}
 ?>