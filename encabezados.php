<?php
session_start();
$_SESSION['encabezado']=$_POST['Align'];
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="prism.css">
    <script src="prism.js"></script>
    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=0uyxrdnqx93wavisijdoq0052ri5bpyee5wae4hh842xa31v"></script>
    <script>tinymce.init({
            selector: 'textarea',
            plugins: 'a11ychecker  image  advcode linkchecker pageembed tinycomments tinydrive tinymcespellchecker',
            toolbar: 'a11ycheck   image advcode forecolor list backcolor  permanentpen tinycomments',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name'
        })
        ;</script>
</head>
<body>
<form  action="pie.php" method="post">
    <label>Contenido de Encabezado</label>
    <textarea  name="encabezado"></textarea>
    <input type="submit" name="submit" value="Enviar" id="submit" >
</form>
</body>
</html>