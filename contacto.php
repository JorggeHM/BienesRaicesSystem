<?php include 'includes/templates/header.php' ?>

    <main class="contenedor seccion">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Contacto">
        </picture>
        <h2>Llene el formulario de Contacto</h2>

        <form action="" class="formulario">
            <fieldset>
                <legend>Informacion Personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu Nombre" id="nombre">

                <label for="mail">E-mail</label>
                <input type="email" placeholder="Tu Correo" id="mail">

                <label for="telefono">Telefono</label>
                <input type="tel" placeholder="Numero de tel" id="telefono">

                <label for="mensaje">Mensaje</label>
                <textarea type="texta" placeholder="Escribe tu mensaje" id="mensaje"></textarea>
            </fieldset>
            <!-- Informacion personal -->

            <fieldset>
                <legend>Informacion de la Propiedad</legend>

                <label for="opciones">Vende o Compra: </label>
                <select id="opciones">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Presupuesto</label>
                <input type="number" placeholder="Tu Precio o Presupuesto" id="presupuesto">
            </fieldset>

            <fieldset>
                <legend>Metodo de Contacto</legend>
                <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefonos</label>
                    <input name="contacto" type="radio" value="telefono" id="contactar-telefono">

                    <label for="contactar-correo">E-mail</label>
                    <input name="contacto" type="radio" value="correo" id="contactar-correo">
                </div>

                <p>Si eligio telefono eliga la fecha para ser contactado</p>

                <label for="fecha">Fecha</label>
                <input type="date" id="fecha">

                <label for="hora">hora</label>
                <input type="time" id="hora" min="09:00" max="18:00">
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">

        </form>
    </main>

    <footer class="footer seccion">
        <div class="contenedor-footer contenedor">
            <nav class="navegacion">
                <a href="nosotros.php">Nosotros</a>
                <a href="anuncios.php">Anuncios</a>
                <a href="blog.php">Blog</a>
                <a href="contacto.php">Contacto</a>
            </nav>
        </div>

        <p class="copyright">Todos los derechos reservados 2026</p>
    </footer>
    <script src="build/js/bundle.min.js"></script>
</body>

</html>