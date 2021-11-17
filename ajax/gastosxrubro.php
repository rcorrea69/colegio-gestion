<?php

print_r($_POST);
$desde = $_POST["desde"];
$hasta = $_POST["hasta"];
$rubro = $_POST["rubro"];
$subrubro = $_POST["subrubro"];


require_once "../db/conexion.php";
require_once "../include/funciones.php";

$sql="SELECT rubros.id_rubro,rubros.ru_nombre,(SELECT SUM(`ga_importe`) FROM gastos
WHERE `ga_fecha`>='" . $desde . "' AND `ga_fecha`<='" . $hasta . "'  AND `ga_rubro`=rubros.id_rubro) as total
FROM rubros";
$res = mysqli_query($link, $sql);
$row_cnt = mysqli_num_rows($res);


$sqlrubros="SELECT * FROM rubros";
$resrubros=mysqli_query($link,$sqlrubros);
    while($rowr=mysqli_fetch_array($resrubros)){
        $rub=$rowr['id_rubro'];
        ?>
        <div class="row m-3" >
            <div class="col-12">
                <h3> <?php echo $rowr['ru_nombre']; ?></h3>
            </div>
        </div>
        <?php

        // $sqlsb="SELECT ga.ga_rubro, ga.ga_fecha, sub.sub_nombre, ga.ga_subrubro,sum(ga.ga_importe) as importe
        //         from gastos ga LEFT JOIN subrubros sub ON ga.ga_subrubro = sub.id_subrubro
        //         GROUP BY ga.ga_subrubro, ga.ga_fecha
        //         HAVING ga.ga_fecha >= '".$desde."'AND ga.ga_fecha <= '".$hasta."' AND ga.ga_rubro=$rub";
        // echo $sqlsb;
        $sqlsb="SELECT id_subrubro,sub_nombre FROM subrubros WHERE id_rubro=$rub";
        
        //echo $sqlsb;        
        $ressub=mysqli_query($link,$sqlsb);
        while($rows=mysqli_fetch_array($ressub)){
            $sub=$rows['id_subrubro'];

            $sqlsum="SELECT SUM(`ga_importe`) AS importe
            FROM gastos
            WHERE `ga_fecha` >= '".$desde."' AND `ga_fecha` <= '".$hasta."' AND `ga_rubro`=$rub AND `ga_subrubro`=$sub";
            //echo $sqlsum;
            $resimporte=mysqli_query($link,$sqlsum);
            while($rowimpo=mysqli_fetch_array($resimporte)){
                            ?>
                <div class="row">
                    <div class="col-6">
                        <?php echo $rows['sub_nombre']; ?>
                    </div>
                    <div class="col-6">
                        <?php echo $rowimpo['importe']; ?>
                    </div>   
                </div>
            <?php
            };


        };

    };


?>
<!-- <br>
<h4 style="text-align: center;">Compras y Gastos  por Rubro desde <?php echo formato_fecha_dd_mm_Y($desde) ; ?> a  <?php echo formato_fecha_dd_mm_Y($hasta); ?></h4>
<br>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Id Rubro</th>
            <th scope="col">Rubro</th>
            <th scope="col">Total</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
        $total=0;
        while ($row = mysqli_fetch_array($res)) {
            $total=$total + $row['total'];
        ?>
            <tr>
                <th scope="row"><?php echo  $row['id_rubro']; ?></th>
                <td><?php echo $row['ru_nombre']; ?></td>
                <td style="text-align: right;"><?php echo '$ ' . number_format($row['total'], 2, ',', '.'); ?></td>
                
            </tr>

        <?php
        };


        ?>
            <tr>
                <th scope="row"></th>
                <td></td>
                <td style="text-align: right;"><?php echo ' TOTAL ...'. '$ ' . number_format($total, 2, ',', '.'); ?></td>
                
            </tr>

    </tbody>
</table> -->
<!-- <div class="row">
     <div class="col-6">
        Industrias
     </div>
     <div class="col-6">
        Dulce de Leche
     </div>   
</div> -->

<?php


//mysqli_close($link);

?>