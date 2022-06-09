<?php
    include('../template/navbar_artista.html');
    require('../../db_config.php');

    $id_album = $_GET['id_album'];

    $sql_statement = "SELECT * FROM album WHERE id_album = '$id_album';";
    $result = pg_query($dbconn, $sql_statement);
    $variable = pg_fetch_all($result);
    foreach($variable as $clave => $valor){
        $nombre_album = $valor['nombre_album'];
        $imagen = $valor['imagen'];
        $fecha_lanzamiento = $valor['fecha_lanzamiento'];
    }
?>

<div class='container mt-5'>
    <div class='row justify-content-center'>
        <div class='col-md-3'>
            <div class="card">
                <div class="card-header">
                    Editar datos del álbum
                </div>
                <div class="card-body">
                    <form action="editar_album_proceso.php" method="POST">
                        <div class="mb-3">
                            <label for="txtNombre">Nombre del álbum</label>
                            <input type="text" class="form-control" name="nombre_album" required value="<?php echo($nombre_album)?>">
                        </div>
                        <div class="mb-3">
                            <label for="txtImagen">Imágen del álbum</label>
                            <input type="text" class="form-control" name="imagen" required value="<?php echo($imagen)?>">
                        </div>
                        <div class="mb-3">
                            <label for="txtNombre">Fecha de lanzamiento</label>
                            <input type="date" class="form-control" name="fecha_lanzamiento" required value="<?php echo($fecha_lanzamiento)?>">
                        </div>
                        <div>
                            <input type="hidden" name="id" value="<?php echo($_GET['id_album'])?>">
                            <button type="submit" name="agregar" class="btn btn-success">Confirmar</button>
                            <button type="reset" name="cancelar" class="btn btn-danger">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>