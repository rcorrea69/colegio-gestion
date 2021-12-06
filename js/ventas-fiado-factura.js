$(document).ready(function () {

  
$("#grabar").click(function (e) {
  e.preventDefault();
  var fecha = $('#fecha').val();
  var idfiado =  parseInt($('#idfiado').val());
 

  console.log(idfiado);
  


    $.ajax({
      type: "POST",
      url: "ajax/registraVentaFiado.php",
      data: { fecha: fecha, idfiado:idfiado },
      success: function (response) {

        Swal.fire({
          icon: 'success',
          title: 'Ok...',
          text: 'Se registro la FACTURA Nro :'+response
          
        });
        setTimeout(window.location.href="panel-venta-fiado.php",1500);	
        //console.log(response);
      },
    });
  });

  // console.log("esta es el objeto parseado JSON.stringify..... : " + detalle);
});




