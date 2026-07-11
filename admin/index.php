<?php
    require '../includes/funciones.php';
    incluirTemplate('header');
    ?>

    <main class="contenedor seccion"> 
        <h1>Admin</h1>
        <a class="boton-verde boton" href="/admin/propiedades/crear.php">Nueva Propiedad</a>
    </main>

    <?php
        incluirTemplate('footer')
    ?>