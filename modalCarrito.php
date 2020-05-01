<?php

require_once "logica/Modelo.php";
require_once "logica/Color.php";

session_start();

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
        <div>
        <button id='m" . $c->getId() . "' class='btn btn-primary mb-2 mt-2 col-11' type='button' data-toggle='collapse' data-target='#collapseExample" . $c->getId() . "' aria-expanded='false' aria-controls='collapseExample'> " . $c->getNombre() . "
        </button>
        <button id='" . $c->getId() . "' class='btn btn-danger ml-3 eliminar' style='transform: translatey(-1px);'><i class='fas fa-times'></i></button>
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


            /*echo "
        <div class='card border-dark mb-3' style='max-width: 100%;'>
        <div class='card-header'>Modelo</div>
        <div class='card-body text-dark'>

            <p class='card-text'> " . $c -> getNombre() . " </p>
        </div>
        </div> ";*/
        }

        ?>
    </div>
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