<?php 
	include("conf.php");

	$NewsTitle = $_POST['NewsTitle'];
	$NewsContent = $_POST['NewsContent'];

	if ($NewsTitle == "") {
		echo "Please fill news title <br>";
		echo "<a href='javascript: history.go(-1)'>&larr; Back</a>";
	} elseif($NewsContent == "") {
		echo "Please fill news content <br>";
		echo "<a href='javascript: history.go(-1)'>&larr; Back</a>";
	} else {
		$sql = "INSERT INTO News (NewsTitle, NewsContent) VALUES ('$NewsTitle', '$NewsContent')";
		$query = mysql_query($sql) or die(mysql_error());
		echo '<script type="text/javascript">'.
		"alert('Content Created!'); document.location = 'home.php'</script>";
	}
 ?>