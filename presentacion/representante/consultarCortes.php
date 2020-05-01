<?php

include 'presentacion/representante/cabeceraRepresentante.php';

$_SESSION['cortes'] = array();
array_push($_SESSION['cortes'], 0);

$representante->proveedor();

$modelos = new Modelo("", "", "", $representante->getProveedor());
$modelos = $modelos->consultarModelos();

?>


<div class="container mt-3 mb-4">
	<label class="text-white h5">Seleccione Tipo:</label>
	<select class="selectpicker" data-show-subtext="true" data-live-search="true" style="margin-left: 5px;">

		<option value="">Seleccione</option>
		<option value="CE">Cortes Entregados</option>
		<option value="CP">Cortes Pendientes</option>
		<option value="CB">Bodega</option>

	</select>
</div>


<div id="CE" class="container" hidden>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div style="text-align: center;" class="card-header bg-dark text-white">Cortes Entregados</div>
				<div class="card-body">
					<div id="resultadosProfesores">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th scope="col">Id</th>
									<th scope="col">Modelo</th>
									<th scope="col">Fecha de Envio</th>
									<th scope="col">Cantidad</th>
									<th scope="col">Estado</th>
									<th scope="col">Pago</th>
									<th scope="col">Servicios</th>
								</tr>
							</thead>
							<tbody id="tce">
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<button id="pagarC" type="button" class="btn btn-secondary mt-2" hidden>Pagar Completo</button>
	<button id="removerPago" type="button" class="btn btn-warning mt-2 ml-2" hidden>Remover Pago</button>
</div>

<div id="CP" class="container" hidden>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div style="text-align: center;" class="card-header bg-dark text-white">Cortes Pendientes</div>
				<div class="card-body">
					<div id="resultadosProfesores">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th scope="col">Id</th>
									<th scope="col">Modelo</th>
									<th scope="col">Fecha de Envio</th>
									<th scope="col">Cantidad</th>
									<th scope="col">Estado</th>
									<th scope="col">Pago</th>
									<th scope="col">Servicios</th>
								</tr>
							</thead>
							<tbody id="tcp">
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br>

<div id="CB" class="container" hidden>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div style="text-align: center;" class="card-header bg-dark text-white">Cortes en Bodega</div>
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
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">Modelo</th>
								<th scope="col">Cantidad</th>
								<th scope="col">Servicios</th>
							</tr>
						</thead>
						<tbody id="tcb">
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="modalCorte" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content" id="modalContent">
		</div>
	</div>
</div>

<div class="modal fade" id="modalPagar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content" id="modalContent">
		</div>
	</div>
</div>

