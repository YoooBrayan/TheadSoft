<?php

session_start();

require 'logica/Persona.php';
require_once "logica/administrador.php";
require_once "logica/representante.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!--Librerias-->

    <!-- BootStrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>

    <!--Select BootStrap-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <!-- ToolTip -->
    <script type="text/javascript">
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>

    <!--PDF-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.1.1/pdfobject.min.js"></script>

    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.3.0/material.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.ripples/0.5.3/jquery.ripples.min.js"></script>

    <script src="//cdn.jsdelivr.net/jquery.mcustomscrollbar/3.0.6/jquery.mCustomScrollbar.concat.min.js"></script>

<!--    <script src="presentacion/js/material.min.js"></script> 

    <script>
		$.material.init();
	</script> -->
    
</head>

<body>

    <?php

    if (isset($_GET['pid'])) {
        $pid = base64_decode($_GET['pid']);
        if (isset($_GET['nos']) || (!isset($_GET['nos']) && $_SESSION['id'] != "")) {
            include $pid;
        } else {
            header("Location: index.php");
        }
    } else {
        $_SESSION['id'] = "";
        include 'presentacion/inicio.php';
    }

    ?>


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

<script>
      $('.selectpicker').selectpicker({
    style: 'btn-default'
  });
</script>