<?php
include_once '../db/conexion.php';



$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';


switch($opcion){
    case 1:
        
        $consulta="INSERT INTO oficinas (ofi_nombre) VALUES('".$oficina."')";
        $resultado= mysqli_query($link,$consulta);
        
        $consulta="SELECT * FROM oficinas";
        $resultado= mysqli_query($link,$consulta);
        $data=array();
        while ($row=mysqli_fetch_array($resultado)) {
                    $data[]=array(
                        'id_oficina'=> $row['id_oficina'],
                        'ofi_nombre'=> $row['ofi_nombre']
                    );    
        };

        break;    
    case 2:        
        
        $consulta = "UPDATE oficinas SET ofi_nombre='$oficina' WHERE id_oficina=$id ";		
        $resultado= mysqli_query($link,$consulta);

        $consulta = "SELECT * FROM oficinas WHERE id_oficina=$id ";    
        $resultado= mysqli_query($link,$consulta);
        $data=array();
        while ($row=mysqli_fetch_array($res_cli)) {
                    $data[]=array(
                        'id_oficina'=> $row['id_oficina'],
                        'ofi_nombre'=> $row['ofi_nombre']
                    );    
        };
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


