<?php

if (isset($_GET['filtro'])) {
    $corte = new Corte();
    echo $corte -> cortesPorEntregarFiltrado($_GET['filtro']);
}
