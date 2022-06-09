<?php
    require('../../db_config.php');

    $id_album=$_POST["id"];
    $nombre_album=$_POST["nombre_album"];
    $imagen=$_POST["imagen"];
    $fecha_lanzamiento=$_POST["fecha_lanzamiento"];

    $sql_statement = "UPDATE album SET nombre_album = $nombre_album, imagen = $imagen, fecha_lanzamiento = $fecha_lanzamiento WHERE id_album = $id_album;";
    
    if($result = pg_query($dbconn, $sql_statement)){
        echo "<script> alert('Álbum editado correctamente');window.location='../section/crud_albumes.html'</script>";
    }
    else {
        echo "<script> alert('ERROR: Problemas al editar el álbum');window.location='../section/crud_albumes.html'</script>";
    }
?>