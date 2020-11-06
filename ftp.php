<?php

//File
$name = $_FILES['picture']['name'];
$type = $_FILES['picture']['type'];
$size = $_FILES['picture']['size'];

//Checking of caracters of picture
if(($type == "image/png" || $type == "image/jpeg" || $type == "image/jpg") && ($size <= 4000000)) { 
    if (move_uploaded_file($_FILES['picture']['tmp_name'], 'files/' . $name)) {
        echo 'Subido existosamente.';
        header('refresh:3;url=index.html');
    } else {
        echo 'Ocurrio un error en la subida del archivo vuelva a intentarlo.';
        header('refresh:3;url=index.html');
     }
} else {
    echo 'Ocurrio un error en su fotografia, por favor verifique el formato de la fotografia así como su peso.';
    header('refresh:3;url=index.html');
}

?>
