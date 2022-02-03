<?php
require_once("../include/validar_session.php");
include_once '../db/conexion.php';
require_once("../include/funciones.php");



$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$rubro = (isset($_POST['rubro'])) ? $_POST['rubro'] : '';
$saldoInicial = (isset($_POST['saldoI'])) ? $_POST['saldoI'] : '';
$fecha = $_POST['fecha'];
$usuario=$_SESSION['id_usuario'];




switch($opcion){
    case 1:
        $consulta="INSERT INTO subrubros (sub_nombre,id_rubro, `sub_saldoInicial`, `sub_fecha`)
        VALUES('".$nombre."',$rubro,$saldoInicial,'".$fecha."')";
        die ($consulta);
        $resultado= mysqli_query($link,$consulta);
        $idcaja = mysqli_insert_id($link); 
        
        $sqlcaja=" INSERT INTO `cajas`(`fecha`, `tabla`, `nro_com`, `nro_item`, `descripcion`, `caja_rub`, `caja_sub`, `importe`, `usuario`)
        VALUES ('".$fecha."','sInicial',0,0,'Saldo Inicial',$rubro,$idcaja,$saldoInicial,$usuario)";   
        $rescaja=mysqli_query($link, $sqlcaja); 

        break;    
    case 2:        
        
        $consulta = "UPDATE subrubros SET sub_nombre='".$nombre."' WHERE id_subrubro=$id ";		
        $resultado= mysqli_query($link,$consulta);
        $consulta = "SELECT * FROM subrubros WHERE id_subrubro=$id ";    
        $resultado= mysqli_query($link,$consulta);
        $data=array();
        while ($row=mysqli_fetch_array($res_cli)) {
                    $data[]=array(
                        'id_subrubro'=> $row['id_subrubro'],
                        'sub_nombre'=> $row['sub_nombre']
                    );    
        };
        break;
    case 3:  /// borro logicamente el articulos      
        // $consulta = "DELETE FROM oficinas WHERE id_oficina=$id";	
        // $resultado= mysqli_query($link,$consulta);	
        // break;
    case 4: ///selecciono todos los Rubros
        $consulta="SELECT id_subrubro, sub_nombre
        FROM subrubros";    
        
        $res_art = mysqli_query($link, $consulta);
        $data=array();
            while ($row=mysqli_fetch_array($res_art)) {
                        $data[]=array(
                            'id_subrubro'=> $row['id_subrubro'],
                            'sub_nombre'=> $row['sub_nombre']
                        );    
            };
        break;

}

print json_encode($data, JSON_UNESCAPED_UNICODE);


