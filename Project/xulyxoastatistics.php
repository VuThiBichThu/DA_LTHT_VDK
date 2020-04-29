<?php
$DAY = $_REQUEST["DAY"];
echo $DAY;

$link = mysqli_connect("localhost","root","") or die("Could not find the DB".mysqli_error());
$db_selected = mysqli_select_db($link,"DOAN");

$del = mysqli_query($link," DELETE FROM STATISTICS WHERE day='$DAY' ");

mysqli_free_result($del);
mysqli_close($link);

header('Location:page_statistics.php');
?>