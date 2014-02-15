<?php 
	include("conf.php");
	

        
	if (isset($MemberID)) {
			$MemberID = $_REQUEST['memberID'];
		} elseif (isset($MemberName)) {
			$MemberName = $_POST["MemberName"];
		} elseif (isset($MemberEmail)) {			
			$MemberEmail = $_POST['MemberEmail'];
		} elseif (isset($MemberPassword)) {
			$MemberPassword = $_POST['MemberPassword'];
	}

	if (empty($MemberName)===TRUE && empty($MemberEmail)===TRUE && empty($MemberPassword)===TRUE){
		echo "Please fill in the blank <br>";
		echo "<a href='javascript: history.go(-1)'>&larr; Back</a>";
	} elseif(!filter_var($MemberEmail, FILTER_VALIDATE_EMAIL)){
		echo "Email is not valid <br>";
		echo "<a href='javascript: history.go(-1)'>&larr; Back</a>";
	} elseif($_POST['submitEdit']){
		
		// } else {
			mysql_query("UPDATE Member SET MemberName = '$MemberName', MemberEmail = '$MemberEmail', MemberPassword = '$MemberPassword' WHERE MemberID = '$MemberID'") or die(mysql_error());
			echo '<script type="text/javascript">'.
			"alert('Edited!'); document.location = 'member.php'</script>";
		// }
	}
        
                echo $MemberName;
                
 ?>