<?php 
	require("conf.php");
	if(empty($_REQUEST['memberID'])) {
			echo '<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css">';
            echo '<div class="container alert alert-danger">Incorrect access</div>';
	} else {
		$memberID = $_REQUEST['memberID'];
		$memberFbPhoto = $_POST['MemberFbPhoto'];
		$updateProfilePicture = mysql_query("UPDATE Member SET MemberFbPhoto = '' WHERE MemberID = '$memberID'") or die(mysql_error());
		echo '<script type="text/javascript">'.
		"alert('Profile Picture Removed!!'); document.location = 'home.php'</script>";
	}
 ?>