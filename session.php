<?
    if(!isset($_SESSION)){
        session_start();
    }
    $MemberSessionID = isset($_SESSION['MemberSessionID']);
    $MemberName = isset($_SESSION['MemberName']);
    ?>