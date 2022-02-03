$(document).ready(function () {

  
$("#grabar").click(function (e) {
  e.preventDefault();
  var fecha = $('#fecha').val();
  var idfiado =  parseInt($('#idfiado').val());
 

 // console.log(idfiado);
  


    $.ajax({
      type: "POST",
      url: "ajax/registraVentaFiado.php",
      data: { fecha: fecha, idfiado:idfiado },
      datatype: "json",
      success: function (response) {
        var repuesta2 = JSON.parse(response);

        if(repuesta2.Venta=='Contado'){
          Swal.fire({
            icon:"success",
            title:"Ok...",
            text: "Se registro la FACTURA Nro :"+ repuesta2.facturaNro,
            showDenyButton: true,
            // showCancelButton: true,
            confirmButtonText: "Imprimir Recibo",
            denyButtonText: `Salir`,
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
              // Swal.fire("Saved!", "", "success");
              window.open("recibo-factura.php?vta=" + repuesta2.facturaNro, "_blank");
              window.location.href="panel-venta-fiado.php";
            } else if (result.isDenied) {
              console.log('presione el boton salir');
              window.location.href="panel-venta-fiado.php";
              // Swal.fire("Changes are not saved", "", "info");
            }
          });
          /////setTimeout("location.reload()", 500);


          // setTimeout("location.reload()", 1000);
          // console.log(response);
        }
        // Swal.fire({
        //   icon: 'success',
        //   title: 'Ok...',
        //   text: 'Se registro la FACTURA Nro :'+response
          
        // });
        //setTimeout(window.location.href="panel-venta-fiado.php",1500);	
        //console.log(response);
      },
    });
  });

  // console.log("esta es el objeto parseado JSON.stringify..... : " + detalle);
});




