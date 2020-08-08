<!DOCTYPE html>
<html lang="es">

<head>
	<title>LogIn</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">
</head>

<body class="cover" style="background-image: url(assets/img/login.jpg);">
	<form action="index.php?pid=<?php echo base64_encode("presentacion/autenticar.php") ?>&nos=true" method="POST">
		<div class="login-box">
			<h1>INICIA SESIÓN CON TU CUENTA</h1>
			<div class="textbox">
				<input type="text" placeholder="Username" name="correo">
			</div>

			<div class="textbox">
				<input type="password" placeholder="Password" name="clave">
			</div>

			<input type="submit" class="btn" value="INICIAR SESIÓN">
		</div>

	</form>
	<!--====== Scripts -->

</body>