<?php
require_once "../db/conexion.php";


$sql="SELECT id_caja,nombre FROM caja";
$res = mysqli_query($link, $sql);

        $template="<option selected value=0>Seleccione Caja</option>";
        while ($row = mysqli_fetch_array($res)) {
            $template.="<option value=$row[id_caja]>$row[nombre]</option>";
        };
echo $template;


?>