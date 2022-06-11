<?php
    require('../../db_config.php');


    $id_cancion=$_GET['id_cancion'];

    $sql_statement1 = "DELETE FROM album_tiene_cancion WHERE id_cancion = $id_cancion";
    $result1 = pg_query($dbconn, $sql_statement1);


    if($result1){
        $sql_statement2 = "DELETE FROM artista_compuso_cancion WHERE id_cancion = $id_cancion";
        $result2 = pg_query($dbconn, $sql_statement2);
        if($result2){
            $sql_statement3 = "DELETE FROM canciones WHERE id_cancion = $id_cancion";
            $result3 = pg_query($dbconn, $sql_statement3);
            header("Location: ../section/crud_canciones.html");
        }
    }
    else{
        echo "<script> alert('ERROR: No se pudo eliminar la canción');window.location='../section/crud_canciones.html'</script>";
    }
?>