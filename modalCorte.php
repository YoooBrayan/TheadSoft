<?php

session_start();

require_once 'logica/Persona.php';
require_once 'logica/Color.php';
require_once 'logica/Talla.php';
require_once 'logica/Modelo.php';
require_once 'logica/Corte.php';
require_once 'logica/Representante.php';

$corte = new Corte($_GET['idCorte']);
$corte->consultarCorte();
$corte->tallas($_GET['idCorte']);

?>


<div class="modal-header">
    <h5 class="modal-title">Modelo: <?php echo $corte->getModelo()->getNombre() . "<br>Cantidad: " . $corte->getCantidad(); ?><span style="color:brown; margin-left: 259px;">Estado: <?php //echo $proyecto->getEstado(); 
                                                                                                                                                                                        ?></span></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
</div>
<div class="modal-body">
    <div class="card border-dark mb-3" style="max-width: 100%;">
        <div class="card-header">Fechas</div>
        <div class="card-body text-dark">
            <p> Fecha de Envio:  <?php echo $corte->getFecha_Envio(); ?> </p>
            <p> Fecha de Entrega:  <?php echo $corte->getFecha_Entrega(); ?> </p>
        </div>
    </div>
    <div class="card border-dark mb-3" style="max-width: 100%;">
        <div class="card-header">Observaciones</div>
        <div class="card-body text-dark">

            <p class="card-text"><?php echo $corte->getObservaciones(); ?></p>
        </div>
    </div>

    <div class="card border-dark mb-3">
        <div class="card-header">Tallas y Colores</div> 
        <div class="card-body text-dark">

            <?php

            foreach ($corte->getTallas() as $t) { ?>

                <div class="card border-dark mb-3" style="max-width: 100%;">
                    <div class="card-header"><?php echo $t->getId() . "<br>Cantidad: " . $t->getCantidad()?></div>
                    <div class="card-body text-dark">

                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Color</th>
                                    <th scope="col">Cantidad</th>
                                </tr>
                            </thead>
                            <?php $t->consultarColores($_GET['idCorte']); ?>
                            <tbody id="colores">
                                <?php foreach ($t->getColores() as $c) {
                                    echo "<tr id=" . $c->getId() . ">";
                                    echo "<td>" . $c->getNombre() . "</td>";
                                    echo "<td>" . $c->getCantidad() . "</td>";
                                    echo "</tr>";
                                }
                                echo "<tr><td colspan='9'>" . count($t->getColores()) . " registros encontrados</td></tr>" ?>
                            </tbody>
                        </table>

                    </div>
                </div>

            <?php
            }

            ?>

        </div>
    </div>

</div>