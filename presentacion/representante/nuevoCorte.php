<?php

include 'presentacion/representante/cabeceraRepresentante.php';

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
                <div class="card-header bg-primary text-white bg-dark" style="text-align: center;">Registro</div>
                <div class="card-body">
                    <?php /*
                    if ($error == 0) {
                        ?>
                        <div class="alert alert-success" role="alert">
                            Registrado exitosamente.
                        </div>
                    <?php } else if ($error == 1) { ?>
                        <div class="alert alert-danger" role="alert">
                            El correo <?php echo $correo; ?> ya existe
                        </div>
                    <?php } */ ?>
                    <form action=<?php echo "index.php?pid=" . base64_encode("presentacion/representante/registrarCorte.php") ?> method="post">
                        <hr/ style="border: 1px solid">
                        <h6>Registro del nuevo corte</h6>
                        <div class="form-group">
                            <label>Seleccione Modelo <?php // echo " " . $titulo; 
                                                        ?>:</label>
                            <select class="selectpicker" data-show-subtext="true" data-live-search="true" style="margin-left: 5px;" id="idS">
                                <?php
                                foreach ($modelos as $m) {
                                ?>
                                    <option value="<?php echo $m->getId() ?>"><?php echo $m->getNombre();  ?></option>
                                <?php }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input onfocus="(this.type='date')" class="js-form-control" placeholder="Fecha de Envio" name="fechaInicio">
                        </div>
                        <div class="form-group">
                            <input onfocus="(this.type='date')" class="js-form-control" placeholder="Fecha de Entrega" name="fechaInicio">
                        </div>
                        <div class="form-group">
                            <label style="color: gray;" id="label3"> Observaciones </label>
                            <textarea class="editor" name="plantamiento" id="editor"></textarea>
                        </div>

                        <hr/ style="border: 1px solid">

                        <h6>Seleccionar Tallas y Colores</h6>

                        <label>Seleccione Tallas <?php // echo " " . $titulo; 
                                                    ?>:</label>
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true" style="margin-left: 5px;" id="idS">
                            <?php
                            foreach ($tallas as $t) {
                            ?>
                                <option value="<?php echo $t->getId() ?>"><?php echo $t->getId();  ?></option>
                            <?php }
                            ?>
                        </select>
                        <div class="form-gruop mt-2">
                            <label>Cantidad</label>
                            <input type="number" style="width: 61px">
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
                            <input type="number" style="width: 61px">
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



                        <button type="submit" name="registrar" class="btn btn-dark">Registrar</button>
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
</script>