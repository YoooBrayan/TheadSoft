<?php

include 'presentacion/representante/cabeceraRepresentante.php';

$_SESSION['tallas'] = array();
$_SESSION['colores'] = array();

$representante->proveedor();

$modelos = new Modelo("", "", "", $representante->getProveedor());
$modelos = $modelos->consultarModelos();
$talla = new Talla();
$tallas = $talla->consultarTallas();
$color = new Color();
$colores = $color->consultarColores();

$satelite = new Satelite();
$satelites = $satelite->listaSatelites();

$tallass = array();

foreach ($tallas as $t) {
    array_push($tallass, $t->getId());
}

?>
<br>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 mx-md-auto">
            <div class="card">
                <div id="mensaje" class='alert alert-danger' role='alert' hidden></div>
                <div class="card-header bg-primary text-white bg-dark" style="text-align: center;">Registro</div>
                <div class="card-body">
                    <form action=<?php echo "index.php?pid=" . base64_encode("presentacion/representante/registrarCorte.php") ?> method="post">
                        <hr/ style="border: 1px solid">
                        <h6>Nuevo corte</h6>
                        <div class="form-group row">
                            <label class="col-form-label col-12 col-md-4">Seleccione Satelite</label>
                            <select class="ml-2 form-control col-7 col-md-4 ml-md-0" id="idS">
                                <option value="0">Seleccione</option>
                                <?php
                                foreach ($satelites as $s) {
                                ?>
                                    <option value="<?php echo $s->getId() ?>"><?php echo $s->getNombre();  ?></option>
                                <?php }
                                ?>
                            </select>
                            <label class="display-6 text-info col-md-4 col-4 col-form-label"><u>Opcional</u></label>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-12 col-md-4">Seleccione Modelo</label>
                            <select class="ml-2 form-control col-8 col-md-4 ml-md-0" id="idM">
                                <?php
                                foreach ($modelos as $m) {
                                ?>
                                    <option value="<?php echo $m->getId() ?>"><?php echo $m->getNombre();  ?></option>
                                <?php }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input id="fechaEnvio" onfocus="(this.type='date')" class="form-control w-75" placeholder="Fecha de Envio" name="fechaEnvio" required="required" title="Fecha de Envio">
                            <label class="text-danger" hidden>Seleccione Fecha</label>
                        </div>
                        <div class="form-group">
                            <input id="fechaEntrega" onfocus="(this.type='date')" class="form-control w-75" placeholder="Fecha de Entrega" name="fechaEntrega" required="required" title="Fecha de Entrega">
                            <label class="text-danger" hidden>Seleccione Fecha</label>
                        </div>
                        <div class="form-group">
                            <label style="color: gray;" id="label3"> Observaciones </label>
                            <textarea class="editor" name="plantamiento" id="editor"></textarea>
                        </div>

                        <hr/ style="border: 1px solid">

                        <h6>Seleccionar Tallas y Colores</h6>
                        <div class="form-group mt-2 mb-0 row">
                            <label class="form-group-label ml-0 col-12 col-md-4">Seleccione Tallas</label>
                            <select class="form-control col-md-3 col-10 ml-2 mr-1" id="idT">
                                <?php
                                foreach ($tallas as $t) {
                                ?>
                                    <option value="<?php echo $t->getId() ?>"><?php echo $t->getId();  ?></option>
                                <?php }
                                ?>
                            </select>
                        </div>
                        <div class="form-group row mt-1">
                            <label class="form-group-label col-12 col-md-4">Cantidad</label>
                            <input class="col-md-3 col-10 ml-2 mr-1" id="cantidadT" type="number" min="0" oninput="validity.valid||(value='');" style="width: 61px">
                        </div>

                        <button id="btnTalla" type="submit" name="registrar" class="btn btn-dark mt-2 mb-2">Agregar</button>
                        <div class="table-wrapper-scroll-y my-custom-scrollbar h-25">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Talla</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Servicios</th>
                                    </tr>
                                </thead>
                                <tbody id="tallas">
                                </tbody>
                            </table>
                        </div>

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

<div class="modal fade" id="modalColores" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" id="modalContent">
        </div>
    </div>
</div>

<script>
    $('body').on('show.bs.modal', '.modal', function(e) {
        var link = $(e.relatedTarget);
        $(this).find(".modal-content").load(link.attr("href"));
    });
</script>


