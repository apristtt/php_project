<!DOCTYPE html>
<html>
<head>
    <title>News Site</title>
    <meta charset="utf-8">
    <link href="favicon.png" rel="icon">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css">
    <link href="css/custom.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.css" rel="stylesheet">
    <style type="text/css">
        .row-offcanvas { position: relative; -webkit-transition: all 0.25s ease-out; -moz-transition: all 0.25s ease-out; transition: all 0.25s ease-out;  }

       .row-offcanvas-right
       .sidebar-offcanvas { right: -50%; /* 6 columns */ }

       .row-offcanvas-left
       .sidebar-offcanvas { left: -50%; /* 6 columns */ }

       .row-offcanvas-right.active { right: 50%; /* 6 columns */ }

       .row-offcanvas-left.active { left: 50%; /* 6 columns */ }

       .sidebar-offcanvas { position: absolute; top: 0; width: 50%; /* 6 columns */ }
    
    </style>
    
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="js/source/dropdown.js"></script>
    <script type="text/javascript" src="js/source/modal.js"></script>
    <script type="text/javascript" src="js/source/tooltip.js"></script>
    </head>
<body>
    <?php
        
        require("conf.php"); 
        require("init.php");
        require("class/member.class.php");
        require("session.php");
        // session_start(); 
      
        //     $MemberSessionID = isset($_SESSION['MemberSessionID']);

        //     $MemberName = isset($_SESSION['MemberName']);


    ?>
    <? include("displayNavbar.php") ?>
<!--     <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <ul class="nav navbar-nav">
                <li>
                    <a><span class="label label-success">Logo</span></a>
                </li>
                <li class="active"><a href="home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
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
        <? //if(isset($MemberSessionID)<>session_id() or empty($MemberName)){
             //echo 
            // '<li>
              //  <a href="#" role="button" class="dropdown-toggle" data-toggle="modal" data-target="#loginModal">
                //    <span class="glyphicon glyphicon-user"></span>
               // </a>
            //</li>'?>

       <? //} else { ?>
            <?  //$result = mysql_query("SELECT * FROM Member WHERE MemberName = '$_SESSION[MemberName]'");
            //$query = mysql_fetch_array($result);
            //echo "<li class='dropdown'><a href='#' data-toggle='dropdown' data-target='#' class='dropdown-toggle'>Signed in as $query[MemberName] <b class='caret'></b></a>";
            //echo '<ul class="dropdown-menu">';
            //echo "<li><a href='doLogout.php'>Logout</a></li>";
            //echo "</ul></li>"
            ?>
        <? //} ?>
        
    </nav> -->
    
    <div class="container">

<?
            // $MemberSessionID = isset($_SESSION['MemberSessionID']);
            // $MemberName = isset($_SESSION['MemberName']);
            // echo 
            //     "<kbd>Session ID : $_SESSION[MemberSessionID]</kbd><br>  <kbd>Session MemberName : $_SESSION[MemberName]</kbd> <br> <kbd>Session IsAdmin : $_SESSION[MemberIsAdmin]</kbd>";

        if(isset($MemberSessionID)<>session_id() or empty($MemberName)){
            echo '<p class="alert alert-warning">You are not logged in!</p>';

        } else {
            require("conf.php");
            $result = mysql_query("SELECT * FROM Member WHERE MemberName = '$_SESSION[MemberName]'");
            //echo $_SESSION['MemberName'];
            while ($query = mysql_fetch_array($result)) {
                echo '<p class="alert alert-info">'.
                "Member ID : $query[MemberID] <br>".
                "Member Name : $query[MemberName] <br>".
                "Member Email : $query[MemberEmail] <br>".
                "Member Joined on : $query[MemberJoinDate] <br>".
                "Is Admin (0 is no, 1 is yes) : $_SESSION[MemberIsAdmin]".
                "<a href='doLogout.php' class='pull-right'>Logout</a></p>";
                // $checkRole = new member();
                // $checkRole->memberIsAdmin(); ?>
            
        <?
            }
        }

    ?>
<!--     <? //if (isset($_SESSION['MemberIsAdmin'])=='1') { ?>
        <div class="alert alert-success">You are admin</div>
    <? // } ?> -->


    <? if(displaySiteReset == "1") { ?>
        <div class="alert alert-danger">
            <strong>Warning :</strong> You have turned on site reset mode, with this mode can reset your site. You can turn off this message by changing <kbd>$displaySiteReset</kbd> to <kbd>0</kbd> in file <kbd>init.php</kbd>
        </div>
    <? } ?>
        <div class="row">

            <div class="col-lg-9">
                <? 
                    if(empty($_GET['page'])) {
                        include("displayNewsPinned.php");
                    }
                ?>
                <? include("displayNews.php") ?>
            </div>
           
            <? include("displaySidebar.php") ?>
            
        </div>

    </div>
    

    
<!-- <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="signupModalLabel">Sign Up</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="email" class="col-md-8 control-label">Email Address</label>
                            <div class="col-md-15">
                                <input type="email" class="form-control" placeholder="Email Address">
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-8 control-label">Password</label>
                            <div class="col-md-15">
                                <input type="password" class="form-control" placeholder="Password">
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="confirmpassword" class="col-md-8 control-label">Confirm password</label>
                            <div class="col-md-15">
                                <input type="password" class="form-control" placeholder="Confirm password">
                            </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Sign Up</button>
            </div>
        </div>
    </div>
</div>
 -->

<? if(displaySiteReset == "1") {?>
    <nav class="navbar navbar-default navbar-fixed-bottom" style="opacity: 0.7;" role="navigation">
        <div class="container">
            <button class="btn btn-danger navbar-btn pull-right"><span class="glyphicon glyphicon-cog"></span> Reset</button>
        </div>
    </nav>
<? }  ?>
</body>
</html>