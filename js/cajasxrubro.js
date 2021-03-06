$(document).ready(function () {

    $('#consultar').click(function(e) {
        e.preventDefault();
        var desde = $('#desde').val();
        var hasta = $('#hasta').val();
        // $('#loader').html('<img src="img/ajax-loader.gif"> Cargando...')
        var rubro = parseInt($('#rubro').val());
        var subrubro = parseInt($('#subrubro').val());


        $.ajax({
            type: "POST",
            url: "./ajax/cajasxrubro.php",
            data: {
                desde: desde,
                hasta: hasta,
                rubro: rubro,
                subrubro :subrubro

            },
            beforeSend: function(objeto) {
                //   $("#resultados").html("Mensaje: Cargando...");
                $('#loader').html('<img src="img/ajax-loader.gif"> Cargando...');
                
            },
            success: function(datos) {
                $("#resultados").html(datos);
                $('#loader').html('');
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
        //     alert("Est?? activado");
        // } else {
        //     alert("No est?? activado");
        // }


    });
    $("#GGenerales").click(function (e) {
        $("#rubros").hide();

    });

});
