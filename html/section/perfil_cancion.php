<?php
    require_once("../validar.php");
?>

<?php include('../template/navbar_usuario.html');?>

<?php
    if(isset($_GET["nombre_cancion"]) && isset($_GET["nombre_artista"]) && isset($_GET["fecha_composicion"]) && isset($_GET["album"]) && isset($_GET["letra"]))
    {
        $nombre_cancion = $_GET["nombre_cancion"];
        $nombre_artista = $_GET["nombre_artista"];
        $fecha_composicion = $_GET["fecha_composicion"];
        $album = $_GET["album"];
        $letra = $_GET["letra"];
    }
?>

<DOCTYPE html>
<html>
    <body> 
        <div class="container">
            <div class="col-sm-6" style="padding-top:50px;">
                <div class="well">
                    <h1><?php echo $nombre_cancion ?></h1>
                    <h4><?php echo $nombre_artista ?></h4>
                    <h5><?php echo $album ?> </h5>
                    <h6><?php echo $fecha_composicion?></h6>
                </div>
                <h2><?php echo "Letra:"?></h2>
                <p> <?php echo $letra ?></p>
            </div>
        </div>

    </body>
</html>
</DOCTYPE>

