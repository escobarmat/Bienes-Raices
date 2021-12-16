document.addEventListener("DOMContentLoaded", function(){
   


    eventListeners();
    
    darkMode();
});


function darkMode(){
    const prefiereDarkMode = window.matchMedia("(prefers-color-scheme: dark)");

    // console.log(prefiereDarkMode.matches);
    if(prefiereDarkMode.matches){
        document.body.classList.add("dark-mode");
    }else{
        document.body.classList.remove("dark-mode");

    }
    prefiereDarkMode.addEventListener("change", function(){
        if(prefiereDarkMode.matches){
            document.body.classList.add("dark-mode");
        }else{
            document.body.classList.remove("dark-mode");
    
        }
    });


    const botonDarkMode = document.querySelector('.dark-mode-boton');

    botonDarkMode.addEventListener("click", function(){
       document.body.classList.toggle("dark-mode");
       
    });
}

function eventListeners(){
    const mobileMenu = document.querySelector(".mobile-menu");

    mobileMenu.addEventListener("click", navegacionResponsive);

    //Muestra campos condicionales
    const metodoContacto = document.querySelectorAll("input[name='contacto[contacto]']");
    metodoContacto.forEach(input => input.addEventListener("click", mostrarMetodosContacto));

}

function mostrarMetodosContacto(e){
    const contactoDiv = document.querySelector("#contacto");

    if(e.target.value === "telefono"){
        contactoDiv.innerHTML = `
            <label for="telefono">Número Teléfono</label>
            <input name="contacto[telefono]" type="tel" placeholder="Tu telefono" id="telefono">

            <p>Elija la fecha y la hora para ser contactado</p>

            <label for="fecha">Fecha</label>
            <input name="contacto[fecha]" type="date" id="fecha">

            <label for="hora">Hora</label>
            <input name="contacto[hora]" type="time" id="hora" min="09:00" max="18:00">
        `;  
    }else{
        contactoDiv.innerHTML = `
            <label for="email">E-mail</label>
            <input required name="contacto[email]" type="email" placeholder="Tu E-mail" id="email">
        `;
    }
}

function navegacionResponsive(){
    const navegacion = document.querySelector(".navegacion");
    navegacion.classList.toggle("mostrar");
    // if(navegacion.classList.contains("mostrar")){
    //     navegacion.classList.remove("mostrar");
    // }else{
    //     navegacion.classList.add("mostrar");
    // }
}
