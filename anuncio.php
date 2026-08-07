<?php
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /');
}
//Importar fb
require 'includes/app.php';

$db = conectarDB();
//Consultar
$query = "SELECT * FROM propiedades WHERE id = {$id}";
//Obtener resultado
$resultado = mysqli_query($db, $query);

if($resultado->num_rows === 0){
    header('Location: /');
}

$propiedad = mysqli_fetch_assoc($resultado);


require 'includes/funciones.php';
incluirTemplate('header')

?>

<main class="contenedor seccion contenido-centrado">
    <h1><?php echo $propiedad['titulo']; ?> </h1>

        <img src="imagenes/<?php echo $propiedad['imagen']; ?>" alt="Anuncio" loading="lazy">

    <div class="resumen-propiedad">
        <p class="precio">$<?php echo $propiedad['precio']; ?></p>
        <ul class="iconos-caracteristicas">
            <li>
                <img class="icono" src="build/img/icono_wc.svg" alt="IconoWC" loading="lazy">
                <p><?php echo $propiedad['wc']; ?></p>
            </li>
            <li>
                <img class="icono" src="build/img/icono_estacionamiento.svg" alt="IconoEstacionamiento" loading="lazy">
                <p><?php echo $propiedad['estacionamiento']; ?></p>
            </li>
            <li>
                <img class="icono" src="build/img/icono_dormitorio.svg" alt="IconoDormitorio" loading="lazy">
                <p><?php echo $propiedad['habitaciones']; ?></p>
            </li>
        </ul>
        <p>

            <?php echo $propiedad['descripcion']; ?>
        </p>
    </div>
</main>

<?php incluirTemplate('footer');

mysqli_close($db);?>
<script src="build/js/bundle.min.js"></script>
</body>

</html>