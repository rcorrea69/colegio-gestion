<?php require_once("include/parte_superior.php"); ?>
<!-- Inicio del contenido Principal -->
<?php
require_once("db/conexion.php");
require_once("include/funciones.php");

$sqlventas = "SELECT SUM(vista_ventasdetalle.subtotal)as venta FROM vista_ventasdetalle 
WHERE MONTH(vista_ventasdetalle.vta_fecha) = MONTH(CURRENT_DATE()) AND YEAR(vista_ventasdetalle.vta_fecha) = YEAR(CURRENT_DATE())";
$resultado = mysqli_query($link, $sqlventas);
$row = mysqli_fetch_array($resultado);
$vtas = $row['venta'];

$sqlindustria = "SELECT vista_ventasdetalle.art_rubro, SUM(vista_ventasdetalle.subtotal)as venta 
FROM vista_ventasdetalle
WHERE MONTH(vista_ventasdetalle.vta_fecha) = MONTH(CURRENT_DATE()) AND YEAR(vista_ventasdetalle.vta_fecha) = YEAR(CURRENT_DATE()) AND vista_ventasdetalle.art_rubro=1";
$resindustria = mysqli_query($link, $sqlindustria);
$rowindustria = mysqli_fetch_array($resindustria);
$vtasIndustrias = $rowindustria['venta'];

$sqlanimal = "SELECT vista_ventasdetalle.art_rubro, SUM(vista_ventasdetalle.subtotal)as venta 
FROM vista_ventasdetalle
WHERE MONTH(vista_ventasdetalle.vta_fecha) = MONTH(CURRENT_DATE()) AND YEAR(vista_ventasdetalle.vta_fecha) = YEAR(CURRENT_DATE()) AND vista_ventasdetalle.art_rubro=2";
$resanimal = mysqli_query($link, $sqlanimal);
$rowanimal = mysqli_fetch_array($resanimal);
$vtasAnimal = $rowanimal['venta'];

$sqlvegetal = "SELECT vista_ventasdetalle.art_rubro, SUM(vista_ventasdetalle.subtotal)as venta 
FROM vista_ventasdetalle
WHERE MONTH(vista_ventasdetalle.vta_fecha) = MONTH(CURRENT_DATE()) AND YEAR(vista_ventasdetalle.vta_fecha) = YEAR(CURRENT_DATE()) AND vista_ventasdetalle.art_rubro=3";
$resvegetal = mysqli_query($link, $sqlvegetal);
$rowvegetal = mysqli_fetch_array($resvegetal);
$vtasVegetal = $rowvegetal['venta'];

$sqlRubros = "SELECT ru.id_rubro,ru.ru_nombre,(SELECT SUM(vi.saldo) FROM vista_saldos vi
WHERE vi.rubro=ru.id_rubro) AS total
FROM rubros ru";
$rowR = mysqli_query($link, $sqlRubros);

$sqlTotal="SELECT SUM(`saldo`)as saldo FROM `vista_saldos`";
$rowt = mysqli_query($link, $sqlTotal);
$regt = mysqli_fetch_assoc($rowt);
$TotalCaja=$regt['saldo'];

?>
<div class="container">

    <h4 style="text-align: center;" class="m-4">RESULTADOS PRODUCCI??N</h4>
    <div class="row">

        <?php while ($reg = mysqli_fetch_array($rowR)) {
        ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-bottom-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    <?php echo $reg['ru_nombre']; ?>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo '$ ' . number_format($reg['total'], 2, ',', '.'); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php

        }; ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-bottom-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                TOTAL 
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo '$ ' . number_format($TotalCaja, 2, ',', '.'); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <h4 style="text-align: center;"  class="m-4">VENTAS DEL MES</h4>
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Ventas total del Mes en Curso</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo '$ ' . number_format($vtas, 2, ',', '.'); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Annual) Card Example -->
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Ventas rubro industrias del Mes</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo '$ ' . number_format($vtasIndustrias, 2, ',', '.'); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Ventas rubro industrias del Mes</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo '$ ' . number_format($vtasIndustrias, 2, ',', '.'); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>

                    </div>
                    <!-- <div class="col-auto mt-3" style="text-align: center;">
                        <button class="btn btn-primary">Detalle de cajas</button>
                    </div>
                    <div>
                        <table  class="table table-striped">
                            <tbody>
                                <tr>
                            
                                    <td> miel </td>
                                    <td> 30000 </td>
                                </tr>
                                <tr>
                                
                                    <td> VIVERO ORNAMENTAL </td>
                                    <td> $ 150.000,00 </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> -->
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Ventas rubro producci??n animal del Mes</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo '$ ' . number_format($vtasAnimal, 2, ',', '.'); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Ventas rubro producci??n vegetal del Mes</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo '$ ' . number_format($vtasVegetal, 2, ',', '.'); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    $sqlvtas = "SELECT vta.id_venta,vta.vta_cliente,vta.vta_fecha,vta.vta_importe,vta.id_usuario,usu.usu_nombre,pe.pe_apellido,pe.pe_nombre
    FROM ventas as vta
    LEFT JOIN usuarios as usu ON vta.id_usuario=usu.id_usuario
    LEFT JOIN personas as pe ON vta.vta_cliente=pe.id_persona
    WHERE MONTH(vta.vta_fecha) = MONTH(CURRENT_DATE()) AND YEAR(vta.vta_fecha) = YEAR(CURRENT_DATE())";
    $resvta = mysqli_query($link, $sqlvtas);
    ?>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="tablavtas" name="tablavtas">
                <thead>
                    <tr>
                        <th scope="col">Factura</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Importe</th>
                        <th scope="col">Atendido por</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($rowvta = mysqli_fetch_array($resvta)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $rowvta['id_venta']; ?></th>
                            <td><?php echo formato_fecha_dd_mm_Y($rowvta['vta_fecha']); ?></td>
                            <?php
                            if ($rowvta['pe_apellido'] == NULL) { ?>
                                <td>Consumidor Final </td>
                            <?php
                            } else {
                            ?>
                                <td><?php echo $rowvta['pe_apellido']; ?></td>
                            <?php
                            }
                            ?>
                            <?php
                            $importe = floatval($rowvta['vta_importe']);

                            ?>
                            <td style="text-align: right;"><?php echo  number_format($importe, 2, ',', '.'); ?></td>
                            <td><?php echo $rowvta['usu_nombre']; ?></td>

                        </tr>
                    <?php
                    };
                    ?>

                </tbody>
            </table>

        </div>
    </div>


</div>
<!-- Fin del contenido Principal -->

<?php require_once("include/parte_inferior.php"); ?>
<script>
    $("#tablavtas").DataTable({
        language: {
            sProcessing: "Procesando...",
            sLengthMenu: "Mostrar _MENU_ registros",
            sZeroRecords: "No se encontraron resultados",
            sEmptyTable: "Ning??n dato disponible en esta tabla",
            sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
            sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
            sInfoPostFix: "",
            sSearch: "Buscar:",
            sUrl: "",
            sInfoThousands: ",",
            sLoadingRecords: "Cargando...",
            oPaginate: {
                sFirst: "Primero",
                sLast: "??ltimo",
                sNext: "Siguiente",
                sPrevious: "Anterior",
            },
            oAria: {
                sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                sSortDescending: ": Activar para ordenar la columna de manera descendente",
            },
        },
        responsive: true,
    });
</script>