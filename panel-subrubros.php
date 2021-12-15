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
                    <i class="fas fa-table"></i> Subrubros
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tablaSubrubros" class="table table-striped table-bordered table-condensed table-sm" style="width:100%">
                            <thead class="text-center thead-dark ">
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
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
            <form id="formRubros">
                <div class="modal-body">
                    <div class="form-row">

                        <div class="form-group col-12">
                            <label for="rubros" class="col-form-label">Rubros</label>
                            <select class="form-control" id="rubros" name="rubros">
                            </select>
                        </div>

                        <div class="form-group col-12">
                            <label for="nombre" class="col-form-label">Nombre de Subrubro y su Caja:</label>
                            <input type="text" class="form-control" id="nombre">
                        </div>
                        <div class="form-group col-12 ">
                            <label for="importe" class="col-form-label">Saldo Inicial de Caja</label>
                            <div class="input-group col-12 px-0">
                                <!-- <label for="importe" class="col-form-label">Nombre de Subrubro y su Caja:</label> -->
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="importe"><i class="fas fa-dollar-sign"></i></label>
                                </div>
                                <input type="text" id="importe" name="importe" value="0" class="form-control">
                            </div>
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

<script src="js/panel-subrubros.js"></script>