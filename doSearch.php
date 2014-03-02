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
		if(empty($_REQUEST['searchQuery'])) {
            echo '<div class="container alert alert-danger">Incorrect access</div>';
		} else {

		if($_REQUEST['searchQuery'] != "") {
		$searchQuery = $_REQUEST['searchQuery'];
		$result = mysql_query("SELECT * FROM News WHERE NewsTitle LIKE '%$searchQuery%' OR NewsContent LIKE '%$searchQuery%' AND NewsHidden = 0") or die(mysql_error());
	}
	?>

	<? include ("displayNavbar.php"); ?>
    <!-- <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	        <div class="container">
	            <ul class="nav navbar-nav">
	                <li>
	                    <a><span class="label label-success">Logo</span></a>
	                </li>
	                <li><a href="home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
	                <li><a href="member.php">Member</a></li>
	                <li><a href="#">Another test</a></li>
	                    <li class="dropdown">
	                        <a href="#" data-toggle="dropdown" data-target="#" class="dropdown-toggle">Drop me!<b class="caret"></b></a>
	                    <ul class="dropdown-menu">
	                        <li><a>Menu</a></li>
	                    </ul>
	                    </li>
	            </ul>
		    	<ul class="nav navbar-nav navbar-right">
		            <li class="active">
		                <a href="#" role="button" class="btn" data-toggle="modal" data-target="#searchModal">
		                    <span class="glyphicon glyphicon-search"></span>
		                </a>
		            </li>
		            <li>
		                <a href="#" role="button" class="dropdown-toggle" data-toggle="modal" data-target="#loginModal">
		                    <span class="glyphicon glyphicon-user"></span>
		                </a>
		            </li>
		    	</ul>
	        </div>
    </nav> -->

<div class="container">
	<div class="row">
		<div class="page-header">
			<h3>Result of : <? echo $_REQUEST['searchQuery'] ?></h3>
		</div>
		<? 
			$num = mysql_num_rows($result);
			if ($num <= 0){
				echo '<div class="panel panel-default panel-body"><h4 align="center">Sorry, No result :(</h4></div>';
			} else {
				while($query = mysql_fetch_array($result)){ ?>
		<div class="panel panel-info" style="box-shadow: 2px 2px 4px #888888;">
			<div class="panel-body">
					<div class="media">
						<div class="media-body">
							<h4 class="media-heading"><? echo $query['NewsTitle'] ?>
							<small>Posted on <? echo $query['NewsDate'] ?></small></h4>
							<? echo $query['NewsContent'] ?>
							<a href="readNews.php?NewsID=<? echo $query['NewsID'] ?>"><button class="btn btn-success btn-sm pull-right"><span class="glyphicon glyphicon-file"></span> Read more &raquo;</button></a>
						</div>
					</div>
			</div>
		</div>
		<? } } ?>
	</div>
</div>
</body>
<? } ?>
</html>