<div class="modal fade" id="modalModeloBodega" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
	$("select").change(function() {
		let tipo = $("select option:selected")[0].value;
		if (tipo == 'CE') {
			$("#CP").attr("hidden", true);
			$("#CE").removeAttr("hidden");

			$.ajax({
				type: "POST",
				url: "<?php echo "indexAjax.php?pid="  . base64_encode("presentacion/representante/consultarCortesAjax.php") ?>",
				data: {
					tipo
				},
				success: function(response) {
					let cortes = JSON.parse(response);
					let plantilla = '';

					cortes.forEach(corte => {
						plantilla += `
						<tr id='${corte.id}'>
							<td class='check' id='${corte.id}' ><span id='check${corte.id}'  class='far fa-square'></span>  ${corte.id}</td>
							<td>${corte.modelo}</td>
							<td>${corte.fecha}</td>
							<td>${corte.cantidad}</td>
							<td id='icon${corte.id}' class="${corte.estado==1?'fas fa-dollar-sign':'fab fa-creative-commons-nc'}" data-toggle='tooltip' data-placement='left' title="${corte.estado==1?'Corte Pagado':'Corte Sin Pagar'}"></td>
							<td id='pago${corte.id}' style='text-decoration: ${corte.estado==1?'line-through':'none'};'>${corte.pago}</td>
							<td>
								<a class='fas fa-eye' href='modalCorte.php?idCorte=${corte.id}' data-toggle='modal' data-target='#modalCorte' data-placement='left' title='Ver Detalles'></a>
								<a id='iconP${corte.id}' class='fas fa-money-bill-alt' href='modalPagar.php?idCorte=${corte.id}' data-toggle='modal' data-target='#modalPagar' data-placement='left' title='Pagar' style='color: ${corte.estado==1?'green':'none'};'></a>
								<a class='eliminar' ><span class='fas fa-times-circle' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Eliminar' ></span> </a>
							</td>
						</tr>
						`
					});

					$("#tce").html(plantilla);
				}
			});

		} else if (tipo == 'CP') {
			$("#CE").attr("hidden", true);
			$("#CP").removeAttr("hidden");
			$.ajax({
				type: "POST",
				url: "<?php echo "indexAjax.php?pid="  . base64_encode("presentacion/representante/consultarCortesAjax.php") ?>",
				data: {
					tipo
				},
				success: function(response) {
					let cortes = JSON.parse(response);
					let plantilla = '';
					cortes.forEach(corte => {
						plantilla += `
						<tr id='${corte.id}'>
							<td>${corte.id}</td>
							<td>${corte.modelo}</td>
							<td>${corte.fecha}</td>
							<td>${corte.cantidad}</td>
							<td class="${corte.estado==1?'fas fa-dollar-sign':'fab fa-creative-commons-nc'}" data-toggle='tooltip' data-placement='left' title="${corte.estado==1?'Corte Pagado':'Corte Sin Pagar'}"></td>
							<td>${corte.pago}</td>
							<td>
								<a class='fas fa-eye' href='modalCorte.php?idCorte=${corte.id}' data-toggle='modal' data-target='#modalCorte' data-placement='left' title='Ver Detalles'></a>
								<a class='fas fa-money-bill-alt' data-toggle='tooltip' data-placement='left' title='Pagar'></a>
								<a class='eliminar' ><span class='fas fa-times-circle' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Eliminar' ></span> </a>
							</td>
						</tr>
						`
					});

					$("#tcp").html(plantilla);
				}
			});
		} else if (tipo == 'CB') {
			$("#CE").attr("hidden", true);
			$("#CP").attr("hidden", true);
			$("#CB").removeAttr("hidden");
		}
	});

	$(document).on("click", ".check", function(e) {

		let elemento = $(this)[0].parentElement;
		let idCorte = $(elemento).attr('id');

		$.ajax({
			type: "POST",
			url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/encargado/pushPullCortes.php") ?>",
			data: {
				idCorte
			},
			success: function(response) {
				let icon = JSON.parse(response);
				$("#check" + idCorte).removeClass();
				$("#check" + idCorte).addClass(icon[0].icon);

				if (icon[0].count == 1) {
					//$("#entregasC").attr("style", "display: none")
					$("#pagarC").attr("hidden", true);
					$("#removerPago").attr("hidden", true);
				} else {
					$("#pagarC").removeAttr("hidden");
					$("#removerPago").removeAttr("hidden");
					//$("#entregasC").attr("style", "display: line-block");
				}
			}
		});

	});

	$("#pagarC").on("click", function() {

		let idCortes = "1";
		$.ajax({
			type: "POST",
			url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/representante/pagarCorte.php") ?>",
			data: {
				idCortes
			},
			success: function(response) {
				let cortes = JSON.parse(response);
				if (cortes[0].respuesta == 'Pago Exitoso.') {
					cortes.forEach(corte => {
						$("#check" + corte.id).removeClass();
						$("#check" + corte.id).addClass("far fa-square");
						$("#icon" + corte.id).removeClass();
						$("#icon" + corte.id).addClass("fas fa-dollar-sign");
						$("#iconP" + corte.id).attr("style", 'color: green');
						$("#pago" + corte.id).attr("style", 'text-decoration: line-through');
					});

					swal.fire({
						position: 'top-end',
						icon: 'success',
						title: 'Pagos Existosos.',
						timer: 1500
					});
				} else {

					cortes.forEach(corte => {
						$("#check" + corte.id).removeClass();
						$("#check" + corte.id).addClass("far fa-square");
					});

					swal.fire({
						position: 'center',
						icon: 'warning',
						title: cortes[0].respuesta,
						timer: 1500
					});
				}
				$("#pagarC").attr("hidden", true);
				$("#removerPago").attr("hidden", true);
			}
		});

	});

	$(document).on("click", "#removerPago", function(e) {

		let idCortes = "1";

		$.ajax({
			type: "POST",
			url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/representante/removerPago.php") ?>",
			data: {
				idCortes
			},
			success: function(response) {

				let cortes = JSON.parse(response);

				if (cortes[0].respuesta == 'Pago removido.') {
					cortes.forEach(corte => {
						$("#check" + corte.id).removeClass();
						$("#check" + corte.id).addClass("far fa-square");
						$("#icon" + corte.id).removeClass();
						$("#icon" + corte.id).addClass("fab fa-creative-commons-nc");
						$("#iconP" + corte.id).attr("style", 'color: black');
						$("#pago" + corte.id).attr("style", 'text-decoration: none');
					});

					swal.fire({
						position: 'top-end',
						icon: 'success',
						title: 'Pagos Removidos.',
						timer: 1500
					});
				} else {

					cortes.forEach(corte => {
						$("#check" + corte.id).removeClass();
						$("#check" + corte.id).addClass("far fa-square");
					});

					swal.fire({
						position: 'center',
						icon: 'warning',
						title: cortes[0].respuesta,
						timer: 1500
					});
				}
				$("#pagarC").attr("hidden", true);
				$("#removerPago").attr("hidden", true);

			}
		});
	});

	$("table").on("click", "tbody .eliminar", function(e) {
		console.log("CLick Eliminar")
		e.preventDefault();

		let elemento = $(this)[0].parentElement.parentElement;
		let idCorte = $(elemento).attr('id');

		Swal.fire({
			title: 'Esta seguro?',
			text: "Eliminar Corte!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, Eliminar!'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "POST",
					url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/representante/eliminarCorte.php"); ?>",
					data: {
						idCorte
					},
					success: function(response) {
						$("#" + idCorte).remove();
						Swal.fire({
							position: 'top-end',
							icon: 'success',
							title: response,
							showConfirmButtom: false,
							timer: 1000
						});
					}
				});
			}
		});
	});

	$("#idM").change(function(){

		let modelo = $("#idM option:selected")[0].value;
		console.log(modelo);

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
						<a id='modeloB' class='fas fa-eye' href='modalModeloBodega.php?idModelo=${modelo.id}&cantidad=${modelo.cantidad}' data-toggle='modal' data-target='#modalModeloBodega'  data-placement='left' title='Ver Detalles'></a>
					</td>
				</tr>`;

				$("#tcb").html(plantilla);
			}
		});
	})
</script>