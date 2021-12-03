<?php require_once("include/parte_superior.php"); ?>
<!-- Inicio del contenido Principal -->
<?php require_once("db/conexion.php"); ?>
<?php require_once("include/funciones.php");
$idFiado=$_GET['fiado'];
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-title">
                    <br>
                    <h4 style="text-align: center;">Factura Ventas</h4>

                </div>
                <div class="card-body">
                    <form id="frm-linea" name="frm-linea">
                        <div class="form-row">
                            <div class="col-9">
                                <h5>Factura</h5>
                                <?php echo 'id_fiado'.$idFiado; ?>
                            </div>
                            <div class="form-group col-3 bg-">
                                <input type="date" name="fecha" id="fecha" class="form-control col-12 bg-gradient-light" value="<?php echo formato_fecha_Y_mm_dd(hoy()); ?>">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </div>
    <div class="card">
        <div class="row">
            <div class="col-12">
                <div id="detalle_ajax">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Importe</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody id="ajax_lineas">
                            <?php 
                            
                                $sqlfi="SELECT * FROM ventas_detalles_fiado WHERE id_venta = $idFiado";
                                $resfi=mysqli_query($link,$sqlfi);
                                while ($rowfi=mysqli_fetch_array($resfi)) {

                                                  
                            ?>
                            <tr>
                                <td><?php echo $rowfi['art_codigo']; ?></td>
                                <td><?php echo $rowfi['art_detalle']; ?></td>
                                <td><?php echo $rowfi['importe']; ?>Importe</td>
                                <td><?php echo $rowfi['art_cantidad']; ?></td>
                                <td><?php echo $rowfi['art_cantidad']*$rowfi['importe'] ; ?></td>
                                <td>Eliminar</td>
                            </tr>
                            <?php }          ?>

                        </tbody>

                    </table>
                    <div class="d-flex">

                        <div class="col-4 d-flex ">
                            <input type="button" class="btn btn-primary" value="grabar" id="grabar" name="grabar" class="d-flex align-items-center">
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade " id="modalCodigo" role="dialog" aria-labelledby="modalCodigo" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Códigos de Cobranza</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Example DataTables Card-->
                    <div class="card mb-3">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover table-sm" id="dataTablecodigo" name="dataTablecodigo" width="100%" cellpadding="0">
                                    <!--  <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example"> -->
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Concepto</th>
                                            <th>Importe</th>
                                            <th>Seleccionar</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        //require_once("conexion.php");
                                        global $link;

                                        $sql = "SELECT `id_articulo`, `art_nombre`, `art_precio`  FROM `articulos`";
                                        $res = mysqli_query($link, $sql);
                                        while ($reg = mysqli_fetch_array($res)) {
                                        ?>

                                            <tr class="odd gradeX ">
                                                <td><?php echo $reg["id_articulo"]; ?></td>
                                                <td><?php echo $reg["art_nombre"]; ?></td>
                                                <td style="text-align: right;">
                                                    <?php echo "$ " . number_format($reg["art_precio"], 2, ',', '.'); ?>
                                                </td>
                                                <td style="text-align: center;">
                                                    <button type="button" class="btn btn-outline-dark btn-sm btnElegir " data-toggle="modal" data-target="#Modal-modif-codigo">
                                                        <i class="fa fa-check-square" aria-hidden="true"></i></button>
                                                </td>
                                            </tr>

                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- <div class="card-footer small text-muted">
                </div> -->
                    </div> <!-- card -->

                </div>
                <!-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
            </div>
        </div>
    </div>

</div>
<!-- Fin del contenido Principal -->


<?php require_once("include/parte_inferior.php"); ?>
<!-- <script type="text/javascript" src="js/ventas.js"></script> -->