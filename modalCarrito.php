<?php 

require_once "logica/Modelo.php";
require_once "logica/Color.php";

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
        <div d-flex flex-row>
        <button class='btn btn-primary mb-2 mt-2 col-11' type='button' data-toggle='collapse' data-target='#collapseExample". $c -> getId() ."' aria-expanded='false' aria-controls='collapseExample'> ". $c -> getNombre() ."
        </button>
        <button class='btn btn-danger ml-3' style='transform: translatey(-1px);'><i class='fas fa-times'></i></button>
        </div>

        <div class='collapse' id='collapseExample". $c -> getId() ."'>
        <div class='card card-body'>
        <div class='d-flex flex-column'>
        <center><p>Tallas</p></center>
        ";


          foreach($c -> getTalla() as $t){
            echo "<button style='width: 15%;' class='mt-1 mb-2' data-toggle='collapse' data-target='#collapseExampleC". $t -> getId() . $c -> getId() . "'> ". $t -> getId() ." </button>
            
            <div class='collapse' id='collapseExampleC".$t->getId(). $c -> getId() ."'>
            <div class='card card-body'>
            <center><p>Colores</p></center>
            <table class='table table-striped table-hover'>
                        <thead>
                            <tr>   
                                <th>Color</td>
                                <th>Cantidad</td>
                            </tr>
                        </thead>
            ";

                foreach($t->getColores() as $co){
                    echo "
                        <tbody>
                            <tr>   
                                <th>". $co -> getNombre() ."</td>
                                <th>". $co -> getCantidad() ."</td>
                            </tr>
                        </tbody>
                    ";
                }


            echo "
            </table>
            </div>
            </div>";
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