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
        // if (isset($MemberSessionID)){
        //     $MemberSessionID = $_SESSION['MemberSessionID'];
        // } elseif (isset($MemberName)) {
        //     $MemberName = $_SESSION['MemberName'];
        // } elseif (isset($MemberSessionID)) {
        
        //     if($MemberSessionID<>session_id() or $MemberName ==""){
        //         echo "Not Login";
        //     } else {
        //         echo "Login";
        //     }

        // }


    ?>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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
            <li>
                <a href="#" role="button" class="dropdown-toggle" data-toggle="modal" data-target="#loginModal">
                    <span class="glyphicon glyphicon-user"></span>
                </a>
            </li>
    </nav>
    
    <div class="container">

<?
    // if(! isset($_SESSION)){
    session_start(); 
    // }

    // $status = session_status();

    // if($status > 1){
    //     session_destroy();
    // }
    // if (isset($MemberSessionID)){
            $MemberSessionID = $_SESSION['MemberSessionID'];
    // }
    // } elseif (isset($MemberName)) {
    // if (isset($MemberName)){
            $MemberName = $_SESSION['MemberName'];
    // }
    // } else {
        if(isset($MemberSessionID)<>session_id() or empty($MemberName)){
            echo '<p class="alert alert-warning">You are not logged in!</p>';
            // if (isset($MemberSessionID)){
            // $MemberSessionID = $_SESSION['MemberSessionID'];
            // }
            // if (isset($MemberName)){
            // $MemberName = $_SESSION['MemberName'];
            // }
          //  echo $_SESSION['MemberName'];
           // header("Refresh:5; url=home.php");
        } else {
            require("conf.php");
            $result = mysql_query("SELECT * FROM Member WHERE MemberName = '$_SESSION[MemberName]'");
            //echo $_SESSION['MemberName'];
            while ($query = mysql_fetch_array($result)) {
                echo '<p class="alert alert-info">'.
                "Member ID : $query[MemberID] <br>".
                "Member Name : $query[MemberName] <br>".
                "Member Email : $query[MemberEmail] <br>".
                "Member Joined on : $query[MemberJoinDate]".
                "<a href='doLogout.php' class='pull-right'>Logout</a></p>"; ?>
             <!--    <p class="alert alert-info">
                    Member ID : <? // $query['MemberID'] ?>
                    <a href="doLogout.php" class="pull-right">Logout</a>
                </p> -->
        <?
            }
            //echo "<a href='doLogout.php'>Logout</a>";
        }

       // include ("doLogin2.php");
    // }
    ?>
 <!--        <?php 
        // session_start();
        // $MemberSessionID = $_SESSION['MemberSessionID'];
        // $MemberName = $_SESSION['MemberName'];
        // if($MemberSessionID<>session_id() or $MemberName ==""){
        //     echo "You are not logged in!<br>";
        //     //header("Refresh:5; url=home.php");
        // } else {
        //     require("conf.php");
        //     $result = mysql_query("SELECT * FROM Member WHERE MemberName = '$_SESSION[MemberName]'");
        //     while ($query = mysql_fetch_array($result)) {
        //         echo '<p class="alert alert-info>Member ID : $query[MemberID] <br>'.
        //         'Member Name : $query[MemberName] <br>'.
        //         'Member Email : $query[MemberEmail] <br>'.
        //         'Member Joined on : $query[MemberJoinDate] <br></p>';
        //     }
        //     echo "<a href='doLogout.php'>Logout</a>";
        // }
     ?> -->
    <? if(displaySiteReset == "1") { ?>
        <div class="alert alert-danger">
            <strong>Warning :</strong> You have turned on site reset mode, with this mode can reset your site. You can turn off this message by changing <kbd>$displaySiteReset</kbd> to <kbd>0</kbd> in file <kbd>init.php</kbd>
        </div>
    <? } ?>
        <div class="row">
<!--            <div class="col-xs-12 col-sm-9">-->
            <div class="col-lg-9">
                <? include("displayNewsPinned.php") ?>
                <? include("displayNews.php") ?>
            </div>
           
            <? include("displaySidebar.php") ?>
            
        </div>

    </div>
    
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="loginModalLabel">Login</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="doLogin.php" method="POST" role="form">
                        <div class="form-group">
                            <!-- <label for="email" class="col-md-8 control-label">Email Address</label>
                                <div class="col-md-15">
                                    <input type="email" class="form-control" placeholder="Email Address">
                                </div> -->
                            <label for="MemberName" class="col-md-8 control-label">Username</label>
                                <div class="col-md-15">
                                    <input type="text" class="form-control" name="MemberName" placeholder="Username">
                                </div>
                        </div>
                        <div class="form-group">
                          <label for="MemberPassword" class="col-md-8 control-label">Password</label>
                              <div class="col-md-15">
                                  <input type="password" class="form-control" name="MemberPassword" placeholder="Password">
                              </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-8 col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <ul class="list-inline">
                                            <li><input type="checkbox" style="width:0px;"></li>
                                            <li>Remember me?</li>
                                        </ul>
                                    </label>
                                </div>
                                <!-- <input type="submit" class="btn btn-primary" name="submit" value="Sign In"> -->
                                <button type="submit" class="btn btn-primary">Sign In</button>
                            </div>

                        </div>
                      
                    </form>
                                       
                </div>
                <div class="modal-footer">
                    <ul class="list-inline">
                        <li class="pull-left"><h6>Don't have an account? <a href="signup.php"><b>Sign Up!</b></a></h6></li>
                        <!-- <li class="pull-right"><button type="submit" class="btn btn-primary">Sign In</button></li> -->
                        <!-- <li class="pull-right"><input type="submit" class="btn" value="Sign In"></li> -->
                        <!-- <li class="pull-right"><button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button></li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
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
<? if(displaySiteReset == "1") {?>
    <nav class="navbar navbar-default navbar-fixed-bottom" style="opacity: 0.7;" role="navigation">
        <div class="container">
            <button class="btn btn-danger navbar-btn pull-right"><span class="glyphicon glyphicon-cog"></span> Reset</button>
        </div>
    </nav>
<? } ?>
</body>
</html>