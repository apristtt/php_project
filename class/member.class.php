<?php 
	/**
	* 
	*/
	class member {
		function memberIsAdmin() {
			 require("conf.php");
 			$result = mysql_query("SELECT * FROM Member WHERE MemberName = '$_SESSION[MemberName]'");
 			while ($query = mysql_fetch_array($result)) {
	 			if($query['MemberIsAdmin']==1){
	 					$_SESSION['MemberIsAdmin'] = '1';
	 					echo "You are admin";
	 			} elseif($query['MemberIsAdmin'] ==0) {
	 					$_SESSION['MemberIsAdmin'] = '0';
	 					echo "You are member";
	 			}
		}
	}
}
 ?>