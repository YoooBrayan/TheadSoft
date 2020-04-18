<div class="modal-header">
    <h5 class="modal-title">Entregar Corte</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
</div>
<div class="modal-body">

    <button id="pagoC" type="button" class="btn btn-primary" data-dismiss="modal">Pagar Completo</button>

    <hr/ style="border: 1px solid">

    <div class="input-group mt-3" style="width: 89%">
        <input id="cantidad" type="number" class="form-control" placeholder="Cantidad" aria-label="Recipient's username" aria-describedby="basic-addon2" min="0" oninput="validity.valid||(value='');">
        <div class="input-group-append">
            <button id="pagoI" class="btn btn-outline-secondary" type="button" data-dismiss="modal">Pagar Parte</button>
        </div>
    </div>

</div>

<script>
    $(document).on("click", "#pagoC", function(e) {
        e.preventDefault();

        let idCorte = "<?php echo $_GET['idCorte']; ?>";

        $.ajax({
            type: "POST",
            url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/representante/pagarCorte.php") ?>",
            data: {
                idCorte
            },
            success: function(response) {
                if (response == 1) {

                    $("#icon"+idCorte).removeClass();
                    $("#icon"+idCorte).addClass("fas fa-dollar-sign");
                    $("#iconP"+idCorte).attr("style", 'color: green');
                    $("#pago"+idCorte).attr("style", 'text-decoration: line-through');
                    

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: response,
                        showConfirmButtom: false,
                        timer: 1000
                    });
                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'warning',
                        title: 'Corte ya Pagado.',
                        showConfirmButtom: false,
                        timer: 1000
                    });
                }

            }
        });
    });
</script>