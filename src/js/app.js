document.addEventListener("DOMContentLoaded", function () {
  eventListeners();
  darkmode();
});

function eventListeners() {
  const mobilMenu = document.querySelector(".mobile-menu");

  mobilMenu.addEventListener("click", showMenu);

  //MUESTRA CAMPOS CONDICIONALES

  const metodoContacto = document.querySelectorAll(
    'input[name="contacto[contacto]"]'
  );
  metodoContacto.forEach((metodo) => {
    metodo.addEventListener("click", mostrarMetodosContacto);
  });
}

function showMenu() {
  const navegacion = document.querySelector(".navegacion");
  console.log("Pulsado");
  console.log(navegacion);
  navegacion.classList.toggle("mostrar");
}

function darkmode() {
  // const prefiereDarkMode =window.matchMedia('(prefers-color-scheme: dark)');

  // if (prefiereDarkMode.matches) {
  //   document.body.classList.add("dark-mode");
  // } else {
  //   document.body.classList.remove("dark-mode");
  // }

  // prefiereDarkMode.addEventListener('change', () => {
  //   console.log(prefiereDarkMode);
  //   if (prefiereDarkMode.matches) {
  //     document.body.classList.add("dark-mode");
  //   } else {
  //     document.body.classList.remove("dark-mode");
  //   }
  // });

  const darkMode = document.querySelector(".darkmode");
  darkMode.addEventListener("click", function () {
    document.body.classList.toggle("dark-mode");
  });
}

function mostrarMetodosContacto(evt) {
  const contactoDiv = document.querySelector("#contacto");
  if (evt.target.value === "telefono") {
    contactoDiv.innerHTML = `
     <br>
      <label for="telf">Telefono: </label>
      <input id="telf" name="contacto[telf]" type="tel" placeholder="Tu telefono" />

      <p>Elija fecha y hora para la llamada</p>
      <label for="fecha">Fecha: </label>
      <input id="fecha" type="date" name="contacto[fecha]"/>

      <label for="hora">Hora: </label>
      <input id="hora" type="time" min="08:00" max="18:00" name="contacto[hora]"/>
    `;
  } else {
    contactoDiv.innerHTML = `
    <label for="email">Email: </label>
    <input id="email" name="contacto[email]" type="email" placeholder="Tu email" required/>

    `;
  }
}
