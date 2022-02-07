<?php require_once("include/parte_superior.php"); ?>
<!-- Inicio del contenido Principal -->
<?php require_once('db/conexion.php'); ?>
<?php require_once('include/funciones.php'); ?>
<div class="container">

    <div class="card card-info">
        <!-- <div class="card-header">
            <h4>Reportes</h4>
        </div> -->
        <div class="card-body">
            <h5 class="card-title">Consulta de Movimientos Por Rubros<div class="float-right">
                    <h4><strong><?php echo hoy(); ?></strong></h4>
                </div>
                <br>
                <br>


                <!-- <div class="form-group "> -->
                <div class="form-row">

                    <div class="form-group col-6">
                        <label for="rubro" class="text-info">Rubros</label>
                        <select class="form-control" name="rubro" id="rubro" tabindex="0">
                        </select>
                        <small class="text-muted ml-3" style="font-size: 70%;"  >Si no elige rubro se mostrarán todos</small>
                    </div>
                    <div class="form-group col-6">
                        <label for="subrubro" class="text-info">Subrubros</label>
                        <select class="form-control" name="subrubro" id="subrubro" tabindex="0">
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="desde" class="text-info">Desde</label>
                        <input type="date" id="desde" name="desde" class="form-control" value="<?php echo formato_fecha_Y_mm_dd(hoy()); ?>">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="hasta" class="text-info">Hasta</label>
                        <input type="date" id="hasta" name="hasta" class="form-control" value="<?php echo formato_fecha_Y_mm_dd(hoy()); ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <br>
                        <button class="btn btn-primary col-12 mt-2" id="consultar" name="consultar">Consultar</button>
                    </div>

                </div>
                <div id="loader" class='col-md-12' style="margin-top:5px"></div>

                <!-- Carga los datos ajax -->
        </div>
        <!--div card body-->

    </div>

</div>
<!-- Fin del contenido Principal -->
<div class="container">
    <div id="resultados">
    </div>
</div>

<?php require_once("include/parte_inferior.php"); ?>
<!-- <script type="text/javascript" src="js/nuevo_reporte.js"></script> -->
<script src="js/cajasxrubro.js"></script>
