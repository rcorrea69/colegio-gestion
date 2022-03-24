<?php
include_once '../db/conexion.php';



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

        break;    
    case 2:        
        
        //$consulta = "UPDATE oficinas SET ofi_nombre='$oficina' WHERE id_oficina=$id ";		
        $consulta ="UPDATE `articulos` SET `art_nombre`='".$nombre."',`art_precio`=$precio,`art_rubro`=$rubro,`art_subrubro`=$subrubro,`art_activo`=1 
        WHERE `id_articulo`=$id";
        
        $resultado= mysqli_query($link,$consulta);
        
        break;
    case 3:        
        $consulta = "DELETE FROM oficinas WHERE id_oficina=$id";	
        $resultado= mysqli_query($link,$consulta);	
        break;
    case 4:
        $consulta="SELECT art.id_articulo,art.art_nombre,art.art_precio,ru.id_rubro,ru.ru_nombre,id_subrubro,sub.sub_nombre
        FROM articulos art
        LEFT JOIN rubros ru ON ru.id_rubro=art.art_rubro
        LEFT JOIN subrubros sub ON sub.id_subrubro=art.art_subrubro
        WHERE art.art_activo=1 
        ORDER BY art.id_articulo";    
        
        $res_art = mysqli_query($link, $consulta);
        $data=array();
            while ($row=mysqli_fetch_array($res_art)) {
                        $data[]=array(
                            'id_articulo'=> $row['id_articulo'],
                            'art_nombre'=> $row['art_nombre'],
                            'art_precio'=> $row['art_precio'],
                            'id_rubro'=> $row['id_rubro'],
                            'ru_nombre'=> $row['ru_nombre'],
                            'id_subrubro'=> $row['id_subrubro'],
                            'sub_nombre'=> $row['sub_nombre']
                        );    
            };
        break;

}

print json_encode($data, JSON_UNESCAPED_UNICODE);


