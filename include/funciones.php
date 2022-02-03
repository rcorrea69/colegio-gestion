<?php
/////////////////////////Funciones de Fecha///////////////////////////

function formato_fecha_dd_mm_Y($date)
{
    $fecha = str_replace('/', '-', $date);
    return date('d/m/Y', strtotime($date));
}

function formato_fecha_Y_mm_dd($date)
{
    $fecha = str_replace('/', '-', $date);
    return date('Y-m-d', strtotime($fecha));
}

function hoy()
{

    global $link;

    $sqlhoy = "SELECT DATE_FORMAT(NOW(),'%d/%m/%Y') as hoy";
    $resul = mysqli_query($link, $sqlhoy);
    $hoyfila = mysqli_fetch_array($resul);
    $hoy = $hoyfila['hoy'];

    return ($hoy);
}

/////////////////////////Funciones de Fecha///////////////////////////

function hashPassword($password)
{
    $hash = password_hash($password, PASSWORD_DEFAULT);
    return $hash;
};

function SaldoAnterior($caja, $desde)
{
    global $link;
    $sqlsaldoAnterior = "SELECT SUM(importe) as saldoAnterior 
                        FROM cajas
                        WHERE caja_sub=$caja AND fecha < '" . $desde . "' ";
    // die($sqlsaldoAnterior);
    $resSaldo = mysqli_query($link, $sqlsaldoAnterior);
    $rowsal = mysqli_fetch_assoc($resSaldo);
    $SaldoAnterior = $rowsal["saldoAnterior"];
    return $SaldoAnterior;
};

function SaldoTotal($desde, $caja)
{
    global $link;
    $sqlsaldoAnterior = "SELECT SUM(importe) as saldoTotal
                        FROM cajas
                        WHERE  id_caja=$caja AND fecha < '" . $desde . "' ";
    //die($sqlsaldoAnterior);
    $resSaldo = mysqli_query($link, $sqlsaldoAnterior);
    $rowsal = mysqli_fetch_assoc($resSaldo);
    $SaldoTotal = $rowsal["saldoTotal"];
    return $SaldoTotal;
};

function SaldoInicial($caja)
{

    global $link;
    $sqlsaldoInicial = "SELECT saldo_inicial FROM caja WHERE id_caja=$caja";
    $resSaldo = mysqli_query($link, $sqlsaldoInicial);
    $rowsal = mysqli_fetch_assoc($resSaldo);
    $SaldoInicial = $rowsal["saldo_inicial"];
    return $SaldoInicial;
};

function cajaNombre($caja)
{

    global $link;
    $sqlcajaNombre = "SELECT nombre FROM caja WHERE id_caja=$caja";
    $resNombre = mysqli_query($link, $sqlcajaNombre);
    $rownom = mysqli_fetch_assoc($resNombre);
    $CajaNombre = $rownom["nombre"];
    return $CajaNombre;
};

/////////////Saldo Total por subrubros////////////////////////////////
function totalSubrubro()
{

    global $link;
    $sqltotal = "SELECT SUM(`saldo`) as total FROM vista_saldos";
    $restotal = mysqli_query($link, $sqltotal);
    $rowtotal = mysqli_fetch_assoc($restotal);
    $total = $rowtotal['total'];
    return $total;
};
///////////////////////////////////////////////////////////////

//////////////Saldos por rubros/////////////////////////////////
function saldosPorRubros()
{

    global $link;
    $sqlRubros = "SELECT ru.id_rubro,ru.ru_nombre,(SELECT SUM(vi.saldo) FROM vista_saldos vi
    WHERE vi.rubro=ru.id_rubro) AS total
    FROM rubros ru";
    $rowR = mysqli_query($link, $sqlRubros);
    return $rowR;
};
//////////////////////////////////////////////////////////////

/////////////Saldo Gastos Generales///////////////////////////
function gGenerales()
{
    global $link;
    $sqlGG = "SELECT SUM(`importe`) AS gGenerales FROM `cajas` WHERE `caja_rub`=0 AND `caja_sub`=0";
    $resGG = mysqli_query($link, $sqlGG);
    $rowGG = mysqli_fetch_assoc($resGG);
    $gGenerales = $rowGG['gGenerales'];
    return $gGenerales;
};


//////////////////////////////////////////////////////////////


