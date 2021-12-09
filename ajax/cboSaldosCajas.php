<?php
require_once "../db/conexion.php";


$sql="SELECT caja,sub_nombre FROM vista_saldos";
$res = mysqli_query($link, $sql);

        $template="<option selected value=0>Seleccione Caja</option>";
        while ($row = mysqli_fetch_array($res)) {
            $template.="<option value=$row[caja]>$row[sub_nombre]</option>";
        };
echo $template;


?>