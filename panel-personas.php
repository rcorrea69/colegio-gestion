<?php require_once("include/parte_superior.php"); ?>
<!-- Inicio del contenido Principal -->
<?php require_once('db/conexion.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <button id="btnNuevo" type="button" class="btn btn-info" data-toggle="modal"><i class="far fa-plus-square fa-1x"> </i> Agregar </i></button>
        </div>
    </div>
</div>
<br>
<div class="container caja">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-table"></i> Clientes
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tablaPersonas" class="table table-striped table-bordered table-condensed table-sm" style="width:100%">
                            <thead class="text-center thead-dark ">
                                <tr>
                                    <th>Código</th>
                                    <th>Apellido y Nombre</th>
                                    <th>Domicilio</th>
                                    <th>Teléfono</th>
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

<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" autocomplete="off" name="clientes" id="clientes">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="apellido" class="text-info">Apellidos</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellidos">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nombres" class="text-info">Nombres</label>
                            <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-7">
                            <label for="domicilio" class="text-info">Domicilio</label>
                            <input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="Domicilio">
                        </div>

                        <div class="form-group col-md-5">
                            <label for="telefono" class="text-info">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <div class="row d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary" id="guardar_datos">Confirmar Alta de Cliente</button>
                </div>
            </div>



            </form>
        </div>
    </div>
</div>


<?php require_once("include/parte_inferior.php"); ?>

<script src="js/panel-personas.js"></script>