<?php 
	require("displayNavbar.php");
	require("conf.php");
	require("function/newsFunction.inc.php");
	$NewsID = $_REQUEST['NewsID'];
	$CommentContent = $_POST['CommentContent'];
	$MemberName = $_SESSION['MemberName'];

	echo "$NewsID<br> $CommentContent<br>";

	findMemberIDfromName('admin');

	/*if (empty($CommentContent)) {
		echo "Please type your comments <br>";
		echo "<a href='javascript: history.go(-1)'>&larr; Back</a>";
	} else {
		// $sql = ;
		$query = mysql_query("INSERT INTO Comments (NewsTitle, NewsContent, NewsPinned) VALUES ('$NewsTitle', '$NewsContent', '$NewsPinned')") or die(mysql_error());
		echo '<script type="text/javascript">'.
		"alert('Content Created!'); document.location = 'home.php'</script>";
	}*/
 ?>