<?php 
	require("conf.php");

		echo '<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css">';

	if (empty($_POST['MemberName']) && empty($_POST['MemberEmail']) && empty($_POST['MemberPassword'])){
		echo '<div class="container alert alert-danger">Please fill in the blank';
		echo '<a href="javascript: history.go(-1)" class="pull-right">&larr; Back</a></div>';
	} elseif(!filter_var($_POST['MemberEmail'], FILTER_VALIDATE_EMAIL)){
		echo '<div class="container alert alert-danger">Email is not valid';
		echo '<a href="javascript: history.go(-1)" class="pull-right">&larr; Back</a></div>';
	} else {
		$MemberName = $_POST['MemberName'];
		$MemberEmail = $_POST['MemberEmail'];
		$MemberPassword = $_POST['MemberPassword'];
		$query = mysql_query("INSERT INTO Member (MemberName, MemberEmail, MemberPassword) VALUES ('$MemberName', '$MemberEmail', '$MemberPassword')") or die(mysql_error()) ;
			echo '<script type="text/javascript">'.
		"alert('Signup Complete!'); document.location = 'member.php'</script>";
	}
 ?>