<?php 
	//require("displayNavbar.php");
	//require("function/newsFunction.inc.php");
	require("session.php");
	$NewsID = $_REQUEST['NewsID'];
	$CommentContent = $_POST['CommentContent'];
	$_SESSION['MemberID'];


	if (empty($CommentContent)) {
		echo "Please type your comments <br>";
		echo "<a href='javascript: history.go(-1)'>&larr; Back</a>";
	} else {
		$query = mysql_query("INSERT INTO Comments (CommentContent, MemberID, NewsID) VALUES ('$CommentContent', '$_SESSION[MemberID]', '$NewsID')") or die(mysql_error());
		echo '<script type="text/javascript">'.
		"alert('Comments Added!'); document.location = 'home.php'</script>";
	}
 ?>