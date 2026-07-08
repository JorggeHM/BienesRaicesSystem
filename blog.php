<?php 
    require 'includes/funciones.php';
    incluirTemplate('header')
    
    ?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Nuestro Blog</h1>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img src="build/img/blog1.jpg" alt="Entrada" loading="lazy">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p>
                        Escrito el: <span>20/10/2025</span> por: <span>Admin</span>
                    </p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi accusamus saepe autem odio,
                        vitae est.</p>
                </a>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <img src="build/img/blog2.jpg" alt="Entrada" loading="lazy">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Seleccion de materiales</h4>
                    <p>
                        Escrito el: <span>12/05/2026</span> por: <span>Admin</span>
                    </p>
                    <p> Ipsum, suscipit id vero dolorem rerum officia sapiente eaque..</p>
                </a>
            </div>
        </article>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog4.webp" type="image/webp">
                    <source srcset="build/img/blog4.jpg" type="image/jpeg">
                    <img src="build/img/blog4.jpg" alt="Entrada" loading="lazy">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Consejos de iluminacion</h4>
                    <p>
                        Escrito el: <span>12/05/2026</span> por: <span>Admin</span>
                    </p>
                    <p>Lorem ipsum, dolor sit amet unde voluptatibus nihil quaerat reprehenderit quos consequatur
                        eaque..</p>
                </a>
            </div>
        </article>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog3.webp" type="image/webp">
                    <source srcset="build/img/blog3.jpg" type="image/jpeg">
                    <img src="build/img/blog3.jpg" alt="Entrada" loading="lazy">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Seleccion de materiales</h4>
                    <p>
                        Escrito el: <span>12/05/2026</span> por: <span>Admin</span>
                    </p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi accusamus saepe autem odio,
                        vitae est.</p>
                </a>
            </div>
        </article>

    </main>

    <?php incluirTemplate('footer')?>
    <script src="build/js/bundle.min.js"></script>
</body>

</html>