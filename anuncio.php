<?php 
    require 'includes/funciones.php';
    incluirTemplate('header')
    
    ?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en Venta En el Bosque </h1>

        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img src="build/img/destacada.jpg" alt="Anuncio" loading="lazy">
        </picture>

        <div class="resumen-propiedad">
            <p class="precio">$6,000,000</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" src="build/img/icono_wc.svg" alt="IconoWC" loading="lazy">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_estacionamiento.svg" alt="IconoEstacionamiento" loading="lazy">
                    <p>2</p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_dormitorio.svg" alt="IconoDormitorio" loading="lazy">
                    <p>2</p>
                </li>
            </ul>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis molestiae qui amet dolorem non! Odio
                numquam sunt perspiciatis provident fugiat est, ratione reprehenderit labore ut voluptate maiores
                tempore eveniet quod!
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim eius, alias aliquam harum voluptate eos
                id quaerat explicabo iste voluptatum fugit adipisci officiis blanditiis quasi, doloremque nisi.
                Voluptate, esse minima.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, itaque quaerat! Nam facilis quod
                quisquam eius aut natus nisi quae reprehenderit inventore, eveniet qui iste, error recusandae minus enim
                corporis.</p>
        </div>
    </main>

    <?php incluirTemplate('footer')?>
    <script src="build/js/bundle.min.js"></script>
</body>

</html>