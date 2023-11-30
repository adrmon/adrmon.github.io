$(document).ready(function () {
    $.ajax({
        type: 'GET',
        url: '../php/gestionPedidos/mostrarFactura.php',
        dataType: 'json',
        success: function (data) {
            if (data.success) {
                data.data.forEach(function(item) {
                    $('#compras').append(`
                        <p>ID Factura: <span class="datosFactura">${item.idfactura}</span></p>
                        <p>ID Pedido: <span class="datosFactura">${item.idpedido}</span></p>
                        <p>ID Cliente: <span class="datosFactura">${item.idcliente}</span></p>
                        <p>Total: <span class="datosFactura">${item.total}</span> €</p>
                        <p>Fecha: <span class="datosFactura">${item.fecha}</span></p>
                        <hr>
                    `);
                });
            } else {  
                $('#result').html(`<p>Error: ${data.error}</p>`);
            }
        },
        error: function () {
            $('#result').html('<p>Error:fetch data</p>');
        }
    });
});