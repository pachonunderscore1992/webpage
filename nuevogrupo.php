<?php
   
   $nombre_grupo = $_POST['nombre_grupo'];

$servername = "localhost"; $username = "root"; $password = "123456"; $database_kpop = "kpopdb";
$kpop = mysql_connect($servername, $username, $password);
mysql_select_db($database_kpop, $kpop);

$query_grupo = "SELECT * FROM grupo";
$grupo = mysql_query($query_grupo);
$id_grupo = mysql_num_rows($grupo) + 1;

$image = $_POST['foto_grupo'];
//Stores the filename as it was on the client computer.
$imagename = $_FILES['foto_grupo']['name'];
//Stores the filetype e.g image/jpeg
$imagetype = $_FILES['foto_grupo']['type'];
//Stores any error codes from the upload.
$imageerror = $_FILES['foto_grupo']['error'];
//Stores the tempname as it is given by the host when uploaded.
$imagetemp = $_FILES['foto_grupo']['tmp_name'];

//The path you wish to upload the image to
$image_path = $_SERVER['DOCUMENT_ROOT'] . '/fotos/grupos/' . $imagename;
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

$query = "INSERT INTO grupo(id_grupo, nombre_grupo, nro_integrantes, caracteristicas, fotografia) VALUES('g".$id_grupo."', '".$nombre_grupo."',5,'caracteristicas','fotos/grupos/".$imagename."');";

$result_grupo = mysql_query($query, $kpop) or die(mysql_error());

if(!$result_grupo) {
   http_response_code(404);
   return false;
} else {
   header('Location: /');
   return true;
}

?>
