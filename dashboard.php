<?php
session_start();
if(isset($_SESSION["username"])){
	$timeNow = time();
	$timeSession = $_SESSION["time"];
	if(60 - (time() - $_SESSION["time"]) < 0){
		session_destroy();
		echo "<script type='text/javascript'>window.location='login.php';</script>";
	}
	else {
		$_SESSION["time"] = time();
	}
}
if(isset($_POST['logout'])){
	session_destroy();
	echo "<script type='text/javascript'>alert('Logout Success!');window.location='login.php';</script>";
}
?>
<!DOCTYPE html>
	<head>
	    <meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
			<title>Dashboard</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div style="color:#f8f9fa;">
			<div class="flex between" style="margin-top:20px; margin-left:20px; margin-right:20px;">
				<p>Nama : Yoga Firdaus Pratikha<br>NIM :  192410102084</p>
				<p>Kelas : PWEB E<br>Prodi : Teknologi Informasi</p>
			</div>
			<div style="text-align: center;">
				<h1>Dashboard</h1>
			</div>
		<div class="container">
			<a>Hello <?php echo $_SESSION['username']?></a>
			<form method="post" action="dashboard.php">
				<div class="d-flex justify-content-between" style="margin-top:15px">
					<input name="logout" id="logout" type="submit" class="button red" style="width: 100px; border-radius: 4px;" value="Logout">
				</div>
			</form>
		</div>
	</body>
</html>