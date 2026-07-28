<?php
    require 'includes/config/database.php';
    $db = conectarDB();

    $email = 'admin@correo.com';
    $password = 123123;

    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO usuarios (email, password) VALUES ( '{$email}', '{$passwordHashed}');";
    echo $query;


    mysqli_query($db, $query);

?>