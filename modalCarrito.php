<?php 

require_once "logica/Modelo.php";

session_start();

?>

<div class="modal-header">
    <h5 class="modal-title">Carrito</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
</div>
<div class="modal-body">

    <p>Cantidad de Modelos: <?php echo count($_SESSION['carrito']); ?></p>

    <div class="d-flex flex-column" >
    <?php
    
    foreach($_SESSION['carrito'] as $c){ 
        
        echo "
        <button class='btn btn-primary mb-2' type='button' data-toggle='collapse' data-target='#collapseExample". $c -> getId() ."' aria-expanded='false' aria-controls='collapseExample'>
        ". $c -> getNombre() ."
        </button>

        <div class='collapse' id='collapseExample". $c -> getId() ."'>
        <div class='card card-body'>
        <div class='d-flex flex-column'>
        ";


          foreach($c -> getTalla() as $t){
            echo "<button w-20 p-3 class='mb-2' data-toggle='collapse' data-target='#collapseExampleC". $t -> getId() ."'> ". $t -> getId() ." </button>
            
            <div class='collapse' id='collapseExampleC".$t->getId()."'>
            <div class='card card-body'>
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
            </div>
            </div>
            
            ";
          }

          

        echo "</div>
        </div>
        </div>";


        /*echo "
        <div class='card border-dark mb-3' style='max-width: 100%;'>
        <div class='card-header'>Modelo</div>
        <div class='card-body text-dark'>

            <p class='card-text'> " . $c -> getNombre() . " </p>
        </div>
        </div> ";*/

    }
    
    ?>
    </div>
    <br>
    <button id="registrar" type="submit" name="registrar" class="btn btn-dark">Registrar Venta</button>
    
</div>