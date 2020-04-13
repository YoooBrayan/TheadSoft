<?php

require_once 'logica/Color.php';

$color = new Color();
$colores = $color->consultarColores();

?>
<div class="modal-header">
	<h5 class="modal-title">Agregar Colores <?php echo " en la talla: "  . $_GET['idTalla']; ?></h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<div class="modal-body">
	<label>Seleccione Colores:</label>

	<select class="selectpicker" data-show-subtext="true" data-live-search="true" style="margin-left: 5px;" id="idCM">
		<?php
		foreach ($colores as $c) {
		?>
			<option value="<?php echo $c->getId() ?>"><?php echo $c->getNombre();  ?></option>
		<?php }
		?>
	</select>

	<div class="form-gruop mt-2">
		<label>Cantidad</label>
		<input id="cantidadCM" type="number" style="width: 61px">
	</div>
	<button id="btnColorM" type="submit" name="registrar" class="btn btn-dark mt-2 mb-2">Agregar</button>
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th scope="col">Color</th>
				<th scope="col">Cantidad</th>
				<th scope="col">Servicios</th>
			</tr>
		</thead>
		<tbody id="coloresM">
		</tbody>
</div>

<script type="text/javascript">

	var tallaId = "<?php echo $_GET['idTalla']; ?>";

	$.ajax({
		type: "POST",
		url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/representante/agregarColor.php") ?>",
		data: {
			tallaId
		},
		success: function(response) {
			let colores = JSON.parse(response);
			let template = '';
			colores.forEach(color => {
				template += `
                        <tr id='${color.id}'>
                            <td>${color.nombre}</td>
                            <td>${color.cantidad}</td>
                            <td> 
                            <a class='fas fa-times-circle eliminar' data-toggle='tooltip' data-placement='left' title='Eliminar'> </a>
                            </td>
                            
                        </tr>
                    `
			});

			$("#coloresM").html(template);
		}
	});

	$(document).ready(function() {
		$('.selectpicker').selectpicker({
			style: 'btn-default'
		});

	});

	$("#btnColorM").click(function(e) {
		e.preventDefault();
		let idCM = $("#idCM option:selected")[0].value;
		let colorM = $("#idCM option:selected")[0].label;
		let idTalla = "<?php echo $_GET['idTalla']; ?>";

		var itemSelectorOption = $('#idCM option:selected');
        itemSelectorOption.remove();
        $('#idCM').selectpicker('refresh');
		let cantidadCM = $("#cantidadCM").val();
		$.ajax({
			type: "POST",
			url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/representante/agregarColor.php") ?>",
			data: {
				idCM,
				colorM,
				cantidadCM,
				idTalla
			},
			success: function(response) {

				let colores = JSON.parse(response);
				let template = '';
				colores.forEach(color => {
					template += `
                        <tr id='${color.id}'>
                            <td>${color.nombre}</td>
                            <td>${color.cantidad}</td>
                            <td> 
                            <a class='fas fa-times-circle eliminar' data-toggle='tooltip' data-placement='left' title='Eliminar'> </a>
                            </td>
                            
                        </tr>
                    `
				});

				$("#coloresM").html(template);

				Swal.fire({
					position: 'top-end',
					icon: 'success',
					title: 'Color Agregada',
					showConfirmButton: false,
					timer: 800
				});
			}
		});
	});

	/* Con este no funciona 
	$(document).on('click', '#btnColorM', function(e) {
		e.preventDefault();
		let idCM = $("#idCM option:selected")[0].value;
		let colorM = $("#idCM option:selected")[0].label;
		let idTalla = "<?php // echo $_GET['idTalla']; 
						?>";
		console.log(idTalla);
		console.log(idCM);
		console.log(colorM);
		let cantidadCM = $("#cantidadCM").val();
		console.log(cantidadCM);
		/*
		$.ajax({
			type: "POST",
			url: "<?php // echo "indexAjax.php?pid=" . base64_encode("presentacion/representante/agregarColor.php") 
					?>",
			data: {
				idCM,
				colorM,
				cantidadCM,
				idTalla
			},
			success: function(response) {

				console.log(response);
				let colores = JSON.parse(response);
				console.log(colores);
				//console.log(response);

				let template = '';
				colores.forEach(color => {
					template += `
                        <tr id='${color.id}'>
                            <td>${color.nombre}</td>
                            <td>${color.cantidad}</td>
                            <td> 
                            <a class='fas fa-times-circle eliminar' data-toggle='tooltip' data-placement='left' title='Eliminar'> </a>
                            </td>
                            
                        </tr>
                    `
				});

				$("#coloresM").html(template);

				Swal.fire({
					position: 'top-end',
					icon: 'success',
					title: 'Color Agregada',
					showConfirmButton: false,
					timer: 800
				});
			}
		});
		
	});*/

	$("table").on("click", "#coloresM .eliminar", function(event) {
		event.preventDefault();
		var elemento = $(this)[0].parentElement.parentElement;
		var colorN = elemento.children[0].innerHTML;
		var color = $(elemento).attr('id');
		let talla = "<?php  echo $_GET['idTalla']; ?>";
		$.ajax({
			type: "POST",
			url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/representante/eliminarColor.php") ?>",
			data: {
				color,
				talla
			},
			success: function(response) {

				$("#" + color).remove();
				$('#idCM').append(`<option value="${color}">${colorN}</option>`);
                $('#idCM').selectpicker('refresh');

			}
		});
	});
</script>