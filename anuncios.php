<?php
require 'includes/app.php';
incluirTemplate('header')

?>

<main class="contenedor seccion">
    <section class="seccion contenedor">
        <h2>Lotes en Venta</h2>
        <?php

        $limite = 10;
        include 'includes/templates/anuncios.php';
        ?>


        <!-- Fin de seccion de anuncios -->
    </section>
</main>

<?php incluirTemplate('footer') ?>
<script src="build/js/bundle.min.js"></script>
</body>

</html>