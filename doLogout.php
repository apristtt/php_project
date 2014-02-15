<?php 
	session_start();
	unset($_SESSION['MemberSessionID']);
	unset($_SESSION['MemberName']);
	session_destroy();
	header("Location: home.php")
 ?>