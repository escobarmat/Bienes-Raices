<main class="contenedor seccion">
    
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
</main>