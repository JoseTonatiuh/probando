<?php
//session_start();
//$_SESSION['contenido']=htmlspecialchars($_POST['textos']);
$text=$_SESSION['contenido'];
include_once 'bootstrap.php';
include 'diccionario.php';
function multiexplode($delimiters, $string)
{
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters [0], $ready);
    return $launch;
    echo "<br>";
}
echo("<pre>");
include 'diccionario.php';
//separando el string por etiquetas
$sepetiquetas = multiexplode($separadores, $text);
//Creando el string de salida
$texto =implode("",$sepetiquetas);

//Cambiando las etiquetas
$separacion=multiexplode("p",$texto);
$identificadores1=str_replace($remplazadores,$cambiados,$texto);
//creando array de trabajo
$probando=multiexplode($probadores,$identificadores1);

 /*foreach ($probando as $prueba){

    $b=$prueba;
    echo $b;
                                                    $possifo = strpos($b, "tamaño")+9; //tamaño de letra
                                                    $poslet = strpos($b, "letra") + 6; //color de letra
                                                    $posfon = strpos($b, "fondo")+6; //color de fondo
                                                    $posfont = (strpos($b, "Tipofuente")) + 11;//nombre de fuente
                                                    $posfontf = strpos($b, ","); // posicion final de fuente
                                                    $posvarf = strpos($b, "¿/codigo?");//posicion final de la variable
                                                    $posvari = (strpos($b, "¿codigo?") + 9);//posicion inicial de la variable

                                                    //////////////////////////////
                                                    //////////////////////////////
                                                    ///

                                                        //Obtener Texto a ingresar
                                                    $contenido=str_replace($cambiartext,"",$b);
                                                    $initext=strpos($contenido,";");
                                                    $cuerpo=substr($contenido,$initext);
                                                    echo "El texto a ingresar es este"." ".$cuerpo;
                                                    echo ("<br>");


                                                        //Obtener Variable
                                                  if($variable=strpos($b,"codigo") !== false)
                                                  {
                                                      $variable=substr($b,$posvari,$posvarf-$posvari);
                                                  }
                                                  else{

                                                      $variable=" ";
                                                  }

                                                        //Tipo de Letra
                                                    if($letra=strpos($b,"Tipofuente")== false){
                                                        $letra="arial";
                                                    }
                                                    else{
                                                        $letra=substr($b,$posfont,20);
                                                        //  echo $letra;
                                                    }
                                                    //obtener tamaño de letra
                                                    if ($sizefont = strpos($b, "tamaño") == false) {
                                                        $sizefont = "12";
                                                    } else {
                                                        $sizefont = substr($b, $possifo, 2);


                                                    }
                                                    //obtener color de fondo
                                                    if ($codfon = strpos($b, "fondo") == false) {
                                                        $codfon = "FFFFFF";
                                                    } else {
                                                        $codfon = substr($b, $posfon, 6);

                                                    }
                                                    //obtener color de letra
                                                    if ($codlet = strpos($b, "letra") == false) {
                                                        $codlet = "000000";
                                                    } else {
                                                        $codlet = substr($b, $poslet, 6);

                                                    }

                                                    if ($negrita=strpos($b, "strong") !== false){
                                                        $negrita= true;
                                                    }else{
                                                        $negrita=false;
                                                    }
                                                //Cursiva
                                                    if ($italica=strpos($b, "em")!== false){
                                                        $italica= true;
                                                    }else{
                                                        $italica=false;
                                                    }
                                                //Subrayado
                                                    if ($subra=strpos($b,"underline")!==false)
                                                    {
                                                        $subra="single";
                                                    }
                                                    else{
                                                        $subra="none";
                                                    }
                                                //Superindice
                                                    if ($supind=strpos($b,"/sup") !==false)
                                                    {
                                                        $supind= true;
                                                    }
                                                    else{
                                                        $supind=false;
                                                    }
                                                //subindice
                                                    if ($subind=strpos($b,"/sub")!==false)
                                                    {
                                                        $subind=true;
                                                    }
                                                    else{
                                                        $subind=false;
                                                    }
                                                //Tachado
                                                    if ($tacha=strpos($b,"line-through;")!==false)
                                                    {
                                                        $tacha=true;
                                                    }
                                                    else{
                                                        $tacha=false;
                                                    }

}

*/
unset($b);
echo ("<br>");
$phpWord = new \PhpOffice\PhpWord\PhpWord();
$section=$phpWord->addSection();
$Encabezado = $section->addHeader();
$table = $Encabezado->addTable();
$table->addRow();
$texto1 =$table->addCell(30 * 50)->addText();
$texto2=$table->addCell(70 * 50)->addImage("logotipoJA-dorado-trazo.png", array(
    //'positioning' => 'relative',
    'width' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.3),
    'height' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.5),
    'align' => 'center',
    'wrappingStyle' => 'infront',));
var_dump($texto1);
$union=($texto1.$texto2);
echo $union;

?>

<html>
<a href="probando.php">Generar Archivo</a>
</html>



