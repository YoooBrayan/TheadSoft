<?php

include 'presentacion/representante/cabeceraRepresentante.php';

?>


<div class="container mt-3 mb-4">
	<label class="text-white h5">Seleccione Tipo:</label>
	<select class="selectpicker" data-show-subtext="true" data-live-search="true" style="margin-left: 5px;" id="idT">

		<option value="">Seleccione</option>
		<option value="CE">Cortes Entregados</option>
		<option value="CP">Cortes Pendientes</option>

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
					</div>
				</div>
			</div>
		</div>
	</div>
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
							<td>${corte.id}</td>
							<td>${corte.modelo}</td>
							<td>${corte.fecha}</td>
							<td>${corte.cantidad}</td>
							<td id='icon${corte.id}' class="${corte.estado==1?'fas fa-dollar-sign':'fab fa-creative-commons-nc'}" data-toggle='tooltip' data-placement='left' title="${corte.estado==1?'Corte Pagado':'Corte Sin Pagar'}"></td>
							<td id='pago${corte.id}' style='text-decoration: ${corte.estado==1?'line-through':'none'};'>${corte.pago}</td>
							<td>
								<a class='fas fa-eye' href='modalCorte.php?idCorte=${corte.id}' data-toggle='modal' data-target='#modalCorte' data-placement='left' title='Ver Detalles'></a>
								<a id='iconP${corte.id}' class='fas fa-money-bill-alt' href='modalPagar.php?idCorte=${corte.id}' data-toggle='modal' data-target='#modalPagar' data-placement='left' title='Pagar' style='color: ${corte.estado==1?'green':'none'};'></a>
								<a class='fas fa-times-circle' data-toggle='tooltip' data-placement='left' title='Eliminar'></a>
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
								<a class='fas fa-times-circle' data-toggle='tooltip' data-placement='left' title='Eliminar'></a>
							</td>
						</tr>
						`
					});

					$("#tcp").html(plantilla);
				}
			});
		}
	})
</script>