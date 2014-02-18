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
                <li><a href="home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li class="active"><a href="member.php">Member</a></li>
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
           
            <div class="panel panel-primary">
                <div class="panel-heading">Member List</div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Member ID</th>
                            <th>Member Name</th>
                            <th>Email Address</th>
                            <th>Join Date</th>
                            <th><span class="glyphicon glyphicon-cog"></span></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            require("conf.php");
                            $result = mysql_query("SELECT MemberID, MemberName, MemberEmail, MemberJoinDate FROM Member") or die(mysql_error());

                            while($query = mysql_fetch_array($result)){

                                echo "<tr><td>$query[MemberID]</td>".
                                "<td>$query[MemberName]</td>".
                                "<td>$query[MemberEmail]</td>".
                                "<td>$query[MemberJoinDate]</td>".
                                "<td><a href='editMember.php?memberID=$query[MemberID]'>".
                                "<button class='btn btn-success btn-xs'><span class='glyphicon glyphicon-pencil'>".
                                "</span></button></a> &nbsp;".
                                // "<a href='#' role='button' class='dropdown-toggle' data-toggle='modal' data-target='#editModal'>".
                                // "<button class='btn btn-primary'><span class='glyphicon glyphicon-pencil'>".
                                // "</span></button></a> &nbsp;".
                                "<a href='doDeleteMember.php?memberID=$query[MemberID]'>".
                                "<button class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-trash'>".
                                "</span></button></a></td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>

            </div>
            
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

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="editModalLabel">Edit Member</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="doEditMember.php" method="POST" role="form">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Member ID</label>
                            <div class="col-md-8">
                                <p class="form-control-static">
                                    #ID
                                </p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Member Name</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="MemberName" value="<? echo $query['MemberName'] ?>"></input>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-8 col-md-15">
                                <input type="submit" class="btn btn-success" name="submitEdit" value="Edit"></input>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
    </body>
    </html>