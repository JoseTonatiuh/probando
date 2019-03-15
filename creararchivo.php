<?php


for ($i=0;$i<=2;$i++) {
    $nombres = "holas[$i].php";
    $crear = fopen($nombres, "w+");

    $cadena =("'Hola Como Estas'");

    if ($crear == false) {
        die("No se ha podido crear el archivo.");
    }
    include_once 'bootstrap.php';
    $escribir = fwrite($crear, "<?php 
    session_start();
    include_once 'bootstrap.php';
    include_once 'diccionario.php';
        \$phpWord = new \PhpOffice\PhpWord\PhpWord();
           \$section=\$phpWord->addSection();
    foreach ( \$_SESSION['probar']as \$prueba){

    \$b=\$prueba;
                                                   \$possifo = strpos(\$b, \"tamaño\")+9; //tamaño de letra
                                                    \$poslet = strpos(\$b, \"letra\") + 6; //color de letra
                                                    \$posfon = strpos(\$b, \"fondo\")+6; //color de fondo
                                                    \$posfont = (strpos(\$b, \"Tipofuente\")) + 11;//nombre de fuente
                                                    \$posfontf = strpos(\$b, \",\"); // posicion final de fuente
                                                    \$posvarf = strpos(\$b, \"¿/codigo?\");//posicion final de la variable
                                                    \$posvari = (strpos(\$b, \"¿codigo?\") + 9);//posicion inicial de la variable

                                                    //////////////////////////////
                                                    //////////////////////////////
                                                    ///

                                                        //Obtener Texto a ingresar
                                                    \$contenido=str_replace(\$cambiartext,\"\",\$b);
                                                    \$initext=strpos(\$contenido,\";\");
                                                    \$cuerpo=substr(\$contenido,\$initext);
                                                    echo \"El texto a ingresar es este\".\" \".\$cuerpo;


                                                        //Obtener Variable
                                                  if(\$variable=strpos( \$b,\"codigo\") !== false)
                                                  {
                                                      \$variable=substr(\$b,\$posvari,\$posvarf-\$posvari);
                                                  }
                                                  else{

                                                      \$variable=\" \";
                                                  }

                                                        //Tipo de Letra
                                                    if(\$letra=strpos(\$b,\"Tipofuente\")== false){
                                                        \$letra=\"arial\";
                                                    }
                                                    else{
                                                        \$letra=substr(\$b,\$posfont,20);
                                                        //  echo \$letra;
                                                    }
                                                    //obtener tamaño de letra
                                                    if (\$sizefont = strpos(\$b, \"tamaño\") == false) {
                                                        \$sizefont = \"12\";
                                                    } else {
                                                        \$sizefont = substr(\$b, \$possifo, 2);


                                                    }
                                                    //obtener color de fondo
                                                    if (\$codfon = strpos(\$b, \"fondo\") == false) {
                                                        \$codfon = \"FFFFFF\";
                                                    } else {
                                                        \$codfon = substr(\$b, \$posfon, 6);

                                                    }
                                                    //obtener color de letra
                                                    if (\$codlet = strpos(\$b, \"letra\") == false) {
                                                        \$codlet = \"000000\";
                                                    } else {
                                                        \$codlet = substr(\$b, \$poslet, 6);

                                                    }

                                                    if (\$negrita=strpos(\$b, \"strong\") !== false){
                                                        \$negrita= true;
                                                    }else{
                                                        \$negrita=false;
                                                    }
                                                //Cursiva
                                                    if (\$italica=strpos(\$b, \"em\")!== false){
                                                        \$italica= true;
                                                    }else{
                                                        \$italica=false;
                                                    }
                                                //Subrayado
                                                    if (\$subra=strpos(\$b,\"underline\")!==false)
                                                    {
                                                        \$subra=\"single\";
                                                    }
                                                    else{
                                                        \$subra=\"none\";
                                                    }
                                                //Superindice
                                                    if (\$supind=strpos(\$b,\"/sup\") !==false)
                                                    {
                                                        \$supind= true;
                                                    }
                                                    else{
                                                        \$supind=false;
                                                    }
                                                //subindice
                                                    if (\$subind=strpos(\$b,\"/sub\")!==false)
                                                    {
                                                        \$subind=true;
                                                    }
                                                    else{
                                                        \$subind=false;
                                                    }
                                                //Tachado
                                                    if (\$tacha=strpos(\$b,\"line-through;\")!==false)
                                                    {
                                                        \$tacha=true;
                                                    }
                                                    else{
                                                        \$tacha=false;
                                                    }
    echo \"Esta es la variable\".\$variable;
    \$section->addText(\$cuerpo,array('doubleStrikethrough' => \$tacha , 'bgcolor' => \$codfon,'underline' => \$subra
                        ,'bold' => \$negrita,'italic' => \$italica,'size' => \$sizefont,'superScript' => \$supind,'color'=>\$codlet
                        ,'subScript'=>\$subind));

    



}
    
   //Creando Encabezado //
   ///////////////////////
\$Encabezado = \$section->addHeader();
switch (\$opcenc=\$_POST['Align']) {
    case 1:
        \$alineacion=\PhpOffice\PhpWord\SimpleType\Jc::START;
        break;
    case 2:
        \$alineacion=\PhpOffice\PhpWord\SimpleType\Jc::CENTER;
        break;
    case 3:
        \$alineacion=\PhpOffice\PhpWord\SimpleType\Jc::END;
        break;
    case 4;
        \$alineacion=\PhpOffice\PhpWord\SimpleType\Jc::BOTH;}

        echo \$opcenc;
\$table = \$Encabezado->addTable(array('alignment' => \$alineacion));
\$table->addRow();
\$table->addCell(70*50)->addText(\"Este es el texto fijo que vamos a tener en todo el documento ya que refiere al texto del encabezado \",
    array());
\$table->addCell(25* 50)->addImage(\"logotipoJA-dorado-trazo.png\",array(
    //'positioning' => 'relative',
    'width' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.3),
    'height' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.5),
    'align' => 'center',
    'wrappingStyle' => 'infront',));






//Creando pie de pagina//
///////////////////////
\$Encabezado = \$section->addFooter();
switch (\$opcpie=\$_POST['Ali']){

    case 1;
        \$alineado==\PhpOffice\PhpWord\SimpleType\Jc::START;
    break;

    case 2 ;
        \$alineado=\PhpOffice\PhpWord\SimpleType\Jc::CENTER;
    break;
    case 3 ;
        \$alineado=\PhpOffice\PhpWord\SimpleType\Jc::END;
        break;
    case 4 ;
        \$alineado=\PhpOffice\PhpWord\SimpleType\Jc::BOTH;
        break;
}
echo \$opcpie;
\$table = \$Encabezado->addTable(array('alignment' => \$alineado));
\$table->addRow();
\$table->addCell(30* 50)->addImage(\"logotipoJA-dorado-trazo.png\",array(
    //'positioning' => 'relative',
    'width' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.3),
    'height' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.5),
    'align' => 'center'));
\$table->addCell(70*50)->addText(\"Este es el texto fijo que vamos a tener en todo el documento ya que refiere al texto del pie de pagina \",
    array());
    \$objWriter = \PhpOffice\PhpWord\IOFactory:: createWriter(\$phpWord, 'Word2007');
    \$objWriter->save('PruebasGenerador12.docx');    
   ?>
    "
);
}
include 'holas[0].php';
?>