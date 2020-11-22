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
					<div class="table-wrapper-scroll-y my-custom-scrollbar h-25">
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
	<div id="mostrar" hidden>
		<button id="nomina" type="button" class="btn btn-dark mt-2 mb-4 col-12 text-center">Generar Nomina</button>
	</div>
	<div id="mensaje"></div>
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
					$("#mostrar").attr("hidden", true);
				} else {
					$("#mostrar").removeAttr("hidden");
					//$("#entregasC").attr("style", "display: line-block");
				}
			}
		});

	});


	$(document).on("click", "#mail", function() {
		const filepdf = $("#filePdf").val()
		let namePdf = filepdf.split("\\")[2];

		$.ajax({
			type: "POST",
			data: {
				filePdf: namePdf
			},
			url: "enviarMail.php",
			success: function(response) {
				if (response) {
					Swal.fire({
						position: "center",
						text: "Correo enviado con éxito!!!",
						icon: "success",
						title: "OK",
						timer: 1500
					})
				} else {
					Swal.fire({
						position: "center",
						text: "Mail NOT Sent",
						icon: "warning",
						title: ":(",
						timer: 1500
					})
				}
			}
		});

	});

	$(document).on("click", "#nomina", function() {

		let insumos = prompt("Ingrese Insumos");

		Number.isInteger(insumos)
		let idCortes = "1";

		$.ajax({
			type: "POST",
			url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/encargado/generarNomina.php") ?>",
			data: {
				idCortes,
				insumos
			},
			beforeSend: function() {
				$('#mensaje').prepend('<img src="img/loader.gif" />')

			},
			success: function(response) {

				$("#mensaje").fadeOut("fast", function() {
					let nomina = JSON.parse(response);
					let template = '';

					nomina.nomina.forEach(operario => {
						template += `
					<div class='card border-dark mt-3 mb-2' style='max-width: 100%;'> 
					<div class="card-header">${operario.operario.Nombre}</div>
					<div class="card-body text-dark">
					<div class="table-wrapper-scroll-y my-custom-scrollbar h-25">
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
					</div>
					<hr/ style='border: 1px solid'>
					<p class='card-text'>Sueldo: ${operario.pago}</p>
					</div></div>`
					});

					template += `
					<div class='card border-dark mt-3 mb-2' style='max-width: 100%;'> 
						<div class="card-header text-center">Ganancias</div>
						<div class="card-body text-dark container row">
							<strong class='p-1 text-dark border border-light col-12 col-sm-6 col-md-3 mb-1'>Pago Total: ${nomina.pagoTotal}</strong>
							<strong class='p-1 text-dark border border-light col-12 col-sm-6 col-md-3 mb-1'>Nomina: ${nomina.pagoNomina}</strong>
							<strong class='p-1 text-dark border border-light col-12 col-sm-6 col-md-3 mb-1'>Insumos: ${nomina.insumos}</strong>
							<strong class='p-1 text-dark border border-light col-12 col-sm-6 col-md-3 mb-1'>Ganancias: ${nomina.ganancias}</strong>
							<strong class='p-1 text-dark border border-light col-12 col-sm-6 col-md-3 mb-1'>Ganancias Divididas: ${nomina.gananciasD}</strong> 
							<strong class='p-1 text-dark border border-light col-12 col-sm-6 col-md-3 mb-1'>Perdidas: ${nomina.perdidas}</strong> 
							<br><br>`;

					nomina.pagoSocios.forEach(socio => {
						template += `<strong class='p-1 text-dark border border-light col-12 col-sm-6 col-md-3 mb-1'>Sueldo ${socio.socio} : ${socio.pago}</strong>`;
					});

					template += `</div></div>`;

					template += ` <a id='nominaPdf' target='_blank' href='generarNominaPdf.php?insumos=${nomina.insumos}' type='button' class='btn btn-dark mt-2 mb-3' > Exportar PDF </a>
					<input type="file" value="Seleccione archivo" name="Archivo" id="filePdf" class="form-control bg-light">
		<button id="mail" type="button" class="btn btn-light mb-4 col-12 text-center">Enviar Email</button>
					 `;

					$("#cNomina").html(template);
				});

				$("mensaje").fadeIn("slow");

			}
		});
	});
</script>