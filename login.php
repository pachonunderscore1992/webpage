<?php
   
$user = $_POST['user'];
$user_password = $_POST['password'];

$servername = "localhost"; $username = "root"; $password = "123456"; $database_kpop = "kpopdb";
$kpop = mysql_connect($servername, $username, $password);
mysql_select_db($database_kpop, $kpop);

$query_user = "SELECT * FROM usuario WHERE nombre_usuario = '".$user."' AND password = '".$user_password."';";

$result_query_user = mysql_query($query_user, $kpop) or die(mysql_error());

$total = mysql_num_rows($result_query_user);

if($total != 0) {
   return true;
} else {
   http_response_code(404);
   return false;
}
?>