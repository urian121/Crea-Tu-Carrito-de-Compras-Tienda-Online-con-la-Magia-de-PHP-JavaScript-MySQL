$(document).ready(function(){
$(window).load(function() {
        $(".cargando").fadeOut(1000);
        });  
});



/***** Registrar Pedido *******/
$(".comprar").on('click', function(e){
  e.preventDefault();

  $(this).addClass('clicked'); //Agrego la case

  //Quitar Clase despues de cierto tiempo
  setTimeout(function () {
    $(".comprar").removeClass("clicked");
    }, 3000);


  var idProduct   = $(this).attr('data-id'); //Capturando el Id del Producto
  var ruta        = "recibPedido.php"; //Ruta para almacenar el pedido.

  //Generando Token Unico del Cliente aleatoriamente
  var caracteres   = "abcdefghijkmnpqrtuvwxyzABCDEFGHJKMNPQRTUVWXYZ23467890";
  var tokenCliente = "";
  for (i=1; i<=30; i++) tokenCliente +=caracteres.charAt(Math.floor(Math.random()*caracteres.length)); 

//Pregunto Existe el Token del Cliente unico en mi LocalStorage?
if("miProducto" in localStorage){

 let nameTokenProducto = localStorage.getItem('miProducto'); //Consulto el token Unico del Cliente
 console.log('Ya existe el producto: ' + nameTokenProducto);

 var dataString   = 'idProduct=' + idProduct +'&tokenCliente=' + nameTokenProducto;
 $.ajax({
    url: ruta,
    type: "POST",
    data: dataString,
    success: function(data){
     $(".checkout_items").html(data); // Mostrar la respuestas del script PHP.
    }
  });

}else{
 //No existe el Token del Cliente
 console.log('No existe el producto');

//Ya que no existe, almaceno el Token del Cliente unico en mi LocalStorage.
 localStorage.setItem('miProducto', tokenCliente); //Almaceno el token Unico en la variable miProducto
 let nameTokenProducto = localStorage.getItem('miProducto'); //Consulto el Token Unico ya almacenado.

 var dataString   = 'idProduct=' + idProduct +'&tokenCliente=' + nameTokenProducto;
  $.ajax({
    url: ruta,
    type: "POST",
    data: dataString,
    success: function(data){
      $(".checkout_items").html(data); // Mostrar la respuestas del script PHP.
    }
  }); 
}
return false;
});




// Eliminar Producto de la cesta
$(document).ready(function(){
  //Levanto Ventana Modal, de confirmación. 
  $('.deleteProd').click(function(){
      var id = $(this).attr("id");
      $('#confirm-delete'+id).modal('show');
  });
  
  //Acccion salir de la Modal
  $('.btn-salir').click(function(){
      var id = $(this).attr("id");
      $('#confirm-delete'+id).modal('hide');
  });
  
  });

  