<?php
include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';

class cancion{
	protected $conn;
	protected $data = array();

	function __construct() {
		$this->conn = pg_connect("host=localhost port=5432 dbname=SitioWeb user=postgres password=minestrone1");
	}
	
	public function getCancion() {
		$sql = "SELECT canciones.id_cancion, canciones.nombre, artistas.nombre_artistico, album.nombre_album, canciones.fecha_composicion, canciones.letra, artistas.id_artista
            FROM 
            canciones
            INNER JOIN artista_compuso_cancion ON canciones.id_cancion = artista_compuso_cancion.id_cancion
            INNER JOIN artistas ON artistas.id_artista = artista_compuso_cancion.id_artista
            INNER JOIN album_tiene_cancion ON canciones.id_cancion = album_tiene_cancion.id_cancion
            INNER JOIN album ON album.id_album = album_tiene_cancion.id_album;";
		$queryRecords = pg_query($this->conn, $sql) or die("error to fetch data");
		$data = pg_fetch_all($queryRecords);
		return $data;
	}
}
?>
