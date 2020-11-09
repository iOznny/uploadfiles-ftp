<?php

$servidor_ftp = "192.168.1.30";
$conexion_id = ftp_connect($servidor_ftp);
$ftp_usuario = "Cesar";
$ftp_clave = "123456";

// Archivo es el nombre del input del form.
$local = $_FILES["picture"]["name"];
// Este es el nombre temporal del archivo mientras dura el proceso.
$remoto = $_FILES["picture"]["tmp_name"];

// Day nombre tomando un codigo desde el form.
$varnombre1 = str_replace (" ", "_", $_POST['picture']);
$ruta = $varnombre1.str_replace (" ", "_", $local);
$ftp_carpeta_local = $local;

// Destino en el servidor ftp.
$ftp_carpeta_remota = "/cesarcandia/files/";
$mi_nombredearchivo = $ruta;

// Nombre de archivo es el archivo temporal que esta en el servidor ftp.
$nombre_archivo = $remoto;
$archivo_destino = $ftp_carpeta_remota.$mi_nombredearchivo;
$resultado_login = ftp_login($conexion_id, $ftp_usuario, $ftp_clave);

if ((!$conexion_id) || (!$resultado_login)) {
    echo "La conexion ha fallado! al conectar con $servidor_ftp para usuario $ftp_usuario";
    header('refresh:3;url=index.html');
} else {
    $upload = ftp_put($conexion_id, $archivo_destino, $nombre_archivo, FTP_BINARY);
    if (!$upload) {
        echo "Ha ocurrido un error al subir el archivo";
    } else {
        echo "Subido $nombre_archivo a $servidor_ftp as $archivo_destino";
    }

    ftp_close($conexion_id);
}






?>
