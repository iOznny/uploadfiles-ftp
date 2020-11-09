<?php

/* $server_ftp = '192.168.1.30';
$conn = ftp_connect($server_ftp);

$ftp_user = 'Cesar';
$ftp_key = '123456';
$ftp_dir = '/Cesar/files/';

$login = ftp_login($conn, $ftp_user, $ftp_key);

//File
$local = $_FILES['picture']['name'];
$remoto = $_FILES['picture']['tmp_name'];

$varnombre1 = str_replace(" ", "_", $)

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
 */

$servidor_ftp = "192.168.1.30";
$conexion_id = ftp_connect($servidor_ftp);
$ftp_usuario = "Cesar";
$ftp_clave = "123456";

$local = $_FILES["picture"]["name"];//archivo es el nombre del input del form
// Este es el nombre temporal del archivo mientras dura la transmisiÃ³n
$remoto = $_FILES["picture"]["tmp_name"];

$varnombre1 = str_replace (" ", "_", $_POST['picture']);//day nombre tomando un codigo desde el form
$ruta = $varnombre1.str_replace (" ", "_", $local);
$ftp_carpeta_local = $local;
$ftp_carpeta_remota = "/Cesar/files/";//destino en el servidor ftp
$mi_nombredearchivo = $ruta;

//nombre de archivo es el archivo temporal que esta en el servidor ftp
$nombre_archivo = $remoto;
$archivo_destino = $ftp_carpeta_remota.$mi_nombredearchivo;
$resultado_login = ftp_login($conexion_id, $ftp_usuario, $ftp_clave);

if ((!$conexion_id) || (!$resultado_login)) {
    echo "La conexion ha fallado! al conectar con $servidor_ftp para usuario $ftp_usuario";

} else {
    echo "Conectado con $servidor_ftp, para usuario $ftp_usuario";

    $upload = ftp_put($conexion_id, $archivo_destino, $nombre_archivo, FTP_BINARY);
    if (!$upload) {
        echo "Ha ocurrido un error al subir el archivo";
    } else {
        echo "Subido $nombre_archivo a $servidor_ftp as $archivo_destino";
    }

    ftp_close($conexion_id);
}






?>
