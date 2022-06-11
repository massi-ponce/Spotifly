<?php

require('../../db_config.php');
session_start();

if(isset($_POST['agregar'])){
    $id_album = filter_var($_POST['id_album'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $nombre=filter_var($_POST['nombre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $letra=filter_var($_POST["letra"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fecha_composicion= filter_var($_POST['fecha_composicion'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $query = "SELECT * FROM album WHERE id_album = '$id_album';";
    $consulta = pg_query($dbconn, $query);
    if(pg_num_rows($consulta) == 1){
        $query2= "INSERT INTO canciones(nombre, letra, fecha_composicion) VALUES('$nombre','$letra', '$fecha_composicion') RETURNING id_cancion";
        $consulta2 = pg_query($dbconn, $query2);
        $row = pg_fetch_row($consulta2);
        $id_cancion = $row[0];
        $id_artista = $_SESSION['id_artista'];    
    }
}
if($consulta2){
    $query3 = "INSERT INTO artista_compuso_cancion(id_artista, id_cancion) VALUES( $id_artista , $id_cancion);";
    $consulta3 = pg_query($dbconn, $query3);
    if($consulta3){
        $query4 = "INSERT INTO album_tiene_cancion(id_album, id_cancion) VALUES($id_album,$id_cancion);";
        $consulta4 = pg_query($dbconn, $query4);
        echo "<script> alert('Canción creada correctamente');window.location='../section/crud_canciones.html'</script>";
    }
}
else{
    echo "<script> alert('ERROR: Problemas al crear la canción');window.location='../section/crud_canciones.html'</script>";
}

?>