<?php
require '../../includes/config/database.php';
$db = conectarDB();

//Consultar vendedores
$consulta = "SELECT * FROM vendedores";

$resultado = mysqli_query($db, $consulta);

//Arrreglo con mensajes de errores

$errores = [];

$titulo = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedores_id = '';

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
    if (!$imagen['name'] || $imagen['error']) {
        $errores[] = "La imagen es obligatoria";
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

        //subida de arvhibos

        //creacion de carpeta   
        $carpetaImagenes = '../../imagenes/';
        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }

        //Genera un nombre unico

        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);

        //Insertar datos en la db
        $query = "INSERT INTO propiedades ( titulo, precio, imagen,  descripcion, habitaciones, wc, estacionamiento, creado, 
        vendedores_id ) VALUES ('$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado' , '$vendedores_id' )";
        //Se agrega la db y el comando a ejecutar
        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            //Redireccionar usuario como confirmacion

            header('Location: /admin');
        }
    }
}

require '../../includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Crear </h1>
    <!-- Mostrar erroees -->
    <?php foreach ($errores  as $error):  ?>

        <div class="alerta error">
            <?php echo $error;  ?>

        </div>
    <?php endforeach;  ?>

    <a class="boton-verde boton" href="/admin/">Regresar</a>

    <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
        <fieldset>
            <legend>Informacion general</legend>

            <label for="titulo">Titulo</label>
            <input type="text" id="titulo" name="titulo" placeholder="Titulo de la Propiedad" value="<?php echo $titulo ?>">

            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" placeholder="Precio de la propiedad" value="<?php echo $precio ?>">

            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">

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
        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer')
?>