<?php

require_once 'logica/Satelite.php';

$satelite = new Satelite();
$satelites = $satelite->listaSatelites();

echo "Corte: " . $_GET['idCorte'];

?>
<div class="modal-header">
    <h5 class="modal-title">Seleccionar Satelite</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
</div>
<div class="modal-body">

    <div class="input-group">
        <select class="selectpicker ml-1" data-show-subtext="true" data-live-search="true" id="idCM">
            <?php
            foreach ($satelites as $s) {
            ?>
                <option value="<?php echo $s->getId() ?>"><?php echo $s->getNombre();  ?></option>
            <?php }
            ?>
        </select>
        <div class="input-group-append ml-2">
            <button id="vincular" type="button" class="btn btn-primary" data-dismiss="modal">Vincular</button>

        </div>

    </div>
    <hr/ style="border: 1px solid">

</div>


<script>
    $(document).ready(() => {

        $('.selectpicker').selectpicker({});


        $("#vincular").click(() => {
            
            let idC = "<?php echo $_GET['idCorte']; ?>";
            let idS = $("select option:selected")[0].value;
            let url = "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/representante/actualizarSatelite.php"); ?>";

            $.post(url, {idC, idS},
                function (response) {
                    console.log(response);
                    if(response){
                        let plantilla = '';
                        plantilla += `${idS} <span class='ml-1' href='modalSatelite.php?idCorte=${idC}' data-toggle='modal' data-target='#modalSatelite'><span class='far fa-square' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Cambiar Satelite'></span></span>`;

                        $("#tdSatelite"+idC).html(plantilla);

                        swal.fire({
                            position: "top-end",
                            icon: 'success',
                            title: "Satelite Actualizado",
                            timer: 800
                        });
                    }
                }
            );


        })

    });
</script>