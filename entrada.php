<?php 
    require 'includes/funciones.php';
    incluirTemplate('header')
    
    ?>

    <main class="contenedor seccion contenido-centrado">
        <h1> Guia de Decoracion para tu Hogar </h1>
        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img src="build/img/destacada2.jpg" alt="Anuncio" loading="lazy">
        </picture>

        <p class="informacion-meta">Escrito el: <span>20/06/2026 </span> por: <span>Admin</span></p>
        <div class="resumen-propiedad">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis molestiae qui amet dolorem non! Odio
                numquam sunt perspiciatis provident fugiat est, ratione reprehenderit labore ut voluptate maiores
                tempore eveniet quod!
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim eius, alias aliquam harum voluptate eos
                id quaerat explicabo iste voluptatum fugit adipisci officiis blanditiis quasi, doloremque nisi.
                Voluptate, esse minima.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, itaque quaerat! Nam facilis quod
                quisquam eius aut natus nisi quae reprehenderit inventore, eveniet qui iste, error recusandae minus enim
                corporis.</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quibusdam sit suscipit nam error dignissimos
                laboriosam corporis culpa vero assumenda eos possimus asperiores nesciunt expedita voluptate praesentium
                facere, laborum obcaecati nostrum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum quam
                voluptas delectus eaque exercitationem quas, temporibus, blanditiis itaque porro ipsa iusto modi
                asperiores officiis dolore voluptatem inventore adipisci non! Nemo.</p>
        </div>
    </main>

    <?php incluirTemplate('footer')?>

    <script src="build/js/bundle.min.js"></script>
</body>

</html>