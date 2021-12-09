<?php
include_once '../db/conexion.php';



$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : '';
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$domicilio = (isset($_POST['domicilio'])) ? $_POST['domicilio'] : '';
$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';


switch($opcion){
    case 1:

        $consulta="INSERT INTO `personas`(`pe_apellido`, `pe_nombre`, `pe_domicilio`, `pe_telefono`) 
         VALUES('".$apellido."','".$nombre."','".$domicilio."','".$telefono."')";
        //echo die($consulta);
        $resultado= mysqli_query($link,$consulta);
        
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

        $consulta="SELECT `id_persona`, `pe_apellido`, `pe_nombre`, `pe_domicilio`, `pe_telefono` FROM `personas` ";    
        
        $res_art = mysqli_query($link, $consulta);
        $data=array();
            while ($row=mysqli_fetch_array($res_art)) {
                        $data[]=array(
                            'id_persona'=> $row['id_persona'],
                            'nombre'=> $row['pe_apellido'].' '.$row['pe_nombre'],
                            'domicilio'=> $row['pe_domicilio'],
                            'telefono'=> $row['pe_telefono']
                        );    
            };
        break;

}

print json_encode($data, JSON_UNESCAPED_UNICODE);


