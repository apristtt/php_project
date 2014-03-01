<?php 
	function findMemberIDfromName($MemberName) {
			require("conf.php");
			$result = mysql_query("SELECT MemberID FROM Member WHERE MemberName = '$MemberName'");
			while ($query = mysql_fetch_array($result));
				echo $query['MemberID'];
		}
 ?>