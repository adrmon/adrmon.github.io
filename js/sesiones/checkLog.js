// CHAT GPT EN ALGUNAS LINEAS
$(document).ready(function() {
    $("#form").submit(function(e) {
        e.preventDefault(); // PREVENIR ACCION POR DEFECTO
        console.log("Form submitted");
  
        // DATOS DEL FORMULARIO
        var formData = {
            name: $("#name").val(),
            password: $("#password").val(),
            login: "true"
        };
  
        console.log(formData);
  
        // AJAX
        // CORREGIDO POR CHAT GPT
        $.ajax({
            type: "POST",
            url: "../php/iniciarsesion.php",
            data: formData,
            success: function(response) {
                console.log("respuesta del servidor:", response);
  
                // CHECK SI ES UN OBJETO
                if (response.error) {
                    $("#error").html(response.error);
                } else if (response.success) {
                    // SI ES USUARIO ES ADMINISTRADOR
                    if (formData.name.toLowerCase() === 'admin') {
                        // PAGINA PARA EL ADMIN
                        window.location.href = "../php/admin.php";
                    } else {
                        // PAGINA PARA EL CLIENTE
                        window.location.href = "bienvenido.html";
                    }
                } else {
                    $("#error").html("Error desconocido en el inicio de sesión.");
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                console.error("AJAX error:", textStatus, errorThrown);
                $("#error").html("Error en el inicio de sesión. Intentalo otra vez.");
            }
        });
    });
  });
  