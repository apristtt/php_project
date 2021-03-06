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
		if(empty($_REQUEST['memberID'])) {
			echo '<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css">';
            echo '<div class="container alert alert-danger">Incorrect access</div>';
		} else {
		if($_REQUEST['memberID'] != "") {
		$memberID = $_REQUEST['memberID'];
		$result = mysql_query("SELECT * FROM Member WHERE MemberID = '$memberID'") or die(mysql_error());
		$query = mysql_fetch_array($result);

	}
	?>
 	<? include("displayNavbar.php"); ?>

	<div class="container">
		<div class="row">
			<div class="page-header">
				<h3>Edit Member ID : <?echo $query['MemberID'] ?></h3>
			</div>
			<div class="panel panel-info">
				<div class="panel-body">
					<div class="container">
						<form class="form-horizontal" action="doEditMember.php" method="POST" role="form">
							<div class="form-group">
								<label class="col-md-8 control-label">Member ID</label>
								<div class="col-md-15">
									<p class="form-control-static">
										<kbd><?echo $query['MemberID'] ?></kbd>
									</p>
								</div>
							</div>
							<div class="form-group">
                            <label for="name" class="col-md-8 control-label">Member Name</label>
                                <div class="col-md-15">
                                    <input type="name" class="form-control" placeholder="Name" name="MemberName" value="<? echo $query['MemberName'] ?>">
                                </div>
                        	</div>
                        	<div class="form-group">
                            <label for="email" class="col-md-8 control-label">Email Address</label>
                                <div class="col-md-15">
                                    <input type="email" class="form-control" placeholder="Email Address" name="MemberEmail" value="<? echo $query['MemberEmail'] ?>">
                                </div>
                        	</div>
                        	<div class="form-group">
                            <label for="password" class="col-md-8 control-label">Password</label>
                                <div class="col-md-15">
                                    <input type="name" class="form-control" placeholder="Password" name="MemberPassword" value="<? echo $query['MemberPassword'] ?>">
                                </div>
                        	</div>
                        	<div class="form-group">
                            <div class="col-md-offset-8 col-md-15">
                               	<input type="submit" class="btn btn-success" name="submitEdit" value="Edit">
                                <!-- <button type="submit" class="btn btn-success btn-lg" name="submitEdit">Edit</button> -->
                            </div>
                        	</div>
                        	<input name="memberID" type="hidden" id="memberID" value="<?=$_REQUEST['memberID']?>">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<? } ?>
</html>