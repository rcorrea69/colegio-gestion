<?php 
	require_once ("../include/validar_session.php");
	require_once("../db/conexion.php");
	require_once("../include/funciones.php");

$fecha=$_POST['fecha']; 
$cliente=$_POST['cliente'];
$detalle= json_decode($_POST['detalle'],true);
$vtaimporte=$_POST['total'];
$tipoventa=$_POST['tipoventa'];
$usuario=$_SESSION['id_usuario'];




// $repuesta= "este es el post enviado desde registraventa.php". $_POST['detalle'];


////////grabo la linea de ventas y capturo el id insertado///////////////////////////

$sql="INSERT INTO `ventas`(`vta_cliente`, `vta_fecha`, `vta_importe`, `id_usuario`,`vta_tipo`)
        VALUES ($cliente,'".$fecha."',$vtaimporte,$usuario,$tipoventa)";
$res = mysqli_query($link, $sql);
$idvta=mysqli_insert_id($link);//obtengo el id de ventas

////////grabo detalle de ventas//////////////////////////////////////
foreach($detalle as $key => $val) {
    // print "$key = $val <br>";
    $codigod = $detalle[$key]['codigo'];
    $descripciond = $detalle[$key]['descripcion'];
    $imported = $detalle[$key]['importe'];
    $cantidadd = $detalle[$key]['cantidad'];
    $total=$imported * $cantidadd;

    
    $sqld="INSERT INTO `ventas_detalles`(`id_venta`, `art_codigo`,`art_detalle`,`art_cantidad`, `importe`) 
            VALUES ($idvta,$codigod,'".$descripciond."',$cantidadd,$imported)";
    $ejectuto=mysqli_query($link, $sqld);
    $iditem=mysqli_insert_id($link);//obtengo el id de detalle de ventas 

    $sqlarticulo="SELECT art_rubro,art_subrubro FROM articulos WHERE id_articulo = $codigod";
   
    $rescodigo=mysqli_query($link, $sqlarticulo);
    $rowart = mysqli_fetch_assoc($rescodigo);
      $cajaRubro=$rowart["art_rubro"];
      $cajaSubrubro=$rowart["art_subrubro"];

    //////////////genero el movimiento de caja por rubro y subrubro
    
  

    $sqlcaja=" INSERT INTO `cajas`(`fecha`, `tabla`, `nro_com`, `nro_item`, `descripcion`, `caja_rub`, `caja_sub`, `importe`, `usuario`)
    VALUES ('".$fecha."','ventas',$idvta,$iditem,'".$descripciond."',$cajaRubro,$cajaSubrubro,$total,$usuario)";   
    //die($sqlcaja);  
    $rescaja=mysqli_query($link, $sqlcaja);    
}

/////////////////////////pregunto si la venta es cta cte y la registtro en clientes_ctacte/////////////////////

if($tipoventa==1){
        $sqlctacte="INSERT INTO `clientes_ctacte`(`id_cliente`, `ctacteDH`, `factura_recibo`, `ctacte_importe`,`ctacte_fecha`) 
        VALUES ($cliente,'D',$idvta,$vtaimporte,'".$fecha."')";
        $ejectutoctacte=mysqli_query($link, $sqlctacte);        
}
echo $idvta;
