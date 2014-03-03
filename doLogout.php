<?php 
	session_start();
	unset($_SESSION['MemberSessionID']);
	unset($_SESSION['MemberName']);
	unset($_SESSION['MemberID']);
	unset($_SESSION['MemberIsAdmin']);
	session_destroy();
	header("Location: home.php")
 ?>