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
            <div class="page-header">
                    <h3>Create News</h3>
            </div>
                <div class="panel panel-info">
                    <div class="panel-body">
                        <div class="container">
                        <form class="form-horizontal" action="doCreateNews.php" method="POST" role="form">
                        <div class="form-group">
                            <label for="title" class="col-md-8 control-label">Title</label>
                                <div class="col-md-15">
                                    <input type="name" class="form-control" style="width: 550px;" placeholder="News Title" name="NewsTitle">
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="content" class="col-md-8 control-label">Content</label>
                                <div class="col-md-15">
                                    <textarea class="form-control" style="width: 550px;" name="NewsContent" rows="8"></textarea>
                                </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-8 col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <ul class="list-inline">
                                            <li><input type="checkbox" name="NewsPinned" id="NewsPinned" style="width:0px;" value="1"></li>
                                            <li>Pin this news</li>
                                        </ul>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-8 col-md-15">
                                <input type="submit" class="btn btn-primary btn-lg" value="Create"></input>
                            </div>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
                
                
            </div>
           
           
        </div>
        
       
        
    </div>
    </body>
</html>