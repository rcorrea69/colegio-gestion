<?php require_once ("validar_session.php"); ?>
<?php 

include('fpdf/fpdf.php');
include('db/conexion.php');
require_once('include/funciones.php');
require_once('include/NumeroALetras.php');




$vta=$_GET['vta'];

$sqlcabecera="SELECT pe.id_persona,  pe.pe_apellido,pe.pe_nombre, vta.vta_fecha, vta.vta_importe FROM ventas  vta LEFT JOIN personas  pe
ON vta.vta_cliente=pe.id_persona
WHERE vta.id_venta=".$vta;



//die($sqlcabecera);

$res = mysqli_query($link, $sqlcabecera);
$row=mysqli_fetch_assoc($res);

if( is_null($row['id_persona'])){
    $cliente="Consumidor Final";
}else{
    $cliente=$row['pe_apellido']." ".$row['pe_nombre'];
};

// $nombre=$row['nombres'];
// $apellido=$row['apellidos'];
$fecha=$row['vta_fecha'];
$usuario=$_SESSION ['nombre'];

$letras = NumeroALetras::convertir($row['vta_importe'], 'pesos', 'centavos');



class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('img/recibo.png',10,5,100);
    $this->SetFont('Times','I',15);
    $this->Ln(15);
}


}

// Creación del objeto dea la clase heredada
$pdf = new PDF('P','mm','A4');
//$pdf->AliasNbPages();
$pdf->AddPage();


$pdf->Cell(195,10, utf8_decode('Recibo: '.$vta),0,1,'R');
$pdf->SetFont('Helvetica','B',15);
$pdf->Cell(195,10, utf8_decode(formato_fecha_dd_mm_Y($fecha)),0,1,'R');


//$pdf->SetFont('Times','',12);
//$pdf->Cell(0);
//$pdf->Cell(15,7, utf8_decode('D.N.I:'),1,0,'L');
$pdf->SetFont('Times','B',12);
//$pdf->Cell(30,7, utf8_decode($dni),1,0,'L'); 
$pdf->Cell(70,6, utf8_decode("Señor/es : ".$cliente),0,1,'L');
$pdf->Cell(195,6, utf8_decode("Recibi: ".$letras),0,1,'L');
$pdf->Ln();



$pdf->SetFont('Times','B',15);
//$pdf->Cell(5);
$pdf->Cell(195,8, utf8_decode('Detalle de Recibo'),1,1,'C');
$pdf->SetFont('Arial','I',13);
//$pdf->Cell(30,5, utf8_decode('DNI'),1,0,'C');
$pdf->Cell(10,8, utf8_decode('Cód.'),1,0,'C');
$pdf->Cell(115,8, utf8_decode('Concepto'),1,0,'C');
//$pdf->Cell(30,5, utf8_decode('Categoría'),1,0,'C');
$pdf->Cell(15,8, utf8_decode('Cant.'),1,0,'C');
$pdf->Cell(20,8, utf8_decode('Subt.'),1,0,'C');
$pdf->Cell(35,8, utf8_decode('Importe'),1,1,'C');


///// estos son los ejemplos//////////////

$sqldetalle="SELECT * FROM ventas_detalles WHERE id_venta=".$vta;
$res=mysqli_query($link,$sqldetalle);
$total=0;
while($fila=mysqli_fetch_array($res)){
    
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(10,7, utf8_decode($fila['art_codigo']),1,0,'C');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(115,7, utf8_decode($fila['art_detalle']),1,0,'L');
    $pdf->Cell(15,7, utf8_decode($fila['art_cantidad']),1,0,'R');
    $importe=$fila['art_cantidad']*$fila['importe'];
    $pdf->Cell(20,7,$fila['importe'] ,1,0,'R');
    // $pdf->Cell(35,7, utf8_decode("$ ".$importe),1,1,'C');
    $pdf->Cell(35,7, utf8_decode(number_format($importe,2,',','.')),1,1,'R');    
    $total=$total+$importe;

}


//////////total//////////////////////////////////////
$pdf->SetFont('Arial','B',14);
$pdf->Cell(160,7, utf8_decode('TOTAL'),1,0,'R');
$pdf->Cell(35,7, utf8_decode("$ ".number_format($total,2,',','.')),1,1,'R');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(160,3,  "-----------------" ,0,1,'R');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(160,7,  $usuario ,0,0,'R');



// $pdf->Cell(40,8, utf8_decode('esto es y  '.$y_aqui),1,1,'C');
// $pdf->Cell(40,8, utf8_decode('esto es x  '.$x_aqui),1,1,'C');


////////////////////////////////constancia para control ///////////////////////////
$pdf->Output();










?>
