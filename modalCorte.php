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
    <h5 class="modal-title">Corte # <?php echo $_GET['idCorte'] . "<br>Modelo: " . $corte->getModelo()->getNombre() . "<br>Cantidad: " . $corte->getCantidad(); ?></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
</div>
<div class="modal-body">
    <div class="card border-dark mb-3" style="max-width: 100%;">
        <div class="card-header">Fechas</div>
        <div class="card-body text-dark">
            <p> Fecha de Envio: <?php echo $corte->getFecha_Envio(); ?> </p>
            <p> Fecha de Entrega: <?php echo $corte->getFecha_Entrega(); ?> </p>
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
                    <div class="card-header"><?php echo $t->getId(); ?><input id="CT<?php echo $t->getId(); ?>" class="ml-2" type="number" value="<?php echo $t->getCantidad(); ?>" style="width:45px; border:none; border-bottom: 1px solid #C7CAC7; background-color: #F6F6F6;"></div>

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
                                    echo "<td><input id='CC". $t->getId() . $c->getId() ."' type='number' style='width:45px; border:none; border-bottom: 1px solid #C7CAC7; background-color: #EEEEEE;' value='". $c -> getCantidad() ."'></td>";
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

<script>
    $(document).ready(function() {

        let url = "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/representante/actualizarCorte.php") ?>";
        let corte = <?php echo $_GET['idCorte']; ?>;

        <?php

        foreach ($corte->getTallas() as $t) { ?>

            $("#CT" + "<?php echo $t->getId(); ?>").keypress(function(e) {
                let code = (e.keyCode ? e.keyCode : e.which);
                if (code == 13) {
                    let cTalla = "<?php echo $t->getId(); ?>";
                    let cantidad = $("#CT" + cTalla).val();
                    //console.log("Enter: " + "<?php echo $t->getId(); ?>" + " Cantidad: " + cantidad);
                    $.post(url, {cTalla, cantidad, corte},
                        function (response) {
                            console.log(response);
                            if(response){
                                swal.fire({
                                    position: "center",
                                    icon: "success",
                                    title: 'Cantidad Actualizada',
                                    timer: 900
                                });
                            }
                        }
                    );

                }
            })

        <?php

            foreach($t -> getColores() as $c){ ?>

                $("#CC"+"<?php echo $t -> getId() . $c -> getId(); ?>").keypress(function(e){
                    let code = (e.keyCode ? e.keyCode : e.which);
                    if(code == 13){
                        let talla = "<?php echo $t -> getId(); ?>";
                        let cColor = "<?php echo $c -> getId(); ?>";
                        let cantidad = $("#CC"+talla+cColor).val();
                        //console.log("Talla: " + talla + " Color: "+ color + " Cantidad:" + cantidad);
                        $.post(url, {cColor, talla, corte, cantidad},
                            function (response) {
                                console.log("Aqui: " + response);
                                if(response){
                                    swal.fire({
                                        position: "center",
                                        icon: 'success',
                                        title: 'Cantidad Actualizada',
                                        timer: 900
                                    });
                                }
                            }
                        );
                    }
                })

            <?php    
            }
        }


        ?>

    });
</script>