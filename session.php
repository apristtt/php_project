<?
	require("conf.php");

    if(!isset($_SESSION)){
        session_start();
    }
    $MemberSessionID = isset($_SESSION['MemberSessionID']);
    $MemberName = isset($_SESSION['MemberName']);

    	$result = mysql_query("SELECT * FROM Member WHERE MemberName = '$MemberName'");
    	$query = mysql_fetch_array($result);
    	$_SESSION['MemberID'] = $query['MemberID'];

    	echo $_SESSION['MemberID'];
    ?>