// CHAT GPT EN ALGUNAS LINEAS
//PROBLEMAS DE INCONSISTENCIA ESPAÑOL/INGLES
let cartItems = [];
let cartList;
let cartTotal;
//ACUTALIZAR CARRITO
function updateCart() {
  cartList.innerHTML = ''; // LIMPIAMOS LA LISTA

  cartItems.forEach(item => {
    const cartItem = document.createElement('li');
    const price = typeof item.precio === 'number' && !isNaN(item.precio) ? item.precio.toFixed(2) : 'N/A';
    cartItem.textContent = `${item.nombre} - ${price}€`;
    cartList.appendChild(cartItem);
  });

  const total = cartItems.reduce((acc, item) => {
    return typeof item.precio === 'number' && !isNaN(item.precio) ? acc + item.precio : acc;
  }, 0);

  cartTotal.textContent = `${total.toFixed(2)}€`;

  //localStorage
  localStorage.setItem('cartItems', JSON.stringify(cartItems));
}

document.addEventListener('DOMContentLoaded', function () {
  
  cartList = document.getElementById('cartList');
  cartTotal = document.getElementById('cartTotal');

  //PARA QUE APAREZCA AUTOMANTICAMENTE AL ABRIR UNA NUEVA PESTAÑA
  cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
  updateCart();

  //ARCHIVO PHP(VIGILAR LA RUTA)
  fetch('../php/productos/gomasysp.php')
    .then(response => response.json())
    .then(data => {
      // PARA QUE SE MANTENGA EN DIFERENTES PESTAÑAS localStorage
      cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

      const productContainer = document.getElementById('productContainer');
      
    })
    .catch(error => {
      console.error('Error:', error);
    });

    //BOTON VACIAR CARRITO
    const emptyButton = document.getElementById('vaciarBoton');
    emptyButton.id = 'vaciarBoton';
    emptyButton.addEventListener('click', emptyCart);

    //BOTON COMPRAR
    const buyButton = document.getElementById('comprar');
    buyButton.id = 'comprar';
    buyButton.addEventListener('click', buy);
    
});


//FUNCION LIMPIAR CARRO
function emptyCart() { 
  console.log('Carrito vaciado');
  //  LIMPIAMOS CARRITO
  cartItems = [];
  updateCart();
}
//FUNCION COMPRAR LO QUE HAY EN EL CARRO
function buy() {
  // CHEKEAMOS SI EL USER ESTA LOGGED
  fetch('../php/gestionUsuarios/getUser.php')
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        // SI LO ESTA, CHEKEAMOS SI HAY ALGO EN EL CARRO
        if (cartItems.length === 0) {
          alert('Carrito vacío?');
        } else {
          // COMPRAMOS E INSERTAMOS EN PEDIDOS
          fetch('../php/gestionProductos/comprar.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
            },
            body: JSON.stringify(cartItems),
          })
            .then(response => {
              if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
              }
              return response.json();
            })
            .then(data => {
              console.log('COMPRA OK', data);
              // TODO BIEN, VACIAMOS CARRTIO
              crearFactura();
              emptyCart();
              window.location.href = '../html/comprarealizada.html';
            })
            .catch(error => {
              console.error('Error:', error);
              alert('Error');
            });
        }
      } else {
        // NO HAY NADIE LOGGED
        alert('Inicia sesión para comprar.');
      }
    })
    .catch(error => console.error('Error:', error));
}

function crearFactura() {
  fetch('../php/gestionPedidos/factura.php')
    .then(response => response.text())
    .then(data => {
      console.log(data);
    })
    .catch(error => {
      console.error('Error:', error);
    });
}

function actualizarStock() {
  fetch('../php/gestionProductos/actualizarStock.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(cartItems),
  })
    .then(response => {
      if (!response.ok) {
        throw new Error(`Error: ${response.status}`);
      }
      return response.json();
    })
    .then(data => {
      console.log('Stock actualizado:', data);
    })
    .catch(error => {
      console.error('Error en el update:', error.message);
    });
}