<script>
    $(document).ready(function() {
        $(".editor").summernote({});
        let tallas = "<?php echo count($_SESSION['tallas']); ?>";
    });

    $(document).on('click', '#btnTalla', function(e) {
        e.preventDefault();
        let idT = $("#idT option:selected")[0].value;
        let cantidadT = $("#cantidadT").val();

        if (cantidadT > 0) {
            var itemSelectorOption = $('#idT option:selected');
            itemSelectorOption.remove();
            //$('#idT').form-control('refresh');
            let urls = "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/representante/modalColores.php") ?>";

            $.ajax({
                type: "POST",
                url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/representante/agregarTalla.php") ?>",
                data: {
                    idT,
                    cantidadT
                },
                success: function(response) {

                    let tallas = JSON.parse(response);

                    let template = '';
                    tallas.forEach(talla => {
                        template += `
                        <tr id='${talla.id}'>
                            <td>${talla.id}</td>
                            <td>${talla.cantidad}</td>
                            <td> 
                            <a class='fas fa-times-circle eliminar' data-toggle='tooltip' 
                            data-placement='left' title='Eliminar'> </a>
                            <a class='fas fa-pencil-ruler colores' href='modalColores.php?idTalla=${talla.id}&cantidad=${talla.cantidad}' data-placement='left' title='Agregar Tallas' data-toggle='modal' data-target='#modalColores'> </a>
                            </td>
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
        } else {
            Swal.fire({
                position: 'top-end',
                icon: 'warning',
                title: 'Digite Cantidad',
                showConfirmButton: false,
                timer: 600
            });
        }

        let tallas = "<?php echo count($_SESSION['tallas']); ?>";
        var options = $("#idT option").length;
        if (options == 0) {
            $("#btnTalla").prop("disabled", true);
        }
    });

    $(document).on("click", "#registrar", function(e) {

        e.preventDefault();
        let idM = $("#idM option:selected")[0].value;
        let idS = $("#idS option:selected")[0].value;
        let fecha_envio = $("#fechaEnvio").val();
        let fecha_entrega = $("#fechaEntrega").val();
        let observaciones = $($("#editor").summernote("code")).text();
        let idR = <?php echo $_SESSION['id']; ?>

        if (fecha_envio != "" && fecha_entrega != "") {
            $.ajax({
                type: "POST",
                url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/representante/crearCorte.php") ?>",
                data: {
                    idR,
                    idM,
                    idS,
                    fecha_envio,
                    fecha_entrega,
                    observaciones
                },
                success: function(response) {
                    console.log("Aqui: " + response);
                    if (response) {
                        $(".text-danger").attr("style", "display: none");
                        $("#mensaje").removeAttr("hidden");
                        $("#mensaje").removeClass();
                        $("#mensaje").addClass("alert alert-success");
                        $("#mensaje").html("Corte Registrado");
                        $("#tallas tr").remove();

                        $("#idT option").remove();

                        const tallass = <?php echo json_encode($tallass); ?>;
                        tallass.forEach(
                            talla => {
                                $('#idT').append(`<option value="${talla}">${talla}</option>`)
                            }
                        );

                        //$('#idT').form-control('refresh');

                        window.scrollTo(0, 0);

                        $("#editor").summernote("code", "");
                        $("#cantidadT").val(" ");
                        $("#cantidadC").val(" ");
                    } else {
                        $("#mensaje").removeAttr("hidden");
                        $("#mensaje").removeClass();
                        $("#mensaje").addClass("alert alert-danger");
                        $("#mensaje").html("Algo salio mal");
                        window.scrollTo(0, 0);
                    }
                }
            });
        } else {

            $(".text-danger").removeAttr("hidden");
            var top = document.getElementById("fechaEnvio").offsetTop;
            window.scrollTo(0, top);
        }

    });

    $("table").on("click", "#tallas .eliminar", function(event) {
        event.preventDefault();
        var elemento = $(this)[0].parentElement.parentElement;
        var talla = $(elemento).attr('id');
        $.ajax({
            type: "POST",
            url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/representante/eliminarTalla.php") ?>",
            data: {
                talla
            },
            success: function(response) {

                $("#" + talla).remove();

                $('#idT').append(`<option value="${talla}">${talla}</option>`);
                //$('#idT').form-control('refresh');
                /*let tallas = JSON.parse(response);

                let template = '';
                tallas.forEach(talla => {
                    template += `
                        <tr id='${talla.id}'>
                            <td>${talla.id}</td>
                            <td>${talla.cantidad}</td>
                            <td> 
                            <a class='fas fa-times-circle eliminar' href='index.php?pid=" . base64_encode("presentacion/paciente/actualizarPaciente.php") . "&idPaciente=" . $p->getId() . "' data-toggle='tooltip' data-placement='left' title='Eliminar'> </a>
                            <a class='fas fa-pencil-ruler' href='index.php?pid=" . base64_encode("presentacion/paciente/actualizarPaciente.php") . "&idPaciente=" . $p->getId() . "' data-toggle='tooltip' data-placement='left' title='Actualizar'> </a>
                            </td>
                            
                        </tr>
                    `
                });

                $("#tallas").html(template);*/
            }
        });

        var options = $("#idT option").length;
        if (options + 1 > 0) {
            $("#btnTalla").prop("disabled", false);
        }

    })

    $(document).on('hide.bs.modal', '#modalColores', function() {

        $.ajax({
            type: "POST",
            url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/representante/agregarTalla.php") ?>",
            data: {
                id: true
            },
            success: function(response) {
                if (response > 1) {
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: 'btn btn-success',
                            cancelButton: 'btn btn-danger'
                        },
                        buttonsStyling: false
                    })

                    swalWithBootstrapButtons.fire({
                        title: 'Desea agregar estos mismos colores a las demas tallas?',
                        icon: 'question',
                        showCancelButton: true,
                        cancelButtonText: ' No ',
                        confirmButtonText: '    Si ',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.value) {

                            let colores = "";

                            $.ajax({
                                type: "POST",
                                url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/representante/agregarColores.php") ?>",
                                data: {
                                    colores
                                }
                            });

                            swalWithBootstrapButtons.fire(
                                'Colores agregados!',
                            )
                        } else if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.cancel
                        ) {

                        }
                    });
                    //Do stuff here
                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Colores agregados',
                        showConfirmButton: false,
                        timer: 800
                    });
                }
            }
        });

    });
</script>