$(document).ready(function () {

    $("#grabar").click(function (e) {
        e.preventDefault();
        var fecha = $("#fecha").val();
        var rubro = parseInt($("#rubro").val());
        var descripcion = $("#descripcion").val();
        var importe = parseFloat($("#importe").val());
                        
        var tipogasto = parseInt($("#tipogasto").val());
        var proveedor = parseInt($("#proveedor").val());

        console.log(fecha);
        console.log('Rubro : '+rubro);
        console.log('Descripcion : '+descripcion);
        console.log('Importe : '+importe);
        console.log('Tipo de gasto : '+tipogasto);
        console.log('Proveedor : '+proveedor);

        if (proveedor == 0 && tipogasto == 1) {
            Swal.fire({
            icon: "error",
            title: "Atención...",
            text: "La Compras o Gasto cta-cte. Debe seleccionar un Proveedor Valido!",
            });
        } else {
            alert('entree');
            $.ajax({
                type: "POST",
                url: "./ajax/registraGastos.php",
                data: {rubro: rubro,fecha: fecha,descripcion: descripcion,importe: importe,tipogasto:tipogasto,proveedor:proveedor},
               
                success: function (response) {
                    alert("Genial ok ................."+response);
                },
            });
        }
    });

});
