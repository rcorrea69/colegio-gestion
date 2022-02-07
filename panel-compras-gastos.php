<?php require_once("include/parte_superior.php"); ?>
<!-- Inicio del contenido Principal -->
<?php require_once('db/conexion.php'); ?>

<br>
<div class="container fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-table"></i> Compras y Gastos
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tablaGastos" class="table table-striped table-bordered table-condensed table-sm" style="width:100%">
                            <thead class="text-center thead-dark ">
                                <tr>
                                    <th>Nro</th>
                                    <th>Caja</th>
                                    <th>Fecha</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                    <!-- <th>T. Gasto </th> -->
                                    <th>Rubro</th>
                                    <th>Subrubro</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fin del contenido Principal -->

<!--Modal para CRUD-->



<?php require_once("include/parte_inferior.php"); ?>

<script src="js/panel-compras-gastos.js"></script>