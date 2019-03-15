<?php
include_once 'bootstrap.php';
//$valor= false;

        //Negrita
    if ($negrita=strpos($identificadores1, "strong") !== false){
        $negrita= true;
    }else{
        $negrita=false;
    }
                //Cursiva
        if ($italica=strpos($identificadores1, "em")!== false){
        $italica= true;
    }else{
            $italica=false;
    }
        //Subrayado
    if ($subra=strpos($identificadores1,"underline")!==false)
    {
        $subra="single";
    }
    else{
        $subra="none";
    }
    //Superindice
    if ($supind=strpos($identificadores1,"/sup") !==false)
    {
    $supind= true;
    }
    else{
    $supind=false;
    }
    //subindice
    if ($subind=strpos($identificadores1,"/sub")!==false)
    {
    $subind=true;
    }
    else{
    $subind=false;
    }
    //Tachado
    if ($tacha=strpos($identificadores1,"line-through;")!==false)
    {
        $tacha=true;
    }
    else{
        $tacha=false;
    }
    //Texto a imprimir
   // if ($parrafo=strpos($identificadores1,"variable")!==false)
    //{
    //$parrafo=parrafo;
    //}
    //else{
    //$tacha=false;


$phpWord = new \PhpOffice\PhpWord\PhpWord();
$section=$phpWord->addSection();
foreach ($probando as $prueba) {

    $b = $prueba;
    $separarestilos = multiexplode($separadorestilos, $b);
    //print_r($separarestilos);
    $c = implode("", $separarestilos);

    //posiciones
    $possifo = (strpos($b, "tamaño")) + 9; //tamaño de letra
    $poslet = (strpos($b, "letra")) + 6; //color de letra
    $posfon = (strpos($b, "fondo")) + 6; //color de fondo
    $posfont = (strpos($b, "Tipofuente")) + 11;//nombre de fuente
    $posfontf = strpos($b, ","); // posicion final de fuente
    $posvarf = strpos($b, "¿/codigo?");//posicion inicial de la variable
    $posvari = (strpos($b, "¿codigo?") + 9);//posicion final de la variable
    $postexti= (strpos($b,"parrabre")+8);//Posicion Inicial del Texto
    $postextf= (strpos($b,"parrcie"));// Posicion final del texto

    //////////////////////////////
    //////////////////////////////
    //obtener tamaño de letra
    if ($sizefont = strpos($c, "tamaño") == false) {
        $sizefont = "12";
    } else {
        $sizefont = substr($c, $possifo, 2);
        //echo("<br>");
        //echo $sizefont;
    }
    //obtener color de fondo
    if ($codfon = strpos($c, "fondo") == false) {
        $codfon = "FFFFFF";
    } else {
        $codfon = substr($c, $posfon, 6);

    }
    if ($codlet = strpos($c, "letra") == false) {
        $codlet = "000000";
    } else {
        $codlet = substr($c, $poslet, 6);
    }


    $section->addText($b, array('size' => $sizefont, 'bgcolor' => $codfon, 'color' => $codlet,
        'bold' => $negrita, 'italic' => $italica, 'underline' => $subra
    , 'superScript' => $supind, 'doubleStrikethrough' => $tacha, 'name' => $letra));

    $titulo = $section->addHeader();
    $titulo->addText($b, array('size' => $sizefont, 'subScript' => $subind, 'bgcolor' => $codfon,
        'color' => $codlet, 'bold' => $negrita, 'align' => 'both'));
}
$objWriter = \PhpOffice\PhpWord\IOFactory:: createWriter($phpWord, 'Word2007');
$objWriter->save('helloWorldtonatiuharial.docx');
?>

