// PARA CHECKEAR DESDE EL INDEX
$(document).ready(function () {
    // CHEKEAMOS EL LOGIN
    function checkLoginStatus() {
        $.ajax({
            url: './php/gestionUsuarios/checkLog.php',
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // SI HAY ALGUIEN LOGEADO
                    console.log('usuario logeado:', response.name);

                    // CHEKEAMOS SI EL USUARIO ES ADMIN
                    if (response.name && response.name.toLowerCase() === 'admin') {
                        // PAGINA DE ADMIN
                        window.location.href = './php/admin.php';
                    } else {
                        // USUARIOS NORMALES
                        window.location.href = './html/bienvenido.html';
                    }
                } else {
                    // SI NO HAY NADIE LOGEADO
                    window.location.href = './html/iniciarsesion.html';
                    console.log('no hay usuario logeado');
                }
            },
            error: function () {
                console.log('Error login');
            }
        });
    }

    $('#iniciado').on('click', function (event) {
        // PREVENT ACCION POR DEFECTO
        event.preventDefault();

        // CHEKEAMOS EL LOGIN
        checkLoginStatus();
    });
});



  
  