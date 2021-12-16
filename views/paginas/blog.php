<main class="contenedor seccion contenido-centrado">
    <h1>Nuestro Blog</h1>

    <article class="entrada-blog">
        <?php foreach($blogs as $blog): ?>
        <div class="imagen">
            
            <img src="/imagenes/<?php echo $blog->imagen; ?>" alt="Texto Entrada Blog" loading="lazy">
           
        </div>
        <div class="texto-entrada">
            <a href="/entrada?id=<?php echo $blog->id; ?>">
                <h4><?php echo $blog->titulo; ?></h4>
                <p>Escrito el <span><?php echo $blog->fecha; ?> </span>por: <span><?php echo $blog->escrito; ?></span></p>
                <p>
                    <?php echo $blog->descripcion; ?>
                </p>
            </a>
        </div>
        <?php endforeach; ?>
    </article>
</main>