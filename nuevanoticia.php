<?php
   
$titulo = $_POST['titulo'];
$noticia = $_POST['noticia'];
$id_usuario = $_POST['id_usuario'];

$servername = "localhost"; $username = "root"; $password = "123456"; $database_kpop = "kpopdb";
$kpop = mysql_connect($servername, $username, $password);
mysql_select_db($database_kpop, $kpop);

$publicidad_query = "SELECT * FROM publicidad";
$publicidad = mysql_query($publicidad_query);
$id_publicidad = mysql_num_rows($publicidad) + 1;
$fecha = date("Y-m-d");
$query = "INSERT INTO publicidad(id_publicidad, id_usuario, descripcion, noticia, fecha, fotografia) VALUES('pu".$id_publicidad."', '".$id_usuario."', '".$titulo."','".$noticia."','".$fecha."', 'Imagenes/flashimagenes/header".$id_publicidad.".jpg')";

$result = mysql_query($query, $kpop) or die(mysql_error());

if(!$result) {
   http_response_code(404);
   return false;
} else {
   return true;
}

?>