<?php

//print_r($_POST);
$desde = $_POST["desde"];
$hasta = $_POST["hasta"];
$caja = $_POST["caja"];


require_once "../db/conexion.php";
require_once "../include/funciones.php";

$saldo = SaldoTotal ($desde,$caja) + SaldoInicial($caja);
$nombreCaja= cajaNombre($caja);
?>
<h4 class="mt-3" style="text-align: center;">Caja : <?php echo $nombreCaja.' '. formato_fecha_dd_mm_Y($desde); ?> hasta <?php echo formato_fecha_dd_mm_Y($hasta); ?> </h4>
<?php

   ?>


            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Nro Doc</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Ingreso</th>
                        <th scope="col">Egreso</th>
                        <th scope="col">Saldo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th> </th>
                        <td></td>
                        <td></td>
                        <td><?php echo 'SALDO AL ' . formato_fecha_dd_mm_Y($desde); ?></td>
                        <td> </td>
                        <td></td>
                        <td style="text-align: right;"><?php echo  '$ ' . number_format($saldo, 2, ',', '.');  ?></td>

                    </tr>


                <?php


$sqldetalle = "SELECT * FROM cajas 
                WHERE fecha >= '" . $desde . "' AND fecha <= '" . $hasta . "' AND id_caja=$caja";

echo $sqldetalle;
$resdetalle = mysqli_query($link, $sqldetalle);
$row_cnt = mysqli_num_rows($resdetalle);



while ($row = mysqli_fetch_array($resdetalle)) {
            $debe = ($row['importe'] > 0) ? $row['importe'] : 0;
            $haber = ($row['importe'] < 0) ? $row['importe'] : 0;
            $saldo = $saldo + $debe + $haber;
            
?>
                <tr>
                    <th scope="row"><?php echo $row['id_mov']; ?></th>
                    <td><?php echo formato_fecha_dd_mm_Y($row['fecha']); ?></td>
                    <td><?php echo $row['nro_com']; ?></td>
                    <td><?php echo $row['descripcion']; ?></td>
                    <td style="text-align: right;"> <?php echo '$ ' . number_format($debe, 2, ',', '.'); ?></td>
                    <td style="text-align: right;"><?php echo '$ ' . number_format($haber, 2, ',', '.'); ?></td>
                    <td style="text-align: right;"><?php echo '$ ' . number_format($saldo, 2, ',', '.'); ?></td>
                </tr>
            <?php
            }; ////////fin de cabecera/////////////
                ?>



            
            </tbody>
            </table>


            <?php



            mysqli_close($link);

            ?>