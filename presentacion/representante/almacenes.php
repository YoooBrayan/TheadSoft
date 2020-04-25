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
					<div id="resultadosProfesores">
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

<script>
	$('body').on('show.bs.modal', '.modal', function(e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-content").load(link.attr("href"));
	});
</script>

<script>
	$("#idA").change(function() {

		let almacen = $("#idA option:selected")[0].value;
		console.log("cambio: " + almacen);

		if (almacen != "0") {
			$("#btnVenta").removeAttr("hidden");
			$("#inventario").removeAttr("hidden");
			$("#importar").removeAttr("hidden");

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
						plantilla += `
						<tr id='${modelo.id}'>
							<td>${modelo.modelo}</td>
							<td>${modelo.cantidad}</td>
							<td>
								<a class='fas fa-eye' href='modalModeloAlmacen.php?idModelo=${modelo.id}&idAlmacen=${almacen}' data-toggle='modal' data-target='#modalCorte' data-placement='left' title='Ver Detalles'></a>
							</td>
						</tr>
						`
					});

					$("#mercancia").html(plantilla);
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
	})
</script>