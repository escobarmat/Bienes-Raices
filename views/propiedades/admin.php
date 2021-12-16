<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>
    <?php
        if($resultado){
            $mensaje = mostrarNotificacion(intval($resultado));
            if($mensaje){?>
            <p class="alerta exito">
                <?php echo s($mensaje); ?>
            </p><?php
            }
        } ?>
        
    <a href="/propiedades/crear" class="boton boton-verde">Nueva Propiedad</a>
    <a href="/vendedores/crear" class="boton boton-amarillo">Nuevo/a Vendedor</a>
    <a href="/blog/crear" class="boton boton-amarillo">Nuevo Blog</a>

    <h2>Propiedades</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imágen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <!-- Mostrar los resultados -->
        <tbody>
            <?php foreach($propiedades as $propiedad): ?>

            <tr>
                <td><?php echo $propiedad->id; ?></td>
                <td><?php echo $propiedad->titulo; ?></td>
                <td><img class="imagen-tabla" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="imagen tabla" > </td>
                <td>$ <?php echo $propiedad->precio; ?></td>
                <td>
                    <form method="POST" class="w-100" action="/propiedades/eliminar">
                        <input name="id" value="<?php echo $propiedad->id; ?>" type="hidden">
                        <input name="tipo" value="propiedad" type="hidden">
                        <input class="boton-rojo-block" type="submit" value="Eliminar">
                    </form>

                    <a class="boton-amarillo-block" href="/propiedades/actualizar?id=<?php echo $propiedad->id; ?>">Actualizar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Vendedores</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Imágen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <!-- Mostrar los resultados -->
        <tbody>
            <?php foreach($vendedores as $vendedor): ?>

            <tr>
                <td><?php echo $vendedor->id; ?></td>
                <td><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></td>
                <td> <?php echo $vendedor->telefono; ?></td>
                <td><img class="imagen-tabla" src="/vendedoresimg/<?php echo $vendedor->imagen; ?>" alt="imagen tabla" > </td>
                <td>
                    <form method="POST" class="w-100" action="vendedores/eliminar">
                        <input name="id" value="<?php echo $vendedor->id; ?>" type="hidden">
                        <input name="tipo" value="vendedor" type="hidden">
                        <input class="boton-rojo-block" type="submit" value="Eliminar">
                    </form>

                    <a class="boton-amarillo-block" href="/vendedores/actualizar?id=<?php echo $vendedor->id; ?>">Actualizar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Blog</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Escrito Por: Fecha:</th>
                <th>Imagen</th>
                <th>Descripcion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <!-- Mostrar los resultados -->
        <tbody>
            <?php foreach($blogs as $blog): ?>

            <tr>
                <td><?php echo $blog->id; ?></td>
                <td> <?php echo $blog->titulo; ?></td>
                <td><?php echo $blog->escrito . " " . $blog->fecha; ?></td>
                <td><img class="imagen-tabla" src="/imagenes/<?php echo $blog->imagen; ?>" alt="imagen tabla" > </td>
                <td><?php echo $blog->descripcion; ?></td>
                <td>
                    <form method="POST" class="w-100" action="blog/eliminar">
                        <input name="id" value="<?php echo $blog->id; ?>" type="hidden">
                        <input name="tipo" value="blog" type="hidden">
                        <input class="boton-rojo-block" type="submit" value="Eliminar">
                    </form>

                    <a class="boton-amarillo-block" href="/blog/actualizar?id=<?php echo $blog->id; ?>">Actualizar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>