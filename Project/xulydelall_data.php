<?php
$link = mysqli_connect("localhost","root","") or die("Could not find the DB".mysqli_error());
$db_selected = mysqli_select_db($link,"DOAN");

$result = mysqli_query($link,"DELETE FROM DATA");
mysqli_free_result($result);
mysqli_close($link);

header("Location:page_data.php");
?>