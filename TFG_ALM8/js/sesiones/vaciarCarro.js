document.addEventListener('DOMContentLoaded', function () {
  const cerrarSesion = document.getElementById('cerrarSesion');
  cerrarSesion.addEventListener('click', function (event) {
    event.preventDefault(); 

    // FUNCION PARA VACIAR CARRITO QUE ESTA EN OTRO JS
    emptyCart();


    window.location.href = cerrarSesion.href;
  });
});