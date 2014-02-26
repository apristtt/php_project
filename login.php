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
    
    <div class="container">
        <div class="row">
        <? if (isset($MemberSessionID)==session_id()) {?>
            <h4>Already login</h4>
            <? } elseif(isset($MemberSessionID)<>session_id() or empty($MemberName)) { ?>
            <div class="page-header">
                    <h3>Login</h3>
                </div>
                <div class="panel panel-info">
                    <div class="panel-body">
                        <div class="container">
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
                            <div class="col-md-offset-8 col-md-15">
                                <button type="button" class="btn btn-primary btn-lg">Login</button>
                            </div>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
                
            <? } ?>
            </div>
           
           
        </div>
        
       
        
    </div>
    
    </body>