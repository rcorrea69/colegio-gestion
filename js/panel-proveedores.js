$(document).ready(function () {
    var id, opcion;
    opcion = 4;

    tablaPersonas = $("#tablaPersonas").DataTable({
        ajax: {
        url: "./ajax/abmProveedores.php",
        method: "POST", //usamos el metodo POST
        data: { opcion: opcion }, //enviamos opcion 4 para que haga un SELECT
        dataSrc: "",
        },
        columns: [
        { data: "id_persona" },
        { data: "apellido" },
        { data: "nombre" },
        { data: "domicilio" },
        { data: "telefono" },
       
        {
            defaultContent:
            "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='far fa-edit '></i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='far fa-trash-alt '></i></button></div></div>",
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

    var fila; //captura la fila, para editar o eliminar
    //submit para el Alta y Actualización
    $("#clientes").submit(function (e) {
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        var apellido=$('#apellido').val();
        var nombre=$('#nombres').val();
        var domicilio=$('#domicilio').val();
        var telefono=$('#telefono').val();
        var id=$('#id').val() ;
        if (apellido == null || apellido.length == 0 || /^\s+$/.test(apellido)) {
            //alert('El dni esta vacio desde aca');
            $("#apellido").focus();
            Swal.fire({
              icon: "warning",
              title: "Atención...",
              text: "Ingrese un Apellido",
              //footer: '<a href>Why do I have this issue?</a>'
            });
            return false;
          };
          if (nombre == null || nombre.length == 0 || /^\s+$/.test(nombre)) {
            //alert('El dni esta vacio desde aca');
            $("#nombres").focus();
            Swal.fire({
              icon: "warning",
              title: "Atención...",
              text: "Ingrese un Nombre",
              //footer: '<a href>Why do I have this issue?</a>'
            });
            return false;
          };
     

        // console.log(articulo);
        // console.log(opcion);
        // console.log(id);
        $.ajax({
        url: "./ajax/abmProveedores.php",
        type: "POST",
        datatype: "json",
        data: { apellido: apellido, nombre : nombre, domicilio :domicilio,telefono:telefono, opcion: opcion, id: id },
        success: function (data) {
            tablaPersonas.ajax.reload(null, false);
            Swal.fire({
            icon: "success",
            title: "Correcto...",
            text: "Se dió de alta un Nuevo Cliente",
            });
        },
        });
        $("#modalCRUD").modal("hide");
    });

  //para limpiar los campos antes de dar de Alta una Persona
    $("#btnNuevo").click(function () {
        opcion = 1; //alta
        id = null;
        $("#clientes").trigger("reset");
        $(".modal-header").css("background-color", "#17a2b8");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Alta de Proveedores");
        $("#modalCRUD").modal("show");
    });

  //Editar
    $(document).on("click", ".btnEditar", function () {
        opcion = 2; //editar
        fila = $(this).closest("tr");
        id = parseInt(fila.find("td:eq(0)").text()); //capturo el ID
        apellido = fila.find("td:eq(1)").text();
        nombre = fila.find("td:eq(2)").text();
        domicilio = fila.find("td:eq(3)").text();
        telefono = fila.find("td:eq(4)").text();

        $("#id").val(id);
        $("#apellido").val(apellido);
        $("#nombres").val(nombre);
        $("#domicilio").val(domicilio);
        $("#telefono").val(telefono);



        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Artículo");
        $("#modalCRUD").modal("show");

    });

  //Borrar
    $(document).on("click", ".btnBorrar", function () {
        fila = $(this);
        id = parseInt($(this).closest("tr").find("td:eq(0)").text());
        opcion = 3; //eliminar

        Swal.fire({
        icon: "question",
        title: "Está seguro que desea Eliminar el registro " + id + " ?",
        showCancelButton: true,
        confirmButtonText: `Eliminar`,
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */

        if (result.isConfirmed) {
            $.ajax({
            url: "./ajax/abmProveedores.php",
            type: "POST",
            datatype: "json",
            data: { opcion: opcion, id: id },
            success: function () {
                tablaPersonas.ajax.reload(null, false);
            },
            });
            Swal.fire("Registro Borrado!", "", "success");
        }
        });
    });
    function cboRubros(){
        $.ajax({
            type: "POST",
            url: "./ajax/cboRubros.php",
            success: function (response) {
                $('#rubro').html(response);
                
            }
        });
    };

    cboRubros();

    function cboSubrubros(rubro){
        var ru = rubro;
        console.log(ru);
        $.ajax({
            type: "POST",
            url: "./ajax/cboSubrubros.php",
            data: {ru:ru},
            success: function (response) {
                $('#subrubro').html(response);
            }
        });

    };

    $('#rubro').change(function (e) { 
        e.preventDefault();
        var rubro = $('#rubro').val();
        console.log(rubro);
        cboSubrubros(rubro);
        
    });

});
