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
<? require("session.php"); ?>
    <div class="container">
        <div class="row">
           
            <div class="panel panel-warning">
                <div class="panel-heading">All News</div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>News ID</th>
                            <th>News Title</th>
                            <th>News Author</th>
                            <th>News Date</th>
                            <? if(isset($_SESSION['MemberIsAdmin'])=='1'){ ?>
                            <th><span class="glyphicon glyphicon-cog"></span></th>
                            <? } ?>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            require("conf.php");
                            $result = mysql_query("SELECT News.NewsID, News.NewsTitle, News.NewsDate, News.MemberID, News.NewsPinned, Member.MemberID, Member.MemberName, Member.MemberIsAdmin FROM News INNER JOIN Member ON News.MemberID = Member.MemberID WHERE NewsHidden = '0'") or die(mysql_error());

                            while($query = mysql_fetch_array($result)){

                                echo "<tr><td>$query[NewsID]</td>".
                                "<td><a href='readNews.php?NewsID=$query[NewsID]'>$query[NewsTitle]</a>";
                                if($query['NewsPinned']=='1'){
                                    echo "<span class='label label-success pull-right'>Pinned</span></td>";
                                }
                                echo "<td>$query[MemberName]</td>".
                                "<td>$query[NewsDate]</td>";
                                if(isset($_SESSION["MemberIsAdmin"])=='1'){ 
                                echo "<td><a href='editNews.php?NewsID=$query[NewsID]'>".
                                "<button class='btn btn-success btn-xs'><span class='glyphicon glyphicon-pencil'>".
                                "</span></button></a> &nbsp;".
                                "<a href='doDeleteNews.php?NewsID=$query[NewsID]'>".
                                "<button class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-trash'>";
                                } else {
                                "</span></button></a></td></tr>";
                            }
                            }
                        ?>
                    </tbody>
                </table>
            </div>

            </div>
            
        </div>
        
       
        
    </div>
    
    
    </body>
    </html>