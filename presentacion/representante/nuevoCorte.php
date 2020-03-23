<?php

include 'presentacion/representante/cabeceraRepresentante.php';

$_SESSION['tallas'] = array();

$representante->proveedor();

$modelos = new Modelo("", "", "", $representante->getProveedor());
$modelos = $modelos->consultarModelos();
$talla = new Talla();
$tallas = $talla->consultarTallas();
$color = new Color();
$colores = $color->consultarColores();

?>
<br>
<div class="container">
    <div class="row" style="width: 100%; padding: 0px;">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card">
            <div id="mensaje" class='alert alert-danger' role='alert' hidden></div>
                <div class="card-header bg-primary text-white bg-dark" style="text-align: center;">Registro</div>
                <div class="card-body">
                    <form action=<?php echo "index.php?pid=" . base64_encode("presentacion/representante/registrarCorte.php") ?> method="post">
                        <hr/ style="border: 1px solid">
                        <h6>Nuevo corte</h6>
                        <div class="form-group">
                            <label>Seleccione Modelo <?php // echo " " . $titulo; 
                                                        ?>:</label>
                            <select class="selectpicker" data-show-subtext="true" data-live-search="true" style="margin-left: 5px;" id="idM">
                                <?php
                                foreach ($modelos as $m) {
                                ?>
                                    <option value="<?php echo $m->getId() ?>"><?php echo $m->getNombre();  ?></option>
                                <?php }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input id="fechaEnvio" onfocus="(this.type='date')" class="js-form-control" placeholder="Fecha de Envio" name="fechaEnvio">
                        </div>
                        <div class="form-group">
                            <input id="fechaEntrega" onfocus="(this.type='date')" class="js-form-control" placeholder="Fecha de Entrega" name="fechaEntrega">
                        </div>
                        <div class="form-group">
                            <label style="color: gray;" id="label3"> Observaciones </label>
                            <textarea class="editor" name="plantamiento" id="editor"></textarea>
                        </div>

                        <hr/ style="border: 1px solid">

                        <h6>Seleccionar Tallas y Colores</h6>

                        <label>Seleccione Tallas <?php // echo " " . $titulo; 
                                                    ?>:</label>
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true" style="margin-left: 5px;" id="idT">
                            <?php
                            foreach ($tallas as $t) {
                            ?>
                                <option value="<?php echo $t->getId() ?>"><?php echo $t->getId();  ?></option>
                            <?php }
                            ?>
                        </select>
                        <div class="form-gruop mt-2">
                            <label>Cantidad</label>
                            <input id="cantidadT" type="number" style="width: 61px">
                        </div>

                        <button id="btnTalla" type="submit" name="registrar" class="btn btn-dark mt-2 mb-2">Agregar</button>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Talla</th>
                                    <th scope="col">Cantidad</th>
                                </tr>
                            </thead>
                            <tbody id="tallas">
                                <?php
                                /*foreach ($profesores as $p) {
        echo "<tr id=". $p -> getId() .">";
        echo "<td>" . $p->getId() . "</td>";
        echo "<td>" . $p->getNombre() . "</td>";
        echo "<td>" . $p->getApellido() . "</td>";
        echo "<td>" . $p->getCorreo() . "</td>";
        echo "</tr>";
    
    }
    echo "<tr><td colspan='9'>" . count($profesores) . " registros encontrados</td></tr>" */ ?>
                            </tbody>
                        </table>

                        <hr/ style="border: 1px solid">

                        <label>Seleccione Colores <?php // echo " " . $titulo; 
                                                    ?>:</label>
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true" style="margin-left: 5px;" id="idS">
                            <?php
                            foreach ($colores as $c) {
                            ?>
                                <option value="<?php echo $c->getId() ?>"><?php echo $c->getNombre();  ?></option>
                            <?php }
                            ?>
                        </select>
                        <div class="form-gruop mt-2">
                            <label>Cantidad</label>
                            <input id="cantidadC" type="number" style="width: 61px">
                        </div>

                        <button type="submit" name="registrar" class="btn btn-dark mt-2 mb-2">Agregar</button>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Talla</th>
                                    <th scope="col">Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                /*foreach ($profesores as $p) {
        echo "<tr id=". $p -> getId() .">";
        echo "<td>" . $p->getId() . "</td>";
        echo "<td>" . $p->getNombre() . "</td>";
        echo "<td>" . $p->getApellido() . "</td>";
        echo "<td>" . $p->getCorreo() . "</td>";
        echo "</tr>";
    
    }
    echo "<tr><td colspan='9'>" . count($profesores) . " registros encontrados</td></tr>" */ ?>
                            </tbody>
                        </table>
                        <hr/ style="border: 1px solid">
                        <br>
                        <br>



                        <button id="registrar" type="submit" name="registrar" class="btn btn-dark">Registrar</button>
                        <a class="btn btn-dark " href="index.php?pid=<?php echo base64_encode('presentacion/sesionAdministrador.php') ?>" role="button">Inicio</a>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>

<script>
    $(document).ready(function() {
        $(".editor").summernote({});
    });

    $(document).on('click', '#btnTalla', function(e) {
        e.preventDefault();
        let idT = $("#idT option:selected")[0].value;
        //console.log(idT);
        let cantidadT = $("#cantidadT").val();
        //console.log(cantidadT);
        $.ajax({
            type: "POST",
            url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/representante/agregarTalla.php") ?>",
            data: {
                idT,
                cantidadT
            },
            success: function(response) {

                let tallas = JSON.parse(response);
                console.log(tallas);
                //console.log(response);

                let template = '';
                tallas.forEach(talla => {
                    template += `
                        <tr>
                            <td>${talla.id}</td>
                            <td>${talla.cantidad}</td>
                        </tr>
                    `
                });

                $("#tallas").html(template);

                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Talla Agregada',
                    showConfirmButton: false,
                    timer: 800
                });
            }
        });

    })

    $(document).on("click", "#registrar", function(e) {
        e.preventDefault();
        let idM = $("#idM option:selected")[0].value;
        let fecha_envio = $("#fechaEnvio").val();
        let fecha_entrega = $("#fechaEntrega").val();
        let observaciones = $($("#editor").summernote("code")).text();
        let idR = <?php echo $_SESSION['id']; ?>

        $.ajax({
            type: "POST",
            url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/representante/crearCorte.php") ?>",
            data: {
                idR,
                idM,
                fecha_envio,
                fecha_entrega,
                observaciones
            },
            success: function(response) {

                if (response) {
                    $("#mensaje").removeAttr("hidden");
                    $("#mensaje").removeClass();
                    $("#mensaje").addClass("alert alert-success");
                    $("#mensaje").html("Corte Registrado");
                    window.scrollTo(0, 0);
                    
                    $("#editor").summernote("code", "");
                    $("#cantidadT").val(" ");
                    $("#cantidadC").val(" ");
                }else{
                    $("#mensaje").removeAttr("hidden");
                    $("#mensaje").removeClass();
                    $("#mensaje").addClass("alert alert-danger");
                    $("#mensaje").html("Algo salio mal");
                    window.scrollTo(0, 0);
                }
            }
        });

    });
</script>