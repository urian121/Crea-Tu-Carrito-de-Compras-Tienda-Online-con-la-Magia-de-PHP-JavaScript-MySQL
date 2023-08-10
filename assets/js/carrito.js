let ruta = `funciones/funciones_carrito.php`; //Ruta para almacenar el pedido.

/**
 * Función para agregar un producto al carrito de compra desde el detalle del producto.
 */
function agregarCarrito(btn_cart, idProduct, precio) {
  if (!btn_cart.classList.contains("loading")) {
    btn_cart.classList.add("loading");
    setTimeout(() => btn_cart.classList.remove("loading"), 1500);
  }

  let nameTokenProducto;

  if ("miProducto" in localStorage) {
    nameTokenProducto = localStorage.getItem("miProducto");
  } else {
    nameTokenProducto = tokenUnico();
    localStorage.setItem("miProducto", nameTokenProducto);
  }

  let dataString = `accion=addCar&idProduct=${idProduct}&precio=${precio}&tokenCliente=${nameTokenProducto}`;

  // Realizar la petición POST con Axios
  axios
    .post(ruta, dataString)
    .then((response) => {
      document.querySelector(".checkout_items").innerHTML = response.data;
    })
    .catch((error) => {
      console.error("Error al realizar la petición: ", error);
    });
  return false;
}

//Generando Token Unico del Cliente aleatoriamente
function tokenUnico() {
  const caracteres = "abcdefghijkmnpqrtuvwxyzABCDEFGHJKMNPQRTUVWXYZ23467890";
  const longitud = 32;
  let tokenCliente = "";

  for (let i = 0; i < longitud; i++) {
    const index = Math.floor(Math.random() * caracteres.length);
    tokenCliente += caracteres[index];
  }
  return tokenCliente;
}

/**
 * Función para aumentar de cantidad un producto
 */
function aumentar_cantidad(idProd, precio) {
  //Obtengo la cantidad, le aumento 1 y la muestro en la capa
  let cantidaProducto = document.querySelector(`#display${idProd}`);
  let valorActual = parseInt(cantidaProducto.innerText);
  let nuevaCantidad = valorActual + 1;
  cantidaProducto.innerText = nuevaCantidad;

  //Aumentando cantidad en el carrito
  let cantidadCarrito = document.getElementById("checkout_items").innerText;
  cantidadCarrito = parseInt(cantidadCarrito) + 1;
  document.getElementById("checkout_items").innerText = cantidadCarrito;

  if ("miProducto" in localStorage) {
    let nameTokenProducto = localStorage.getItem("miProducto"); //Obtener el token generado ya LocalStorage
    let dataString = `idProd=${idProd}&precio=${precio}&tokenCliente=${nameTokenProducto}&aumentarCantida=${nuevaCantidad}`;

    axios
      .post(ruta, dataString)
      .then(function (response) {
        document.querySelector(
          "#totalPuntos"
        ).textContent = `$ ${formatearCantidad(response.data)}`;
      })
      .catch(function (error) {
        console.error("Error:", error);
      });
  }
}

/**
 * Disminuir la cantidad de productos en mi carrito de compra
 */
function disminuir_cantidad(idProd, precio) {
  let cantidaProducto = document.querySelector(`#display${idProd}`);
  let valorActual = parseInt(cantidaProducto.innerText);

  if (valorActual >= 1) {
    /**Si la cantidad total del producto restado es igual a 1 */
    if (valorActual == 1) {
      let fila = document.querySelector(`#resp${idProd}`);
      fila.remove();
    }

    // Evitar que la cantidad sea menor que cero
    let nuevaCantidad = valorActual - 1;
    cantidaProducto.innerText = nuevaCantidad;

    //Disminuyo la cantidad en mi carrito de compra
    let cantidadCarrito = document.getElementById("checkout_items").innerText;
    cantidadCarrito = parseInt(cantidadCarrito) - 1;
    document.getElementById("checkout_items").innerText = cantidadCarrito;

    if ("miProducto" in localStorage) {
      let nameTokenProducto = localStorage.getItem("miProducto"); //Obtener el token generado ya LocalStorage
      let dataString = `accion=disminuirCantida&idProd=${idProd}&precio=${precio}&tokenCliente=${nameTokenProducto}&disminuirCantida=${nuevaCantidad}`;

      axios
        .post(ruta, dataString)
        .then(function (response) {
          document.querySelector(
            "#totalPuntos"
          ).textContent = `$ ${formatearCantidad(response.data)}`;

          verificarResumenPedido(nameTokenProducto);
        })
        .catch(function (error) {
          console.error("Error:", error);
        });
    }
  }
}

// Función para mostrar el modal de confirmación para borrar el producto
function borrar_producto(idProduct) {
  var modal = document.getElementById("confirm-delete" + idProduct);
  modal.style.display = "block";
}

// Función para cerrar el modal de confirmación
function salir_modal(tempId) {
  var modal = document.getElementById("confirm-delete" + tempId);
  modal.style.display = "none";
}

function formatearCantidad(cantidad) {
  let formattedTotal = cantidad.toLocaleString("es-ES", {
    minimumFractionDigits: 0,
    maximumFractionDigits: 2,
  });
  return formattedTotal;
}

function verificarResumenPedido(nameTokenProducto) {
  console.log("llegueee*");
  let dataString = `accion=verificarResumenPedido&tokenCliente=${nameTokenProducto}`;
  axios
    .post(ruta, dataString)
    .then(function (response) {
      if (response.data == 0) {
        localStorage.removeItem("miProducto");
        //localStorage.clear();

        window.location.href = window.location.href;
      } else {
        return response.data;
      }
    })
    .catch(function (error) {
      console.error("Error:", error);
    });
}
