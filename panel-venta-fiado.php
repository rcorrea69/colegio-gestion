<?php require_once("include/parte_superior.php"); ?>
<!-- Inicio del contenido Principal -->
<?php require_once('db/conexion.php'); ?>
<!-- <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <button id="btnNuevo" type="button" class="btn btn-info" data-toggle="modal"><i class="far fa-plus-square fa-1x"> </i> Agregar </i></button>
        </div>
    </div>
</div> -->
<br>
<div class="container caja">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-table"></i> Ventas Fiados
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tablactacte" class="table table-striped table-bordered table-condensed table-sm" style="width:100%">
                            <thead class="text-center thead-dark ">
                                <tr>
                                    <th>Nro</th>
                                    <th>Fecha</th>
                                    <th>Cliente</th>
                                    <th>Teléfono</th>
                                    <th>Importe</th>
                                    <th>Atendio Por</th>
                                    <th>Acción</th>
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




<?php require_once("include/parte_inferior.php"); ?>

<script src="js/panel-venta-fiado.js"></script>