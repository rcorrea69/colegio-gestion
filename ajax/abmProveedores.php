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

        $consulta="INSERT INTO `proveedores`(`pe_apellido`, `pe_nombre`, `pe_domicilio`, `pe_telefono`, activo) 
         VALUES('".$apellido."','".$nombre."','".$domicilio."','".$telefono."',1)";
        $resultado= mysqli_query($link,$consulta);
        

        break;    
    case 2:        
        
        $consulta="UPDATE `proveedores` SET `pe_apellido`='".$apellido."',`pe_nombre`='".$nombre."',`pe_domicilio`='".$domicilio."',`pe_telefono`='".$telefono."' WHERE id_persona=$id";

        //$consulta = "UPDATE oficinas SET ofi_nombre='$oficina' WHERE id_oficina=$id ";		
        $resultado= mysqli_query($link,$consulta);

        
        break;
    case 3:
        $consulta="UPDATE `proveedores` SET `activo`= 0 WHERE `id_persona`=$id";        
        //$consulta = "DELETE FROM oficinas WHERE id_oficina=$id";	
        $resultado= mysqli_query($link,$consulta);	
        break;
    case 4:

        $consulta="SELECT `id_persona`, `pe_apellido`, `pe_nombre`, `pe_domicilio`, `pe_telefono` FROM `proveedores` WHERE activo=1 ";    
        
        $res_art = mysqli_query($link, $consulta);
        $data=array();
            while ($row=mysqli_fetch_array($res_art)) {
                        $data[]=array(
                            'id_persona'=> $row['id_persona'],
                            'apellido'=> $row['pe_apellido'], 
                            'nombre'=> $row['pe_nombre'],
                            'domicilio'=> $row['pe_domicilio'],
                            'telefono'=> $row['pe_telefono']
                        );    
            };
        break;

}

print json_encode($data, JSON_UNESCAPED_UNICODE);


