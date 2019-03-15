<?php
session_start();
$_SESSION['palabra'];
$hola = "";
$arreglo = array('hola ','como ','estas ','yo ','muy ','bien ','gracias ',);
foreach ($arreglo as $palabras)
{

    $hola.=$palabras;
}
echo $hola;
?>