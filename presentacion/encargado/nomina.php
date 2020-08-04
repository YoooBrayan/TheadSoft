<head>
	<link href="presentacion/representante/estilos.css" rel="stylesheet" type="text/css" />
</head>

<?php

$_SESSION['cortes'] = array();
array_push($_SESSION['cortes'], 0);

include 'presentacion/encargado/cabeceraEncargado.php';

$corte = new Corte();
$cortes = $corte->consultarCortes($_SESSION['id']['satelite']);

?>

<div class="container mt-4">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div style="text-align: center;" class="card-header bg-dark text-white">Seleccione Cortes</div>
				<div class="card-body">
					<div class="table-wrapper-scroll-y my-custom-scrollbar">
						<table class="table table-striped table-hover mb-0">
							<thead>
								<tr>
									<th scope="col">Id</th>
									<th scope="col">Modelo</th>
									<th scope="col">Fecha de Envio</th>
									<th scope="col">Cantidad</th>
									<th scope="col">Servicios</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($cortes as $c) {
									echo "<tr id=" . $c->getId() . ">";
									echo "<td>" . $c->getId() . "</td>";
									echo "<td>" . $c->getModelo()->getNombre() . "</td>";
									echo "<td>" . $c->getFecha_Envio() . "</td>";
									echo "<td>" . $c->getCantidad() . "</td>";
									echo "<td>" . "
									<div class='check' id='" . $c->getId() . "'> <span id='check" . $c->getId() . "'  class='far fa-square'></span></div>
									</td>";
									echo "</tr>";
								}
								echo "<tr><td id='contador' colspan='9'>" . count($cortes) . " registros encontrados</td></tr>" ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<button id="nomina" type="button" class="btn btn-dark mt-2" hidden>Generar Nomina</button>
</div>

<div id="cNomina" class="container">

</div>

<script>
	$(document).on("click", ".check", function(e) {

		let elemento = $(this)[0];
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
					$("#nomina").attr("hidden", true);
				} else {
					$("#nomina").removeAttr("hidden");
					//$("#entregasC").attr("style", "display: line-block");
				}
			}
		});

	});

	$(document).on("click", "#nomina", function() {

		let idCortes = "1";

		$.ajax({
			type: "POST",
			url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/encargado/generarNomina.php") ?>",
			data: {
				idCortes
			},
			success: function(response) {

				console.log(response);
				let nomina = JSON.parse(response);
				console.log(nomina);
				let template = '';


				nomina.forEach(operario => {
					template += `
					<div class='card border-dark mt-3 mb-2' style='max-width: 100%;'> 
					<div class="card-header">${operario.operario.Nombre}</div>
					<div class="card-body text-dark">
					<table class='table table-striped table-hover'>
					<thead>
					<tr>
					<th scope='col'>Modelo</th>
					<th scope='col'>Tarea</th>
					<th scope='col'>Cantidad</th>
					<th scope='col'>Valor</th>
					<th scope='col'>Pago</th>
					<th></th>
					</tr>
					</thead> <tbody>`;
					operario.nomina.forEach(element => {
						template += `
					<tr>
					<td>${element.modelo}</td>
					<td>${element.tarea}</td>
					<td>${element.cantidad}</td>
					<td>${element.valorU}</td>
					<td>${element.pago}</td>
					</tr>`
					});
					template += `</tbody>
					</table>
					<hr/ style='border: 1px solid'>
					<p class='card-text'>Sueldo: ${operario.pago}</p>
					</div></div>`
				});

				template += `<a id='nominaPdf' target='_blank' href='index.php?pid=<?php echo base64_encode("presentacion/encargado/generarNominaPdf.php"); ?>' type='button' class='btn btn-dark mt-2 mb-3' >Exportar PDF</a>`;

				$("#cNomina").html(template);
			}
		});
	});
</script>