<?php

session_start();
//Se borran todos los datos de la sesion dejando en blanco 
//la supervariable session
$_SESSION = [];

header('Location: /');


