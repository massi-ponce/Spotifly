<?php
    require('../../db_config.php');

    $id_album=$_GET['id_album'];

    $sql_statement = "DELETE FROM album WHERE id_album = '$id_album';";
    if($result = pg_query($dbconn, $sql_statement)){
        header("Location: ../section/crud_albumes.html");
    }
    else{
        echo "<script> alert('ERROR: No se pudo eliminar el álbum');window.location='../section/crud_albumes.html'</script>";
    }
?>