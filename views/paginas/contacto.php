<main class="contenedor seccion">
        <h1>Contacto</h1>

        <?php if($mensaje): ?>       
           <p class='alerta exito'><?php echo $mensaje; ?></p> 
        <?php endif; ?>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="imagen contacto" width="200" height="300">
        </picture>
        <h2>Llene el formulario de contácto</h2>

        <form action="/contacto" class="formulario" method="POST">

            <fieldset>
                <legend>Información Personal</legend>
                <label for="nombre">Nombre</label>
                <input required name="contacto[nombre]" type="text" placeholder="Tu Nombre" id="nombre">
                
                <label for="mensaje">Mensaje</label>
                <textarea required  placeholder="Tu Mensaje" id="mensaje" name="contacto[mensaje]"></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion sobre la propiedad</legend>

                <label for="opciones">Vende o Compra</label>
                <select required name="contacto[tipo]" id="opciones">
                    <option value="" disabled selected>--Seleccione--</option>
                    <option value="compra">Compra</option>
                    <option value="vende">Vende</option>
                </select>
                <label for="presupuesto">Precio o Presupuesto</label>
                <input required name="contacto[precio]" type="number" placeholder="Tu precio o presupuesto" id="presupuesto">
            </fieldset>

            <fieldset>
                <legend></legend>
                <p>Como desea ser contactado</p>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input required name="contacto[contacto]" name="contacto" type="radio" value="telefono" id="contactar-telefono">
                    <label for="contactar-email">E-mail</label>
                    <input required name="contacto[contacto]" name="contacto" type="radio" value="email" id="contactar-email">
                </div>

                <div id="contacto"></div>

                
                
            </fieldset>
            <input type="submit" value="Enviar" class="boton-verde">
        </form>
        
    </main>