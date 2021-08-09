$(document).ready(function(){
$(window).load(function() {
        $(".cargando").fadeOut(1000);
        });  
});

$(document).ready(function(){
    $('a').on('click', function(){
        $('a.MiLinkActivo').removeClass('MiLinkActivo');
        $(this).addClass('MiLinkActivo');
    });
});

/*
$('.navbar ul li a').on('click', function(){
    $('li a.seleccionado').removeClass('seleccionado');
    $(this).addClass('seleccionado');
});
*/
/*
$(function() {
  $(".navbar ul li a").click(function() {
    // quitar .seleccionado a todos (por si hay alguno)
    $(".navbar ul li a").removeClass("seleccionado");
    // agregar seleccionado a "este" elemento.
    $(this).addClass("seleccionado");
  });
});
*/


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
  var idCli       = $("#idCli").val();

  //Generando Token Unico del Cliente aleatoriamente
  var caracteres   = "abcdefghijkmnpqrtuvwxyzABCDEFGHJKMNPQRTUVWXYZ23467890";
  var tokenCliente = "";
  for (i=1; i<=30; i++) tokenCliente +=caracteres.charAt(Math.floor(Math.random()*caracteres.length)); 

//Pregunto Existe el Token del Cliente unico en mi LocalStorage?
if("miProducto" in localStorage){

//Consulto el token Unico del Cliente
 let nameTokenProducto = localStorage.getItem('miProducto'); //Consulto
 //console.log('Ya existe el producto: ' + nameTokenProducto);

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
      //location.href="index.php?idCli="+idCli+"&tc="+nameTokenProducto; 
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
  
  
  
  $('.btn-ok').click(function(){
      var id = $(this).attr("id");
      var dataString = 'id='+ id;

      url = "deleteProduct.php";
          $.ajax({
              type: "POST",
              url: url,
              data: dataString,
              success: function(data)
              {
                  $("#registro" + id).hide();
                 //Actualizando el nuevo Precio Total Restando Cantidad
                 let nameTokenProducto = localStorage.getItem('miProducto'); 
                 $.ajax({
                    url: "nuevoTotalPrecio.php?tokenCliente="+nameTokenProducto,
                    type: "POST",
                    data: dataString,
                    success: function(data){
                      $('#confirm-delete'+id).modal('hide'); //Oculto la Ventana Modal
                     var tr = $('#resp'+id).hide(); //Oculto el TR
                      console.log(tr);
                      $("#totalPrecio").html(data); //Refresco el total del Precio
                      //Buscando el total de cantidad 
                      $.post("resultCanTotalProduct.php", {nameTokenProducto: nameTokenProducto}, function (data) {
                         $(".checkout_items").html(data); //Total de Productos seleccionados
                         $("#totalCant").html('('+data+')'); //Items total de cantidad seleccionada
                      }) 
  
                      //Total de Productos Seleccionados
                      $.post("nuevoTotalPagar.php", {nameTokenProducto: nameTokenProducto}, function (data) {
                       $("#totalPuntos").html(data); //Cantidad total de productos seleccionados.
                     }) 
           
  
                    }
                  });
              }
          }); 
  
  });
  
  //Acccion salir de la Modal
  $('.btn-salir').click(function(){
      var id = $(this).attr("id");
      $('#confirm-delete'+id).modal('hide');
  });
  
  });


  //Aumenta cantida de Productos
$('.aumentarCant').click(function(){
  var idProd          = $(this).attr("id");

  //Obtengo la cantidad, le aumento 1 y la muestro en la capa
  $('#display'+idProd).val(parseInt($('#display'+idProd).val()) + 1); 
  
   
   if("miProducto" in localStorage){
     let nameTokenProducto = localStorage.getItem('miProducto'); //Obtengo el token generado ya LocalStorage
  
     var dataString        = 'idProd=' + idProd +'&nameTokenProducto=' + nameTokenProducto;
     $.ajax({
        url: "updateCantidadMisProduct.php",
        type: "POST",
        data: dataString,
        success: function(data){
          $("#display" +idProd).html(data); //Resultado desde updateCantidadMisProduct.php

          //Actualizando el nuevo Precio Total Sumando mas Cantidad
          $.ajax({
            url: "nuevoTotalPrecio.php?tokenCliente="+nameTokenProducto,
            type: "POST",
            data: dataString,
            success: function(data){
             $("#totalPuntos").html(data);
  
             //Buscando total de cantidad
              $.post("resultCanTotalProduct.php", {nameTokenProducto: nameTokenProducto}, function (data) {
                 $(".checkout_items").html(data);
              })
            }
          });
  
        }
      });
   }
  });




  
//Restar Cantidad de Productos.
$(".restarCant").click(function(){ 
  var idProd            = $(this).attr("id");
  //var valorAument       = $("input#display"+idProd).val(); //Importante capturo el valor aumentado
  let nameTokenProducto = localStorage.getItem('miProducto'); 
  
  //Valido que si es mayor a 0 para evitar numero negativos, 
  //es decir si es menor a 0 no se ejecutara la funcion de restar.
  //if (valorAument >1) {
   var valor = $('#display'+idProd).val(parseInt($('#display'+idProd).val()) - 1);
  
    var dataString   = 'idProd=' + idProd +'&nameTokenProducto=' + nameTokenProducto;
     $.ajax({
        url: "updateCantidadMisProductRestar.php",
        type: "POST",
        data: dataString,
        success: function(data){
         $("#display" +idProd).html(data);      
  
         //Actualizando el nuevo Precio Total Restando Cantidad
         $.ajax({
            url: "nuevoTotalPrecio.php?tokenCliente="+nameTokenProducto,
            type: "POST",
            data: dataString,
            success: function(data){
             $("#totalPuntos").html(data);
  
              //Buscando el total de cantidad 
              $.post("resultCanTotalProduct.php", {nameTokenProducto: nameTokenProducto}, function (data) {
                 $(".checkout_items").html(data);
              }) 
            }
          });
         //Fin nuevo Total despues de una resta
        }
      });
    //}
  });
  