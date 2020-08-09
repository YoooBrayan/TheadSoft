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
<div class="container mt-2 mb-4">
	<div class="row">
		<div class="col-12 col-md-9 mb-3 row">
			<label class="text-white h5 col-12 col-md-3">Seleccione Almacen:</label>
			<select class="form-control ml-1 col-12 col-md-4" id="idA">

				<option value="0">Seleccione</option>
				<?php
				foreach ($almacenes as $a) {
					echo "<option value=" . $a->getId() . ">" . $a->getLugar() . "</option>";
				}
				?>

			</select>
		</div>
		<div class="col-12 col-md-3">
			<a id="btnVenta" hidden class="btn btn-success ml-0" href="index.php?pid=<?php echo base64_encode("presentacion/representante/agregarVenta.php") ?>">Añadir Venta</a>
			<a class="btn btn-info" href="index.php?pid=<?php echo base64_encode("presentacion/representante/registrarAlmacen.php") ?>">Nuevo Almacen</a>
		</div>

	</div>
</div>

<div id="inventario" class="container" hidden>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-dark text-white text-center">Mercancia</div>
				<div class="card-body">
					<div class="form-group row">
						<label class="form-control-label p-2 text-dark h5 ml-1 col-6 col-md-3">Seleccione Modelo:</label>
						<select class="form-control col-5 col-md-3" id="idMA">

							<option value="">Seleccione</option>

						</select>
					</div>
					<div class="mt-3">
						<div class="table-wrapper-scroll-y my-custom-scrollbar h-25">
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
</div>


<div id="ventas" class="container mt-3" hidden>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-dark text-white text-center">Ventas</div>
				<div class="card-body">
					<div class="row">
						<label class="form-control-label text-dark h5 p-2 col-6 col-md-3">Seleccione Fecha Inicial:</label>
						<input id="fechaInicio" onfocus="(this.type='date')" class="form-control col-6 col-md-2 mb-1" placeholder="Fecha Inicial" name="fechaVenta">
						<label class="form-control-label text-dark h5 p-2 col-6 col-md-3">Seleccione Fecha Final:</label>
						<input id="fechaFinal" onfocus="(this.type='date')" class="form-control col-6 col-md-2" placeholder="Fecha Final" name="fechaVenta">
					</div>
					<div class="mt-3">
						<div class="table-wrapper-scroll-y my-custom-scrollbar h-25">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th scope="col">Venta</th>
										<th scope="col">Fecha</th>
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
</div>

<div id="importar" class="container mt-3" hidden>
	<div class="row">
		<div class="col-12">
			<div class="card d-flex">
				<div class="card-header bg-dark text-white text-center">Importar Modelos</div>
				<div class="card-body">
					<div class="form-group row">
						<label class="form-control-label p-2 text-dark h5 ml-1 col-6 col-md-3">Seleccione Modelo:</label>
						<select class="form-control col-5 col-md-3" id="idM">
							<option value="">Seleccione</option>
							<?php
							foreach ($modelos as $m) {
								echo "<option value=" . $m->getId() . ">" . $m->getNombre() . "</option>";
							}
							?>
						</select>
					</div>
					<div class="mt-3">
						<div class="table-wrapper-scroll-y my-custom-scrollbar h-25">
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

		if (fechaFinal == "") {
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

				if (datos.length != 0) {
					datos.forEach(venta => {
						plantilla += `
							<tr id='${venta.id}'>
								<td>${venta.id}</td>
								<td>${venta.fecha}</td>
								<td>${venta.cantidad}</td>
								<td>${venta.valor}</td>
								<td>
								<a class='fas fa-eye' href='modalModelosVenta.php?idVenta=${venta.id}' data-toggle='modal' data-target='#modalModelosVenta' data-placement='left' title='Ver Detalles'></a>
								</td>
							</tr>
							`

					});
					//<tr><td colspan='6'>${venta.total}</td></tr>
					plantilla += "<tr><th scope='row'>Total</th><td colspan='3' ></td><td>" + datos[0].total + "</td></tr>";

					$("#ventasT").html(plantilla);
				} else {
					plantilla += 'No se encontraron ventas.';
				}
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
				icon: 'error',
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

					if (datos.length != 0) {
						datos.forEach(venta => {
							plantilla += `
							<tr id='${venta.id}'>
								<td>${venta.id}</td>
								<td>${venta.fecha}</td>
								<td>${venta.cantidad}</td>
								<td>${venta.valor}</td>
								<td>
								<a class='fas fa-eye' href='modalModelosVenta.php?idVenta=${venta.id}' data-toggle='modal' data-target='#modalModelosVenta' data-placement='left' title='Ver Detalles'></a>
								</td>
							</tr>
							`

						});
						//<tr><td colspan='6'>${venta.total}</td></tr>
						plantilla += "<tr><th scope='row'>Total</th><td colspan='3' ></td><td>" + datos[0].total + "</td></tr>";

						$("#ventasT").html(plantilla);
					} else {
						plantilla += 'No se encontraron ventas.';
					}
					$("#ventasT").html(plantilla);
				}
			});
		}

	});
</script>