<?php
    include('../template/navbar_artista.html');
    require('../../db_config.php');

    $id_cancion = $_GET['id_cancion'];

    $sql_statement = "SELECT * FROM canciones WHERE id_cancion = '$id_cancion';";
    $result = pg_query($dbconn, $sql_statement);
    $variable = pg_fetch_all($result);
    foreach($variable as $clave => $valor){
        $nombre = $valor['nombre'];
        $letra = $valor['letra'];
        $fecha_composicion = $valor['fecha_composicion'];
    }
?>

<div class='container mt-5'>
    <div class='row justify-content-center'>
        <div class='col-md-3'>
            <div class="card">
                <div class="card-header">
                    Editar datos de la canción
                </div>
                <div class="card-body">
                    <form action="editar_cancion_proceso.php" method="POST">
                        <div class="mb-3">
                            <label for="txtNombre">Nombre de la canción</label>
                            <input type="text" class="form-control" name="nombre" required value="<?php echo($nombre)?>">
                        </div>
                        <div class="mb-3">
                            <label for="txtNombre">Letra de la canción</label>
                            <input type="text" class="form-control" name="letra" required value="<?php echo($letra)?>">
                        </div>
                        <div class="mb-3">
                            <label for="txtNombre">Fecha de composición</label>
                            <input type="date" class="form-control" name="fecha_composicion" required value="<?php echo($fecha_composicion)?>">
                        </div>
                        <div>
                            <input type="hidden" name="id" value="<?php echo($_GET['id_cancion'])?>">
                            <button type="submit" name="agregar" class="btn btn-success">Confirmar</button>
                            <a class="btn btn-danger" href="../section/crud_canciones.html" role="button">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>