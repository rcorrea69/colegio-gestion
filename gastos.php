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
                    <h4 style="text-align: center;" >Gastos y Compras</h4>
                    <!-- <div class="float-right">
                        <h4><strong><?php echo hoy(); ?></strong></h4>
                    </div> -->
                </div>
                <div class="card-body">
                    <form id="frm-linea" name="frm-linea">
                        <div class="form-row">
                            <div class="form-group col-3">
                                <!-- <label for="tipoventa" class="text-info">Tipo De Venta</label> -->
                                <select class="form-control" name="tipogasto" id="tipogasto">
                                    <option value=0 selected>Compras o Gasto Contado</option>
                                    <option value=1>Compras o Gasto Cta. Cte.</option>
                                </select>
                            </div>

                            <div class="form-group col-6">
                                <?php
                                $sqlper = "SELECT * FROM proveedores";
                                $resper = mysqli_query($link, $sqlper);
                                // $cantidad=mysqli_num_rows($resOficinas);
                                ?>
                                <!-- <label for="personas" class="text-info">Cliente</label> -->
                                <select class="form-control"  name="proveedor" id="proveedor" tabindex="0">
                                    <option selected value=0>Proveedor Final...</option>
                                    <?php
                                    while ($reg_per = mysqli_fetch_array($resper)) {
                                    ?>
                                        <option value="<?php echo $reg_per['id_persona']; ?>"><?php echo $reg_per['pe_apellido']." ".$reg_per['pe_nombre']; ?></option>
                                    <?php
                                    };
                                    ?>
                                </select>
                            </div>

                            <div class="form-group col-3">
                                <!-- <label for="fecha" class="text-info">Fecha</label> -->
                                <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo formato_fecha_Y_mm_dd(hoy()); ?>">
                            </div>

                            <div class="form-group col-3">
                                <?php
                                $sqlrub = "SELECT * FROM rubros";
                                $resrub = mysqli_query($link, $sqlrub);
                                // $cantidad=mysqli_num_rows($resOficinas);
                                ?>
                                <label for="rubro" class="text-info">Rubros</label>
                                <select class="form-control"  name="rubro" id="rubro" tabindex="0">
                                    <option selected value="0">Seleccione Rubro</option>
                                    <?php
                                    while ($reg_rub = mysqli_fetch_array($resrub)) {
                                    ?>
                                        <option value="<?php echo $reg_rub['id_rubro']; ?>"><?php echo $reg_rub['ru_nombre']." ".$reg_per['pe_nombre']; ?></option>
                                    <?php
                                    };
                                    ?>
                                </select>
                            </div>

                            <!-- <div class="form-group col-md-2">
                                <label for="codigo" class="text-info">Código De Artículo</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button class="btn btn btn-primary" data-toggle="modal" data-target="#modalCodigo" id="espacio" name="espacio" type="button" tabindex="-1"><i class="fa fa-search"></i></button>
                                    </div>
                                    <input type="text" class="form-control " id="codigo" name="codigo" placeholder="Código" tabindex="0">
                                </div>
                            </div> -->
                            <div class="form-group col-6">
                                <label for="descripcion" class="text-info">Descripción</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" >
                            </div>
                            <div class="form-group col-2">
                                <label for="importe" class="text-info">Importe</label>
                                <input type="text" class="form-control" id="importe" name="importe">
                            </div>
                            <!-- <div class="form-group col-2">
                                <label for="cantidad" class="text-info">Cantidad</label>
                                <input type="text" class="form-control" id="cantidad" name="cantidad">
                            </div> -->
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