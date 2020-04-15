<?php

if($_POST['tarea']){

    $tarea = new Tarea($_POST['tarea']);
    $tarea->eliminarTarea();

    echo $tarea -> getId();
}