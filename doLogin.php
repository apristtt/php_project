<?php 
	include("conf.php");
	session_start();
	$MemberName = $_POST['MemberName'];
	$MemberPassword = $_POST['MemberPassword'];

	if ($MemberName == "" && $MemberPassword == "") {
		echo "Please type your username and password";
	} elseif ($MemberName == "") {
		echo "Please type your username";
	} elseif ($MemberPassword == "") {
		echo "Please type your password";
	} else {
		$result = mysql_query("SELECT * FROM Member WHERE MemberName = '$MemberName' AND MemberPassword = '$MemberPassword'") or die(mysql_error());
		$num = mysql_num_rows($result);

		if($num <= 0){
			// echo "$MemberName<br>";
			// echo "<u>$MemberPassword</u><br>";
			echo "Invalid credential";
		} else {			
			$_SESSION['MemberSessionID'] = session_id();
			$_SESSION['MemberName'] = $MemberName;
			header("Location:doLogin2.php");
			while ($query = mysql_fetch_array($result)) {
				echo "Welcome <b>$query[MemberName]</b> your no is <u>$query[MemberID]</u>";
			}

		}
	}
 ?>