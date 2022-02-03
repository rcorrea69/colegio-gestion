<?php

require_once "../db/conexion.php";


$sql="SELECT id_caja,nombre FROM caja";
$res = mysqli_query($link, $sql);

        $template="";
        while ($row = mysqli_fetch_array($res)) {
            $template.="<option value=$row[id_caja]>$row[nombre]";
        };
echo $template;

?>
