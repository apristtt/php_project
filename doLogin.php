<?php 
	require("conf.php");
	echo '<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css">';
	session_start();
	$MemberName = $_POST['MemberName'];
	$MemberPassword = $_POST['MemberPassword'];
	// $MemberID = null;

	if ($MemberName == "" && $MemberPassword == "") {
		echo "<div class='container alert alert-danger'>Please type your username and password</div>";
	} elseif ($MemberName == "") {
		echo "<div class='container alert alert-danger'>Please type your username</div>";
	} elseif ($MemberPassword == "") {
		echo "<div class='container alert alert-danger'>Please type your password</div>";
	} else {
		$result = mysql_query("SELECT * FROM Member WHERE MemberName = '$MemberName' AND MemberPassword = '$MemberPassword'") or die(mysql_error());
		$num = mysql_num_rows($result);

		if($num <= 0){
			echo "<div class='container alert alert-danger'>Invalid credential</div>";
		} else {			
			$_SESSION['MemberSessionID'] = session_id();
			$_SESSION['MemberName'] = $MemberName;
			while ($queryLogin = mysql_fetch_array($result)) {
					if($queryLogin['MemberIsAdmin']=='1'){
						$_SESSION['MemberIsAdmin'] = '1';
					} elseif ($queryLogin['MemberIsAdmin']=='0'){
						$_SESSION['MemberIsAdmin'] = '0';
					}
					$_SESSION['MemberID'] = $queryLogin['MemberID'];
					//$_SESSION['MemberID'] = $MemberID;
			}
			// $_SESSION['MemberID'] = $queryLogin['MemberID'];
			header("Location:home.php");

		}
	}
 ?>