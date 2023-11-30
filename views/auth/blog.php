<h1 class="nombre-pagina"><?php echo $titulo; ?></h1>

<p class="descripcion-pagina">Estilo es Belleza</p>
<body>
    <article class="entrada-blog">
        <picture >
            <source srcset="build/img/images1.webp" type="image/webp">
            <source srcset="build/img/images1.jpeg" type="image/jpeg">
            <img loading="lazy" src="build/img/images1.jpg" alt="Imagen Logo">
        </picture>

        <div class="texto-entrada">
            <h4>Tu belleza no es un Gasto</h4>
            <p>Servicio desde: <span>20/10/2021</span></p>

            <p>
                Tu piel es una inversión NO un gasto.
                ¡ Mímate cada día un poquito !    
            </p>
        </div>
    </article>

    <article class="entrada-blog">
        <picture >
            <source srcset="build/img/images2.webp" type="image/webp">
            <source srcset="build/img/images2.jpeg" type="image/jpeg">
            <img loading="lazy" src="build/img/images.jpg" alt="Imagen Logo">
        </picture>
        <div class="texto-entrada">
            <h4>Déjate consentir un poco</h4>
            <p>Servicio desde: <span>20/10/2021</span></p>

            <p>
                El Outfit de hoy es la Actitud.
                La vida no es perfecta pero el Outfit sí puede serlo.    
            </p>
        </div>
    </article>

    <?php
        include_once __DIR__ . '/../templates/footer.php';
    ?>
    
</body>
