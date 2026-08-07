<?php
//Importar fb

$db = conectarDB();
//Consultar
$query = "SELECT * FROM propiedades LIMIT {$limite}";
//Obtener resultado
$resultado = mysqli_query($db, $query);

?>
<div class="contenedor-anuncios">
    <?php while ($propiedad = mysqli_fetch_assoc($resultado)): ?>
        <div class="anuncio">
            <img src="imagenes/<?php echo $propiedad['imagen']; ?>" alt="Anuncio 1" loading="lazy">

            <div class="contenido-anuncio">
                <h3><?php echo $propiedad['titulo']; ?></h3>
                <p> <?php echo $propiedad['descripcion']; ?> </p>
                <p class="precio">$<?php echo $propiedad['precio']; ?></p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" src="build/img/icono_wc.svg" alt="IconoWC" loading="lazy">
                        <p><?php echo $propiedad['wc']; ?></p>
                    </li>
                    <li>
                        <img class="icono" src="build/img/icono_estacionamiento.svg" alt="IconoEstacionamiento"
                            loading="lazy">
                        <p><?php echo $propiedad['estacionamiento']; ?></p>
                    </li>
                    <li>
                        <img class="icono" src="build/img/icono_dormitorio.svg" alt="IconoDormitorio" loading="lazy">
                        <p><?php echo $propiedad['habitaciones']; ?></p>
                    </li>
                </ul>
                <a href="anuncio.php?id=<?php echo $propiedad['id']; ?>" class=" boton-amarillo-block">Ver Propiedad</a>
            </div>
        </div>
    <?php endwhile; ?>
    <!-- Fin de anuncio -->
</div>

<?php
    mysqli_close($db);
?>