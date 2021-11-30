<?php

//print_r($_POST);
$desde = $_POST["desde"];
$hasta = $_POST["hasta"];



require_once "../db/conexion.php";
require_once "../include/funciones.php";

$total=0;
?>
    <h4 class="mt-3" style="text-align: center;">Compras y Gastos desde <?php echo formato_fecha_dd_mm_Y($desde ) ;?> hasta <?php echo formato_fecha_dd_mm_Y($hasta) ;?> </h4>
<?php

$sqlrubros = "SELECT * FROM rubros";
$resrubros = mysqli_query($link, $sqlrubros);
while ($rowr = mysqli_fetch_array($resrubros)) {
    $rub = $rowr['id_rubro'];
    $bandera = true;
    $totalRubro = 0;
    $nomrubro= $rowr['ru_nombre'];

    $sqlsb = "SELECT id_subrubro,sub_nombre FROM subrubros WHERE id_rubro=$rub";
    $ressub = mysqli_query($link, $sqlsb);
    while ($rows = mysqli_fetch_array($ressub)) {
        $caja = $rows['id_subrubro'];
        $nomcaja=$rows['sub_nombre'];

        $sqlsaldoAnterior="SELECT SUM(importe) as saldoAnterior 
                        FROM cajas
                        WHERE caja_sub=$caja AND fecha < '" . $desde . "' ";
                        // die($sqlsaldoAnterior);
        $resSaldo=mysqli_query($link,$sqlsaldoAnterior);
        $rowsal = mysqli_fetch_assoc($resSaldo);
            $SaldoAnterior=$rowsal["saldoAnterior"];

        
        $sqldetalle="SELECT * FROM cajas 
        WHERE fecha >= '" . $desde . "' AND `fecha` <= '" . $hasta . "' AND `caja_rub`=$rub AND `caja_sub`=$caja";     
        
        //echo $sqldetalle;
        $resdetalle = mysqli_query($link, $sqldetalle);
        $row_cnt = mysqli_num_rows($resdetalle);

        while ($row = mysqli_fetch_array($resdetalle)) {
            if ($row_cnt > 0) {
                if ($bandera) {
            ?>      
                    <h4><?php echo $nomrubro?></h4>
                    <h4><?php echo $nomcaja?></h4>
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
                        
                <?php
                    $bandera = false;
                };

                ?>
                
                    <tr>
                        <th scope="row"><?php echo $row['id_mov']; ?></th>
                        <td><?php echo $row['fecha']; ?></td>
                        <td><?php echo $row['nro_com']; ?></td>
                        <td><?php echo $row['descripcion']; ?></td>
                        <td> <?php echo '$ ' . number_format($row['importe'], 2, ',', '.'); ?></td>
                        <td><?php echo $row['importe']; ?></td>
                        <td><?php echo $row['importe']; ?></td>
                        
                    </tr>

        <?php
            };
            ?>
                   
                    

            <?php
            

            //$totalRubro = $totalRubro + $rowimpo['importe'];
            
        };
        ?>
                    </tbody> 
                    </table>
            

        <?php


    };

};


mysqli_close($link);

?>