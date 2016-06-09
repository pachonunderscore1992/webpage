<?php
   
   $nombre_artista = $_POST['nombre_artista'];

$servername = "localhost"; $username = "root"; $password = "123456"; $database_kpop = "kpopdb";
$kpop = mysql_connect($servername, $username, $password);
mysql_select_db($database_kpop, $kpop);

$query_artista = "SELECT * FROM artista";
$artista = mysql_query($query_artista);
$id_artista = mysql_num_rows($artista) + 1;

$image = $_POST['foto'];
//Stores the filename as it was on the client computer.
$imagename = $_FILES['foto']['name'];
//Stores the filetype e.g image/jpeg
$imagetype = $_FILES['foto']['type'];
//Stores any error codes from the upload.
$imageerror = $_FILES['foto']['error'];
//Stores the tempname as it is given by the host when uploaded.
$imagetemp = $_FILES['foto']['tmp_name'];

//The path you wish to upload the image to
$image_path = $_SERVER['DOCUMENT_ROOT'] . '/fotos/' . $imagename;
if(is_uploaded_file($imagetemp)) {
   if(move_uploaded_file($imagetemp, $image_path)) {
      echo "Sussecfully uploaded your image.";
   } else {
      echo "Failed to move your image.";
   }
}
else {
  echo "Failed to upload your image.";
}

$query = "INSERT INTO artista(id_artista, id_grupo, nombre, fotografia) VALUES('".$id_artista."', 'g1', '".$nombre_artista."', 'fotos/".$imagename."');";

$result_artista = mysql_query($query, $kpop) or die(mysql_error());

if(!$result_artista) {
   http_response_code(404);
   return false;
} else {
   header('Location: /');
   return true;
}

?>
