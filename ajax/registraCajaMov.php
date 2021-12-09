<?php
require_once("../include/validar_session.php");
require_once("../db/conexion.php");
require_once("../include/funciones.php");

$cajaDesde = $_POST['cajadesde'];
$cajaA = $_POST['cajaA'];
$importe = $_POST['importe'];
$fecha = formato_fecha_Y_mm_dd(hoy());
$usuario=$_SESSION['id_usuario'];

/////////////////////// saco el rubro de las cajas desde a cajas hasta/////////////
function traigoRubro($sub){
    global $link;
    $sqlT="SELECT id_rubro FROM subrubros WHERE id_subrubro=$sub";
    $resT=mysqli_query($link,$sqlT);
    $rowT=mysqli_fetch_assoc($resT);
    $rubtoT=$rowT['id_rubro'];
    return $rubtoT;

};

///////////////////////registro movimiento de cajas_mov////////////////////////////// 
$sql="INSERT INTO `cajas_mov`(  `fecha`,`caja_envia`, `caja_recibe`, `importe`, `usuario`) 
VALUES ('".$fecha."',$cajaDesde,$cajaA,$importe,$usuario)";
$res = mysqli_query($link, $sql);
$idmov = mysqli_insert_id($link); 

/////////////registro  movimiento de caja SALIDA //////////////////////////////////////////77
$rubroS=traigoRubro($cajaDesde);
$imp=(-1 * $importe);
$sqlcaja=" INSERT INTO `cajas`(`fecha`, `tabla`, `nro_com`, `nro_item`, `descripcion`, `caja_rub`, `caja_sub`, `importe`, `usuario`)
VALUES ('".$fecha."','cajas_mov',$idmov,0,'Movimiento entre Cajas',$rubroS,$cajaDesde,$imp,$usuario)";   
//die($sqlcaja);  
$rescaja=mysqli_query($link, $sqlcaja); 

/////////////registro  movimiento de caja Ingreso //////////////////////////////////////////77
$rubroI=traigoRubro($cajaA);
$imp=$importe;
$sqlcaja=" INSERT INTO `cajas`(`fecha`, `tabla`, `nro_com`, `nro_item`, `descripcion`, `caja_rub`, `caja_sub`, `importe`, `usuario`)
VALUES ('".$fecha."','cajas_mov',$idmov,0,'Movimiento entre Cajas',$rubroI,$cajaA,$imp,$usuario)";   
//die($sqlcaja);  
$rescaja=mysqli_query($link, $sqlcaja); 

echo " Movimiento entre cajas  ".$idmov;
  
