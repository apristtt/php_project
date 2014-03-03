 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Member</title>
 </head>
 <body>
 	<?php 
 	class member
 	{
 		function displayMemberInfo()
 		{
 			echo "Member ID (SQL) : $query[MemberID] <br>".
 				"Member ID (SESSION) : $_SESSION[MemberID] <br>".
	 			"Member Name (SQL) : $query[MemberName] <br>".
	 			"Member Email (SQL) : $query[MemberEmail] <br>".
	 			"Member Joined on (SQL) : $query[MemberJoinDate] <br>";
 		}
 	}
 		// if (isset($_SESSION)) {
 			session_start();
 			$displayInfo = new member();

 		// }

 		$MemberSessionID = isset($_SESSION['MemberSessionID']);
		$MemberName = isset($_SESSION['MemberName']);
		$MemberID = isset($_SESSION['MemberID']);
		// $MemberIsAdmin = $_SESSION['MemberIsAdmin'];

		if($MemberSessionID<>session_id() or $MemberName ==""){
			echo "You are not logged in!<br>";
			//header("Refresh:5; url=home.php");
		} else {
 			require("conf.php");
 			$result = mysql_query("SELECT * FROM Member WHERE MemberName = '$_SESSION[MemberName]'");
 			while ($query = mysql_fetch_array($result)) {
 				//echo "$_SESSION[MemberID]<br>";
 				//$query['MemberID'] = $_SESSION['MemberID'];
 				// echo "$query[MemberID] <br>";
 				echo $_SESSION['MemberID'];
 				//$query['MemberID'] = $MemberID;
	 			if($query['MemberIsAdmin']==1){
	 					echo "You are admin<br>";
	 					$_SESSION['MemberIsAdmin'] = '1';
	 					// $displayInfo->displayMemberInfo();
	 					echo "Member ID (SQL) : $query[MemberID] <br>".
	 			"Member ID (SESSION) : $_SESSION[MemberID] <br>".
	 			"Member Name (SQL): $query[MemberName] <br>".
	 			"Member Email : $query[MemberEmail] <br>".
	 			"Member Joined on : $query[MemberJoinDate] <br>";

	 			} elseif($query['MemberIsAdmin'] ==0) {
	 					echo "You are member<br>";
	 					$_SESSION['MemberIsAdmin'] = '0';
	 					// $this->displayMemberInfo();
	 					echo "Member ID (SQL) : $query[MemberID] <br>".
	 			"Member ID (SESSION) : $_SESSION[MemberID] <br>".
	 			"Member Name : $query[MemberName] <br>".
	 			"Member Email : $query[MemberEmail] <br>".
	 			"Member Joined on : $query[MemberJoinDate] <br>";
	 			}
 			// if ($_SESSION['MemberIsAdmin']=="1"){
 				
 			// } else {
 			// 	echo "You are member";
 			// }
 			echo "<a href='doLogout.php'>Logout</a>";
 		}
 	}
 	 ?>
 </body>
 </html>