<!DOCTYPE html>
<html lang="es">
<head>
	<title>LogIn</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/main.css">
</head>
<body class="cover" style="background-image: url(assets/img/login.jpg);">
	<form action="index.php?pid=<?php echo base64_encode("presentacion/autenticar.php") ?>&nos=true" method="POST" autocomplete="off" class="full-box logInForm">
		<p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
		<p class="text-center text-muted text-uppercase">Inicia sesión con tu cuenta</p>
		<div class="form-group label-floating">
		  <label class="control-label" for="UserEmail">E-mail</label>
		  <input style="color: white" class="form-control" id="UserEmail" type="email" name="correo" required>
		  <p class="help-block">Escribe tú E-mail</p>
		</div>
		<div class="form-group label-floating">
		  <label class="control-label" for="UserPass">Contraseña</label>
		  <input style="color: white" class="form-control" id="UserPass" type="password" name="clave">
		  <p class="help-block">Escribe tú contraseña</p>
		</div>
		<div class="form-group text-center">
			<input type="submit" value="Iniciar sesión" class="btn btn-raised btn-danger">
		</div>
	</form>
	<!--====== Scripts -->
	
	<script src="js/main.js"></script>

</body>

<select class="selectpicker show-menu-arrow" 
            data-style="form-control" 
            data-live-search="true" 
            title="-- Select your coffee --"
            multiple="multiple">
      <option data-tokens="Espresso">Espresso</option>
      <option data-tokens="Americano">Americano</option>
      <option data-tokens="Mocha">Mocha</option>
      <option data-tokens="Capuccino">Capuccino</option>
      <option data-tokens="Affogato">Affogato</option>
      <option data-tokens="Long Black">Long Black</option>
      <option data-tokens="Macchiato">Macchiato</option>
    </select>

</html>

<script type="text/javascript">
    $(document).ready(function() {
        $('.selectpicker').selectpicker({
            style: 'btn-default'
        });
    });	
</script>