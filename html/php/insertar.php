<?php
require('../../db_config.php');

if(isset($_POST['enviar'])){
    $id_album = $_POST['id_cancion'];
    $nombre=$_POST['nombre'];
    $letra=$_POST['letra'];
    $fecha_composicion=$_POST['fecha_composicion'];
    $query= "INSERT INTO CANCIONES(nombre, letra, fecha_composicion) 
    VALUES('$nombre','$letra', '$fecha_composicion')";
    $consulta = pg_query($dbconn, $query);
    $array = pg_fetch_array($consulta);
}
if($query){
    $query2 = "INSERT INTO artista_compuso_cancion(id_artista,id_cancion)
    //Problema con el id de la cancion, buscar alguna manera de obtenerlo use array[0] pero no funciona
    VALUES($_SESSION[id_artista] , $array[0])";
    $consulta2 = pg_query($dbconn, $query2);
    if($consulta2){
        $query3 = "INSERT INTO album_tiene_cancion(id_album,id_cancion)
        VALUES($id,$array[0])";
        $consulta3 = pg_query($dbconn, $query3);
        Header("Location: ../section/crud_canciones.html");
    }
}else {

}



?>