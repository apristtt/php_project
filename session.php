<?
	require("conf.php");

    if(!isset($_SESSION)){
        session_start();
    }
    $MemberSessionID = isset($_SESSION['MemberSessionID']);
    $MemberName = isset($_SESSION['MemberName']);

    	$resultSession = mysql_query("SELECT * FROM Member WHERE MemberName = '$MemberName'");
    	$querySession = mysql_fetch_array($resultSession);

        // push member id from sql to session
    	$querySession['MemberID'] = $_SESSION['MemberID'];

     //    echo "$_SESSION[MemberID]<br>";
    	// echo "$_SESSION[MemberName]<br>";
     //    echo $_SESSION['MemberIsAdmin'];
        
    ?>