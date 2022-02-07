<?php

//print_r($_POST);
$desde = $_POST["desde"];
$hasta = $_POST["hasta"];
$caja = $_POST["caja"];


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

    $sqlsb = "SELECT id_subrubro,sub_nombre FROM subrubros WHERE id_rubro=$rub";
    $ressub = mysqli_query($link, $sqlsb);
    while ($rows = mysqli_fetch_array($ressub)) {
        $sub = $rows['id_subrubro'];

        $sqlsum = "SELECT SUM(`ga_importe`) AS importe
            FROM gastos
            WHERE `ga_fecha` >= '" . $desde . "' AND `ga_fecha` <= '" . $hasta . "' AND `ga_rubro`=$rub AND `ga_subrubro`=$sub  AND id_caja=$caja";
        //echo $sqlsum;
        $resimporte = mysqli_query($link, $sqlsum);
        while ($rowimpo = mysqli_fetch_array($resimporte)) {
            if ($rowimpo['importe'] > 0) {
                if ($bandera) {
            ?>
                    <div class="row  text-white bg-dark mt-3">
                        <div class="col-12">
                            <h5 class="pt-2"> <?php echo $rowr['ru_nombre']; ?></h5>
                        </div>
                    </div>
                <?php
                    $bandera = false;
                };

                ?>
                <div class="row">
                    <div class="col-6">
                        <?php echo $rows['sub_nombre']; ?>
                    </div>
                    <div class="col-6" style="text-align: right;">
                        <?php echo '$ ' . number_format($rowimpo['importe'], 2, ',', '.'); ?>

                    </div>
                </div>
        <?php
            };
            $totalRubro = $totalRubro + $rowimpo['importe'];
            
        };
    };
    if ($totalRubro <> 0) {


        ?>
        <div class="row text-primary h6 mt-2">
            <div class="col-6" >
                <?php echo "Total " . $rowr['ru_nombre']; ?>
            </div>
            <div class="col-6" style="text-align: right;">
                <?php echo '$ ' . number_format($totalRubro, 2, ',', '.'); ?>

            </div>
        </div>
    <?php
        $total=$total+$totalRubro;
    };
};
///////////////Gastos Generales////////////////////////////////////////
$sqlsumg = "SELECT SUM(`ga_importe`) AS importe
FROM gastos
WHERE `ga_fecha` >= '" . $desde . "' AND `ga_fecha` <= '" . $hasta . "' AND `ga_rubro`=0 AND `ga_subrubro`=0  AND id_caja=$caja" ;
//echo $sqlsum;
$resimporteg = mysqli_query($link, $sqlsumg);
$rowimpog = mysqli_fetch_array($resimporteg);
if ($rowimpog['importe'] <> 0) {

    ?>
    <div class="row  text-white   bg-dark mt-3">
        <div class="col-12">
            <h5 class="pt-2"> GASTOS GENERALES  </h5>
        </div>
    </div>
    <div class="row text-primary  mt-2">
        <div class="col-6  ">
            <?php echo "Total Gastos Generales " . $rowr['ru_nombre']; ?>
        </div>
        <div class="col-6" style="text-align: right;">
            <?php echo '$ ' . number_format($rowimpog['importe'], 2, ',', '.'); ?>
        </div>
    </div>

<?php
  $total=$total+$rowimpog['importe'];
};
?>

<div class="row  h4 mt-4">
        <div class="col-6  ">
            <?php echo "Total de Compras y Gastos " ; ?>
        </div>
        <div class="col-6" style="text-align: right;">
            <?php echo '$ ' . number_format($total, 2, ',', '.'); ?>
        </div>
    </div>

<?php


mysqli_close($link);

?>