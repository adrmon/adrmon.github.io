// CHAT GPT EN ALGUNAS LINEAS
$(document).ready(function () {
  $("#form").submit(function (e) {
    e.preventDefault();
    console.log("Form enviado");

    var formData = {
      name: $("#name").val(),
      email: $("#email").val(),
      phone: $("#phone").val(),
      address: $("#address").val(),
      password: $("#password").val(),
      register: "true"
    };

    console.log(formData);
    // AJAX
    // CORREGIDO POR CHAT GPT
    $.ajax({
      type: "POST",
      url: "../php/gestionUsuarios/registrar.php",
      data: formData,
      success: function (response) {
        console.log("Respuesta del servidor:", response);

        var jsonResponse;

        // COMPROBAR SI LA RESPUESTA ES UN OBJETO
        if (typeof response === 'object') {
          jsonResponse = response;
        } else {
          try {
            jsonResponse = JSON.parse(response);
          } catch (e) {
            console.error("Error JSON :", e);
            $("#error").html("Error en el registro. Por favor, inténtelo de nuevo.");
            return;
          }
        }

        console.log("Parsed JSON:", jsonResponse);

        if (jsonResponse.error === "Nombre no disponible") {
          $("#error").html("El nombre ya está registrado.");
      } else if (jsonResponse.error === "Email no disponible") {
          $("#error").html("El email ya está registrado.");
      } else if (jsonResponse.error === "Error en el registro") {
          $("#error").html("Error en el registro.");
      } else if (jsonResponse.error) {
          // VALIDAR CONTRASEÑA
          $("#error").html(jsonResponse.error);
      } else {
          window.location.href = "iniciarsesion.html";
      }
      }
    });
  });
});