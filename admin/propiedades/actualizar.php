<?php

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);
if (!$id) {
    header('Location: /admin');
}


require '../../includes/config/database.php';
$db = conectarDB();
//get datos de propiedad
$consulta = "SELECT * FROM propiedades WHERE id = {$id}";
$resultado = mysqli_query($db, $consulta);
$propiedades = mysqli_fetch_assoc($resultado);


//Consultar vendedores
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

//Arrreglo con mensajes de errores

$errores = [];

$titulo = $propiedades['titulo'];
$precio = $propiedades['precio'];
$descripcion = $propiedades['descripcion'];
$habitaciones = $propiedades['habitaciones'];
$wc = $propiedades['wc'];
$estacionamiento = $propiedades['estacionamiento'];
$vendedores_id = $propiedades['vendedores_id'];
$imagenPropiedad = $propiedades['imagen'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //Ejemplo de sanitizacion
    // $numero = 'HOLA1';
    // $numero2 = 1;

    // $resultado = filter_var($numero, FILTER_SANITIZE_STRING);


    //variables sanitizadas
    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $vendedores_id = mysqli_real_escape_string($db, $_POST['vendedor']);
    $creado = date('Y/m/d');

    //files  hacia una variable

    $imagen = $_FILES['imagen'];


    //Validacion de errores para cada seccion vacia

    if (!$titulo) {
        $errores[] = "Debes agregar un titulo";
    }
    if (!$precio) {
        $errores[] = "Debes agregar un precio";
    }
    if (!$descripcion) {
        $errores[] = "Debes agregar una descripcion";
    }
    if (!$habitaciones) {
        $errores[] = "Debes agregar numero de habitaciones";
    }
    if (!$wc) {
        $errores[] = "Debes agregar numero de wc";
    }
    if (!$estacionamiento) {
        $errores[] = "Debes agregar numero de estacionamiento";
    }
    if (!$vendedores_id) {
        $errores[] = "Debes seleccionar un vendedor";
    }


    //Validar pot tamano

    $media = 1000 * 1000;

    if ($imagen['size'] == $media) {
        $errores[] = "La imagen es muy grande";
    }


    // echo "<pre>";
    // var_dump($errores);
    // echo "</pre>";
    //Revisar que el array de errores este vacio
    if (empty($errores)) {


        //creacion de carpeta   
        $carpetaImagenes = '../../imagenes/';
        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }

        $nombreImagen = '';

        if ($imagen['name']) {
            unlink($carpetaImagenes . $propiedades['imagen']);

            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
        }


        //Genera un nombre unico

        //Insertar datos en la db
        $query = " UPDATE propiedades SET titulo = '{$titulo}', precio = '{$precio}', imagen = '{$nombreImagen}', descripcion = '{$descripcion}',
         habitaciones = {$habitaciones}, wc = {$wc}, estacionamiento = {$estacionamiento}, vendedores_id = {$vendedores_id} WHERE id = {$id}";
        //Se agrega la db y el comando a ejecutar

        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            //Redireccionar usuario como confirmacion

            header('Location: /admin?resultado=2');
        }
    }
}

require '../../includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Actualizar Propiedad </h1>
    <!-- Mostrar erroees al Validar formulario -->
    <?php foreach ($errores  as $error):  ?>

        <div class="alerta error">
            <?php echo $error;  ?>

        </div>
    <?php endforeach;  ?>

    <a class="boton-verde boton" href="/admin">Regresar</a>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Informacion general</legend>

            <label for="titulo">Titulo</label>
            <input type="text" id="titulo" name="titulo" placeholder="Titulo de la Propiedad" value="<?php echo $titulo ?>">

            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" placeholder="Precio de la propiedad" value="<?php echo $precio ?>">

            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">

            <img class="imagen-small" src="/imagenes/<?php echo $imagenPropiedad; ?>" alt="">

            <label for="descripcion">Descripcion</label>
            <textarea id="descripcion" name="descripcion"> <?php echo $descripcion ?> </textarea>
        </fieldset>
        <fieldset>
            <legend>Informacion Propiedad</legend>

            <label for="habitaciones">Habitaciones</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo $habitaciones ?>">

            <label for="wc">WC</label>
            <input type="number" id="wc" name="wc" placeholder="Ej: 2" min="1" max="9" value="<?php echo $wc ?>">

            <label for="estacionamiento">Estacionamiento</label>
            <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9" value="<?php echo $estacionamiento ?>">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <select name="vendedor">
                <option value="">-- Selecione --</option>
                <?php while ($row = mysqli_fetch_assoc($resultado)) : ?>
                    <option <?php echo $vendedores_id === $row['id'] ? 'selected' : '' ?> value=" <?php echo $row['id'] ?> "> <?php echo $row['nombre'] . " " . $row['apellido'] ?> </option>
                <?php endwhile; ?>
            </select>
        </fieldset>
        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer')
?>