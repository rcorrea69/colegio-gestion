<?php 
	require_once ("../include/validar_session.php");
	require_once("../db/conexion.php");
	require_once("../include/funciones.php");

$fecha=$_POST['fecha']; 
$cliente=$_POST['cliente'];
$detalle= json_decode($_POST['detalle'],true);
$vtaimporte=$_POST['total'];
$usuario=$_SESSION['id_usuario'];


// $repuesta= "este es el post enviado desde registraventa.php". $_POST['detalle'];


////////grabo la linea de ventas y capturo el id insertado///////////////////////////

$sql="INSERT INTO `ventas`(`vta_cliente`, `vta_fecha`, `vta_importe`, `id_usuario`)
        VALUES ($cliente,'".$fecha."',$vtaimporte,$usuario)";
$res = mysqli_query($link, $sql);
$idvta=mysqli_insert_id($link);//obtengo el id de pedidos

////////grabo detalle de ventas//////////////////////////////////////
foreach($detalle as $key => $val) {
    // print "$key = $val <br>";
    $codigod = $detalle[$key]['codigo'];
    $descripciond = $detalle[$key]['descripcion'];
    $imported = $detalle[$key]['importe'];
    $cantidadd = $detalle[$key]['cantidad'];

    
    $sqld="INSERT INTO `ventas_detalles`(`id_venta`, `art_codigo`,`art_detalle`,`art_cantidad`, `importe`) 
            VALUES ($idvta,$codigod,'".$descripciond."',$cantidadd,$imported)";
    $ejectuto=mysqli_query($link, $sqld);
}

echo "este es el id de ventas generado".$idvta;

?>