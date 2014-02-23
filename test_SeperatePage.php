<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php 
	require("conf.php");

	$result = mysql_query("SELECT COUNT(*) FROM News") or die(mysql_error());
	$totalrecord = mysql_result($result, 0,0);
	$p_size = 10;
	$totalpage = (int)($totalrecord/$p_size);

	if($totalrecord % $p_size!=0){
		$totalpage++;
	}

	if(empty($_GET['page'])){
		$page = 1;
		$start = 0;
	} else {
		$page = $_GET['page'];
		$start = $p_size*($page-1);
	}

	$result = mysql_query("SELECT * FROM News LIMIT $start, $p_size") or die(mysql_error());
	while($query = mysql_fetch_array($result)){
		echo $query['NewsTitle']. "<br>";
	}

	for($i=1;$i<=$totalpage;$i++){
		echo "<a href='test_SeperatePage.php?page=".$i."'>".$i."</a>&nbsp;";
	}

 ?>
</body>
</html>

