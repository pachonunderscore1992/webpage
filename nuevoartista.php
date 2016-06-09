<?php
   
$nombre_artista = $_POST['nombre_artista'];

$servername = "localhost"; $username = "root"; $password = "123456"; $database_kpop = "kpopdb";
$kpop = mysql_connect($servername, $username, $password);
mysql_select_db($database_kpop, $kpop);

$query_artista = "SELECT * FROM artista";
$artista = mysql_query($query_artista);
$id_artista = mysql_num_rows($artista) + 1;

$query = "INSERT INTO artista(id_artista, id_grupo, nombre) VALUES('".$id_artista."', 'g1', '".$nombre_artista."');";

$result_artista = mysql_query($query, $kpop) or die(mysql_error());

if(!$result_artista) {
   http_response_code(404);
   return false;
} else {
   return true;
}

?>