<?php
    require('../../db_config.php');

    $id_album=$_POST["id_album"];
    $nombre=$_POST["nombre"];
    $letra=$_POST["letra"];
    $fecha_composicion=$_POST["fecha_composicion"];

    $sql_statement1 = "SELECT * from album WHERE id_album = '$id_album';";
    $result1 = pg_query($dbconn, $sql_statement1);

    $sql_statement2 = "INSERT INTO canciones(nombre, letra, fecha_composicion) VALUES('$nombre', '$letra', '$fecha_composicion');";
    
    if(pg_num_rows($result1) == 1){
        if($result2 = pg_query($dbconn, $sql_statement2)){
            $sql_statement3 = "SELECT id_cancion FROM canciones WHERE nombre = '$nombre';";
            $result3 = pg_query($dbconn, $sql_statement3);
            $variable = pg_fetch_all($result3);
            foreach($variable as $clave => $valor){
            $id_cancion = $valor['id_cancion'];
            }
            $sql_statement4 = "INSERT INTO album_tiene_cancion(id_album, id_cancion) VALUES('$id_album', '$id_cancion');";
            if($result4 = pg_query($dbconn, $sql_statement4)){
                echo "<script> alert('Canción creada correctamente');window.location='../section/crud_canciones.html'</script>"; 
            }
        }
    }
    else{
        echo "<script> alert('ERROR: Problemas al crear la canción');window.location='../section/crud_canciones.html'</script>";
    }
?>