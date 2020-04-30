<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$link=mysqli_connect("localhost","root","") or die("Could not connect DB".mysqli_error());
$db_selected=mysqli_select_db($link,'DOAN');

$date = date_create(date("y-m-d"));
//date_sub($date,date_interval_create_from_date_string("1 day"));
//echo date_format($date,"y-m-d");

$date = $date->format("y-m-d");
//echo $date;
$data = mysqli_query($link,"SELECT * FROM DATA WHERE day='$date'");
//$amount = mysqli_num_rows($data);

$count_plate = mysqli_query($link,"SELECT COUNT(plate_num) AS total FROM DATA WHERE day='$date'");
$amount = mysqli_fetch_assoc($count_plate);

//echo amount['total'];
$count_fee = mysqli_query($link,"SELECT SUM(fee) AS total FROM DATA WHERE day='$date'");
$money = mysqli_fetch_assoc($count_fee);
//echo $money['total'];
//$count_ovn = mysqli_query($link,"SELECT COUNT(plate_num) AS total FROM DATA WHERE day='$date' AND fee = 0");

//$count_left = mysqli_query($link,"UPDATE DATA SET fee=3000 WHERE day='$date' AND fee = 0");

/*while($row=mysqli_fetch_array($data))
{
	echo $row[1]."-".$row[2]."-".$row[3]."-".$row[4]."-".$row[5]."-".$row[6];
} */

$result = mysqli_query($link,"INSERT INTO STATISTICS(day,quantity,sum_fee,lost,overnight) 
	VALUES (CAST('". $date ."' AS DATE),'".$amount['total']."','".$money['total']."',0,0)");
$show = mysqli_query($link,"SELECT * FROM STATISTICS");

/*while($row=mysqli_fetch_array($show))
{
	echo $row[0]." - ".$row[1]." - ".$row[2]." - ".$row[3]." - ".$row[4];
} */
//mysqli_free_result($result);
mysqli_close($link); 

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
<form>

<h2 class="text-center">BẢNG THỐNG KÊ</h2>

<table class="table table-bordered table-hover">
<thead class="thead-light">
<tr>
<th>Ngày</th>
<th>Số lượng xe</th>
<th>Số tiền (đồng)</th>
<th>Số xe mất</th>
<th>Số xe ở lại qua đêm</th>
</tr>
</thead>';
while($row=mysqli_fetch_array($show))
{
	echo "<tbody>
	<tr>
	<td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td>
	<td>".$row[3]."</td><td>".$row[4]."</td></tr>
	</tbody>";
}
echo	'</table>
</form>
</div>
</body>
</html>';
?>
