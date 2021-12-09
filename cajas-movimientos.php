<?php require_once("include/parte_superior.php"); ?>
<!-- Inicio del contenido Principal -->
<?php
require_once('db/conexion.php');
require_once('include/funciones.php');

$sqltotal = "SELECT SUM(`saldo`) as total FROM vista_saldos";
$restotal = mysqli_query($link, $sqltotal);
$rowtotal = mysqli_fetch_assoc($restotal);
$total = $rowtotal['total'];


?>
<div class="container">
    <div class="col-12">
        <div class="row">
            <div class="col-xl-5 col-md-8 mb-1">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    <h5>Total Cajas</h5>
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
            <div class="col-xl-6 col-md-8 mb-4" style="text-align: right;">
                <h4><strong><?php echo hoy(); ?></strong></h4>

            </div>

        </div>
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
                                    <th>Código</th>
                                    <th>Caja Nombre</th>
                                    <th>Saldo</th>
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
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formCajasMov">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-1">
                            <label for="idcaja" class="col-form-label">Caja</label>
                            <input type="text" class="form-control" id="idcaja">
                        </div>
                        <div class="form-group col-8">
                            <label for="nombre" class="col-form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre">
                        </div>
                        <div class="form-group col-3">
                            <label for="saldo" class="col-form-label">Saldo</label>
                            <input type="text" class="form-control" id="saldo">
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="m-3">
                            <h3>Enviar a la Caja </h3>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <select class="form-control" id="cajas">
                            </select>
                        </div>
                        <div class="input-group mb-3 col-6">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="precio"><i class="fas fa-dollar-sign"></i></label>
                            </div>
                            <input type="text" id="precio" name="precio" class="form-control">
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once("include/parte_inferior.php"); ?>
 <script src="js/cajas-movimientos.js"></script>