<?
	require("conf.php");

    if(!isset($_SESSION)){
        session_start();
    }
    $MemberSessionID = isset($_SESSION['MemberSessionID']);
    $MemberName = isset($_SESSION['MemberName']);

    	$resultSession = mysql_query("SELECT * FROM Member WHERE MemberName = '$MemberName'");
    	$querySession = mysql_fetch_array($resultSession);
    	$_SESSION['MemberID'] = $querySession['MemberID'];

    	echo $_SESSION['MemberID'];
    ?>