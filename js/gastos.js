$(document).ready(function () {
    $("#rubros").hide();

    $("#grabar").click(function (e) {
        e.preventDefault();
        var fecha = $("#fecha").val();
        var descripcion = $("#descripcion").val();
        var importe = parseFloat($("#importe").val());
        var subrubro = parseInt($("#subrubro").val());
        var rubro = parseInt($("#rubro").val());
        var tipogasto = 0;
        var caja = parseInt($("#caja").val());
        var proveedor = parseInt($("#proveedor").val());

        if ($("#Grubros").is(":checked")) {
            subrubro = parseInt($("#subrubro").val());
            rubro = parseInt($("#rubro").val());
            tipogasto = 1;
        } else {
            subrubro=0;
            rubro=0;
        }

        console.log("esto es lo que sale de tipo de gasto : " + tipogasto);
        if (descripcion == null || descripcion.length == 0 ||/^\s+$/.test(descripcion)) {
        //alert('El dni esta vacio desde aca');
            $("#descripcion").focus();
            Swal.fire({
                icon: "warning",
                title: "Atención...",
                text: "Debe ingresar una Descripción del Gasto",
                //footer: '<a href>Why do I have this issue?</a>'
            });
            return false;
        }

        if (!$.isNumeric(importe)) {
        $("#importe").focus();
        Swal.fire({
            icon: "warning",
            title: "Atención...",
            text: "Debe ingresar un Importe Valido",
        });
        return false;
        }

        if (tipogasto === 1) {
        if (tipogasto === 1 && rubro == 0) {
            $("#rubro").focus();
            Swal.fire({
            icon: "warning",
            title: "Atención...",
            text: "El Gasto que intenta ingresar es por Rubros, Debe Seleccionar un Rubro",
            });
            return false;
        }
        if (tipogasto === 1 && subrubro == 0) {
            $("#subrubro").focus();

            Swal.fire({
            icon: "warning",
            title: "Atención...",
            text: "El Gasto que intenta ingresar es por Rubros, Debe Seleccionar un Subrubro",
            });
            return false;
        }

        if (rubro == 0) {
            $("#rubro").focus();

            Swal.fire({
            icon: "warning",
            title: "Atención...",
            text: "Debe Seleccionar un Rubro",
            });
            console.log("tipo de gasto 0 gg y 1 gasto por rubro es : " + tipogasto);
            return false;
        }

        if (subrubro == 0) {
            $("#subrubro").focus();

            Swal.fire({
            icon: "warning",
            title: "Atención...",
            text: "Debe Seleccionar una Caja Valida",
            });
            return false;
        }
        }

        $.ajax({
        type: "POST",
        url: "./ajax/registraGastos.php",
        data: {
            rubro: rubro,
            fecha: fecha,
            descripcion: descripcion,
            importe: importe,
            subrubro: subrubro,
            tipogasto: tipogasto,
            caja: caja,
            proveedor: proveedor,
        },
        success: function (response) {
            Swal.fire({
            icon: "success",
            title: "Correcto...",
            text: "Se Registro correctamente " + response,
            });
            setTimeout(function () {
                location.reload();
            }, 2000);
        },
        });
    });

    function cboRubros() {
        $.ajax({
        type: "POST",
        url: "./ajax/cboRubros.php",
        success: function (response) {
            $("#rubro").html(response);
        },
        });
    }

  cboRubros();

  function cboSubrubros(rubro) {
    var ru = rubro;
    $.ajax({
      type: "POST",
      url: "./ajax/cboSubrubros.php",
      data: { ru: ru },
      success: function (response) {
        $("#subrubro").html(response);
      },
    });
  }

  $("#rubro").change(function (e) {
    e.preventDefault();
    var rubro = $("#rubro").val();
    cboSubrubros(rubro);
  });

  function cboProveedores() {
    $.ajax({
      type: "POST",
      url: "./ajax/cboProveedores.php",
      success: function (response) {
        $("#proveedor").html(response);
      },
    });
  }
  function cboCaja() {
    $.ajax({
      type: "POST",
      url: "./ajax/cboCaja.php",
      success: function (response) {
        $("#caja").html(response);
      },
    });
  }
  cboCaja();
  cboProveedores();

  $("#Grubros").click(function (e) {
    $("#rubros").show();
    // if ($("#Grubros").is(':checked')) {
    //     alert("Está activado");
    // } else {
    //     alert("No está activado");
    // }
  });
  $("#GGenerales").click(function (e) {
    $("#rubros").hide();
  });
});
