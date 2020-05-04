<?php

require_once "logica/Modelo.php";
require_once "logica/Color.php";
require_once "logica/Talla.php";
require_once "logica/Venta.php";

session_start();

//$almacen = new Almacen($_SESSION['almacen']);
//$almacen -> ventas($_POST['fecha']);

$venta = new Venta($_GET['idVenta']);
$venta->modelosVentaTC();


?>

<div class="modal-header">
    <h5 class="modal-title">Venta <?php echo $_GET['idVenta']; ?></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
</div>
<div class="modal-body">

    <span>Cantidad de Modelos: </span><span id="cantidadM"><?php echo count($venta->getModelos()); ?></span>

    <div class="d-flex flex-column">
        <?php

        foreach ($venta->getModelos() as $m) {

            echo "
        <div d-flex flex-row>
        <div>
        <button id='m" . $m->getId() . "' class='btn btn-primary mb-2 mt-2 col-12' type='button' data-toggle='collapse' data-target='#collapseExample" . $m->getId() . "' aria-expanded='false' aria-controls='collapseExample'> " . $m->getNombre() . "
        </button>
        </div>

        <div class='collapse' id='collapseExample" . $m->getId() . "'>
        <div class='card card-body'>
        <div class='d-flex flex-column'>
        <center><p>Tallas</p></center>
        ";

            foreach ($m->getTalla() as $t) {
                echo "<div class='d-flex flex-row' ><button style='width: 15%;' class='mt-1 mb-2' data-toggle='collapse' data-target='#collapseExampleC" . $t->getId() . $m->getId() . "'> " . $t->getId() . " </button> <span class='p-1 ml-4 h5 mt-2'>". "Cantidad: " . $t -> getCantidad() ."</span></div>
            
            <div class='collapse' id='collapseExampleC" . $t->getId() . $m->getId() . "'>
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

</div>