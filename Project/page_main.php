<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<title>HỆ THỐNG GIÁM SÁT BIỂN SỐ XE</title>
	<meta charset="utf-8" />
	<script language="JavaScript">
		function getIDperson()
		{
			//txtimg =document.F1.txt_img.value
			//document.getElementById("image_human").src=`image/${txtimg}.jpg`
			var fullPath = document.getElementById("image_human").src;
			var filename = fullPath.replace(/^.*[\\\/]/, '');
			document.F1.txt_img.value = filename;
		}
		
	</script>
	<script language="JavaScript">
		function getPlateNumber()
		{
			var fullPath = document.getElementById("image_moto").src;
			var filename = fullPath.replace(/^.*[\\\/]/, '');
			document.F1.txt_plate.value = filename;
		}
	</script>
	<script language="JavaScript">
		function saveData()
		{
			document.F1.submit();
		}
	</script>
	<style type="text/css">
		.jumbotron
		{
     /* background: url('path/to/images/banner.jpg') no-repeat center center; 
     background-size: cover;*/
     padding: 5em inherit;
     min-height: 50px;
     padding-top: 1%;
     padding-bottom: 0.5%;

 }

 .fakeimg {
 	background-color: #aaa;
 	width: 100%;
 	min-height: 300px;
 	padding: 20px;
 }


</style>
</head>
<body bgcolor="#E7F3F8">

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

	<form name="F1" action="xulysavedata.php" method="post">
		<div class="container text-center" style="margin-top:30px">
			<div class="row justify-content-center">
				<div class="col-sm-6 justify-content-center">
					<div class="fakeimg"><img src="image/human (1).jpg" srcset="" alt="" 
						id="image_human" width="400px" height="300px"></div>

						<h5 class="text-center" style="margin-top:10px">NGƯỜI GỬI</h5>
						<input type="button" class="btn btn-outline-secondary text-center" name="getPSon" 
						value="Lấy hình người gửi" onclick="getIDperson()">
					</div>
					<div class="col-sm-6 justify-content-center">
						<div class="fakeimg"><img src="image/moto (1).jpg" srcset="" alt="" 												id="image_moto" width="400px" height="300px"></div>

						<h5 class="text-center" style="margin-top:10px">BIỂN SỐ XE</h5>
						<input type="button" class="btn btn-outline-secondary text-center" name="getPNum" 
						value="Lấy biển số xe" onclick="getPlateNumber()"> 
					</div>
				</div>
				<hr>
			</div>

			<div class="container" style="margin-top:30px">
				<div class="row">
					<div class="col-sm-6 shadow p-3 mb-5 bg-white rounded"a>
						<form>
							<div class="text-center">
								<div class="form-group">
									<label >Người gửi:</label>
									<input type="text" class="form-control" name="txt_img">
								</div>
								<div class="form-group">
									<label >Biển số xe:</label>
									<input type="text" class="form-control" name="txt_plate"> 
								</div >
								<br>
								<input type="button" class="btn btn-primary" name="btnSave" value="Save" 
								onclick = "saveData()">
								<input type="reset" class="btn btn-primary" name="btnCancel" value="Cancel">
							</div>
						</form>
					</div>
					<div class="container  col-sm-5 shadow p-3 mb-5 bg-white rounded" >
						<form name="F2" action="xulyfee.php" method="post">

							<div class="row text-center">
								<div class="col-12 "><input type="button" class="btn btn-primary" name="btnCancel" value="Tính phí"></div>
							</div>
							<br>
							<div class="row">
								<div class="col-4 "><label >ID xe:</label></div>
								<div class="col-8 "><input type="text" class="form-control" name="img_ps"></div>
							</div>
							<br>
							<div class="row">
								<div class="col-4 "><label >Phí:</label></div>
								<div class="col-8 "><input type="text" class="form-control" name="plate_num" disabled="true"></div>

							</div>
							<br>
							<div class="row">
								<div class="col-4 "><label >Thời gian vào:</label></div>
								<div class="col-8 "><input type="text" class="form-control" name="plate_num" disabled="true"></div>
							</div>
							<br>
							<div class="row">
								<div class="col-4 "><label >Thời gian ra:</label></div>
								<div class="col-8 "><input type="text" class="form-control" name="plate_num" disabled="true"></div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</form>
</body>
</html>

