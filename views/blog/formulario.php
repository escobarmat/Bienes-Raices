<fieldset>

    <legend>Nuevo Blog</legend>

    <label for="titulo">Titulo</label>
    <input value="<?php echo s($blog->titulo); ?>" name="blog[titulo]" type="text" id="titulo" placeholder="Titulo Blog">

    <label for="fecha">Fecha</label>
    <input value="<?php echo s($blog->fecha); ?>" name="blog[fecha]" type="date" id="fecha" placeholder="Fecha">

    <label for="escrito">Escrito Por</label>
    <input value="<?php echo s($blog->escrito); ?>" name="blog[escrito]" type="text" id="escrito" placeholder="Escrito Por">

    <label for="imagen">Imagen</label>
    <input name="blog[imagen]" type="file" id="imagen" accept="image/jpeg, image/png">
    <?php if($blog->imagen): ?>
        <img src="/imagenes/<?php echo $blog->imagen ?>" class="imagen-small" >
    <?php endif;?>
    <label for="descripcion">Descripcion</label>
    <textarea name="blog[descripcion]" id="descripcion"><?php echo s($blog->descripcion); ?></textarea>

</fieldset>

