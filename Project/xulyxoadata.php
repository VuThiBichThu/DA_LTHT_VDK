<?php
$ID = $_REQUEST["ID"];

$link = mysqli_connect("localhost","root","") or die("Could not find the DB".mysqli_error());
$db_selected = mysqli_select_db($link,"DOAN");

$del = mysqli_query($link,"DELETE FROM DATA WHERE id=$ID");

mysqli_free_result($del);
mysqli_close($link);

header('Location:page_data.php');
?>