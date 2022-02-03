<?php 
	require_once ("../include/validar_session.php");
	require_once("../db/conexion.php");
	require_once("../include/funciones.php");

 

$fecha=$_POST['fecha']; 
$rubro=$_POST['rubro'];
$descripcion=$_POST['descripcion'];
$importe=$_POST['importe'];
$subrubro=$_POST['subrubro'];
$proveedor=$_POST['proveedor'];
$caja=$_POST['caja'];
$tipogasto=$_POST['tipogasto'];
$usuario=$_SESSION['id_usuario'];




// $repuesta= "este es el post enviado desde registraventa.php". $_POST['detalle'];

////////grabo la linea de gastos y capturo el id insertado///////////////////////////
$sql="INSERT INTO `gastos` (`id_caja`,`tipo_gasto`, `id_proveedor`, `ga_fecha`, `ga_descripcion`, `ga_importe`, `ga_rubro`, `ga_subrubro`, `ga_usuario`)
VALUES ($caja,$tipogasto,$proveedor,'".$fecha."','".$descripcion."',$importe,$rubro,$subrubro,$usuario)";
$res = mysqli_query($link, $sql);
$idgto=mysqli_insert_id($link);//obtengo el id de ventas

//die($sql);

/////////////registro movimiento de caja//////////////////////////////////////////77

$imp=(-1 * $importe);
$sqlcaja=" INSERT INTO `cajas`(`id_caja`,`fecha`, `tabla`, `nro_com`, `nro_item`, `descripcion`, `caja_rub`, `caja_sub`, `importe`, `usuario`)
VALUES ($caja,'".$fecha."','gastos',$idgto,0,'".$descripcion."',$rubro,$subrubro,$imp,$usuario)";   
//die($sqlcaja);  
$rescaja=mysqli_query($link, $sqlcaja);    

//die($sql);
/////////////////////////pregunto el gasto es  cta cte y la registtro en clientes_ctacte/////////////////////

// if($tipogasto==1){
//         $sqlctacte="INSERT INTO `proveedores_ctacte`(`id_proveedor`, `ctacteDH`, `factura_recibo`, `ctacte_importe`,`ctacte_fecha`) 
//         VALUES ($proveedor,'H',$idvta,$importe,'".$fecha."')";
//         $ejectutoctacte=mysqli_query($link, $sqlctacte);     
//         //die($sqlctacte);   
// }
echo $idgto;
