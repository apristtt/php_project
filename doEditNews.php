<?php 
	include("conf.php");

	$NewsID = $_REQUEST['NewsID'];
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
		$query = mysql_query("UPDATE News SET NewsTitle = '$NewsTitle', NewsContent = '$NewsContent', NewsPinned = '$NewsPinned' WHERE NewsID = '$NewsID'") or die(mysql_error());
		echo '<script type="text/javascript">'.
		"alert('News Edited!'); document.location = 'home.php'</script>";
	}
 ?>