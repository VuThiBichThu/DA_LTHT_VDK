<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$img_ps = $_REQUEST['txt_img']; 
$plate_num = $_REQUEST['txt_plate'];
$day = date_create(date("y-m-d"));
$time = date_create(date("H:i:s")); 

$day = $day->format("y-m-d");
$time = $time->format("H:i:s");
echo $img_ps."<br>".$plate_num."<br>".$day."<br>".$time;

/*	$link = mysqli_connect("localhost","root","") or die("Could not find the DB".mysqli_error());
	$db_selected = mysqli_select_db($link,"DULIEU");
	$check = mysqli_query("SELECT idnv FROM NHANVIEN");
	$count=0;
	while($row=mysqli_fetch_array($check)){
		if($manv==$row[0]) {
			$count=$count+1;
		}
	}
	if($count==0){
		$result = mysqli_query($link,"INSERT INTO NHANVIEN(idnv,hoten,idpb,diachi) VALUES('$manv','$tennv','$idpb','$diachi')");
		mysqli_free_result($result);
		mysqli_close($link);
		header("Location:xemthongtinnv.php");
	}
	else {
		header("Location:xemthongtinnv.php");
	}
	*/
?>