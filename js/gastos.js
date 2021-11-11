$(document).ready(function () {
    $("#rubros").hide();

    $("#grabar").click(function (e) {
        e.preventDefault();
        var fecha = $("#fecha").val();
        var descripcion = $("#descripcion").val();
        var importe = parseFloat($("#importe").val());
        var subrubro = 0;
        var rubro = 0;
        var tipogasto=0;

        if ($("#Grubros").is(':checked')) {
            subrubro = parseInt($("#subrubro").val());
            rubro = parseInt($("#rubro").val());
            tipogasto=1;

        };
        if (descripcion == null || descripcion.length == 0 || /^\s+$/.test(descripcion)) {
            //alert('El dni esta vacio desde aca');
            $("#descripcion").focus();
            Swal.fire({
              icon: "warning",
              title: "Atención...",
              text: "Debe ingresar una Descripción del Gasto",
              //footer: '<a href>Why do I have this issue?</a>'
            });
            return false;
        };

        if (!$.isNumeric(importe)) {
            $("#importe").focus();;
            Swal.fire({
              icon: "warning",
              title: "Atención...",
              text: "Debe ingresar un Importe Valido",
            });
            return false;
          };
        if(tipogasto===1 && rubro==0  ){

            console.log('tipo de gasto :'+tipogasto);
            console.log('rubro :'+rubro);
            console.log('tipo Subrubro :'+subrubro);

            Swal.fire({
                icon: "warning",
                title: "Atención...",
                text: "El Gasto que intenta ingresar es por Rubros, Debe Seleccionar un Rubro",
              });
              return false;
        };
        if(tipogasto===1 && subrubro==0  ){

            console.log('tipo de gasto :'+tipogasto);
            console.log('rubro :'+rubro);
            console.log('tipo Subrubro :'+subrubro);

            Swal.fire({
                icon: "warning",
                title: "Atención...",
                text: "El Gasto que intenta ingresar es por Rubros, Debe Seleccionar un Subrubro",
              });
              return false;
        };

        console.log(fecha);
        console.log('Rubro : ' + rubro);
        console.log('subRubro : ' + subrubro);
        console.log('Descripcion : ' + descripcion);
        console.log('Importe : ' + importe);



        alert('entree');
        $.ajax({
            type: "POST",
            url: "./ajax/registraGastos.php",
            data: { rubro: rubro, fecha: fecha, descripcion: descripcion, importe: importe, subrubro: subrubro,tipogasto:tipogasto },
            success: function (response) {
                alert("Genial ok ................." + response);
            },
        });

    });


    function cboRubros() {
        $.ajax({
            type: "POST",
            url: "./ajax/cboRubros.php",
            success: function (response) {
                $('#rubro').html(response);

            }
        });
    };

    cboRubros();

    function cboSubrubros(rubro) {
        var ru = rubro;
        $.ajax({
            type: "POST",
            url: "./ajax/cboSubrubros.php",
            data: { ru: ru },
            success: function (response) {
                $('#subrubro').html(response);
            }
        });

    };

    $('#rubro').change(function (e) {
        e.preventDefault();
        var rubro = $('#rubro').val();
        cboSubrubros(rubro);

    });

    function cboProveedores() {
        $.ajax({
            type: "POST",
            url: "./ajax/cboProveedores.php",
            success: function (response) {
                $('#proveedor').html(response);

            }
        });
    };

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
