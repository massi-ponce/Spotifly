<?php
    require_once("../php/validar.php");
?>
<?php include('../template/navbar_usuario.html');?>


<DOCTYPE html>   
<html>
    <body>
        <div class="container">
          <div class="col-sm-6" style="padding-top:50px;">
              <div class="well">
                  <h2>Tabla de Canciones</h2>
              </div>
              <table id="songs_grid" class="table" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>Nombre</th>
                          <th>Artista(s)</th>
                          <th>Álbum</th>
                          
                      </tr>
                  </thead>
                  <tbody>
                        <?php
                            require('../../db_config.php');
                            $sql_statement = "SELECT canciones.id_cancion, canciones.nombre, artistas.nombre_artistico, album.nombre_album, canciones.fecha_composicion, canciones.letra, artistas.id_artista
                            FROM 
                            canciones
                            INNER JOIN artista_compuso_cancion ON canciones.id_cancion = artista_compuso_cancion.id_cancion
                            INNER JOIN artistas ON artistas.id_artista = artista_compuso_cancion.id_artista
                            INNER JOIN album_tiene_cancion ON canciones.id_cancion = album_tiene_cancion.id_cancion
                            INNER JOIN album ON album.id_album = album_tiene_cancion.id_album;";
                            $result = pg_query($dbconn, $sql_statement);
                            $songs = pg_fetch_all($result);

                            foreach($songs as $clave => $song) : 
                        ?>
                      <tr>
                          <td><?php echo $song['nombre'] ?></td>
                          <td><?php echo $song['nombre_artistico'] ?></td>
                          <td><?php echo $song['nombre_album'] ?></td>
                          <td><button onclick="location.href='perfil_cancion.php?nombre_cancion=<?php echo $song['nombre']?>&nombre_artista=<?php echo $song['nombre_artistico']?>&fecha_composicion=<?php echo $song['fecha_composicion']?>&album=<?php echo $song['nombre_album']?>&letra=<?php echo $song['letra']?>'">Perfil</button></td>
                      </tr>
                      
                  <?php endforeach;?>
                  </tbody>
              </table>
          </div>
        </div>
      </div>
    </body>
</html>
</DOCTYPE>