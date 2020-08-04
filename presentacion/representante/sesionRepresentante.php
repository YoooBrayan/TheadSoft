<head>
	<link href="presentacion/representante/estilos.css" rel="stylesheet" type="text/css" />
</head>

<?php

include 'presentacion/representante/cabeceraRepresentante.php';

$corte = new Corte();

$cortesPorEntregar = $corte->cortesPorEntregarR();

?>

<br>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div style="text-align: center;" class="card-header bg-dark text-white">Cortes Por entregar</div>
				<div class="container">
					<label>Filtrar Cortes: </label>
					<select class="selectpicker mt-2" id="filtrarCortes">
						<option value="0">Seleccione</option>
						<option value="1">Cortes Asignados</option>
						<option value="2">Cortes Sin Asignar</option>
					</select>
				</div>
				<div class="card-body">
					<div class="table-wrapper-scroll-y my-custom-scrollbar">
						<table class="table table-striped table-hover mb-0">
							<thead>
								<tr>
									<th scope="col">Id</th>
									<th scope="col">Modelo</th>
									<th scope="col">Fecha de Envio</th>
									<th scope="col">Cantidad</th>
									<th scope="col">Satelite</th>
									<th scope="col">Servicios</th>
								</tr>
							</thead>
							<tbody id="tabla">
								<?php foreach ($cortesPorEntregar as $cpe) {
									echo "<tr id=" . $cpe->getId() . ">";
									echo "<td>" . $cpe->getId() . "</td>";
									echo "<td>" . $cpe->getModelo()->getNombre() . "</td>";
									echo "<td>" . $cpe->getFecha_Envio() . "</td>";
									echo "<td id='cantidad" . $cpe->getId() . "'>" . $cpe->getCantidad() . "</td>";
									echo "<td id='tdSatelite" . $cpe->getId() . "'>" . ($cpe->getSatelite() == '' ? "<div class='ml-3' href='modalSatelite.php?idCorte=" . $cpe->getId() . "' data-toggle='modal' data-target='#modalSatelite'><span class='far fa-square' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Asignar Satelite'></span></div>" :  $cpe->getSatelite() . " <span class='ml-1' href='modalSatelite.php?idCorte=" . $cpe->getId() . "' data-toggle='modal' data-target='#modalSatelite'><span class='far fa-square' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Cambiar Satelite'></span></span>") . "</td>";
									echo "<td>" . "<a href='modalCorte.php?idCorte=" . $cpe->getId() . "' data-toggle='modal' data-target='#modalCorte' ><span class='fas fa-eye' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Detalles' ></span> </a>
									</td>";
									echo "</tr>";
								}
								echo "<tr><td colspan='9'>" . count($cortesPorEntregar) . " registros encontrados</td></tr>" ?>

							</tbody>
						</table>
					</div>
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

<div class='modal fade' , id='modalSatelite' , tabindex="-1" , role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content" id="modalcontent">
		</div>
	</div>
</div>

<script>
	$('body').on('show.bs.modal', '.modal', function(e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-content").load(link.attr("href"));
	});

	$(document).ready(function() {
		$("#filtrarCortes").change(function() {

			let filtro = $("#filtrarCortes option:selected")[0].value;

			if (filtro != 0) {
				console.log("Filtro " + filtro);
				let url = "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/representante/filtrarCortes.php"); ?>";
				$.get(url, {
						filtro
					},
					function(response) {
						let datos = JSON.parse(response);
						let plantilla = '';
						console.log(datos);

						datos.forEach(corte => {
							plantilla +=
								`<tr id='${corte.idCorte}'>
								<td>${corte.idCorte}</td>
								<td>${corte.modelo}</td>
								<td>${corte.fecha}</td>
								<td id='cantidad${corte.idCorte}'>${corte.cantidad}</td>
								<td id='tdSatelite${corte.idCorte}'>${corte.idSatelite==''?
									'<div class="ml-3" href="modalSatelite.php?idCorte='+corte.idCorte+'" data-toggle="modal" data-target="#modalSatelite"><span class="far fa-square" data-toggle="tooltip" class="tooltipLink" data-placement="left" data-original-title="Asignar Satelite"></span></div>':
									corte.idSatelite + '<span class="ml-1" href="modalSatelite.php?idCorte='+corte.idCorte+'" data-toggle="modal" data-target="#modalSatelite"><span class="far fa-square" data-toggle="tooltip" class="tooltipLink" data-placement="left" data-original-title="Cambiar Satelite"></span></span>'}</td>
								<td> 
									<a href='modalCorte.php?idCorte=${corte.idCorte}' data-toggle='modal' data-target='#modalCorte' ><span class='fas fa-eye' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Detalles' ></span> </a>
								</td>
							`


						});

						$("#tabla").html(plantilla);


					}
				);
			}

		});
	});
</script>