<?php

include 'presentacion/representante/cabeceraRepresentante.php';

$_SESSION['tallas'] = array();
$_SESSION['colores'] = array();

$modelo = new Modelo($_GET['idModelo']);

$talla = new Talla();
$tallas = $modelo->tallasModeloBodega();
$color = new Color();
$colores = $color->consultarColores();

$tallass = array();

/*foreach ($tallas as $t) {
    array_push($tallass, $t->getId());
}*/

?>
<br>
<div class="container">
    <div class="row" style="width: 100%; padding: 0px;">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card">
                <div id="mensaje" class='alert alert-danger' role='alert' hidden></div>
                <div class="card-header bg-primary text-white bg-dark" style="text-align: center;">Importar Modelo</div>
                <div class="card-body">
                    <form action=<?php echo "index.php?pid=" . base64_encode("presentacion/representante/registrarCorte.php") ?> method="post">
                        <hr/ style="border: 1px solid">
                        <h6>Modelo: <?php echo $_GET['modelo']; ?></h6>

                        <hr/ style="border: 1px solid">

                        <h6>Seleccionar Tallas y Colores</h6>

                        <label>Seleccione Tallas</label>
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true" style="margin-left: 5px;" id="idT">
                            <?php
                            foreach ($tallas as $t) {
                            ?>
                                <option value="<?php echo $t; ?>"><?php echo $t;  ?></option>
                            <?php }
                            ?>
                        </select>
                        <div class="form-gruop mt-2">
                            <label>Cantidad</label>
                            <input id="cantidadT" type="number" min="0" oninput="validity.valid||(value='');" style="width: 61px">
                            <label id="cantidadD"></label>
                            <label id="labelTalla" class="text-danger" style="display: none">Cantidad Invalida</label>
                        </div>

                        <button id="btnTalla" type="submit" name="registrar" class="btn btn-dark mt-2 mb-2">Agregar</button>
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

                        <hr/ style="border: 1px solid">

                        <hr/ style="border: 1px solid">
                        <br>
                        <br>



                        <button id="importar" type="submit" name="registrar" class="btn btn-dark">Importar</button>
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
        let modelo = "<?php echo $_GET['idModelo']; ?>";
        let talla = $("#idT option:selected")[0].value;
        let cantidadD = 1;

        $.ajax({
            type: "POST",
            url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/representante/validarBodega.php") ?>",
            data: {
                modelo,
                talla,
                cantidadD
            },
            success: function(response) {
                let cantidad = parseInt(response);
                //$("#cantidadT").val(cantidad);
                $("#cantidadD").html(cantidad);

            }
        });
    })

    $("#idT").change(function() {

        let modelo = "<?php echo $_GET['idModelo']; ?>";
        let talla = $("#idT option:selected")[0].value;
        let cantidadD = 1;

        $.ajax({
            type: "POST",
            url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/representante/validarBodega.php") ?>",
            data: {
                modelo,
                talla,
                cantidadD
            },
            success: function(response) {
                let cantidad = parseInt(response);
                //$("#cantidadT").val(cantidad);
                $("#cantidadD").html(cantidad);

            }
        });
    })

    $("#cantidadT").keyup(function(e) {

        let talla = $("#idT option:selected")[0].value;
        let modelo = "<?php echo $_GET['idModelo']; ?>";
        let cantidadT = $("#cantidadT").val();

        if (cantidadT != "" && talla != "0") {
            $.ajax({
                type: "POST",
                url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/representante/validarBodega.php") ?>",
                data: {
                    modelo,
                    cantidadT,
                    talla
                },
                success: function(response) {
                    
                    if (response == 1) {
                        $("#btnTalla").prop("disabled", false);
                        $("#labelTalla").attr("style", "display: none")
                    } else {
                        $("#labelTalla").attr("style", "display: line-block")
                        $("#btnTalla").prop("disabled", true);
                    }

                }
            });
        }

    });

    $(document).on('click', '#btnTalla', function(e) {
        e.preventDefault();
        let modelo = "<?php echo $_GET['idModelo']; ?>";
        let idT = $("#idT option:selected")[0].value;
        let cantidadT = $("#cantidadT").val();

        if (cantidadT > 0) {
            var itemSelectorOption = $('#idT option:selected');
            itemSelectorOption.remove();
            $('#idT').selectpicker('refresh');
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
                                <a class='fas fa-pencil-ruler colores' href='modalColores.php?idTalla=${talla.id}&cantidad=${talla.cantidad}&modelo=${modelo}' data-placement='left' title='Agregar Tallas' data-toggle='modal' data-target='#modalColores'> </a>
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
                $('#idT').selectpicker('refresh');
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

    });

    $(document).on("click", "#importar", function(e) {
        e.preventDefault();
        let idM = "<?php echo $_GET['idModelo'] ?>"
        let idAlmacen = "<?php echo $_GET['almacen']; ?>";

        $.ajax({
            type: "POST",
            url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/representante/distribuirModelo.php") ?>",
            data: {
                idAlmacen,
                idM
            },
            success: function(response) {
                if (response) {
                    window.history.back();
                }
            }
        });

    });
</script>