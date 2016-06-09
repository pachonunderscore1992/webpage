<?php
   
$user = $_POST['user'];
$user_password = $_POST['password'];

$servername = "localhost"; $username = "root"; $password = "123456"; $database_kpop = "kpopdb";
$kpop = mysql_connect($servername, $username, $password);
mysql_select_db($database_kpop, $kpop);

$query_user = "SELECT * FROM usuario WHERE nombre_usuario = '".$user."' AND password = '".$user_password."';";

$result_query_user = mysql_query($query_user, $kpop) or die(mysql_error());

$user_row = mysql_fetch_assoc($result_query_user);

$total = mysql_num_rows($result_query_user);

if($total != 0) {
   echo json_encode($user_row);
} else {
   http_response_code(404);
   return false;
}
?>