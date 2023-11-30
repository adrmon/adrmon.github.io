document.addEventListener("DOMContentLoaded", function () {
  fetch('../php/gestionUsuarios/getUser.php')
      .then(response => response.json())
      .then(data => {
          if (data.success) {
              //document.getElementById('userID').innerText = 'ID: ' + data.id;
              document.getElementById('datos').innerText = 'Tu pedido llegara en unos dias a la direccion, '+data.address+
              ', recibiras un correo en, '+data.email+' y un mensaje '+data.phone+' cuando tu pedido este en reparto.';
          } else {
              console.error(data.error);
          }
      })
      .catch(error => console.error('Error:', error));
});