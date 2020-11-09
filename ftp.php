<?php


$server_ftp = '192.168.1.30';
$conn = ftp_connect($server_ftp);

$ftp_user = 'Cesar';
$ftp_key = '123456';
$ftp_dir = '/Cesar/files/';


$login = ftp_login($conn, $ftp_user, $ftp_key);

//File
$name = $_FILES['picture']['name'];
$type = $_FILES['picture']['type'];
$size = $_FILES['picture']['size'];
$file = $_FILES['picture']['tmp_name'];

if((!$conn) || (!$login)) {
    echo 'Ocurrio un error al conectarse con FTP.';
    header('refresh:3;url=index.html');
} else {
    //Checking of caracters of picture

    $upload = ftp_put($conn, $ftp_dir . $file, $file, FTP_BINARY);
    if ($upload) {
        echo 'Subido existosamente.';
        header('refresh:3;url=index.html');
    } else {
        echo 'Ocurrio un error en la subida del archivo vuelva a intentarlo.';
        header('refresh:3;url=index.html');
    }
    
}





?>
