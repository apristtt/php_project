<?php 
	require("conf.php");
	

        
	// if (isset($MemberID)) {
	// 		$MemberID = $_REQUEST['memberID'];
	// 	} elseif (isset($MemberName)) {
	// 		$MemberName = $_POST['MemberName'];
	// 	} elseif (isset($MemberEmail)) {			
	// 		$MemberEmail = $_POST['MemberEmail'];
	// 	} elseif (isset($MemberPassword)) {
	// 		$MemberPassword = $_POST['MemberPassword'];
	// }

	// if (empty($MemberName)===TRUE && empty($MemberEmail)===TRUE && empty($MemberPassword)===TRUE){
	// 	echo "Please fill in the blank <br>";
	// 	echo "<a href='javascript: history.go(-1)'>&larr; Back</a>";
	// } elseif(!filter_var($MemberEmail, FILTER_VALIDATE_EMAIL)){
	// 	echo "Email is not valid <br>";
	// 	echo "<a href='javascript: history.go(-1)'>&larr; Back</a>";
	// } elseif($_POST['submitEdit']){
		
		// } else {
	if (empty($_POST['submitEdit'])) {
			echo '<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css">';
            echo '<div class="container alert alert-danger">Incorrect access</div>';
		} elseif($_POST['submitEdit']){
			$memberID = $_REQUEST['memberID'];
			$MemberName = $_POST['MemberName'];
			$MemberEmail = $_POST['MemberEmail'];
			$MemberPassword = $_POST['MemberPassword'];
			mysql_query("UPDATE Member SET MemberName = '$MemberName', MemberEmail = '$MemberEmail', MemberPassword = '$MemberPassword' WHERE MemberID = '$memberID'") or die(mysql_error());
			echo '<script type="text/javascript">'.
			"alert('Edited!'); document.location = 'member.php'</script>";
		} 
		// }
	// }
        		echo $_REQUEST['memberID'];
                echo $MemberName = $_POST['MemberName'];
                
 ?>