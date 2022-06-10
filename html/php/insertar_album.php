<?php
    require('../../db_config.php');

    $nombre_album=filter_var($_POST["nombre_album"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $imagen=filter_var($_POST["imagen"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fecha_lanzamiento=filter_var($_POST["fecha_lanzamiento"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sql_statement = "INSERT INTO album(nombre_album, imagen, fecha_lanzamiento) VALUES('$nombre_album', '$imagen', '$fecha_lanzamiento');";
    
    if($result = pg_query($dbconn, $sql_statement)){
        echo "<script> alert('Álbum creado correctamente');window.location='../section/crud_albumes.html'</script>";
    }
    else {
        echo "<script> alert('ERROR: Problemas al crear el álbum');window.location='../section/crud_albumes.html'</script>";
    }
?>