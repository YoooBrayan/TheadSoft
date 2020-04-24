<head>
	<link href="presentacion/representante/estilos.css" rel="stylesheet" type="text/css" />
</head>

<?php

$_SESSION['cortes'] = array();
array_push($_SESSION['cortes'], 0);

include 'presentacion/encargado/cabeceraEncargado.php';

$corte = new Corte();

$cortesPorEntregar = $corte->cortesPorEntregar();

?>

<br>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div style="text-align: center;" class="card-header bg-dark text-white">Cortes Por entregar</div>
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
								<?php foreach ($cortesPorEntregar as $cpe) {
									echo "<tr id=" . $cpe->getId() . ">";
									echo "<td class='check' id='" . $cpe->getId() . "'> <span id='check" . $cpe->getId() . "'  class='far fa-square'></span> " . $cpe->getId() . "</td>";
									echo "<td>" . $cpe->getModelo()->getNombre() . "</td>";
									echo "<td>" . $cpe->getFecha_Envio() . "</td>";
									echo "<td>" . $cpe->getCantidad() . "</td>";
									echo "<td>" . "<a href='modalCorte.php?idCorte=" . $cpe->getId() . "' data-toggle='modal' data-target='#modalCorte' ><span class='fas fa-eye' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Detalles' ></span> </a>

									<a href='index.php?pid=" . base64_encode("presentacion/encargado/asignarTareas.php") . "&idCorte=" . $cpe->getId() . "'><span class='fas fa-plus' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Asignar Tarea' ></span> </a>
									<a href='modalEntregar.php?idCorte=" . $cpe->getId() . "' data-toggle='modal' data-target='#modalEntregar'><span class='fas fa-check' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Entregar' ></span> </a>

									</td>";
									echo "</tr>";
								}
								echo "<tr><td id='contador' colspan='9'>" . count($cortesPorEntregar) . " registros encontrados</td></tr>" ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<button id="entregasC" type="button" class="btn btn-secondary mt-2" hidden>Entregar Completo</button>
</div>


<div class="modal fade" id="modalCorte" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content" id="modalContent">
		</div>
	</div>
</div>

<div class="modal fade" id="modalEntregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
	/*$("table").on("click", "tbody .eliminar", function(e) {
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
					url: "<?php // echo "indexAjax.php?pid=" . base64_encode("presentacion/encargado/eliminarCorte.php"); ?>",
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
	});*/

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
					$("#entregasC").attr("hidden", true);
				} else {
					$("#entregasC").removeAttr("hidden");
					//$("#entregasC").attr("style", "display: line-block");
				}
			}
		});

	});

	$("#entregasC").on("click", function() {

		let idCortes = "1";
		$.ajax({
			type: "POST",
			url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/encargado/entregarCorte.php") ?>",
			data: {
				idCortes
			},
			success: function(response) {

				let c = $("#contador").val();
				let cortes = JSON.parse(response);
				cortes.forEach(corte => {
					$("#" + corte.id).remove();
				});

				$("#entregasC").attr("hidden", true);
				
				swal.fire({
					position: 'top-end',
					icon: 'success',
					title: 'cortes entregados',
					timer: 1000
				});

			}
		});

	});
</script>