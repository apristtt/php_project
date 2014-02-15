<?php 
	include("conf.php");
	$MemberName = $_POST['MemberName'];
	$MemberEmail = $_POST['MemberEmail'];
	$MemberPassword = $_POST['MemberPassword'];

	if ($MemberName == '' && $MemberEmail == '' && $MemberPassword == ''){
		echo "Please fill in the blank <br>";
		echo "<a href='javascript: history.go(-1)'>&larr; Back</a>";
	} elseif(!filter_var($MemberEmail, FILTER_VALIDATE_EMAIL)){
		echo "Email is not valid <br>";
		echo "<a href='javascript: history.go(-1)'>&larr; Back</a>";
	} else {
		$sql = "INSERT INTO Member (MemberName, MemberEmail, MemberPassword) VALUES ('$MemberName', '$MemberEmail', '$MemberPassword')";
		$query = mysql_query($sql) or die(mysql_error()) ;
			echo '<script type="text/javascript">'.
		"alert('Signup Complete!'); document.location = 'member.php'</script>";
	}
 ?>