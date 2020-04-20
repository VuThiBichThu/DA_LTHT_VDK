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
</head>
<body bgcolor="#E7F3F8" align="center">
	<div class="container">
		<form>
			<h2>BẢNG DỮ LIỆU</h2>
			<p>Cụ thể:</p>            
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