<?php
session_start();
$_SESSION['probar']=htmlspecialchars($_POST['textos']);
include_once 'bootstrap.php';
include_once 'diccionario.php';
function multiexplode($delimiters, $string)
{
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters [0], $ready);
    return $launch;
    echo "<br>";
}
echo("<pre>");
include 'diccionario.php';
//separando el string por etiquetas para el cuerpor del documento
/*
 *
 *
 *
 *
 *
 *
 * */
$text=$_SESSION['probar'];
$sepetiquetas = multiexplode($separadores, $text);
//Creando el string de salida
$texto =implode("",$sepetiquetas);
//Cambiando las etiquetas
$separacion=multiexplode("p",$texto);
$identificadores1=str_replace($remplazadores,$cambiados,$texto);
//creando array de trabajo
$probando=multiexplode($probadores,$identificadores1);
/*
 *
 *
 * *///separando el string por etiquetas para el cuerpor del pie de pagina
/*
 *
 *
 *
 *
 *
 *
 * */
$textpie=$_SESSION['textoPie'];
$seppie = multiexplode($separadores, $textpie);
//Creando el string de salida
$textopie =implode("",$seppie);
//Cambiando las etiquetas
$separacionpie=multiexplode("p",$textopie);
$identificadores1pie=str_replace($remplazadores,$cambiados,$textopie);
//creando array de trabajo
$probandopie=multiexplode($probadores,$identificadores1pie);
$final=array_filter($probandopie);

/*
 *
 *
 * */

    //Comenzamos a escribir la estructura de el documento
//Creacion de variable de phpWord
$phpWord = new \PhpOffice\PhpWord\PhpWord();
$centrador= array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::DISTRIBUTE);
$section=$phpWord->addSection();
$Encabezado = $section->addHeader();
$table = $Encabezado->addTable();
$table->addRow();
switch ($_SESSION['encabezado']) {
    case 1:
        //Agregar imagen a la izquierda y texto
        $imagen = $table->addCell(30 * 50)->addImage("logotipoJA-dorado-trazo.png", array(
            //'positioning' => 'relative',
            'width' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.3),
            'height' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.5),
            'align' => 'center',
            'wrappingStyle' => 'infront',));
        $texto = $table->addCell(70 * 50)->addText("Este es el texto fijo que vamos a tener en todo el documento ya que refiere al texto del encabezado ",
            array());
        break;
    case 2:
        //Agregar imagen a la derecha y texto
        $texto = $table->addCell(70 * 50)->addText("Este es el texto fijo que vamos a tener en todo el documento ya que refiere al texto del encabezado ",
            array());
        $imagen = $table->addCell(30 * 50)->addImage("logotipoJA-dorado-trazo.png", array(
            //'positioning' => 'relative',
            'width' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.3),
            'height' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.5),
            'align' => 'center',
            'wrappingStyle' => 'infront',));

        break;
    case 3:
        //Agregar imagen a la izquierda
        $imagen = $table->addCell(70 * 50)->addImage("logotipoJA-dorado-trazo.png", array(
            //'positioning' => 'relative',
            'width' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.3),
            'height' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.5),
            'align' => 'center',
            'wrappingStyle' => 'infront',));
        $texto = $table->addCell(30 * 50)->addText();
        break;
    case 4:
        //Agregar imagen a la derecha
        $texto = $table->addCell(30 * 50)->addText();
        $imagen = $table->addCell(70 * 50)->addImage("logotipoJA-dorado-trazo.png", array(
            //'positioning' => 'relative',
            'width' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.3),
            'height' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.5),
            'align' => 'center',
            'wrappingStyle' => 'infront',));
        break;
    case 5:
        //Agregar texto
        $texto = $table->addCell(70 * 50)->addText("Este es el texto fijo que vamos a tener en todo el documento ya que refiere al texto del encabezado ",
            array());
        break;
    case 6:
        //Agregar vacio
        $texto = $table->addCell(70 * 50);
        break;
}
//Creando pie de pagina
$Encabezado = $section->addFooter();
$table = $Encabezado->addTable();
$table->addRow();
//Obtencion de contenido del Encabezado

