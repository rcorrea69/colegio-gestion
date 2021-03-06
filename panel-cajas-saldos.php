<?php require_once("include/parte_superior.php"); ?>
<!-- Inicio del contenido Principal -->
<?php
require_once('db/conexion.php');
require_once('include/funciones.php');

/////////////Saldo Total por subrubros////////////////////////////////
// $sqltotal = "SELECT SUM(`saldo`) as total FROM vista_saldos";
// $restotal = mysqli_query($link, $sqltotal);
// $rowtotal = mysqli_fetch_assoc($restotal);
// $total = $rowtotal['total'];
///////////////////////////////////////////////////////////////

$total = totalSubrubro();
//////////////Saldos por rubros/////////////////////////////////
// $sqlRubros = "SELECT ru.id_rubro,ru.ru_nombre,(SELECT SUM(vi.saldo) FROM vista_saldos vi
// WHERE vi.rubro=ru.id_rubro) AS total
// FROM rubros ru";
// $rowR = mysqli_query($link, $sqlRubros);
//////////////////////////////////////////////////////////////
$rowR = saldosPorRubros();

/////////////Saldo Gastos Generales///////////////////////////
// $sqlGG = "SELECT SUM(`importe`) AS gGenerales FROM `cajas` WHERE `caja_rub`=0 AND `caja_sub`=0";
// $resGG = mysqli_query($link, $sqlGG);
// $rowGG = mysqli_fetch_assoc($resGG);
// $gGenerales = $rowGG['gGenerales'];
//////////////////////////////////////////////////////////////
$gGenerales = gGenerales();



?>
<div class="container">
    <div class="col-12">
        <div class="col-xl-12 col-md-8 mb-4" style="text-align: right;">
            <h4><strong><?php echo hoy(); ?></strong></h4>

        </div>
        <div>
            <h3>Cuadro de Resultados</h3>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-8 mb-1">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    <h5>Resultado Total </h5>
                                </div>
                                <div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo '$ ' . number_format($total, 2, ',', '.'); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-8 mb-1">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    <h5>Gastos Generales</h5>
                                </div>
                                <div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo '$ ' . number_format($gGenerales, 2, ',', '.'); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <br>
    <div style="text-align: center;">
        <h3>Detalles de Resultados Por Rubros y Subrubros </h3>
    </div>
    <div class="row">
        <?php while ($reg = mysqli_fetch_array($rowR)) {
        ?>
            <div class="col-xl-4 col-md-6 mb-4">
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
    </div>




</div>
<br>
<div class="container caja">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <!-- <div class="card-header">
                    <i class="fas fa-table"></i> Cajas
                </div> -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tablaCajas" class="table table-striped table-bordered table-condensed table-sm bg-dark.bg-gradient" style="width:100%" style="width:100%">
                            <thead class="text-center thead-dark ">
                                <tr>
                                    <th>Rubro</th>
                                    <th>Rubro Nombre</th>
                                    <th>C??digo</th>
                                    <th>Caja Nombre</th>
                                    <th>Saldo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $sql = "SELECT ru.ru_nombre,vs.rubro,vs.caja,vs.sub_nombre,vs.saldo 
                                FROM vista_saldos vs
                                LEFT JOIN rubros ru
                                ON vs.rubro = ru.id_rubro";
                                $res = mysqli_query($link, $sql);
                                while ($row = mysqli_fetch_array($res)) {

                                ?>
                                    <tr>
                                        <td><?php echo $row['rubro']; ?></td>
                                        <td><?php echo $row['ru_nombre']; ?></td>
                                        <td><?php echo $row['caja']; ?></td>
                                        <td><?php echo $row['sub_nombre']; ?></td>
                                        <td style="text-align: right;"><?php echo  "$ " . number_format(($row['saldo']), 2, ',', '.'); ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once("include/parte_inferior.php"); ?>
<!-- <script src="js/panel-saldos.js">
    </script> -->
<script>
    $(document).ready(function() {
        $('#tablaCajas').DataTable({
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


    });
</script>