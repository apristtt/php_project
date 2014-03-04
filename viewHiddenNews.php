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
<? require("conf.php"); ?>
<? include("displayNavbar.php"); ?>

    <div class="container">
        <div class="row">
            <div class="page-header">
                    <h3>Hidden News</h3>
            </div>
                <?
                    $result = mysql_query("SELECT News.NewsID, News.NewsTitle, News.NewsDate, News.MemberID, News.NewsContent, News.NewsPinned, News.NewsHidden, Member.MemberID, Member.MemberName FROM News INNER JOIN Member ON News.MemberID = Member.MemberID WHERE News.NewsHidden = 1 ORDER by News.NewsID DESC") or die(mysql_error());
                    $num = mysql_num_rows($result);
                    if ($num <= 0){
                        echo '<div class="panel panel-default panel-body"><h4 align="center">Oops! No hidden news.</h4></div>';
                    }
                    while ($query = mysql_fetch_array($result)){                    
                ?>
            <div class="panel panel-warning">
              <div class="panel-heading">
                    <? echo $query['NewsTitle'] ?> &ensp;
                      <!-- <? //include("displayNewsTools.php") ?> -->
                  <small class="pull-right">
                    <? echo $query['NewsDate'] ?> by <? echo $query['MemberName'] ?>
                  </small>
              </div>
              <div class="panel-body">
                    <? echo $query['NewsContent'] ?>
              </div>
              <div class="panel-footer">
<!--                     <a href="doUnhidden.php?NewsID=<? // echo $query['NewsID'] ?>">
                        <button type="button" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-eye-open"></span> Unhidden this post
                        </button>
                    </a> -->
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
            <? } ?>
        </div>
    </div>
</body>
</html>