switch ($_SESSION['PiePagina']) {
    case 1:
        //Agregar imagen a la izquierda y texto
        $table->addCell(30 * 50)->addImage("logotipoJA-dorado-trazo.png", array(
            //'positioning' => 'relative',
            'width' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.3),
            'height' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.5),
            'align' => 'center',
            'wrappingStyle' => 'infront',));
        foreach ($final as $pruebas) {
                $c=$pruebas;
            $contenidopie=str_replace($cambiartext,"",$c);
            $initextpie=strripos($contenidopie,";");
            $cuerpopie=substr($contenidopie,$initextpie);
            $quitarcompie=str_replace(";","",$cuerpopie);
            echo "Este es el texto que estamos ingresando en el pie de pagina".$quitarcompie;
            $table->addCell(70 * 50)->addText($quitarcompie, array());
        }
        break;
    case 2:
        //Agregar imagen a la derecha y texto
        foreach ($final as $pruebas) {
            $c=$pruebas;
            $contenidopie=str_replace($cambiartext,"",$c);
            $initextpie=strripos($contenidopie,";");
            $cuerpopie=substr($contenidopie,$initextpie);
            $quitarcompie=str_replace(";","",$cuerpopie);
            echo "Este es el texto que estamos ingresando en el pie de pagina".$quitarcompie;
            $table->addCell(70 * 50)->addText($quitarcompie, array());
        }
        $imagen = $table->addCell(30 * 50)->addImage("logotipoJA-dorado-trazo.png", array(
            //'positioning' => 'relative',
            'width' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.3),
            'height' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.5),
            'align' => 'center',
            'wrappingStyle' => 'infront',));

        break;
    case 3:
        //Agregar imagen a la izquierda
        $imagen = $table->addCell(70 * 50)->addImage("logotipoJA-dorado-trazo.png", array(
            //'positioning' => 'relative',
            'width' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.3),
            'height' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.5),
            'align' => 'center',
            'wrappingStyle' => 'infront',));
        $texto = $table->addCell(30 * 50)->addText();
        break;
    case 4:
        //Agregar imagen a la derecha
        $texto = $table->addCell(30 * 50)->addText();
        $imagen = $table->addCell(70 * 50)->addImage("logotipoJA-dorado-trazo.png", array(
            //'positioning' => 'relative',
            'width' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.3),
            'height' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.5),
            'align' => 'center',
            'wrappingStyle' => 'infront',));
        break;
    case 5:
        //Agregar texto
        foreach ($final as $pruebas) {
            $c=$pruebas;
            $contenidopie=str_replace($cambiartext,"",$c);
            $initextpie=strripos($contenidopie,";");
            $cuerpopie=substr($contenidopie,$initextpie);
            $quitarcompie=str_replace(";","",$cuerpopie);
            echo "Este es el texto que estamos ingresando en el pie de pagina".$quitarcompie;
            $table->addCell(70 * 50)->addText($quitarcompie, array());
        }
        break;
    case 6:
        //Agregar vacio
        $texto = $table->addCell(70 * 50);
        break;

}
foreach ($probando as $prueba ) {

    $b = $prueba;
    //echo $b;
    $possifo = strpos($b, "tamaño") + 9; //tamaño de letra
    $poslet = strpos($b, "letra") + 6; //color de letra
    $posfon = strpos($b, "fondo") + 6; //color de fondo
    $posfont = (strpos($b, "Tipofuente")) + 11;//nombre de fuente
    $posfontf = strpos($b, ","); // posicion final de fuente
    $posvarf = strpos($b, "¿/codigo?");//posicion final de la variable
    $posvari = (strpos($b, "¿codigo?") + 9);//posicion inicial de la variable

    //////////////////////////////
    //////////////////////////////
    ///

    //Obtener Texto a ingresar

    $contenido=str_replace($cambiartext,"",$b);
    $initext=strripos($contenido,";");
    $cuerpo=substr($contenido,$initext);
    $quitarcom=str_replace(";","",$cuerpo);
    //echo("<br>");


    //Obtener Variable
    if ($variable = strpos($b, "codigo") !== false) {
        $variable = substr($b, $posvari, $posvarf - $posvari);
    } else {

        $variable = " ";
    }
    //Tipo de Letra
  //  if ($letra = strpos($b, "Tipofuente") == false) {
    //    $letra = "arial";
    //} else {
      //  $letra = substr($b, $posfont, 20);
        //  echo $letra;
    //}
    $letra = ($letra = strpos($b, "Tipofuente") == false) ? "arial" : substr($b, $posfont, 20);
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

    if ($negrita = strpos($b, "strong") !== false) {
        $negrita = true;
    } else {
        $negrita = false;
    }
    //Cursiva
    if ($italica = strpos($b, "csva") !== false) {
        $italica = true;
    } else {
        $italica = false;
    }
    //Subrayado
    if ($subra = strpos($b, "underline") !== false) {
        $subra = "single";
    } else {
        $subra = "none";
    }
    //Superindice
    if ($supind = strpos($b, "/sup") !== false) {
        $supind = true;
    } else {
        $supind = false;
    }
    //subindice
    if ($subind = strpos($b, "/sub") !== false) {
        $subind = true;
    } else {
        $subind = false;
    }
    //Tachado
    if ($tacha = strpos($b, "line-through;") !== false) {
        $tacha = true;
    } else {
        $tacha = false;
    }
    $section->addText($quitarcom,array('doubleStrikethrough' => $tacha , 'bgcolor' => $codfon,'underline' => $subra
    ,'bold' => $negrita,'italic' => $italica,'size' => $sizefont,'superScript' => $supind,'color'=>$codlet
    ,'subScript'=>$subind));

}
$objWriter = \PhpOffice\PhpWord\IOFactory:: createWriter($phpWord, 'Word2007');
$objWriter->save('estilosdeencabezados.docx');
?>