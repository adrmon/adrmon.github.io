document.addEventListener('DOMContentLoaded', function() {
  const temaGuardado = localStorage.getItem('tema');
  if (temaGuardado === 'dark') {
    document.body.classList.add('temaOscuro');
  }

  function cambiarTema() {
    const body = document.body;
    body.classList.toggle('temaOscuro');

    // localStorage
    const temaActual = body.classList.contains('temaOscuro') ? 'dark' : 'light';
    localStorage.setItem('tema', temaActual);
  }

  window.cambiarTema = cambiarTema;
});
