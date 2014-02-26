    <? 
    if(!isset($_SESSION)){
        session_start();
    }
    $MemberSessionID = isset($_SESSION['MemberSessionID']);
    $MemberName = isset($_SESSION['MemberName']);
    require("conf.php");
    ?>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <ul class="nav navbar-nav">
                <li>
                    <a><span class="label label-success">Logo</span></a>
                </li>
                <li><a href="home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li><a href="member.php">Member</a></li>
                <li><a href="#">Another test</a></li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" data-target="#" class="dropdown-toggle">Drop me!<b class="caret"></b></b></a>
                    <ul class="dropdown-menu">
                        <li><a>Menu</a></li>
                    </ul>
                    </li>
            </ul>
    <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="#" role="button" class="btn" data-toggle="modal" data-target="#searchModal">
                    <span class="glyphicon glyphicon-search"></span>
                </a>
            </li>
        <? if(isset($MemberSessionID)<>session_id() or empty($MemberName)){
             echo 
             '<li>
                <a href="#" role="button" class="dropdown-toggle" data-toggle="modal" data-target="#loginModal">
                    <span class="glyphicon glyphicon-user"></span>
                </a>
            </li>'?>

       <? } else { ?>
            <?  $result = mysql_query("SELECT * FROM Member WHERE MemberName = '$_SESSION[MemberName]'");
            $query = mysql_fetch_array($result);
            echo "<li class='dropdown'><a href='#' data-toggle='dropdown' data-target='#' class='dropdown-toggle'>Signed in as $query[MemberName] <b class='caret'></b></a>";
            echo '<ul class="dropdown-menu">';
            echo "<li><a href='doLogout.php'>Logout</a></li>";
            echo "</ul></li>"
            ?>
        <? } ?>
        
    </nav>

    <? require("displayModal.php"); ?>