document.addEventListener("DOMContentLoaded", function () {
  eventListeners();
  darkmode();
});

function eventListeners() {
  const mobilMenu = document.querySelector(".mobile-menu");

  mobilMenu.addEventListener("click", showMenu);
}

function showMenu() {
  const navegacion = document.querySelector(".navegacion");
  console.log("Pulsado");
  console.log(navegacion);
  navegacion.classList.toggle("mostrar");
}


function darkmode() {
  const prefiereDarkMode =window.matchMedia('(prefers-color-scheme: dark)');

  if (prefiereDarkMode.matches) {
    document.body.classList.add("dark-mode");
  } else {
    document.body.classList.remove("dark-mode");
  }

  prefiereDarkMode.addEventListener('change', () => {
    console.log(prefiereDarkMode);
    if (prefiereDarkMode.matches) {
      document.body.classList.add("dark-mode");
    } else {
      document.body.classList.remove("dark-mode");
    }
  });

  const darkMode = document.querySelector(".darkmode");
  darkMode.addEventListener("click", function () {
    document.body.classList.toggle("dark-mode");
  });
}
