<?php 
	session_start();
	require("conf.php");

	$NewsTitle = $_POST['NewsTitle'];
	$NewsContent = $_POST['NewsContent'];
	
	// $NewsPinned = $_POST['NewsPinned'];

	if(isset($_POST['NewsPinned']))
	{
		$NewsPinned = 1;
	} else {
		$NewsPinned = 0;
	}

	if ($NewsTitle == "") {
		echo "Please fill news title <br>";
		echo "<a href='javascript: history.go(-1)'>&larr; Back</a>";
	} elseif($NewsContent == "") {
		echo "Please fill news content <br>";
		echo "<a href='javascript: history.go(-1)'>&larr; Back</a>";
		// echo $_POST['NewsPinned'];
	} else {
		// $sql = ;
		$query = mysql_query("INSERT INTO News (NewsTitle, NewsContent, NewsPinned) VALUES ('$NewsTitle', '$NewsContent', '$NewsPinned')") or die(mysql_error());
		echo '<script type="text/javascript">'.
		"alert('Content Created!'); document.location = 'home.php'</script>";
	}
 ?>