
<?php

$color = new Color();
$colores = $color->consultarColores();

?>
<div class="modal-header">
	<h5 class="modal-title">Agregar Colores</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<div class="modal-body">
	<label>Seleccione Colores:</label>
	
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th scope="col">Color</th>
				<th scope="col">Cantidad</th>
				<th scope="col">Servicios</th>
			</tr>
		</thead>
		<tbody id="colores">
		</tbody>
</div>
