<?php

//print_r($_POST);
$desde = $_POST["desde"];
$hasta = $_POST["hasta"];
$rubro  = $_POST["rubro"];
$subrubro = $_POST["subrubro"];


require_once "../db/conexion.php";
require_once "../include/funciones.php";


//////////////////////////esto es para sacar el saldo anterior de caja///////////////////////

// function SaldoAnterior($caja, $desde)
// {
//     global $link;
//     $sqlsaldoAnterior = "SELECT SUM(importe) as saldoAnterior 
//                  FROM cajas
//                  WHERE caja_sub=$caja AND fecha < '" . $desde . "' ";
//     // die($sqlsaldoAnterior);
//     $resSaldo = mysqli_query($link, $sqlsaldoAnterior);
//     $rowsal = mysqli_fetch_assoc($resSaldo);
//     $SaldoAnterior = $rowsal["saldoAnterior"];
//     return $SaldoAnterior;
// };
// /////////////////////////////////////////////////////////////////////////////////////////////            
$total = 0;
?>
<h4 class="mt-3" style="text-align: center;">Cajas por Rubros  desde <?php echo formato_fecha_dd_mm_Y($desde); ?> hasta <?php echo formato_fecha_dd_mm_Y($hasta); ?> </h4>
<?php
if($rubro==0){
    $sqlrubros = "SELECT * FROM rubros";
       
}else {
    $sqlrubros = "SELECT * FROM rubros WHERE id_rubro=$rubro";
};
//$sqlrubros = "SELECT * FROM rubros";
$resrubros = mysqli_query($link, $sqlrubros);
while ($rowr = mysqli_fetch_array($resrubros)) {
    $rub = $rowr['id_rubro'];
    $bandera = true;
    $totalRubro = 0;
    $nomrubro = $rowr['ru_nombre'];

    if($subrubro==0){
        $sqlsb = "SELECT id_subrubro,sub_nombre FROM subrubros WHERE id_rubro=$rub";
           
    }else {
        $sqlsb = "SELECT id_subrubro,sub_nombre FROM subrubros WHERE id_rubro=$rub AND id_subrubro=$subrubro";
    };
    //$sqlsb = "SELECT id_subrubro,sub_nombre FROM subrubros WHERE id_rubro=$rub";
    $ressub = mysqli_query($link, $sqlsb);
    while ($rows = mysqli_fetch_array($ressub)) {
        $caja = $rows['id_subrubro'];
        $nomcaja = $rows['sub_nombre'];

        $sqldetalle = "SELECT * FROM cajas 
        WHERE fecha >= '" . $desde . "' AND `fecha` <= '" . $hasta . "' AND `caja_rub`=$rub AND `caja_sub`=$caja";
        $bandera = true;
        //echo $sqldetalle;
        $resdetalle = mysqli_query($link, $sqldetalle);
        $row_cnt = mysqli_num_rows($resdetalle);

        while ($row = mysqli_fetch_array($resdetalle)) {
            if ($row_cnt > 0) {
                if ($bandera) {
                    $saldo=SaldoAnterior($caja,$desde)+SaldoInicialSubrubro($caja);
?>


                    <h5><?php echo 'Rubro : '.$nomrubro ?></h5>
                    <h6><?php echo 'Caja : '.$caja.' '.$nomcaja ?></h6>
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
                                <td><?php echo 'SALDO AL ' . formato_fecha_dd_mm_Y($desde) ; ?></td>
                                <td> </td>
                                <td></td>
                                <td style="text-align: right;"><?php echo  '$ ' . number_format($saldo, 2, ',', '.');  ?></td>

                            </tr>


                        <?php
                        $bandera = false;
                    }; ////////fin de cabecera/////////////
                          $debe=($row['importe']>0)? $row['importe'] : 0;
                          $haber=($row['importe']<0)? $row['importe'] : 0; 
                          $saldo=$saldo+$debe+$haber ; 

                        ?>

                        <tr>
                            <th scope="row"><?php echo $row['id_mov']; ?></th>
                            <td><?php echo formato_fecha_dd_mm_Y($row['fecha']) ; ?></td>
                            <td><?php echo $row['nro_com']; ?></td>
                            <td><?php echo $row['descripcion']; ?></td>
                            <td style="text-align: right;" > <?php echo '$ ' . number_format($debe, 2, ',', '.'); ?></td>
                            <td style="text-align: right;"><?php echo '$ ' . number_format($haber, 2, ',', '.'); ?></td>
                            <td style="text-align: right;"><?php echo '$ ' . number_format($saldo, 2, ',', '.'); ?></td>

                        </tr>

                    <?php
                };
                    ?>



                <?php


                //$totalRubro = $totalRubro + $rowimpo['importe'];

            }; /////////////fin de los registros de la tabla tabla/////////////////////////
                ?>
                        </tbody>
                    </table>


            <?php


        };
    };

    // echo 'rubro '.$rubro;
    // echo 'subrubro '.$subrubro;

    mysqli_close($link);

            ?>