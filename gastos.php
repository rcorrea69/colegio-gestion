<?php require_once("include/parte_superior.php"); ?>
<!-- Inicio del contenido Principal -->
<?php require_once("db/conexion.php"); ?>
<?php require_once("include/funciones.php"); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-title">
                    <br>
                    <h4 style="text-align: center;">Gastos y Compras</h4>
                    <!-- <div class="float-right">
                        <h4><strong><?php echo hoy(); ?></strong></h4>
                    </div> -->
                </div>
                <div class="card-body">
                    <form id="frm-linea" name="frm-linea">
                        <div class="form-row">

                            <div class="form-group  row justify-content-end col-12">
                                <!-- <label for="fecha" class="text-info">Fecha</label> -->
                                <div class="col-4">
                                    <input type="date" name="fecha" id="fecha" class="form-control   bg-gradient-light " value="<?php echo formato_fecha_Y_mm_dd(hoy()); ?>">
                                </div>


                            </div>
                            <div class="form-group col-6 ">
                                <select class="form-control" name="proveedor" id="proveedor" tabindex="0">
                                </select>
                            </div>
                            <div class="form-group col-6 ">
                                <select class="form-control" name="caja" id="caja" >
                                </select>
                            </div>

                            <div class="form-group col-12 d-inline" style="display:inline-block;">
                                <div class="custom-control custom-radio custom-control-inline mt-2">
                                    <input type="radio" id="GGenerales" name="radiogastos" class="custom-control-input" value="1" checked>
                                    <label class="custom-control-label" for="GGenerales">Gastos Generales</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline mt-2">
                                    <input type="radio" id="Grubros" name="radiogastos" class="custom-control-input" value="2">
                                    <label class="custom-control-label" for="Grubros">Gastos Por Rubros</label>
                                </div>
                            </div>
                            <div id="rubros" class="row col-12">
                                <div class="form-group col-6">
                                    <label for="rubro" class="text-info">Rubro</label>
                                    <select class="form-control" name="rubro" id="rubro" tabindex="0">
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label for="subrubro" class="text-info">Subrubro</label>
                                    <select class="form-control" name="subrubro" id="subrubro" tabindex="0">
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-9">
                                <label for="descripcion" class="text-info">Descripción</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion">
                            </div>
                            <div class="form-group col-2">
                                <label for="importe" class="text-info">Importe</label>
                                <input type="text" class="form-control" id="importe" name="importe">
                            </div>
                            <div class="form-group col-1 mt-2">
                                <br>
                                <button type="butom" class="btn btn-primary" id="grabar" name="grabar">Cargar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>



    </div>


</div>
<!-- Fin del contenido Principal -->


<?php require_once("include/parte_inferior.php"); ?>
<script type="text/javascript" src="js/gastos.js"></script>