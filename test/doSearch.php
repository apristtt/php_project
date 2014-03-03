<!doctype html>
<html lang="en">
<head>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-theme.css" rel="stylesheet" type="text/css">
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<div class="container">
	<div class="row">
	<?php 
	require("../conf.php");
	//require("../displayNavbar.php");
	$search = $_POST['search'];
	$result = mysql_query("SELECT * FROM News WHERE NewsTitle LIKE '%$search%' OR NewsContent LIKE '%$search%' AND NewsHidden = '0'") or die(mysql_error());
	$num = mysql_num_rows($result);
	if($num <=0){
		echo "No result";
	} else {
		while ($query = mysql_fetch_array($result)) {
			echo '<div class="panel panel-info" style="box-shadow: 2px 2px 4px #888888;">
			<div class="panel-body">
					<div class="media">
						<div class="media-body">
							<h4 class="media-heading">';
			echo "$query[NewsTitle]<br>";
			echo '</div></div></div></div>';
		}
	}
 ?>
 	</div>
 </div>
</body>
</html>
