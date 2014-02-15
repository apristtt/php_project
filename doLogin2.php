 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Member</title>
 </head>
 <body>
 	<?php 
	 	session_start();
		$MemberSessionID = $_SESSION['MemberSessionID'];
		$MemberName = $_SESSION['MemberName'];
		if($MemberSessionID<>session_id() or $MemberName ==""){
			echo "You are not logged in!<br>";
			header("Refresh:5; url=home.php");
		} else {
 			include("conf.php");
 			$result = mysql_query("SELECT * FROM Member WHERE MemberName = '$_SESSION[MemberName]'");
 			while ($query = mysql_fetch_array($result)) {
	 			echo "Member ID : $query[MemberID] <br>".
	 			"Member Name : $query[MemberName] <br>".
	 			"Member Email : $query[MemberEmail] <br>".
	 			"Member Joined on : $query[MemberJoinDate] <br>";
 			}
 			echo "<a href='doLogout.php'>Logout</a>";
 		}
 	 ?>
 </body>
 </html>