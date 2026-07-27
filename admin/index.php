<?php
//importar conexion
require '../includes/config/database.php';
$db = conectarDB();

//escribir consulta
$query = 'SELECT * FROM propiedades';
//realizar consulta
$resultadoConsulta = mysqli_query($db, $query);

//Muestra mensaje condicional
$resultado = $_GET['resultado'] ?? null;
// Incluye un template
require '../includes/funciones.php';
incluirTemplate('header');

//
?>

<main class="contenedor seccion">
    <h1>Panel de administrador</h1>
    <?php if ($resultado == 1) : ?>
        <p class="alerta exito">Anuncio Creado Correctamente</p>
    <?php elseif ($resultado == 2) : ?>
        <p class="alerta exito">Anuncio Actualizado Correctamente</p>
    <?php endif; ?>

    <a class="boton-verde boton" href="/admin/propiedades/crear.php">Nueva Propiedad</a>

    <table class=" propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($propiedad = mysqli_fetch_assoc($resultadoConsulta)): ?>
                <tr>
                    <td> <?php echo $propiedad['id']; ?> </td>
                    <td><?php echo $propiedad['titulo']; ?></td>
                    <td><img src="/imagenes/<?php echo $propiedad['imagen']; ?>" class="imagen-tabla" alt="sin imagen"></td>
                    <td>$ <?php echo $propiedad['precio']; ?> </td>
                    <td>
                        <a class="boton-rojo-block" href="#">Eliminar</a>
                        <a class="boton-amarillo-block" 
                        href="admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>">Actualizar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>

<?php

//Cerrar conexion
mysqli_close($db);
incluirTemplate('footer')
?>