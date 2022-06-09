<?php
    require('../../db_config.php');

    $nombre_album=$_POST["nombre_album"];
    $imagen=$_POST["imagen"];
    $fecha_lanzamiento=$_POST["fecha_lanzamiento"];

    $sql_statement = "INSERT INTO album(nombre_album, imagen, fecha_lanzamiento) VALUES('$nombre_album', '$imagen', '$fecha_lanzamiento');";
    
    if($result = pg_query($dbconn, $sql_statement)){
        echo "<script> alert('Álbum creado correctamente');window.location='../section/crud_albumes.html'</script>";
    }
    else {
        echo "<script> alert('ERROR: Problemas al crear el álbum');window.location='../section/crud_albumes.html'</script>";
    }
?>