<?php
if(isset($_POST['login']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	if(empty($username)){
		echo "<script type='text/javascript'>alert('Username tidak boleh Kosong!');</script>";
	}
	elseif(empty($password)){
		echo "<script type='text/javascript'>alert('Password tidak boleh Kosong!');</script>";
	}
}
?>
<!DOCTYPE html>
	<head>
	    <meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
			<title>Login</title>
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
				<h1>Login</h1>
			</div>
		<div class="container">
			<form method="POST" action="check.php">
                <table class="center">
                    <tr>
                        <td style="text-align: right;"><label for="username">Username:</label></td>
                        <td><input type="text" id="username" name="username" placeholder="Username..."></td>
                    </tr>
                    <tr>
                        <td style="text-align: right;"><label for="password">Password:</label></td>
                        <td><input type="password" id="password" name="password" placeholder="Password..."></td>
                    </tr>
					<tr>
					<?php
						if(isset($_COOKIE['ingat'])){
							echo '<td><input name="ingat" id="ingat" type="checkbox" style="float: right;" value="1" checked></td>';}
						else {
							echo '<td><input name="ingat" id="ingat" type="checkbox" style="float: right;" value="1"></td>';
						}?>
						<td style="text-align: left;">Ingat sandi?</td>
					</tr>
                </table>
		    <div class="d-flex justify-content-between" style="margin-top:15px">
				<input name="login" id="login" type="submit" class="button green" style="width: 100px; border-radius: 4px;" value="Login">
			</form>
			</div>
		</div>
	</body>
</html>
<?php
if(isset($_COOKIE['username']) and isset($_COOKIE['password'])){
	$username = $_COOKIE['username'];
	$password = $_COOKIE['password'];
	echo "<script>
		document.getElementById('username').value = '$username';
		document.getElementById('password').value = '$password';
	</script>";
}
?>