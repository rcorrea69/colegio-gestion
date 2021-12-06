<?php
include_once '../db/conexion.php';
include_once '../include/funciones.php';


$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';


switch($opcion){
    case 1:
        $consulta="INSERT INTO subrubros (sub_nombre) VALUES('".$nombre."')";
        $resultado= mysqli_query($link,$consulta);
        
        $consulta="SELECT * FROM subrubros";
        $resultado= mysqli_query($link,$consulta);
        $data=array();
        while ($row=mysqli_fetch_array($resultado)) {
                    $data[]=array(
                        'id_subrubro'=> $row['id_subrubro'],
                        'sub_nombre'=> $row['sub_nombre']
                    );    
        };

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
    
        $consulta="SELECT fi.id_venta,fi.vta_fecha,per.pe_apellido,per.pe_nombre,per.pe_telefono, fi.vta_importe,usu.usu_nombre FROM ventas_fiado AS fi 
        LEFT JOIN personas as per  ON fi.vta_cliente =per.id_persona
        LEFT JOIN usuarios as usu ON fi.id_usuario=usu.id_usuario
        WHERE factura_nro=0";    

        $res_art = mysqli_query($link, $consulta);
        
        
        $data=array();
            while ($row=mysqli_fetch_array($res_art)) {
                        $data[]=array(
                            'id_venta'=> $row['id_venta'],
                            'fecha'=> formato_fecha_dd_mm_Y($row['vta_fecha']),
                            'nombre'=> $row['pe_apellido']." ".$row['pe_nombre'],
                            'telefono'=> $row['pe_telefono'],
                            'importe'=> "$ " . number_format($row['vta_importe'], 2, ',', '.'),
                            'usuario'=> $row['usu_nombre'] 

                        );    
            };
        break;

}

print json_encode($data, JSON_UNESCAPED_UNICODE);


