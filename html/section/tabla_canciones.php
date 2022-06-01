<?php
    require_once("../validar.php");
?>
<?php include('../template/navbar_usuario.html');?>

<?php 
    include('response.php');
    $newObj = new cancion();
    $songs = $newObj->getCancion();
?>

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
                      <?php foreach($songs as $key => $song) :?>
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