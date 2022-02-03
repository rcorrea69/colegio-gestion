$(document).ready(function () {
  var id, opcion;
  opcion = 4;
  cboSaldosCajas();

  tablaCajas = $("#tablaCajas").DataTable({
    ajax: {
      url: "./ajax/cajasMovimientos.php",
      method: "POST", //usamos el metodo POST
      data: { opcion: opcion }, //enviamos opcion 4 para que haga un SELECT
      dataSrc: "",
    },
    columns: [
      { data: "id_caja" },
      { data: "nombre" },
      { data: "saldo" },
      {
        defaultContent:
          "<div class='text-center'><div class='btn-group'><button class='btn btn-success btn-sm btnEditar'><i class='fas fa-exchange-alt' title='Movimiento de Caja'></i></button></div></div>",
      },
    ],
    language: {
      lengthMenu: "Mostrar _MENU_ registros",
      zeroRecords: "No se encontraron resultados",
      info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      infoFiltered: "(filtrado de un total de _MAX_ registros)",
      sSearch: "Buscar:",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      sProcessing: "Procesando...",
    },
  });

  
  
  $("#formCajasMov").submit(function (e) {
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    var cajadesde = parseInt($("#idcaja").val());
    var cajaA = parseInt($("#cajas").val());
    var importe = parseFloat($("#precio").val());
    var sa = $("#saldo").val();

    var sal = sa.replace(/\./g, "");
    var nuevo = sal.replace(",", ".");

    var saldo = parseFloat(nuevo);

    if (cajadesde == cajaA) {
      $("#cajas").focus();
      Swal.fire({
        icon: "warning",
        title: "Atención...",
        text: "No Se puede Hacer Movimiento de Caja a si misma",
      });
      return false;
    }
    if (cajaA == 0) {
      $("#cajas").focus();
      Swal.fire({
        icon: "warning",
        title: "Atención...",
        text: "Debe Seleccionar una caja a enviar",
      });
      return false;
    }

    if (importe == 0) {
      $("#precio").focus();
      Swal.fire({
        icon: "warning",
        title: "Atención...",
        text: "Debe ingresar un importe Valido",
      });
      return false;
    }

    if (isNaN(importe)) {
      $("#precio").focus();
      Swal.fire({
        icon: "warning",
        title: "Atención...",
        text: "Debe ingresar un importe Valido",
      });
      return false;
    }



    $.ajax({
    url: "./ajax/registraCajaMov.php",
    type: "POST",
    datatype: "json",
    data: { cajadesde: cajadesde, cajaA: cajaA,importe:importe },
    success: function (data) {
        // tablaArticulos.ajax.reload(null, false);
        Swal.fire({
        icon: "success",
        title: "Correcto...",
        text: "Se Registro el movimiento entre Cajas "+data,
        });
    },
    });
    $("#modalCRUD").modal("hide");
    setTimeout('location.reload()',1000);
  });

  $(document).on("click", ".btnEditar", function () {
    opcion = 2; //editar
    fila = $(this).closest("tr");
    id = parseInt(fila.find("td:eq(0)").text()); //capturo el ID
    nombre = fila.find("td:eq(1)").text();
    saldo = fila.find("td:eq(2)").text();



    $("#idcaja").val(id);
    $("#nombre").val(nombre);
    $("#saldo").val(saldo);
    


    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Movimiento Entre Cajas");
    $("#modalCRUD").modal("show");
  });

  function cboSaldosCajas() {
    $.ajax({
      type: "POST",
      url: "./ajax/cboCajas.php",
      success: function (response) {
        $("#cajas").html(response);
      },
    });
  }


});
