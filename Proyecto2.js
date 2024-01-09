function Asignaturas() {
  window.location.href = "Asignaturas.php";
}

window.onload = function () {
  const spans = document.querySelectorAll('#Planaprincipal span');
  const colors = ['#FFA500', '#FFC0CB', '#A52A2A', '#0000FF', '#FF0000', '#FFC0CB', '#FFC0CB', '#A52A2A', '#0000FF', '#FF0000'];
  let index = 0;

  function cambiarColores() {
    spans.forEach(function (span, i) {
      span.style.color = colors[(index + i) % colors.length];
    });
    index = (index + 1) % colors.length;
  }

  setInterval(cambiarColores, 500); // Cambiar colores cada 500 milisegundos (0.5 segundos)
};

function canviarItem() {
  window.location.href = "CrearItem.php";
}

function canviarActividad() {
  window.location.href = "CrearActividad.php";
}