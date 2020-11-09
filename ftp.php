<?php
// Credentials
$server = "192.168.1.30";
$conn_id = ftp_connect($server);
$ftp_user = "Cesar";
$ftp_key = "123456";

// Archivo es el nombre del input del form.
$local = $_FILES["picture"]["name"];
// Este es el nombre temporal del archivo mientras dura el proceso.
$remoto = $_FILES["picture"]["tmp_name"];

$picture = str_replace (" ", "_", $_POST['picture']);
$file = $picture.str_replace (" ", "_", $local);

// Destino en el server ftp.
$dir = "/Cesar/files/";

// Nombre de archivo es el archivo temporal que esta en el server ftp.
$destino = $dir . $file;
$login = ftp_login($conn_id, $ftp_user, $ftp_key);

if ((!$conn_id) || (!$login)) {
    echo "La conexion ha fallado! al conectar con $server para usuario $ftp_user";
    header('refresh:3;url=index.html');
} else {
    $upload = ftp_put($conn_id, $destino, $remoto, FTP_BINARY);
    if (!$upload) {
        echo "Ha ocurrido un error al subir el archivo al server, vuelva a intentarlo.";
        header('refresh:3;url=index.html');
    } else {        
        echo "Subida del archivo exitosamente.";
        header('refresh:3;url=index.html');
    }

    ftp_close($conn_id);
}



?>
