<?php
    require('../../db_config.php');

    $id_cancion=$_POST["id"];
    $nombre=$_POST["nombre"];
    $letra=$_POST["letra"];
    $fecha_composicion=$_POST["fecha_composicion"];

    $sql_statement = "UPDATE canciones SET nombre = '$nombre', letra = '$letra', fecha_composicion = '$fecha_composicion' WHERE id_cancion = '$id_cancion';";
    
    if($result = pg_query($dbconn, $sql_statement)){
        echo "<script> alert('Canción editada correctamente');window.location='../section/crud_canciones.html'</script>";
    }
    else {
        echo "<script> alert('ERROR: Problemas al editar la canción');window.location='../section/crud_canciones.html'</script>";
    }
?>