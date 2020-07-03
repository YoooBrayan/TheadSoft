<?php

include 'presentacion/representante/cabeceraRepresentante.php';

$_SESSION['almacen'] = "";

$_SESSION['cortes'] = array();
array_push($_SESSION['cortes'], 0);

$almacen = new Almacen();
$almacenes = $almacen->listaAlmacenes();

$representante->proveedor();

$modelos = new Modelo("", "", "", $representante->getProveedor());
$modelos = $modelos->consultarModelos();

?>


<div class="container mt-3 mb-4">
	<label class="text-white h5">Seleccione Almacen:</label>
	<select class="selectpicker" data-show-subtext="true" data-live-search="true" style="margin-left: 5px;" id="idA">

		<option value="0">Seleccione</option>
		<?php
		foreach ($almacenes as $a) {
			echo "<option value=" . $a->getId() . ">" . $a->getLugar() . "</option>";
		}
		?>

	</select>
	<a id="btnVenta" hidden class="btn btn-info" href="index.php?pid=<?php echo base64_encode("presentacion/representante/agregarVenta.php") ?>">Añadir Venta</a>
	<a class="btn btn-info" style="float: right" href="index.php?pid=<?php echo base64_encode("presentacion/representante/registrarAlmacen.php") ?>">Nuevo Almacen</a>
</div>


<div id="inventario" class="container" hidden>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div style="text-align: center;" class="card-header bg-dark text-white">Mercancia</div>
				<div class="card-body">
					<label class="text-dark h5 m-3">Seleccione Modelo:</label>
					<select class="selectpicker" data-show-subtext="true" data-live-search="true" style="margin-left: 5px;" id="idMA">

						<option value="">Seleccione</option>

					</select>
					<div class="mt-5">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th scope="col">Modelo</th>
									<th scope="col">Cantidad</th>
									<th scope="col">Servicios</th>
								</tr>
							</thead>
							<tbody id="mercancia">
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>


<div id="ventas" class="container mt-3" hidden>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div style="text-align: center;" class="card-header bg-dark text-white">Ventas</div>
				<div class="card-body">
					<label class="text-dark h5 m-3">Seleccione Fecha Inicial:</label>
					<input id="fechaInicio" onfocus="(this.type='date')" class="js-form-control" placeholder="Fecha Inicial" name="fechaVenta">
					<label class="text-dark h5 m-3">Seleccione Fecha Final:</label>
					<input id="fechaFinal" onfocus="(this.type='date')" class="js-form-control" placeholder="Fecha Final" name="fechaVenta">
					<div class="mt-5">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th scope="col">Venta</th>
									<th scope="col">Fecha</th>
									<th scope="col">Modelos</th>
									<th scope="col">Cantidad</th>
									<th scope="col">Valor</th>
									<th scope="col">Servicios</th>
								</tr>
							</thead>
							<tbody id="ventasT">
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<div id="importar" class="container mt-3" hidden>
	<div class="row">
		<div class="col-12">
			<div class="card d-flex">
				<div style="text-align: center;" class="card-header bg-dark text-white">Importar Modelos</div>
				<div class="card-body">
					<label class="text-dark h5 m-3">Seleccione Modelo:</label>
					<select class="selectpicker" data-show-subtext="true" data-live-search="true" style="margin-left: 5px;" id="idM">

						<option value="">Seleccione</option>
						<?php
						foreach ($modelos as $m) {
							echo "<option value=" . $m->getId() . ">" . $m->getNombre() . "</option>";
						}
						?>

					</select>
					<div class="mt-5">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th scope="col">Modelo</th>
									<th scope="col">Cantidad</th>
									<th scope="col">Servicios</th>
								</tr>
							</thead>
							<tbody id="importarM">
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br>

<div class="modal fade" id="modalCorte" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content" id="modalContent">
		</div>
	</div>
</div>

