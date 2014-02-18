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
        //$memberID = "";
        if($_REQUEST['NewsID'] != "") {
            $NewsID = $_REQUEST['NewsID'];
            $result = mysql_query("SELECT * FROM News WHERE NewsID = $NewsID") or die(mysql_error());
            $query = mysql_fetch_array($result);
            //echo $NewsID;
        }
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
        <div class="row">
<!--            <div class="col-xs-12 col-sm-9">-->
            <div class="col-lg-9">
                <?
                    // echo $query['NewsPinned'];
                    if ($query['NewsPinned']=='1') {
                        echo '<div class="panel panel-success">';
                    } else {
                        echo '<div class="panel panel-info">';
                    }
                ?>
                    <div class="panel-heading"><? echo $query['NewsTitle'] ?> <small class="pull-right">Posted <? echo $query['NewsDate'] ?></small></div>
                    <div class="panel-body"><? echo $query['NewsContent'] ?></div>
                    <div class="panel-footer">
                    <? if($query['NewsPinned'] == "1") { ?>
                        <a href="doUnpinNews.php?NewsID=<? echo $query['NewsID'] ?>">
                            <button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pushpin"></span> Unpin this news</button>
                        </a>
                    <? } else { ?>
                        <a href="doPinNews.php?NewsID=<? echo $query['NewsID'] ?>">
                            <button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pushpin"></span> Pin this news</button>
                        </a>
                    <? } ?>
                    <? if($query['NewsHidden'] == "1") { ?>
                        <a href="doUnhidden.php?NewsID=<? echo $query['NewsID'] ?>">
                            <button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span> Unhidden this news</button>
                        </a>
                    <? } else { ?>
                        <a href="doHidden.php?NewsID=<? echo $query['NewsID'] ?>">
                            <button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-close"></span> Hide this news</button>
                        </a>   
                    <? } ?>
                    <a href="editNews.php?NewsID=<? echo $query['NewsID'] ?>">
                        <button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span> Edit this news</button>
                    </a>
                    <a href="doDeleteNews.php?NewsID=<? echo $query['NewsID'] ?>">
                        <button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash"></span> Delete this news</button>
                    </a>
                    </div>
                </div>
                <div class="page-header">
                    <h3>Comments</h3>
                </div>
                <div class="media">
                    <a class="pull-left">
                        <img src="http://graph.facebook.com/zuck/picture?type=normal" class="media-object img-circle">
                    </a>
                    <div class="media-body">
                        <textarea class="form-control" rows="5" width="100%"></textarea>
                        <button type="button" class="btn btn-primary pull-right" style="margin-top: 5px; margin-bottom: 5px;">Submit</button>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p class="lead">
                            Great!
                        </p>
                    </div>
                    <div class="panel-footer panel-success">
                        <ul class="list-inline">
                            <li class="pull-left"><img src="http://graph.facebook.com/chutchartpower/picture?width=25&height=25" class="media-object"> 
                        </li>
                            <li>By <b>Chutchart Power</b></li>
                            <li class="pull-right"><small>Posted on tomorrow</small></li>
                        </ul>

                    </div>
                </div>
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
                            <div class="col-md-offset-8 col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <ul class="list-inline">
                                            <li><input type="checkbox" style="width:0px;"></li>
                                            <li>Remember me?</li>
                                        </ul>
                                    </label>
                                </div>
                            </div>
                        </div>
                      
                    </form>
                                       
                </div>
                <div class="modal-footer">
                    <ul class="list-inline">
                        <li class="pull-left"><h6>Don't have an account? <a href="signup.php"><b>Sign Up!</b></a></h6></li>
                        <li class="pull-right"><button type="button" class="btn btn-primary">Sign In</button></li>
                        <li class="pull-right"><button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button></li>
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
    
    </body>