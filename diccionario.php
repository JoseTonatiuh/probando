<?php
//separadores por <p> y </p>
$separadores = array("&gt;p&lt;","&gt;/p&lt;");
//Separadores de parrafos
$probadores = array("parrabre","parrcie");
//Separador de estilos
$separadorestilos = array("¿estila","*?");
//separadores de tipo de estilo
// Factores de busqueda en el codigo
$remplazadores = array("&lt;","&gt;","background-color: #","color: #","span",
    "/estila","font-size","font-family",
    "text-decoration",": ","style=&quot;","code","&quot;","¿p?","¿/p?","&nbsp;","¿em?","¿/em?");
//Factores de salida remplazados
$cambiados = array("¿","?","fondo ","letra ","estila","/estilc",
    "tamaño","Tipofuente","Remarcado","=>","tipoestilo=","codigo","*","parrabre","parrcie","","csva","csvc");
//Factores de cambio para obtener el texto
$cambiartext = array("¿","?","fondo ","letra ","estila","estilc",
    "tamaño","Tipofuente","Remarcado","=>","tipoestilo=","codigo","*","parrabre","parrcie","espacio",
    "/","strong","underline;","line-through;","sup","sub","  ","csva","csvc");
$acentos = array("&amp;aacute;","&amp;eacute;","&amp;iacute;","&amp;oacute;","&amp;uacute;");
$letras=array("á","é","í","ó","ú");