<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

$link=mysqli_connect("localhost","root","") or die("Could not connect DB".mysqli_error());
$db_selected=mysqli_select_db($link,'DOAN');
$show = mysqli_query($link,"SELECT * FROM STATISTICS");

echo '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<style type="text/css">
body {
	background-image: linear-gradient(to right,  #ffffff 0%, #E3F1FF 100%);
}
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
<a class="navbar-brand" href="page_main.php">Giám sát</a>
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

<br>
<div class="container shadow-lg p-4 mb-4 bg-white">
<form name="F3" action="xulystatistics.php" method="post">

<h2 class="text-center">BẢNG THỐNG KÊ</h2>
<input type="submit" class="btn btn-primary" name="TK" value="Thống Kê Ngày Hôm Nay">
<input type="submit" class="btn btn-primary" name="delallTK" value="Xóa Tất Cả">
<table class="table table-bordered table-hover">
<thead class="thead-light">
<tr>
<th>Ngày</th>
<th>Số lượng xe</th>
<th>Số tiền (đồng)</th>
<th>Số xe mất</th>
<th>Số xe ở lại qua đêm</th>
<th>Xóa</th>
</tr>
</thead>';
while($row=mysqli_fetch_array($show))
{
	
	echo "<tbody>
	<tr>
	<td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td>
	<td>".$row[3]."</td><td>".$row[4]."</td>
	<td align='center'><a href='xulyxoastatistics.php?DAY=".$row[0]."'>X</a></td></tr>
	</tbody>";
}
echo	'</table>
</form>
</div>
</body>
</html>';

mysqli_close($link); 
?>
