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
    // case 2:        
        
    //     $consulta = "UPDATE subrubros SET sub_nombre='".$nombre."' WHERE id_subrubro=$id ";		
    //     $resultado= mysqli_query($link,$consulta);
    //     $consulta = "SELECT * FROM subrubros WHERE id_subrubro=$id ";    
    //     $resultado= mysqli_query($link,$consulta);
    //     $data=array();
    //     while ($row=mysqli_fetch_array($res_cli)) {
    //                 $data[]=array(
    //                     'id_subrubro'=> $row['id_subrubro'],
    //                     'sub_nombre'=> $row['sub_nombre']
    //                 );    
    //     };
    //     break;
    case 3:  /// borro logicamente el articulos      
        // $consulta = "DELETE FROM oficinas WHERE id_oficina=$id";	
        // $resultado= mysqli_query($link,$consulta);	
        // break;
    case 4: ///selecciono todos los Rubros
    
        // $consulta = "SELECT ru.ru_nombre,vs.rubro,vs.caja,vs.sub_nombre,vs.saldo 
        // FROM vista_saldos vs
        // LEFT JOIN rubros ru
        // ON vs.rubro = ru.id_rubro";
        $consulta="SELECT caja.id_caja,caja.nombre,caja.saldo_inicial,(SELECT SUM(cajas.importe)
                FROM cajas   WHERE caja.id_caja=cajas.id_caja)as total 
                FROM `caja`";

        $res_art = mysqli_query($link, $consulta);


        
        $data=array();
            while ($row=mysqli_fetch_array($res_art)) {
                        $data[]=array(
                            'id_caja'=> $row['id_caja'],
                            'nombre'=> $row['nombre'],
                            'saldo'=> $row['saldo_inicial'] + $row['total']

                        );    
            };
        break;

}

print json_encode($data, JSON_UNESCAPED_UNICODE);


