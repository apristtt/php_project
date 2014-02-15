<?php 
	include("conf.php");

	if($_REQUEST['memberID'] != "") {
		$memberID = $_REQUEST['memberID'];
		$result = mysql_query("SELECT * FROM Member WHERE MemberID = '$memberID'") or die(mysql_error());
		$query = mysql_fetch_array($result);
	}
 	
 	$doDelete = mysql_query("DELETE FROM Member WHERE MemberID = '$memberID'") or die(mysql_error());
 	echo '<script type="text/javascript">'.
 	"alert('Deleted!'); document.location = 'member.php'</script>"
?>
		<!--<script type="text/javascript">
		// if(confirm('Delete this member?')){
			
			
		// } else {
		// 	alert('Cancelled');
		// 	document.location = 'member.php';}
		</script>-->