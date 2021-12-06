<?php
require_once("../include/validar_session.php");
require_once("../db/conexion.php");
require_once("../include/funciones.php");

$fecha = $_POST['fecha'];
$idfiado = $_POST['idfiado'];
$usuario = $_SESSION['id_usuario'];

////////////////copio ventas fiado a Ventas////////////////////////////////

$sqlVtaf="SELECT id_venta,vta_cliente,vta_fecha,vta_importe FROM ventas_fiado WHERE id_venta=$idfiado ";
$resf=mysqli_query($link,$sqlVtaf);
$filaf=mysqli_fetch_assoc($resf);
    $clientef=$filaf['vta_cliente'];
    $importef=$filaf['vta_importe'];

$sql = "INSERT INTO `ventas`(`vta_cliente`, `vta_fecha`, `vta_importe`, `id_usuario`,`vta_tipo`)
        VALUES ($clientef,'" . $fecha . "',$importef,$usuario,0)";
$res = mysqli_query($link, $sql);
$idvta = mysqli_insert_id($link); //obtengo el id de ventas  

//////////////////////////copio detalles de vtas fiado a vtas/////////////////////////////////


$sqlVtafd="SELECT art_codigo,art_detalle,art_cantidad,importe FROM ventas_detalles_fiado WHERE id_venta=$idfiado ";
$resfd=mysqli_query($link,$sqlVtafd);
//$filafd=mysqli_fetch_array($resfd);
    while ($filafd=mysqli_fetch_array($resfd)) {

        $codigod = $filafd['art_codigo'];
        $descripciond =  $filafd['art_detalle'];
        $imported =  $filafd['importe'];
        $cantidadd =  $filafd['art_cantidad'];
        $total = $imported * $cantidadd;
    
        $sqld = "INSERT INTO `ventas_detalles`(`id_venta`, `art_codigo`,`art_detalle`,`art_cantidad`, `importe`) 
                VALUES ($idvta,$codigod,'" . $descripciond . "',$cantidadd,$imported)";
        $ejectuto = mysqli_query($link, $sqld);
        $iditem = mysqli_insert_id($link);

        $sqlarticulo = "SELECT art_rubro,art_subrubro FROM articulos WHERE id_articulo = $codigod";
        $rescodigo = mysqli_query($link, $sqlarticulo);
        $rowart = mysqli_fetch_assoc($rescodigo);
        $cajaRubro = $rowart["art_rubro"];
        $cajaSubrubro = $rowart["art_subrubro"];

        $sqlcaja = " INSERT INTO `cajas`(`fecha`, `tabla`, `nro_com`, `nro_item`, `descripcion`, `caja_rub`, `caja_sub`, `importe`, `usuario`)
        VALUES ('" . $fecha . "','ventas',$idvta,$iditem,'" . $descripciond . "',$cajaRubro,$cajaSubrubro,$total,$usuario)";
        //die($sqlcaja);  
        $rescaja = mysqli_query($link, $sqlcaja);

    };

///////////////Actualizo ventas_fiado para sacar 
$sqlA="UPDATE `ventas_fiado` SET `factura_fecha`='".$fecha."',`factura_nro`=$idvta WHERE `id_venta`=$idfiado";
$resA=mysqli_query($link,$sqlA);


echo "Factura ".$idvta;

mysqli_close($link);
