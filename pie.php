<?php
session_start();
$_SESSION['textoEnc']=htmlspecialchars($_POST['encabezado']);
?>
<form method="post" action="piepag.php">
    <label>Tipo del Encabezado</label><br>
    <input type="radio" name="pie" value= 1 /> Imagen izquierda con texto
    <input type="radio" name="pie" value= 2 /> Imagen derecha con texto
    <input type="radio" name="pie" value= 3 />Imagen a la izquierda
    <input type="radio" name="pie" value= 4 />Imagen a la derecha
    <input type="radio" name="pie" value= 5/>Texto solo
    <input type="radio" name="pie" value= 6 />Sin Pie de Pagina<br/>
    <input type="submit" name="enviar" value="Enviar"/>
</form>