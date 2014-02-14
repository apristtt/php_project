<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- <title>Document</title> -->
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
	<div class="container">
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Member ID</th>
				<th>Member Name</th>
				<th>Member Email</th>
				<th>Join Date</th>
			</tr>
		</thead>
		<tbody>
			
		<?php 
		echo "<hr>";
		include("conf.php");
		$sql = "SELECT * FROM Member";
		$result = mysql_query($sql);
		
		while($query = mysql_fetch_array($result)){
			echo "<tr><td>$query[MemberID]</td>".
			"<td>$query[MemberName]</td>".
			"<td>$query[MemberEmail]</td>".
			"<td>$query[MemberJoinDate]</td></tr>";
		}
		?>
			
		</tbody>
	</table>
	</div>
</body>
</html>
