<?php

require_once "logica/Modelo.php";
require_once "logica/Color.php";

session_start();

$total = 0;

foreach($_SESSION['carrito'] as $m){
    $cantidadM = 0;

    foreach($m -> getTalla() as $t){
        $cantidadM += $t->getCantidad();
    }
    $total += $cantidadM*$m->getValor();
}

?>

<div class="modal-header">
    <h5 class="modal-title">Carrito</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
</div>
<div class="modal-body">

    <span>Cantidad de Modelos: </span><span id="cantidadM"><?php echo count($_SESSION['carrito']); ?></span>

    <div class="d-flex flex-column">
        <?php

        foreach ($_SESSION['carrito'] as $c) {

            echo "
        <div d-flex flex-row>
        <div class='row'>
        <div class='col-9 col-md-11'>
        <button id='m" . $c->getId() . "' class='btn btn-primary mb-2 mt-2 w-100' type='button' data-toggle='collapse' data-target='#collapseExample" . $c->getId() . "' aria-expanded='false' aria-controls='collapseExample'> " . $c->getNombre() . "
        </button>
        </div>
        <div class='col-1 col-md-1'>
        <button id='" . $c->getId() . "' class='btn btn-danger mt-2 eliminar ' style='transform: translatey(-1px);'><i class='fas fa-times'></i></button>
        </div>
        
        </div>

        <div class='collapse' id='collapseExample" . $c->getId() . "'>
        <div class='card card-body'>
        <div class='d-flex flex-column'>
        <center><p>Tallas</p></center>
        ";


            foreach ($c->getTalla() as $t) {
                echo "<button style='width: 15%;' class='mt-1 mb-2' data-toggle='collapse' data-target='#collapseExampleC" . $t->getId() . $c->getId() . "'> " . $t->getId() . " </button>
            
            <div class='collapse' id='collapseExampleC" . $t->getId() . $c->getId() . "'>
            <div class='card card-body'>
            <center><p>Colores</p></center>
            <table class='table table-striped table-hover'>
                        <thead>
                            <tr>   
                                <th>Color</td>
                                <th>Cantidad</td>
                            </tr>
                        </thead>
            ";

                foreach ($t->getColores() as $co) {
                    echo "
                        <tbody>
                            <tr>   
                                <th>" . $co->getNombre() . "</td>
                                <th>" . $co->getCantidad() . "</td>
                            </tr>
                        </tbody>
                    ";
                }


                echo "
            </table>
            </div>
            </div>";
            }



            echo "</div>
        </div>
        </div>";

        }

        ?>
    </div>
    <br>
    <label>Total: <?php echo $total ?> </label>
    <br>
    <button id="registrar" type="submit" name="registrar" class="btn btn-dark">Registrar Venta</button>

</div>

<script>
    $(".eliminar").click(function(e) {
        e.preventDefault();

        let id = $(this)[0].id;

        $.ajax({
            type: "POST",
            url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/representante/eliminarCarrito.php") ?>",
            data: {
                id
            },
            success: function(response) {

                console.log(response);
                let datos = JSON.parse(response);

                $("#cantidadM").html(datos['cantidad']);
                $("#cantidadCarrito").html(datos['cantidad']);

                $("#idM").append(new Option(datos['modelo'], datos['id']));
                //$('#idT').append(`<option value="${talla.talla}">${talla.talla}</option>`)

                $("#idM").selectpicker("refresh");

                $("#m" + id).remove();
                $("#" + id).remove();
                Swal.fire({
                    position: 'center',
                    title: 'Modelo removido del carrito',
                    icon: 'success',
                    timer: 999
                });
            }
        });
    });

    $("#registrar").click(function() {

        let venta = 1;

        $.ajax({
            type: "POST",
            url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/representante/registrarVenta.php") ?>",
            data: {
                venta
            },
            success: function(response) {

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Venta Registrada!',
                    timer: 3999
                });

                window.history.back();
            }
        });

    });
</script>