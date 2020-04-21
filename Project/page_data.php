<?php 
$link=mysqli_connect("localhost","root","") or die("Could not connect DB".mysqli_error());
$db_selected=mysqli_select_db($link,'DOAN');
$result = mysqli_query($link,"SELECT * FROM DATA");

echo '<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		.jumbotron
		{
    
     padding: 5em inherit;
     min-height: 50px;
     padding-top: 1%;
     padding-bottom: 0.5%;
 }
</style>
</head>
<body bgcolor="#E7F3F8" align="center">
	
	<div class="jumbotron text-center" style="margin-bottom:0">
		<h1>HỆ THỐNG GIÁM SÁT BIỂN SỐ XE</h1>
		
	</div>

	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<a class="navbar-brand" href="page_main.htm">Giám sát</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="page_data.php">Dữ liệu</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="page_statistics.php">Thống kê</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="page_find.htm">Tìm kiếm</a>
				</li>    
			</ul>
		</div>  
	</nav>
	<div class="container">
		<form>
			<h2 class="text-center">BẢNG DỮ LIỆU</h2>
			       
			<table class="table table-bordered table-hover">
				<thead class="thead-light">
					<tr>
						<th>Ngày</th>
						<th>Thời gian gửi</th>
						<th>Thời gian kết thúc</th>
						<th>Người gửi</th>
						<th>Biển số xe</th>
						<th>Số tiền đóng (đồng)</th>
					</tr>
				</thead>';
	while($row=mysqli_fetch_array($result))
	{
		echo "<tbody>
			<tr>
				<td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td>
				<td>".$row[4]."</td><td>".$row[5]."</th><td>".$row[6]."</td></tr>
		</tbody>";
	}
echo	'</table>
		</form>
	</div>
</body>
</html>';	

mysqli_free_result($result);
mysqli_close($link);
?>