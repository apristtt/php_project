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
<? include("displayNavbar.php"); ?>
    <?php 
        require("conf.php");
        require("session.php");
        //$memberID = "";
        if(empty($_REQUEST['NewsID'])) {
            echo '<div class="container alert alert-danger">Incorrect access</div>';
        } elseif($_REQUEST['NewsID'] != "") {
            $NewsID = $_REQUEST['NewsID'];
            $result = mysql_query("SELECT * FROM News WHERE NewsID = $NewsID") or die(mysql_error());
            $query = mysql_fetch_array($result);
            if(!isset($_SESSION)){
                session_start();
            }
            
            $resultMemberSession = mysql_query("SELECT * FROM Member WHERE MemberID = '$_SESSION[MemberID]'") or die(mysql_error());
            $queryMemberSession = mysql_fetch_array($resultMemberSession);

            $resultMemberSQL = mysql_query("SELECT * FROM Member");
            $queryMemberSQL = mysql_fetch_array($resultMemberSQL);
            ?>
    
    
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
                    <? if(isset($_SESSION['MemberIsAdmin'])=='1') { ?>
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
                    <? } ?>
                </div>

                <!-- 
                        START Comments Area
                 -->                
                <div class="page-header">
                    <h3>Comments</h3>
                </div>
                <div class="media">
                <?
                    if (!empty($queryMemberSession['MemberFbPhoto'])){
                ?>
                    <a class="pull-left">
                        <img src="http://graph.facebook.com/<? echo $queryMemberSession['MemberFbPhoto'] ?>/picture?type=normal" class="media-object img-circle">
                    </a>
                <? } ?>
                    <div class="media-body">
                        <form action="doAddComments.php?NewsID=<? echo $query['NewsID'] ?>" method="POST">
                            <textarea class="form-control" rows="5" width="100%" name="CommentContent"></textarea>
                            <input type="submit" class="btn btn-primary pull-right" style="margin-top: 5px; margin-bottom: 5px; width: 80px;" value="Submit">
                        <!-- <button type="button" class="btn btn-primary pull-right" style="margin-top: 5px; margin-bottom: 5px;">Submit</button> -->
                        </form>
                    </div>
                </div>
                <!-- Comment the mockup -->

               <!--  <div class="panel panel-default">
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
                </div> -->
                
                <? //$result = mysql_query("SELECT * FROM Comments WHERE NewsID = '$NewsID'");
                $result = mysql_query("SELECT Member.MemberID, Member.MemberName, Member.MemberFbPhoto, Comments.CommentID, Comments.CommentContent, Comments.CommentDate FROM Member INNER JOIN Comments ON Member.MemberID = Comments.MemberID WHERE Comments.NewsID = '$NewsID' ORDER by Comments.CommentDate DESC");
                $num = mysql_num_rows($result);
                if($num <= 0){
                    echo '<div class="panel panel-default panel-body"><i align="center">No comments</i></div>';
                }
                while ($query = mysql_fetch_array($result)){?>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p class="lead">
                            <? echo $query['CommentContent'] ?>
                        </p>
                    </div>
                    <div class="panel-footer panel-success">
                        <ul class="list-inline">
                            <? if (!empty($query['MemberFbPhoto'])){ ?>
                            <li class="pull-left">
                                <img src="http://graph.facebook.com/<? echo $query['MemberFbPhoto']?>/picture?width=25&height=25" class="media-object"> 
                            </li>
                            <? } ?>
                            <li>By <b><? echo $query['MemberName'] ?></b></li>
                            <li class="pull-right"><small>Posted on <? echo $query['CommentDate'] ?></small></li>
                        </ul>

                    </div>
                </div>
                <? } ?>
            </div>
           
              <? include("displaySidebar.php") ?>
            
        </div>
        
    </div>
         <?   }        ?>
    </body>
    </html>
