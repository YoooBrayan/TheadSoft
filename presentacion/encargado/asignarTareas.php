<?php

include 'presentacion/encargado/cabeceraEncargado.php';

$corte = new Corte($_GET['idCorte']);
$corte->consultarCorte();
$corte->consultarTareas();
$operario = new Operario();
$operarios = $operario->consultarTodos($_SESSION['id']['satelite']);

?>

<div class="container mt-4">
    <div class="row">
        <div class="col-12 col-md-6 mx-md-auto">
            <div class="card">
                <div class="card-header bg-primary text-white bg-dark" style="text-align: center;">Asignar Tareas <?php echo "<br>Modelo: " . $corte->getModelo()->getNombre(); ?></div>
                <div class="card-body">

                    <div class="form-group">

                        <label for="exampleFormControlSelect1">Seleccione Operario</label>
                        <select id="idO" class="form-control" id="exampleFormControlSelect1">
                            <?php
                            foreach ($operarios as $o) {
                            ?>
                                <option value="<?php echo $o->getId()
                                                ?>"><?php echo $o->getNombre();
                                                    ?></option>
                            <?php }
                            ?>
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Seleccione Tarea</label>
                        <select id="idT" class="form-control" id="exampleFormControlSelect1">
                            <?php
                            foreach ($corte->getTarea() as $t) {
                            ?>
                                <option value="<?php echo $t->getId()
                                                ?>"><?php echo $t->getOperacion()->getDescripcion();
                                                    ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                    <div class="form-gruop mt-2">
                        <label>Cantidad</label>
                        <input value="<?php echo $corte->getCantidad(); ?>" id="cantidad" type="number" min="0" oninput="validity.valid||(value='');" style="width: 61px">
                    </div>

                    <button id="btnAsignar" type="submit" name="registrar" class="btn btn-dark mt-2 mb-2">Agregar</button>

                    <div class="table-wrapper-scroll-y my-custom-scrollbar h-25">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Tarea</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Valor</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Servicios</th>
                                </tr>
                            </thead>
                            <tbody id="tareas">
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>


        </div>
    </div>
</div>
<script>
    $(document).on("click", "#btnAsignar", function(e) {
        e.preventDefault();

        let idOperario = $("#idO option:selected")[0].value;
        let idTarea = $("#idT option:selected")[0].value;
        let cantidad = $("#cantidad").val();
        let cantidadR = "<?php echo $corte->getCantidad(); ?>";
        let idCorte = "<?php echo $_GET['idCorte']; ?>";

        if (cantidad > 0) {
            if (cantidad == cantidadR) {
                var itemSelectorOption = $('#idT option:selected');
                itemSelectorOption.remove();
                //$('#idT').selectpicker('refresh');
            }

            $.ajax({
                type: "POST",
                url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/encargado/asignarTarea.php") ?>",
                data: {
                    idOperario,
                    idTarea,
                    cantidad,
                    idCorte
                },
                success: function(response) {

                    let tareas = JSON.parse(response);

                    let template = '';
                    tareas.forEach(tarea => {
                        template += `
                        <tr id='${tarea.id}'>
                            <td>${tarea.tarea}</td>
                            <td>${tarea.cantidad}</td>
                            <td>${tarea.valor}</td>
                            <td>${tarea.total}</td>
                            <td> 
                            <a class='fas fa-times-circle eliminar' data-toggle='tooltip' 
                            data-placement='left' title='Eliminar'> </a>
                            </td>
                        </tr>
                    `
                    });

                    $("#tareas").html(template);

                    if (tareas[0].respuesta == 'Registro Exitoso...') {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: tareas[0].respuesta,
                            showConfirmButton: false,
                            timer: 1000
                        });
                    } else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'warning',
                            title: tareas[0].respuesta,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
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
        var options = $("#idT option").length;
        if (options == 0) {
            $("#btnAsignar").prop("disabled", true);
        }
    })

    $("#idO").change(function(e) {
        let idOperario = $("#idO option:selected")[0].value;
        let idCorte = "<?php echo $_GET['idCorte']; ?>";

        $.ajax({
            type: "POST",
            url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/encargado/consultarTareas.php") ?>",
            data: {
                idOperario,
                idCorte
            },
            success: function(response) {

                let tareas = JSON.parse(response);

                let template = '';
                tareas.forEach(tarea => {
                    template += `
                        <tr id='${tarea.id}'>
                            <td>${tarea.tarea}</td>
                            <td>${tarea.cantidad}</td>
                            <td>${tarea.valor}</td>
                            <td>${tarea.total}</td>
                            <td> 
                            <a class='fas fa-times-circle eliminar' data-toggle='tooltip' 
                            data-placement='left' title='Eliminar'> </a>
                            </td>
                        </tr>
                    `
                });

                $("#tareas").html(template);
            }
        });
    });

    $("table").on("click", "#tareas .eliminar", function(event) {
        event.preventDefault();
        var elemento = $(this)[0].parentElement.parentElement;
        var tarea = $(elemento).attr('id');
        var tareaN = elemento.children[0].innerHTML;
        $.ajax({
            type: "POST",
            url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/encargado/eliminarTarea.php") ?>",
            data: {
                tarea
            },
            success: function(response) {

                $("#" + tarea).remove();

                $('#idT').append(`<option value="${response}">${tareaN}</option>`);
                //$('#idT').selectpicker('refresh');
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
</script>