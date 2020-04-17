<div class="modal-header">
    <h5 class="modal-title">Entregar Corte</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
</div>
<div class="modal-body">

    <button id="entregar" type="button" class="btn btn-primary">Entrega Completa</button>

    <hr/ style="border: 1px solid">

    <div class="input-group mt-3" style="width: 89%">
        <input id="cantidad" type="number" class="form-control" placeholder="Cantidad" aria-label="Recipient's username" aria-describedby="basic-addon2" min="0" oninput="validity.valid||(value='');">
        <div class="input-group-append">
            <button id="entregarI" class="btn btn-outline-secondary" type="button" data-dismiss="modal">Entrega Incompleta</button>
        </div>
    </div>

</div>

<script>
    $(document).on("click", "#entregar", function(e) {
        
        let idCorte = "<?php echo $_GET['idCorte']; ?>";

        $.ajax({
            type: "POST",
            url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/encargado/entregarCorte.php"); ?>",
            data: {
                idCorte
            },
            success: function(response) {
                if (response == 1) {
                    $("#" + idCorte).remove();
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Corte Entregado!',
                        showConfirmButtom: false,
                        timer: 1000
                    });
                } else if (response == 2) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Corte ya Entregado!',
                        showConfirmButtom: false,
                        timer: 1000
                    });
                }
            }
        });

    });

    $(document).on("click", "#entregarI", function(e) { 
        let idCorte = "<?php echo $_GET['idCorte']; ?>";
        let cantidad = $("#cantidad").val();

        $.ajax({
            type: "POST",
            url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/encargado/entregarCorte.php"); ?>",
            data: {
                idCorte,
                cantidad
            },
            success: function(response) {
                if (response == 1) {
                    $("#" + idCorte).remove();
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Corte Entregado!',
                        showConfirmButton: false,
                        timer: 1000
                    });
                } else if (response == 3) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Corte ya Pendiente!',
                        showConfirmButton: false,
                        timer: 1000
                    });
                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'warning',
                        title: 'Cantidad Invalida',
                        showConfirmButton: false,
                        timer: 1000
                    });
                }
            }
        });
    });
</script>