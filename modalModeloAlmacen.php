<?php

session_start();

require_once 'logica/Persona.php';
require_once 'logica/Color.php';
require_once 'logica/Talla.php';
require_once 'logica/Modelo.php';
require_once 'logica/Almacen.php';
require_once 'logica/Representante.php';

$modelo = new Modelo($_GET['idModelo']);
$modeloAlmacen = new Almacen($_GET['idAlmacen'], "", $modelo);

$model = $modeloAlmacen-> modeloAlmacen();
$tallas = $modeloAlmacen-> tallaModeloAlmacen();

?>


<div class="modal-header">
    <h5 class="modal-title">Modelo: <?php echo $model['modelo'] . "<br>Cantidad: " . $model['cantidad']; ?><span style="color:brown; margin-left: 259px;"></span></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
</div>
<div class="modal-body">

    <div class="card border-dark mb-3">
        <div class="card-header">Tallas y Colores</div> 
        <div class="card-body text-dark">

            <?php 

            foreach ($tallas as $t) { ?>

                <div class="card border-dark mb-3" style="max-width: 100%;">
                    <div class="card-header"><?php echo $t['talla'] . "<br>Cantidad: " . $t['cantidad']?></div>
                    <div class="card-body text-dark">

                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Color</th>
                                    <th scope="col">Cantidad</th>
                                </tr>
                            </thead>
                            <?php  ?>
                            <tbody id="colores">
                                <?php foreach ($modeloAlmacen->coloresTallaModeloAlmacen($t['talla']) as $c) {
                                    echo "<tr id=" . $c['id'] . ">";
                                    echo "<td>" . $c['color'] . "</td>";
                                    echo "<td>" . $c['cantidad'] . "</td>";
                                    echo "</tr>";
                                }
                                
                                ?>
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