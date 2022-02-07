<?php
include_once '../db/conexion.php';
require_once'../include/funciones.php';



$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$rubro = (isset($_POST['rubro'])) ? $_POST['rubro'] : '';
$subrubro = (isset($_POST['subrubro'])) ? $_POST['subrubro'] : '';
$precio = (isset($_POST['precio'])) ? $_POST['precio'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';


switch($opcion){
    case 1:
        
        // $consulta="INSERT INTO oficinas (ofi_nombre) VALUES('".$oficina."')";
        $consulta="INSERT INTO `articulos`( `art_nombre`, `art_precio`, `art_rubro`, `art_subrubro`, `art_activo`) 
                    VALUES ('".$nombre."',$precio,$rubro,$subrubro,1)";
        
        echo $consulta;
        $resultado= mysqli_query($link,$consulta);
        //die($consulta);
        // $consulta="SELECT * FROM oficinas";
        // $resultado= mysqli_query($link,$consulta);
        // $data=array();
        // while ($row=mysqli_fetch_array($resultado)) {
        //             $data[]=array(
        //                 'id_oficina'=> $row['id_oficina'],
        //                 'ofi_nombre'=> $row['ofi_nombre']
        //             );    
        // };

        break;    
    case 2:        
        
        //$consulta = "UPDATE oficinas SET ofi_nombre='$oficina' WHERE id_oficina=$id ";		
        $consulta ="UPDATE `articulos` SET `art_nombre`='".$nombre."',`art_precio`=$precio,`art_rubro`=$rubro,`art_subrubro`=$subrubro,`art_activo`=1 
        WHERE `id_articulo`=$id";
        
        $resultado= mysqli_query($link,$consulta);
        
        // $consulta = "SELECT * FROM oficinas WHERE id_oficina=$id ";    
        // $resultado= mysqli_query($link,$consulta);
        $data=array();
        // while ($row=mysqli_fetch_array($res_cli)) {
        //             $data[]=array(
        //                 'id_oficina'=> $row['id_oficina'],
        //                 'ofi_nombre'=> $row['ofi_nombre']
        //             );    
        // };
        break;
    case 3:        
        $consulta = "DELETE FROM oficinas WHERE id_oficina=$id";	
        $resultado= mysqli_query($link,$consulta);	
        break;
    case 4:

        
        $consulta="SELECT ga.id_gasto,ga.id_caja,ca.nombre, ga.tipo_gasto,ga.ga_fecha,ga.ga_descripcion, ga.ga_importe,ga.ga_rubro, ru.ru_nombre,ga.ga_subrubro,sub.sub_nombre 
        FROM gastos ga
        LEFT JOIN caja ca ON ga.id_caja=ca.id_caja
        LEFT JOIN rubros ru ON ga.ga_rubro=ru.id_rubro
        LEFT JOIN subrubros sub ON ga.ga_subrubro=sub.id_subrubro
        ORDER BY ga.id_gasto";


        $res_art = mysqli_query($link, $consulta);
        $data=array();
            while ($row=mysqli_fetch_array($res_art)) {
                        $data[]=array(
                            'id_gasto'=> $row['id_gasto'],
                            'nombre'=> $row['nombre'],
                            'ga_fecha'=> formato_fecha_dd_mm_Y($row['ga_fecha']) ,
                            'ga_descripcion'=> $row['ga_descripcion'],
                            'ga_importe'=> $row['ga_importe'],
                            // 'tipo_gasto'=> $row['tipo_gasto'],
                            'ru_nombre'=> $row['ru_nombre'],
                            'sub_nombre'=> $row['sub_nombre']
                        );    
            };
        break;

}

print json_encode($data, JSON_UNESCAPED_UNICODE);


