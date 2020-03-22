<?php

include 'presentacion/representante/cabeceraRepresentante.php'

?>

<br>
<div class="container">
    <div class="row" style="width: 100%; padding: 0px;">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card">
                <div class="card-header bg-primary text-white bg-dark" style="text-align: center;">Nuevo Corte</div>
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
                    <?php }  */ ?>
                    <form action=<?php // echo "index.php?pid=" . base64_encode("presentacion/representante/registrarCorte.php") . "&tipo=".$tipo." "?> method="post">
                        <div class="form-group">
                        <label style="font-size: 1.2em;">Seleccione <?php // echo " " . $titulo; ?>:</label>
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true" style="margin-left: 5px;" id="idS">
                        <option value="asdasd" >hsdf</option>
                        <option value="asdasd" >hsdf</option>
                            <?php /*
                            if ($_GET['tipo'] == "tutor") {
                                foreach ($tutores as $t) {
                            ?>
                                    <option value="<?php echo $t->getId() ?>"><?php echo $t->getNombre();  ?></option>
                                <?php }
                            } else if ($_GET['tipo'] == "jurado") {
                                foreach ($jurados as $j) {
                                ?>
                                    <option value="<?php echo $j->getId() ?>"><?php echo $j->getNombre();  ?></option>
                            <?php }
                            } */?>
                        </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="apellido" class="form-control" placeholder="Apellido" required="required" value="<?php echo $apellido; ?>">
                        </div>
                        <div class="form-group">
                            <input type="email" name="correo" class="form-control" placeholder="Correo" required="required" value="<?php echo $correo; ?>">
                        </div>
                        <div class="form-group">
                            <input type="password" name="clave" class="form-control" placeholder="Clave" required="required">
                        </div>
                        <button type="submit" name="registrar" class="btn btn-dark">Registrar</button>
                        <a class="btn btn-dark " href="index.php?pid=<?php echo base64_encode('presentacion/sesionAdministrador.php') ?>" role="button">Inicio</a>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>

