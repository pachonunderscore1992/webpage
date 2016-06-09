<?php
   
$user = $_POST['user'];
$user_password = $_POST['password'];

$servername = "localhost"; $username = "root"; $password = "123456"; $database_kpop = "kpopdb";
$kpop = mysql_connect($servername, $username, $password);
mysql_select_db($database_kpop, $kpop);

$query_user = "SELECT * FROM usuario;";

$result_query_user = mysql_query($query_user, $kpop) or die(mysql_error());
$row_user = mysql_fetch_assoc($result_query_user);

$find = false;
$count = 0;
do {
   if($row_user['nombre_usuario'] == $user) {
      $find = true;
   }
   $count++;
} while( $row_user = mysql_fetch_assoc($result_query_user));

$count++;
if($find) {
   http_response_code(404);
   return false;
} else {
   $sql = "INSERT INTO usuario(id_usuario, nombre_usuario, password) VALUES('p".$count."','".$user."','".$user_password."');";
   mysql_query($sql);
   return true;
}
?>