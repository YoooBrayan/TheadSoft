<?php
$representante = new Representante($_SESSION['id']);
$representante->consultar();

?>

<head>
    <link rel="stylesheet" href="presentacion/estilos.css">
</head>

<header class="container-fluid">
    <div class="logo">
        <h1 class="logo-text"><span>Thread</span>Soft</h1>
    </div>

    <i class="fa fa-bars menu-toggle"></i>

    <ul class="nav">
        <li><a href="index.php?pid=<?php echo base64_encode('presentacion/representante/sesionRepresentante.php') ?>">Home</a></li>
        <li><a href="index.php?pid=<?php echo base64_encode('presentacion/representante/almacenes.php') ?>">Almacenes</a></li>
        <li><a href="#">Modelos</a></li>
        <li>
            <a href="#">Corte</a>
            <ul style="right: 0px;">
                <li><a style="text-align: left;" href="index.php?pid=<?php echo base64_encode("presentacion/representante/nuevoCorte.php") ?>">Nuevo</a></li>
                <li><a style="text-align: left;" href="index.php?pid=<?php echo base64_encode("presentacion/representante/consultarCortes.php") ?>">Consultar</a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-user"></i>
                <?php echo $representante->getNombre(); ?>
                <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
            </a>
            <ul>
                <li><a href="#"><?php echo $representante->getId(); ?></a></li>
                <li><a id="info" href="#"><?php echo $representante->getCorreo(); ?></a></li>
                <li><a class="logout" href="index.php">Cerrar sesion</a></li>
            </ul>
        </li>
    </ul>
</header>

<script>
    $(document).ready(function() {

        $("body").attr("style", "background-image: url(assets/img/login.jpg); background-size: 100% 100%; background-attachment: fixed;");

        if ($('#info').text().length > 17) {
            let nv = $("#info").text().substr(0, 17);
            $("#info").html(nv + "...");
        }

        $('.menu-toggle').on('click', function() {
            $('.nav').toggleClass('showing');
            $('.nav ul').toggleClass('showing');
        })

    })
</script>