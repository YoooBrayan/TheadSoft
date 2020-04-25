<?php 

session_start();

?>

<div class="modal-header">
    <h5 class="modal-title">Carrito</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
</div>
<div class="modal-body">

    <p>Cantidad de Modelos: <?php echo count($_SESSION['carrito']); ?></p>
    <button id="registrar" type="submit" name="registrar" class="btn btn-dark">Registrar Venta</button>
</div>