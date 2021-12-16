<main class="contenedor seccion contenido-centrado">

        <h1><?php echo $blog->titulo; ?></h1>
        

        <img src="imagenes/<?php echo $blog->imagen; ?>" alt="imagen de propiedad" loading="lazy">
       
        <p class="informacion-meta">Escrito el: <span><?php echo $blog->fecha; ?></span> por: <span><?php echo $blog->escrito; ?></span></p>
            
        <div class="resumen-propiedad">
            <p><?php echo $blog->descripcion; ?></p>

            <p>Aliquam lectus magna, luctus vel gravida nec, iaculis ut augue. Praesent ac enim lorem. Quisque ac dignissim sem, non condimentum orci. Morbi a iaculis neque, ac euismod felis. Fusce augue quam, fermentum sed turpis nec, hendrerit dapibus ante. Cras mattis laoreet nibh, quis tincidunt odio fermentum vel. Nulla facilisi.</p>
                
        </div>
</main>