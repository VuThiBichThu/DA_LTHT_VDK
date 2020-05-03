<?php 

//gồm cả insert thống kê & xóa tất cả 

date_default_timezone_set('Asia/Ho_Chi_Minh');
$link=mysqli_connect("localhost","root","") or die("Could not connect DB".mysqli_error());
$db_selected=mysqli_select_db($link,'DOAN');

if (isset($_REQUEST["TK"])) {
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

	$delone = mysqli_query($link,"DELETE FROM STATISTICS WHERE day='$date'");

	$result = mysqli_query($link,"INSERT INTO STATISTICS(day,quantity,sum_fee,lost,overnight) 
				VALUES (CAST('". $date ."' AS DATE),'".$amount['total']."','".$money['total']."',0,0)");

} 
else if (isset($_REQUEST["delallTK"]))
{
   $delall = mysqli_query($link,"DELETE FROM STATISTICS");
} 

mysqli_close($link); 
header("Location:page_statistics.php");
?>