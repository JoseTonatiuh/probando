<?php
session_start();
$_SESSION['PiePagina']=$_POST['pie'];
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="prism.css">
    <script src="prism.js"></script>
    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=0uyxrdnqx93wavisijdoq0052ri5bpyee5wae4hh842xa31v"></script>
    <script>tinymce.init({
            selector: 'textarea',
            plugins: 'a11ychecker  advcode  formatpainter linkchecker media mediaembed pageembed permanentpen powerpaste tinycomments tinydrive tinymcespellchecker',
            toolbar: 'a11ycheck  advcode forecolor list backcolor formatpainter insertfile pageembed permanentpen tinycomments',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name'
        })
        ;</script>
</head>
<body>
<form  action="contenido.php" method="post">
    <label>Pie de Pagina </label>
<textarea  name="Piepagina"></textarea>
    <input type="submit" name="submit" value="Enviar" id="submit" >
</form>
</body>
</html>
