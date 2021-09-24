$(document).ready(function () {
  // detalle();
  // buscosocio();
  foco();
  $("#dataTablecodigo").DataTable({
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
    responsive: true,
  });
  $("#codigo").keypress(function (e) {
    if (e.which == 13) {
      fcnPrueba();
    
      $("#cantidad").focus();
    }
  });

  $("#candidad").keypress(function (e){
    if (e.which == 13) {
     alert('entre al bendito');
    }
    e.preventDefault();
  });

  $('form').keypress(function(e){   
    if(e == 13){
      return false;
    }
  });

  $('input').keypress(function(e){
    if(e.which == 13){
      return false;
    }
  });

  $("#detalle_ajax").hide();



});

function fcnPrueba(){

  alert('aca entre a la fcnPrueba .....!!!!!');
};

function borro(numero){
  // delete linea[numero];

  linea.splice(numero, 1);
  MostrarTabla(linea);
  // alert('envie el numero de indice a borrar....'+numero );

};


function MostrarTabla(linea){
  if (linea.length > 0){
    $("#detalle_ajax").show();
    var d='';
    console.log('cantidad de la linea recibida : ......'+linea.length);
    for (var i = 0; i < linea.length; i++) {
    d+= '<tr>'+
    '<td>'+linea[i].codigo+'</td>'+
    '<td>'+linea[i].descripcion+'</td>'+
    '<td>'+linea[i].importe+'</td>'+
    '<td>'+linea[i].cantidad+'</td>'+
    "<td><div class='text-center'><div class='btn-group'><button class='btn btn-outline-danger btn-sm btnEliminar' onclick='borro("+i+");'><i class='far fa-trash-alt'></i></button></div></div></td>"
    '</tr>';
    }
    // $("#ajax_lineas").append(d);
    $("#ajax_lineas").html(d);
  }else{
    $("#detalle_ajax").hide();
  }
  

}

var linea = new Array();


$("#carga_codigo").click(function (e) {
    e.preventDefault();
    var codigo = parseInt($("#codigo").val());
    var descripcion = $("#descripcion").val();
    var importe = parseFloat($("#importe").val()) ;
    var cantidad = parseInt($("#cantidad").val()) ;

    objLinea = {
      codigo: codigo,
      descripcion: descripcion,
      importe: importe,
      cantidad: cantidad,
    };

    linea.push(objLinea);
    console.log(linea);
    $("#frm-linea")[0].reset();
    $("#codigo").focus();
    MostrarTabla(linea);
});

$("#grabar").click(function (e) { 
  e.preventDefault();
  // var objparseado = JSON.parse(linea);
  alert("he llegado a entrar a grabar");
  var fecha ='2021-09-21';
  var cliente = 1;
  var detalle=JSON.stringify(linea);
  
  $.ajax({
    type: "POST",
    url: "ajax/registraVenta.php",
    data: {fecha:fecha,cliente:cliente,detalle:detalle},
    
    success: function (response) {
      
      linea=[];// vacia 
      MostrarTabla(linea);
      //console.log(response);
    }
  });
  console.log('esta es el objeto parseado JSON.stringify..... : '+detalle); 
});

function focoImporte() {
  $("#importe").focus();
  $("#importe").select();
}
function foco() {
  $("#codigo").focus();
}

// function detalle() {
//   var dni = $("#dni").val();
//   $.ajax({
//     type: "POST",
//     url: "ajax/op-tem-detalles.php",
//     data: { dni },
//     success: function (response) {
//       $("#detalle_ajax").html(response);
//     },
//   });
// }

// $("#frm-linea").submit(function (event) {
//   var parametros = $(this).serialize();
//   $.ajax({
//     type: "POST",
//     url: "ajax/tmp-op.php",
//     data: parametros,
//     beforeSend: function (objeto) {
//       $("#resultados_ajax").html("Mensaje: Cargando...");
//     },
//     success: function (datos) {
//       $("#resultados_ajax").html(datos);
//       detalle();
//       $("#frm-linea").trigger("reset");
//       foco();
//     },
//   });
//   event.preventDefault();
// });

// function buscosocio() {
//   var dni = $("#dni").val();

//   $.ajax({
//     type: "POST",
//     url: "ajax/busco_socio.php",
//     data: { dni: dni },
//     success: function (respuesta) {
//       var socio = JSON.parse(respuesta);
//       var template = "";

//       socio.forEach((socios) => {
//         //console.log(socios);
//         template += `
//                 <h4 style="display: inline;"><strong class="text-info">Alumno:</strong>  ${socios.nombre} ${socios.apellido} <strong> Dni: </strong> ${socios.dni} </h4>
//                 <div class="float-right">
//                     <h5><strong class="text-info"> ${socios.recidente}</strong></h5>
//                 </div>
                
//                 `;
//       });

//       $("#socio").html(template);
//     },
//   });
// }

// $(document).on("click", ".btnElegir", function () {
//     fila = $(this).closest("tr");
//     id = parseInt(fila.find("td:eq(0)").text());
//     $("#codigo").val(id);
//     $("#modalCodigo").modal("hide");
//     $("#codigo").blur();
// });

$(document).on("click", ".btnElegir", function () {
  fila = $(this).closest("tr");
  id = parseInt(fila.find("td:eq(0)").text());
  $("#codigo").val(id);
  $("#modalCodigo").modal("hide");
  $("#codigo").focus();
});

function fococantidad() {
  $("#cantidad").focus();
  $("#cantidad").select();
  // $("#frm-generar-pedido")[0].reset();
}

$("#codigo").blur(function () {
  var codigo = parseInt($("#codigo").val());
  console.log(codigo);
 
  if (codigo == null || codigo.length == 0 || /^\s+$/.test(codigo) || codigo=="") {
    alert('el codigo esta vacio');
    $("#frm-linea").trigger("reset");
    alert('el codigo esta vacio');
  } else {
    $.ajax({
      type: "POST",
      url: "ajax/busco_codigo.php",
      data: { codigo: codigo },
      success: function (respuesta) {
        var cod = JSON.parse(respuesta);
        var template = "";
        if (cod != "") {
          $("#descripcion").val(cod[0].descripcion);
          $("#importe").val(cod[0].importe);
          $("#cantidad").val(1);
          fococantidad();
        } else {
          $("#frm-linea")[0].reset();
          $("#codigo").val("");
          $("#codigo").focus();

          Swal.fire({
            icon: "error",
            title: "Atención...",
            text: "El Código de Artículo no existe!",
          });
        }

        // $('#codNombre').html(template);
      }, ////fin del success
    }); /////fin de ajax
    fococantidad();
  } ////fin del else
});

// Borro solo un item del detalle de pagos
// $(document).on("click", ".borro-item", function () {
//   var elemento = $(this)[0].parentElement.parentElement;
//   var id = $(elemento).attr("idcodigo");
//   $.post("ajax/borro_item.php", { id }, function (respuesta) {
//     detalle();
    
//   });
// });

$("#genero-op").on("click", function () {
  var dni = $("#dni").val();
  var totalop = $("#totalop").val();
  var hoy = $("#hoy").val();

  $.ajax({
    type: "POST",
    url: "ajax/nuevo_op.php",
    data: { dni, totalop, hoy },
    success: function (respuesta) {
      //console.log(respuesta);

      alert("Se dio de alta la orden de pagos " + respuesta);
      detalle();

      window.open("./reportes/orden_de_pago.php?op=" + respuesta, "_blank");
    },
  });
});
