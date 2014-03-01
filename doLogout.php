<?php 
	session_start();
	unset($_SESSION['MemberSessionID']);
	unset($_SESSION['MemberName']);
	unset($_SESSION['MemberID']);
	session_destroy();
	header("Location: home.php")
 ?>