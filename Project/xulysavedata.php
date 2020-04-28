<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

$img_ps = $_REQUEST['txt_img']; 
$img_ps = urldecode($img_ps);

$plate_num = $_REQUEST['txt_plate'];
$plate_num = urldecode($plate_num);

$day = date_create(date("Y-m-d"));
$time = date_create(date("H:i:s")); 

$day = $day->format("Y-m-d");
$time = $time->format("H:i:s");
//echo $img_ps."<br>".$plate_num."<br>".$day."<br>".$time."<br>";

$link = mysqli_connect("localhost","root","") or die("Could not find the DB".mysqli_error());
$db_selected = mysqli_select_db($link,"DOAN");

$result = mysqli_query($link,"INSERT INTO DATA(day,time_start,time_end,img_ps,plate_num,fee) 
	VALUES(CAST( '". $day ."'  AS DATE), '".$time."' ,CAST('00:00:00' AS TIME),
	'$img_ps','$plate_num',0)");
mysqli_free_result($result);
mysqli_close($link);

header("Location:page_data.php");
?>