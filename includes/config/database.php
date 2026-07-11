<?php

function conectarDB(){
    $db = mysqli_connect('localhost', 'root', 'root', 'bienesraices_crud');

    if(!$db){
        echo "No se realizo la conexion con la base de datos";
        exit;
    }else{
        return $db;
    }

}