<div class="modal fade" id="modalModelosVenta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
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
	$("#idA").change(function() {

		$("#ventasT tr").remove();
		$("#importarM tr").remove();
		$("#mercancia tr").remove();
		$("#fechaInicio").val("");
		$("#fechaFinal").val("");

		$("#idMA").empty().append('<option selected="selected" value="0">Seleccione</option>');

		let almacen = $("#idA option:selected")[0].value;

		if (almacen != "0") {
			$("#btnVenta").removeAttr("hidden");
			$("#inventario").removeAttr("hidden");
			$("#importar").removeAttr("hidden");
			$("#ventas").removeAttr("hidden");

			$.ajax({
				type: "POST",
				url: "<?php echo "indexAjax.php?pid="  . base64_encode("presentacion/representante/mercanciaAlmacen.php") ?>",
				data: {
					almacen
				},
				success: function(response) {
					let mercancia = JSON.parse(response);
					let plantilla = '';
					mercancia.forEach(modelo => {
						$("#idMA").append(new Option(modelo.modelo, modelo.id));
					});

					$("#idMA").selectpicker("refresh");

					//$("#mercancia").html(plantilla);
				}
			});
		}

	});

	$("#idM").change(function() {

		let modelo = $("#idM option:selected")[0].value;
		window.scrollTo(0, 855);

		let url = "<?php echo "index.php?pid=" . base64_encode("presentacion/representante/importarModelo.php") ?>";

		$.ajax({
			type: "POST",
			url: "<?php echo "indexAjax.php?pid="  . base64_encode("presentacion/representante/modeloBodega.php") ?>",
			data: {
				modelo
			},
			success: function(response) {
				let modelo = JSON.parse(response);
				let plantilla = `<tr id='${modelo.id}'>
					<td>${modelo.modelo}</td>
					<td>${modelo.cantidad}</td>
					<td>
						<a id='importar' class='fas fa-eye' href='${url+"&idModelo="+modelo.id+"&modelo="+modelo.modelo}'  data-placement='left' title='Importar'></a>
					</td>
				</tr>`;

				$("#importarM").html(plantilla);
			}
		});

	});

	$("#idMA").change(function() {

		let modelo = $("#idMA option:selected")[0].value;
		//window.scrollTo(0, 855);


		$.ajax({
			type: "POST",
			url: "<?php echo "indexAjax.php?pid="  . base64_encode("presentacion/representante/mercanciaAlmacen.php") ?>",
			data: {
				modelo
			},
			success: function(response) {
				console.log(response);
				let modelo = JSON.parse(response);
				console.log(modelo);
				let plantilla = `
				<tr id='${modelo.id}'>
					<td>${modelo.modelo}</td>
					<td>${modelo.cantidad}</td>
					<td>
						<a class='fas fa-eye' href='modalModeloAlmacen.php?idModelo=${modelo.id}' data-toggle='modal' data-target='#modalCorte' data-placement='left' title='Ver Detalles'></a>
					</td>
				</tr>`;

				$("#mercancia").html(plantilla);
			}
		});

	});

	$("table").on("click", "#importarM #importar", function(e) {

		let elemento = $(this)[0].parentElement.parentElement;
		let cantidad = elemento.children[1].innerHTML;

		if (cantidad == "0") {
			e.preventDefault();
			Swal.fire({
				position: 'center',
				title: 'Modelo Agotado',
				icon: 'warning',
				timer: 1000
			})
		}

		$("#idA").val('0');
		$("#idM").val('0');
	});

	$("#btnVenta").click(function() {
		$("#idA").val('0');
	});

	$("#fechaInicio").change(function() {

		let fechaInicio = document.getElementById("fechaInicio").value;
		let fechaFinal = document.getElementById("fechaFinal").value;

		if(fechaFinal==""){
			fechaFinal = document.getElementById("fechaInicio").value;
		}

		let plantilla = '';

		$.ajax({
			type: "POST",
			url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/representante/ventas.php") ?>",
			data: {
				fechaInicio,
				fechaFinal
			},
			success: function(response) {
				let datos = JSON.parse(response);
				console.log(datos);

				datos.forEach(venta => {
					plantilla += `
						<tr id='${venta.id}'>
							<td>${venta.id}</td>
							<td>${venta.fecha}</td>
							<td>
								<a class='fas fa-eye' data-toggle='tooltip' class='tooltipLink' data-placement='left' title='`;

					venta.modelo.forEach(modelos => {
						plantilla += modelos.nombre + `\n`
					})

					plantilla += `'></a>
							</td>
							<td>${venta.cantidad}</td>
							<td>
							<a class='fas fa-eye' href='modalModelosVenta.php?idVenta=${venta.id}' data-toggle='modal' data-target='#modalModelosVenta' data-placement='left' title='Ver Detalles'></a>
							</td>
							<td>${venta.valor}</td>
						</tr>
						`

				});
				//<tr><td colspan='6'>${venta.total}</td></tr>
				plantilla += "<tr><th scope='row'>Total</th><td colspan='4' ></td><td>" + datos[0].total + "</td></tr>";

				$("#ventasT").html(plantilla);
			}
		});

	});

	$("#fechaFinal").change(function() {

		let fechaInicio = document.getElementById("fechaInicio").value;
		//let fechaFinal = document.getElementById("fechaFinal").value;

		if (fechaInicio == "") {
			Swal.fire({
				position: 'center',
				icon: 'danger',
				title: 'Seleccione Fecha de Inicio',
				timer: 1999
			});
		} else {
			//let fechaInicio = document.getElementById("fechaInicio").value;
			let fechaFinal = document.getElementById("fechaFinal").value;

			console.log(fechaInicio);
			console.log(fechaFinal);

			//let dateControl = document.querySelector('input[type="date"]');
			//let fecha = dateControl.value;
			let plantilla = '';

			$.ajax({
				type: "POST",
				url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/representante/ventas.php") ?>",
				data: {
					fechaInicio,
					fechaFinal
				},
				success: function(response) {
					console.log(response);
					let datos = JSON.parse(response);
					console.log(datos);

					datos.forEach(venta => {
						plantilla += `
				<tr id='${venta.id}'>
					<td>${venta.id}</td>
					<td>${venta.fecha}</td>
					<td>
						<a class='fas fa-eye' data-toggle='tooltip' class='tooltipLink' data-placement='left' title='`;

						venta.modelo.forEach(modelos => {
							plantilla += modelos.nombre + `\n`
						})

						plantilla += `'></a>
					</td>
					<td>${venta.cantidad}</td>
					<td>
					<a class='fas fa-eye' href='modalModelosVenta.php?idVenta=${venta.id}' data-toggle='modal' data-target='#modalModelosVenta' data-placement='left' title='Ver Detalles'></a>
					</td>
					<td>${venta.valor}</td>
				</tr>
				`

					});
					//<tr><td colspan='6'>${venta.total}</td></tr>
					plantilla += "<tr><th scope='row'>Total</th><td colspan='4' ></td><td>" + datos[0].total + "</td></tr>";

					$("#ventasT").html(plantilla);
				}
			});
		}

	});
</script>