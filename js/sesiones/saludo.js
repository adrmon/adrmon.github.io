fetch('../php/gestionUsuarios/getUser.php')
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      // SALUDO
      document.getElementById('saludo').innerText = '¡Hola, ' + data.nombre + '!';
    } else {
      // VOLVEMOS A INCIAR SESION POR SI ACASO
      window.location.href = 'iniciarsesion.html';
    }
  })
.catch(error => console.error('Error:', error));