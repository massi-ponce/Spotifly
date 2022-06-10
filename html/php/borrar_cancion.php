<?php
    require('../../db_config.php');

    $id_cancion=$_GET['id'];

    $sql_statement1 = "DELETE FROM album_tiene_cancion WHERE id_cancion = '$id_cancion';";
    $result1 = pg_query($dbconn, $sql_statement1);

    if($result1){
        echo("WENA");
        /*$sql_statement2 = "DELETE FROM canciones WHERE id_cancion = '$id_cancion';";
        if($result2 = pg_query($dbconn, $sql_statement2)){
            header("Location: ../section/crud_canciones.html");
        }*/
    }
    else{
        echo "<script> alert('ERROR: No se pudo eliminar la canción');window.location='../section/crud_canciones.html'</script>";
    }
?>