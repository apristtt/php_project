<?php 
	require("conf.php");

	if(empty($_REQUEST['memberID'])) {
			echo '<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css">';
            echo '<div class="container alert alert-danger">Incorrect access</div>';
	} else {
		if($_REQUEST['memberID'] != "") {
			$memberID = $_REQUEST['memberID'];
			$result = mysql_query("SELECT * FROM Member WHERE MemberID = '$memberID'") or die(mysql_error());
			$query = mysql_fetch_array($result);
		}
	 	
	 	$doDelete = mysql_query("DELETE FROM Member WHERE MemberID = '$memberID'") or die(mysql_error());
	 	echo '<script type="text/javascript">'.
	 	"alert('Deleted!'); document.location = 'member.php'</script>";
	}

?>
		<!--<script type="text/javascript">
		// if(confirm('Delete this member?')){
			
			
		// } else {
		// 	alert('Cancelled');
		// 	document.location = 'member.php';}
		</script>-->